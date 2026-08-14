<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReservationModel extends Model
{
    use HasFactory;

    protected $table = 'reservations';

    /**
     * Menentukan kolom mana saja yang BOLEH diisi secara mass assignment (Create/Update).
     * Ini mencegah Mass Assignment Vulnerability (misal: user jahat menyisipkan kolom yang tidak diizinkan).
     */
    protected $fillable = [
        'reservation_code',
        'name',
        'phone_number',
        'order',
        'device',
        'description',
        'start_date',
        'end_date',
        'status',
        'ip_address',
        'user_agent',
    ];

    /**
     * Konversi tipe data otomatis (Data Casting).
     * Mencegah bug manipulasi tipe data dan mempermudah format Carbon untuk tanggal.
     */
    protected $casts = [
        'start_date' => 'datetime',
        'end_date' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($reservation) {
            $eventDate = Carbon::parse($reservation->start_date);

            $dateFormatted = $eventDate->format('d-m-Y');
            $monthlyCount = static::whereYear('start_date', $eventDate->year)
                ->whereMonth('start_date', $eventDate->month)
                ->count();

            $sequence = $monthlyCount + 1;
            $sequencePadded = str_pad($sequence, 3, '0', STR_PAD_LEFT);

            $reservation->reservation_code = "FBN-{$dateFormatted}-{$sequencePadded}";
        });
    }

    /**
     * Nilai default atribut saat model dibuat di memori.
     */
    protected $attributes = [
        'status' => 'pending',
    ];

    /**
     * Helper / Scope: Memudahkan query filter berdasarkan status pending.
     */
    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    /**
     * Accessor: Sanitasi tambahan saat mengambil nama (mencegah XSS jika ditayangkan di Blade/Dashboard).
     */
    public function getNameAttribute($value)
    {
        return e($value);
    }
}
