@extends('layouts.admin')

@section('title', 'Lead')

@section('content')
    <article class="max-w-3xl rounded border border-stone-200 bg-white p-6 shadow-sm">
        <h1 class="text-3xl font-semibold">{{ $item->name }}</h1>
        <div class="mt-5 grid gap-2 text-sm text-stone-600"><p>{{ $item->email }}</p><p>{{ $item->company }}</p><p>{{ $item->phone }}</p></div>
        <p class="mt-6 whitespace-pre-line leading-8 text-stone-800">{{ $item->message }}</p>
        <form method="post" action="{{ route('admin.submissions.update', $item) }}" class="mt-8 flex gap-3">@csrf @method('put')<select name="status" class="rounded border px-4 py-3">@foreach (['new', 'contacted', 'won', 'closed'] as $status)<option value="{{ $status }}" @selected($item->status === $status)>{{ ucfirst($status) }}</option>@endforeach</select><button class="rounded bg-stone-950 px-5 py-3 text-sm font-bold text-white">Update</button></form>
        <form method="post" action="{{ route('admin.submissions.destroy', $item) }}" class="mt-4">@csrf @method('delete')<button class="text-sm font-semibold text-red-700">Delete lead</button></form>
    </article>
@endsection
