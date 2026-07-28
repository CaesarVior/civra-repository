<?php

namespace App\Http\Controllers;

use App\Helpers\EventHelper;
use App\Http\Requests\EventRequest;
use App\Http\Resources\EventResource;
use App\Models\Event;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class EventController extends Controller
{
    public function __construct(private EventHelper $eventHelper) {}

    public function index(): View
    {
        $eventsPaginator = $this->eventHelper->getAllPaginated();

        // Memformat data menggunakan Resource sebelum dilempar ke View
        $events = EventResource::collection($eventsPaginator);

        return view('event', [
            'events' => $events,
            'paginator' => $eventsPaginator,
        ]);
    }

    public function create(): View
    {
        return view('events.create');
    }

    public function store(EventRequest $request): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            $validatedData['photo'] = $this->eventHelper->uploadPhoto($request->file('photo'));
        }

        $this->eventHelper->createEvent($validatedData, Auth::id());

        return redirect()->route('events.index')->with('success', 'Event berhasil dibuat.');
    }

    public function show(Event $event): View
    {
        $formattedEvent = (new EventResource($event))->resolve();

        return view('events.show', compact('formattedEvent'));
    }

    public function edit(Event $event): View
    {
        return view('events.edit', compact('event'));
    }

    public function update(EventRequest $request, Event $event): RedirectResponse
    {
        $validatedData = $request->validated();

        if ($request->hasFile('photo')) {
            $this->eventHelper->deletePhoto($event->photo);
            $validatedData['photo'] = $this->eventHelper->uploadPhoto($request->file('photo'));
        }

        $this->eventHelper->updateEvent($event, $validatedData);

        return redirect()->route('events.index')->with('success', 'Event berhasil diperbarui.');
    }

    public function destroy(Event $event): RedirectResponse
    {
        $this->eventHelper->deleteEvent($event);

        return redirect()->route('events.index')->with('success', 'Event berhasil dihapus.');
    }
}
