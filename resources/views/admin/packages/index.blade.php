@extends('layouts.admin')

@section('title', 'Pricing Packages')

@section('content')
    <div class="mb-6 flex items-center justify-between"><h1 class="text-3xl font-semibold">Pricing</h1><a href="{{ route('admin.packages.create') }}" class="rounded bg-stone-950 px-4 py-2 text-sm font-bold text-white">Add package</a></div>
    <div class="grid gap-5 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($items as $item)
            <article class="rounded border border-stone-200 bg-white p-5 shadow-sm"><p class="text-xs font-bold uppercase tracking-[0.14em] text-teal-700">{{ $item->is_care_plan ? 'Care plan' : 'Website package' }}</p><h2 class="mt-2 text-xl font-semibold">{{ $item->name }}</h2><p class="mt-2 text-sm text-stone-600">{{ $item->price }}{{ $item->billing_period }}</p><div class="mt-4 flex gap-2"><a href="{{ route('admin.packages.edit', $item) }}" class="rounded border px-3 py-2 text-sm">Edit</a><form method="post" action="{{ route('admin.packages.destroy', $item) }}">@csrf @method('delete')<button class="rounded border px-3 py-2 text-sm text-red-700">Delete</button></form></div></article>
        @endforeach
    </div>
@endsection
