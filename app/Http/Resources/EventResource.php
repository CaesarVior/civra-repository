<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'organizer_name' => $this->user->name ?? 'Unknown',
            'name' => $this->name,
            'theme' => $this->theme,
            'event_date_formatted' => Carbon::parse($this->event_date)->format('d F Y'),
            'description' => $this->description,
            'photo_url' => $this->photo ? asset('storage/'.$this->photo) : asset('images/default.jpg'),
        ];
    }
}
