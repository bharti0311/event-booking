<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class EventController extends Controller
{
    // Store new event
    public function store(Request $request)
    {
        $event = Event::create($request->all());

        return response()->json([
            'message' => 'Event created successfully!',
            'event' => $event
        ], 201);
    }

    // Get all events
    public function index()
    {
        return response()->json(Event::all(), 200);
    }

    // Get single event
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return response()->json($event, 200);
    }

    // Update event
    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);
        $event->update([
            'title' => $request->title,
            'description' => $request->description,
            'event_date' => $request->event_date,
            'event_time' => $request->event_time,
            'duration' => $request->duration,
            'location' => $request->location,
            'reminder' => $request->reminder,
            'notify' => $request->notify,
        ]);

        return response()->json(['message' => 'Event updated successfully', 'event' => $event]);
    }

    // Delete event
   public function destroy($id)
    {
        $event = Event::findOrFail($id);
        $event->delete();

        return response()->json(['message' => 'Event deleted successfully']);
    }
}
