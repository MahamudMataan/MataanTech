@extends('layouts.admin')

@section('title', 'Services')

@section('content')
    <div class="mb-6 flex items-center justify-between"><h1 class="text-3xl font-semibold">Services</h1><a href="{{ route('admin.services.create') }}" class="rounded bg-stone-950 px-4 py-2 text-sm font-bold text-white">Add service</a></div>
    <div class="overflow-hidden rounded border border-stone-200 bg-white shadow-sm">
        @foreach ($items as $item)
            <div class="grid gap-4 border-b border-stone-100 p-5 md:grid-cols-[1fr_auto]">
                <div><h2 class="font-semibold">{{ $item->title }}</h2><p class="mt-1 text-sm text-stone-600">{{ $item->description }}</p></div>
                <div class="flex gap-2"><a href="{{ route('admin.services.edit', $item) }}" class="rounded border px-3 py-2 text-sm">Edit</a><form method="post" action="{{ route('admin.services.destroy', $item) }}">@csrf @method('delete')<button class="rounded border px-3 py-2 text-sm text-red-700">Delete</button></form></div>
            </div>
        @endforeach
    </div>
@endsection
