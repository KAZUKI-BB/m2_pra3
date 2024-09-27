<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    // 人材一覧表示
    public function index()
    {
        $workers = Worker::all();
        return view('workers.index', compact('workers'));
    }

    // 新しい人材の作成フォームを表示
    public function create()
    {
        return view('workers.create');
    }

    // 新しい人材を保存
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:workers,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // パスワードのハッシュ化
        $validated['password'] = bcrypt($validated['password']);

        Worker::create($validated);

        return redirect()->route('workers.index')->with('success', '人材が登録されました。');
    }

    // 人材編集フォームを表示
    public function edit(Worker $worker)
    {
        return view('workers.edit', compact('worker'));
    }

    // 人材の情報を更新
    public function update(Request $request, Worker $worker)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:workers,email,' . $worker->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        // パスワードのハッシュ化（パスワードが更新された場合のみ）
        if ($request->filled('password')) {
            $validated['password'] = bcrypt($request->password);
        } else {
            unset($validated['password']);
        }

        $worker->update($validated);

        return redirect()->route('workers.index')->with('success', '人材情報が更新されました。');
    }

    // 人材を削除
    public function destroy(Worker $worker)
    {
        $worker->delete();

        return redirect()->route('workers.index')->with('success', '人材が削除されました。');
    }
}
