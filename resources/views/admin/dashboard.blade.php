@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
    <div class="mb-8 flex items-center justify-between">
        <div>
            <h1 class="text-3xl font-semibold tracking-tight">Dashboard</h1>
            <p class="mt-2 text-sm text-stone-600">Manage website content and review new enquiries.</p>
        </div>
    </div>
    <div class="grid gap-5 md:grid-cols-5">
        @foreach ($counts as $label => $count)
            <article class="rounded border border-stone-200 bg-white p-5 shadow-sm">
                <p class="text-sm capitalize text-stone-500">{{ $label }}</p>
                <p class="mt-3 text-3xl font-semibold">{{ $count }}</p>
            </article>
        @endforeach
    </div>
    <section class="mt-10 rounded border border-stone-200 bg-white shadow-sm">
        <div class="border-b border-stone-200 p-5">
            <h2 class="text-xl font-semibold">Recent leads</h2>
        </div>
        <div class="divide-y divide-stone-100">
            @forelse ($submissions as $submission)
                <a href="{{ route('admin.submissions.show', $submission) }}" class="grid gap-2 p-5 transition hover:bg-stone-50 md:grid-cols-[1fr_1fr_auto]">
                    <span class="font-medium">{{ $submission->name }}</span>
                    <span class="text-sm text-stone-600">{{ $submission->email }}</span>
                    <span class="text-xs font-bold uppercase tracking-[0.14em] text-teal-700">{{ $submission->status }}</span>
                </a>
            @empty
                <p class="p-5 text-sm text-stone-500">No leads yet.</p>
            @endforelse
        </div>
    </section>
@endsection
