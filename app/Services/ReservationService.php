<?php

namespace App\Services;

use App\Jobs\ProcessReservationJob;
use App\Models\ReservationModel;
use Illuminate\Support\Str;

class ReservationService
{
    public function createReservation(array $data, string $ipAddress, string $userAgent): ReservationModel
    {
        $data['order_code'] = 'RSV-'.date('Ymd').'-'.strtoupper(Str::random(5));
        $data['ip_address'] = $ipAddress;
        $data['user_agent'] = $userAgent;
        $data['status'] = 'pending';

        $reservation = ReservationModel::create($data);
        ProcessReservationJob::dispatch($reservation);

        return $reservation;
    }
}
