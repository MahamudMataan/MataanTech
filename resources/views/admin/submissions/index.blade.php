@extends('layouts.admin')

@section('title', 'Leads')

@section('content')
    <h1 class="mb-6 text-3xl font-semibold">Leads</h1>
    <div class="overflow-hidden rounded border border-stone-200 bg-white shadow-sm">
        @foreach ($items as $item)
            <a href="{{ route('admin.submissions.show', $item) }}" class="grid gap-2 border-b border-stone-100 p-5 transition hover:bg-stone-50 md:grid-cols-[1fr_1fr_auto]"><span class="font-semibold">{{ $item->name }}</span><span class="text-sm text-stone-600">{{ $item->email }}</span><span class="text-xs font-bold uppercase tracking-[0.14em] text-teal-700">{{ $item->status }}</span></a>
        @endforeach
    </div>
    <div class="mt-8">{{ $items->links() }}</div>
@endsection
