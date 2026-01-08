<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('landing');
})->name('landing');

Route::get('register', function () {
    return view('register');
})->name('register')->middleware('guest');

Route::post('register', [AuthController::class, 'register'])->name('register.post');

Route::get('login', function () {
    return view('login');
})->name('login')->middleware('guest');

Route::post('login', [AuthController::class, 'login'])->name('login.post');

Route::post('logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::get('dashboard', function () {
    return view('dashboard');
})->name('dashboard')->middleware('auth');

Route::get('tasks', function () {
    $user = auth()->user();
    $tasks = $user?->tasks()->latest()->paginate(10);
    return view('tasks', compact('tasks'));
})->name('tasks')->middleware('auth');

Route::post('tasks', function (Request $request) {
    $data = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'status' => ['required', 'in:pending,in_progress,done'],
        'priority' => ['nullable', 'integer', 'min:1', 'max:5'],
        'due_date' => ['nullable', 'date'],
    ]);
    $request->user()->tasks()->create($data);
    return back();
})->name('tasks.store')->middleware('auth');

Route::put('tasks/{task}', function (Request $request, \App\Models\Task $task) {
    if ($task->user_id !== auth()->id()) {
        abort(403);
    }
    $data = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'status' => ['required', 'in:pending,in_progress,done'],
        'priority' => ['nullable', 'integer', 'min:1', 'max:5'],
        'due_date' => ['nullable', 'date'],
    ]);
    $task->update($data);
    return back();
})->name('tasks.update')->middleware('auth');

Route::delete('tasks/{task}', function (\App\Models\Task $task) {
    if ($task->user_id !== auth()->id()) {
        abort(403);
    }
    $task->delete();
    return back();
})->name('tasks.delete')->middleware('auth');

Route::get('notes', function () {
    $user = auth()->user();
    $notes = $user?->notes()->orderBy('pinned', 'desc')->latest()->paginate(10);
    return view('notes', compact('notes'));
})->name('notes')->middleware('auth');

Route::post('notes', function (Request $request) {
    $data = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'content' => ['nullable', 'string'],
        'pinned' => ['nullable', 'boolean'],
    ]);
    $data['pinned'] = $request->boolean('pinned');
    $request->user()->notes()->create($data);
    return back();
})->name('notes.store')->middleware('auth');

Route::put('notes/{note}', function (Request $request, \App\Models\Note $note) {
    if ($note->user_id !== auth()->id()) {
        abort(403);
    }
    $data = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'content' => ['nullable', 'string'],
        'pinned' => ['nullable', 'boolean'],
    ]);
    $data['pinned'] = $request->boolean('pinned');
    $note->update($data);
    return back();
})->name('notes.update')->middleware('auth');

Route::delete('notes/{note}', function (\App\Models\Note $note) {
    if ($note->user_id !== auth()->id()) {
        abort(403);
    }
    $note->delete();
    return back();
})->name('notes.delete')->middleware('auth');

Route::get('wishlist', function () {
    $user = auth()->user();
    $items = $user?->wishlistItems()->latest()->paginate(10);
    return view('wishlist', compact('items'));
})->name('wishlist')->middleware('auth');

Route::post('wishlist', function (Request $request) {
    $data = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'url' => ['nullable', 'url'],
        'estimated_price' => ['nullable', 'numeric', 'min:0'],
        'purchased' => ['nullable', 'boolean'],
    ]);
    $data['purchased'] = $request->boolean('purchased');
    $request->user()->wishlistItems()->create($data);
    return back();
})->name('wishlist.store')->middleware('auth');

Route::put('wishlist/{item}', function (Request $request, \App\Models\WishlistItem $item) {
    if ($item->user_id !== auth()->id()) {
        abort(403);
    }
    $data = $request->validate([
        'title' => ['required', 'string', 'max:255'],
        'description' => ['nullable', 'string'],
        'url' => ['nullable', 'url'],
        'estimated_price' => ['nullable', 'numeric', 'min:0'],
        'purchased' => ['nullable', 'boolean'],
    ]);
    $data['purchased'] = $request->boolean('purchased');
    $item->update($data);
    return back();
})->name('wishlist.update')->middleware('auth');

Route::delete('wishlist/{item}', function (\App\Models\WishlistItem $item) {
    if ($item->user_id !== auth()->id()) {
        abort(403);
    }
    $item->delete();
    return back();
})->name('wishlist.delete')->middleware('auth');