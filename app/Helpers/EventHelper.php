<?php

namespace App\Helpers;

use App\Models\EventModel;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Storage;

class EventHelper
{
    public function getAllPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return EventModel::with('user')->latest()->paginate($perPage);
    }

    public function createEvent(array $data, int $userId): EventModel
    {
        $data['user_id'] = $userId;

        return EventModel::create($data);
    }

    public function updateEvent(EventModel $event, array $data): bool
    {
        return $event->update($data);
    }

    public function deleteEvent(EventModel $event): bool
    {
        $this->deletePhoto($event->photo);

        return $event->delete();
    }

    public function uploadPhoto(UploadedFile $file): string
    {
        return $file->store('events', 'public');
    }

    public function deletePhoto(?string $path): void
    {
        if ($path && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }
}
