<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    public function index()
    {
        $categories = EventCategory::all();
        return view('admin.eventCategories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.eventCategories.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        EventCategory::create($validatedData);
        return redirect()->route('eventCategories.index')->with('success', 'Event Category created successfully.');
    }

    public function show(EventCategory $eventCategory)
    {
        return view('admin.eventCategories.show', compact('eventCategory'));
    }

    public function edit(EventCategory $eventCategory)
    {
        return view('admin.eventCategories.edit', compact('eventCategory'));
    }

    public function update(Request $request, EventCategory $eventCategory)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'nullable'
        ]);

        $eventCategory->update($validatedData);
        return redirect()->route('eventCategories.index')->with('success', 'Event Category updated successfully.');
    }

    public function destroy(EventCategory $eventCategory)
    {
        $eventCategory->delete();
        return redirect()->route('eventCategories.index')->with('success', 'Event Category deleted successfully.');
    }
}