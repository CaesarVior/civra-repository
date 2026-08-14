<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservationRequest;
use App\Services\ReservationService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReservationController extends Controller
{
    public function create(): View
    {
        return view('welcome');
    }

    public function store(ReservationRequest $request, ReservationService $service): RedirectResponse
    {
        $service->createReservation(
            $request->validated(),
            $request->ip(),
            $request->userAgent()
        );

        return redirect()->back()->with('success', 'Reservasi berhasil dibuat! Pesanan minuman Anda sedang diproses.');
    }
}
