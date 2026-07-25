@extends('layouts.admin')

@section('title', $item->exists ? 'Edit Testimonial' : 'Add Testimonial')

@section('content')
    <form method="post" action="{{ $item->exists ? route('admin.testimonials.update', $item) : route('admin.testimonials.store') }}" class="max-w-3xl rounded border border-stone-200 bg-white p-6 shadow-sm">
        @csrf @if($item->exists) @method('put') @endif
        <h1 class="mb-6 text-3xl font-semibold">{{ $item->exists ? 'Edit testimonial' : 'Add testimonial' }}</h1>
        <div class="grid gap-5">
            <label class="grid gap-2 text-sm font-semibold">Client name<input name="client_name" value="{{ old('client_name', $item->client_name) }}" class="rounded border px-4 py-3" required></label>
            <label class="grid gap-2 text-sm font-semibold">Company<input name="company" value="{{ old('company', $item->company) }}" class="rounded border px-4 py-3" required></label>
            <label class="grid gap-2 text-sm font-semibold">Role<input name="role" value="{{ old('role', $item->role) }}" class="rounded border px-4 py-3"></label>
            <label class="grid gap-2 text-sm font-semibold">Quote<textarea name="quote" rows="5" class="rounded border px-4 py-3" required>{{ old('quote', $item->quote) }}</textarea></label>
            <label class="grid gap-2 text-sm font-semibold">Rating<input name="rating" type="number" min="1" max="5" value="{{ old('rating', $item->rating ?: 5) }}" class="rounded border px-4 py-3" required></label>
            <label class="flex items-center gap-2 text-sm font-semibold"><input name="is_featured" value="1" type="checkbox" @checked(old('is_featured', $item->is_featured))> Featured</label>
        </div>
        @if ($errors->any())<p class="mt-4 text-sm text-red-600">{{ $errors->first() }}</p>@endif
        <button class="mt-6 rounded bg-stone-950 px-5 py-3 text-sm font-bold text-white">Save</button>
    </form>
@endsection
