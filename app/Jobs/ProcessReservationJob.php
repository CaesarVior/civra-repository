<?php

namespace App\Jobs;

use App\Models\ReservationModel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class ProcessReservationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;

    public int $backoff = 10;

    public function __construct(public ReservationModel $reservation) {}

    public function handle(): void
    {
        try {
            $this->syncToGoogleSheets();
            $this->sendTelegramNotification();
            $this->reservation->update(['status' => 'synced']);

        } catch (\Throwable $e) {
            Log::error('Gagal memproses Redis Queue Reservasi: '.$e->getMessage(), [
                'reservation_id' => $this->reservation->id,
            ]);
            $this->reservation->update(['status' => 'failed']);
            throw $e;
        }
    }

    private function syncToGoogleSheets(): void
    {
        $sheetsWebhookUrl = config('services.google_sheets.webhook_url');

        if ($sheetsWebhookUrl) {
            $response = Http::withOptions([
                'allow_redirects' => [
                    'strict' => true,
                ],
            ])->asJson()->post($sheetsWebhookUrl, [
                'reservation_code' => $this->reservation->reservation_code,
                'name' => $this->reservation->name,
                'phone_number' => $this->reservation->phone_number,
                'order' => $this->reservation->order,
                'device' => $this->reservation->device,
                'description' => $this->reservation->description ?? '-',
                'start_date' => $this->reservation->start_date->format('Y-m-d H:i:s'),
                'end_date' => $this->reservation->end_date->format('Y-m-d H:i:s'),
                'status' => 'Pending',
                'created_at' => $this->reservation->created_at->format('Y-m-d H:i:s'),
            ]);

            Log::info('Google Sheets Response: '.$response->body());
        }
    }

    private function sendTelegramNotification(): void
    {
        $botToken = config('services.telegram.bot_token');
        $chatId = config('services.telegram.chat_id');

        $waUrl = 'https://wa.me/'.$this->reservation->phone_number;

        $message = "<b>🥤 RESERVASI MINUMAN BARU</b>\n";
        $message .= "<code>================================</code>\n";
        $message .= "<b>Kode Order :</b> <code>#{$this->reservation->reservation_code}</code>\n";
        $message .= '<b>Nama Client:</b> '.e($this->reservation->name)."\n";
        $message .= "<b>No. WhatsApp:</b> <a href=\"{$waUrl}\">+{$this->reservation->phone_number} (Buka Chat)</a>\n";
        $message .= '<b>Pesanan    :</b> <b>'.e($this->reservation->order)."</b>\n";
        $message .= '<b>Device/Meja :</b> '.e($this->reservation->device)."\n";
        $message .= "<b>Mulai      :</b> {$this->reservation->start_date}\n";
        $message .= "<b>Selesai    :</b> {$this->reservation->end_date}\n";
        $message .= "<code>--------------------------------</code>\n";
        $message .= "<b>Catatan    :</b>\n<i>".e($this->reservation->description ?? 'Tidak ada catatan khusus')."</i>\n";
        $message .= "<code>================================</code>\n";
        $message .= '🟢 <b>Status System: Successfully Queued</b>';

        Http::timeout(10)->post("https://api.telegram.org/bot{$botToken}/sendMessage", [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML',
            'disable_web_page_preview' => true,
        ]);
    }
}
