<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'date' => 'required|date',
        ]);

        Event::create($validated);

        return redirect()->route('events.index')->with('success', 'イベントが登録されました。');
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validated = $request->validate([
            'name' => 'required',
            'location' => 'required',
            'date' => 'required|date',
        ]);

        $event->update($validated);

        return redirect()->route('events.index')->with('success', 'イベントが更新されました。');
    }

    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success', 'イベントが削除されました。');
    }
}
