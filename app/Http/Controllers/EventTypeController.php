<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventType;

class EventTypeController extends Controller
{
    public function index()
    {
        $eventTypes = EventType::all();
        return view('admin.eventTypes.index', compact('eventTypes'));
    }

    public function create()
    {
        return view('admin.eventTypes.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        EventType::create($validatedData);
        return redirect()->route('eventTypes.index')->with('success', 'Event Type created successfully.');
    }

    public function show(EventType $eventType)
    {
        return view('admin.eventTypes.show', compact('eventType'));
    }

    public function edit(EventType $eventType)
    {
        return view('admin.eventTypes.edit', compact('eventType'));
    }

    public function update(Request $request, EventType $eventType)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $eventType->update($validatedData);
        return redirect()->route('eventTypes.index')->with('success', 'Event Type updated successfully.');
    }

    public function destroy(EventType $eventType)
    {
        $eventType->delete();
        return redirect()->route('eventTypes.index')->with('success', 'Event Type deleted successfully.');
    }
}