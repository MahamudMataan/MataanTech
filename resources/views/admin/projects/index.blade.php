@extends('layouts.admin')

@section('title', 'Projects')

@section('content')
    <div class="mb-6 flex items-center justify-between"><h1 class="text-3xl font-semibold">Projects</h1><a href="{{ route('admin.projects.create') }}" class="rounded bg-stone-950 px-4 py-2 text-sm font-bold text-white">Add project</a></div>
    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($items as $item)
            <article class="rounded border border-stone-200 bg-white p-5 shadow-sm"><img src="{{ $item->image_url }}" alt="" class="mb-4 h-40 w-full rounded object-cover"><h2 class="font-semibold">{{ $item->client_name }}</h2><p class="text-sm text-stone-600">{{ $item->industry }}</p><div class="mt-4 flex gap-2"><a href="{{ route('admin.projects.edit', $item) }}" class="rounded border px-3 py-2 text-sm">Edit</a><form method="post" action="{{ route('admin.projects.destroy', $item) }}">@csrf @method('delete')<button class="rounded border px-3 py-2 text-sm text-red-700">Delete</button></form></div></article>
        @endforeach
    </div>
@endsection
