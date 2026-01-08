@extends('layouts.app', ['title' => 'Dashboard - My Tasks'])

@section('content')
@php($counts = [
    'tasks' => method_exists(auth()->user(), 'tasks') ? auth()->user()->tasks()->count() : 0,
    'notes' => method_exists(auth()->user(), 'notes') ? auth()->user()->notes()->count() : 0,
    'wishlist' => method_exists(auth()->user(), 'wishlistItems') ? auth()->user()->wishlistItems()->count() : 0,
])
<header class="flex items-center justify-between">
    <div>
        <p class="text-sm text-white">Welcome back</p>
        <h1 class="text-2xl font-semibold text-white">Overview</h1>
    </div>
    <div class="text-sm text-slate-500">Last update: {{ now()->format('d M Y, H:i') }}</div>
</header>

<section class="mt-8 grid grid-cols-1 md:grid-cols-3 gap-6">
    <div class="rounded-2xl border border-slate-100 bg-white shadow-sm hover:shadow-md transition p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Tasks</p>
                <p class="text-3xl font-semibold text-slate-900">{{ $counts['tasks'] }}</p>
            </div>
            <span class="h-10 w-10 rounded-xl bg-sky-100 text-sky-600 flex items-center justify-center font-semibold">T</span>
        </div>
        <p class="mt-3 text-sm text-slate-500">Total tasks associated with your account.</p>
    </div>

    <div class="rounded-2xl border border-slate-100 bg-white shadow-sm hover:shadow-md transition p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Notes</p>
                <p class="text-3xl font-semibold text-slate-900">{{ $counts['notes'] }}</p>
            </div>
            <span class="h-10 w-10 rounded-xl bg-amber-100 text-amber-600 flex items-center justify-center font-semibold">N</span>
        </div>
        <p class="mt-3 text-sm text-slate-500">Notes you have saved.</p>
    </div>

    <div class="rounded-2xl border border-slate-100 bg-white shadow-sm hover:shadow-md transition p-5">
        <div class="flex items-center justify-between">
            <div>
                <p class="text-sm text-slate-500">Wishlist</p>
                <p class="text-3xl font-semibold text-slate-900">{{ $counts['wishlist'] }}</p>
            </div>
            <span class="h-10 w-10 rounded-xl bg-emerald-100 text-emerald-600 flex items-center justify-center font-semibold">W</span>
        </div>
        <p class="mt-3 text-sm text-slate-500">Wishlist items you have saved.</p>
    </div>
</section>
@endsection
                    </a>
