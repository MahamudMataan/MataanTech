@extends('layouts.admin')

@section('title', $item->exists ? 'Edit Package' : 'Add Package')

@section('content')
    <form method="post" action="{{ $item->exists ? route('admin.packages.update', $item) : route('admin.packages.store') }}" class="max-w-3xl rounded border border-stone-200 bg-white p-6 shadow-sm">
        @csrf @if($item->exists) @method('put') @endif
        <h1 class="mb-6 text-3xl font-semibold">{{ $item->exists ? 'Edit package' : 'Add package' }}</h1>
        <div class="grid gap-5">
            <label class="grid gap-2 text-sm font-semibold">Name<input name="name" value="{{ old('name', $item->name) }}" class="rounded border px-4 py-3" required></label>
            <label class="grid gap-2 text-sm font-semibold">Slug<input name="slug" value="{{ old('slug', $item->slug) }}" class="rounded border px-4 py-3"></label>
            <label class="grid gap-2 text-sm font-semibold">Price<input name="price" value="{{ old('price', $item->price) }}" class="rounded border px-4 py-3" required></label>
            <label class="grid gap-2 text-sm font-semibold">Billing period<input name="billing_period" value="{{ old('billing_period', $item->billing_period) }}" class="rounded border px-4 py-3"></label>
            <label class="grid gap-2 text-sm font-semibold">Description<textarea name="description" rows="4" class="rounded border px-4 py-3" required>{{ old('description', $item->description) }}</textarea></label>
            <label class="grid gap-2 text-sm font-semibold">Features, one per line<textarea name="features" rows="8" class="rounded border px-4 py-3" required>{{ old('features', collect($item->features)->implode("\n")) }}</textarea></label>
            <label class="grid gap-2 text-sm font-semibold">Sort order<input name="sort_order" type="number" value="{{ old('sort_order', $item->sort_order ?: 0) }}" class="rounded border px-4 py-3" required></label>
            <div class="flex flex-wrap gap-5"><label class="flex items-center gap-2 text-sm font-semibold"><input name="is_featured" value="1" type="checkbox" @checked(old('is_featured', $item->is_featured))> Featured</label><label class="flex items-center gap-2 text-sm font-semibold"><input name="is_care_plan" value="1" type="checkbox" @checked(old('is_care_plan', $item->is_care_plan))> Care plan</label></div>
        </div>
        @if ($errors->any())<p class="mt-4 text-sm text-red-600">{{ $errors->first() }}</p>@endif
        <button class="mt-6 rounded bg-stone-950 px-5 py-3 text-sm font-bold text-white">Save</button>
    </form>
@endsection
