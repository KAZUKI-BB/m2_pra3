<?php

namespace App\Http\Controllers;

use App\Models\Dispatch;
use App\Models\Event;
use App\Models\Worker;
use Illuminate\Http\Request;

class DispatchController extends Controller
{
    // 派遣情報の一覧表示
    public function index()
    {
        $dispatches = Dispatch::with('event', 'worker')->get();
        return view('dispatches.index', compact('dispatches'));
    }

    // 派遣情報作成フォーム表示
    public function create()
    {
        $events = Event::all();
        $workers = Worker::all();
        return view('dispatches.create', compact('events', 'workers'));
    }

    // 新しい派遣情報を保存
    public function store(Request $request)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'worker_id' => 'required|exists:workers,id',
            'accepted' => 'required|boolean',
        ]);

        Dispatch::create($validated);

        return redirect()->route('dispatches.index')->with('success', '派遣情報が登録されました。');
    }

    // 派遣情報編集フォーム表示
    public function edit(Dispatch $dispatch)
    {
        $events = Event::all();
        $workers = Worker::all();
        return view('dispatches.edit', compact('dispatch', 'events', 'workers'));
    }

    // 派遣情報の更新
    public function update(Request $request, Dispatch $dispatch)
    {
        $validated = $request->validate([
            'event_id' => 'required|exists:events,id',
            'worker_id' => 'required|exists:workers,id',
            'accepted' => 'required|boolean',
        ]);

        $dispatch->update($validated);

        return redirect()->route('dispatches.index')->with('success', '派遣情報が更新されました。');
    }

    // 派遣情報の削除
    public function destroy(Dispatch $dispatch)
    {
        $dispatch->delete();

        return redirect()->route('dispatches.index')->with('success', '派遣情報が削除されました。');
    }
}
