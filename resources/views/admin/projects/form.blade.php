@extends('layouts.admin')

@section('title', $item->exists ? 'Edit Project' : 'Add Project')

@section('content')
    <form method="post" action="{{ $item->exists ? route('admin.projects.update', $item) : route('admin.projects.store') }}" class="max-w-3xl rounded border border-stone-200 bg-white p-6 shadow-sm">
        @csrf @if($item->exists) @method('put') @endif
        <h1 class="mb-6 text-3xl font-semibold">{{ $item->exists ? 'Edit project' : 'Add project' }}</h1>
        <div class="grid gap-5">
            <label class="grid gap-2 text-sm font-semibold">Client name<input name="client_name" value="{{ old('client_name', $item->client_name) }}" class="rounded border px-4 py-3" required></label>
            <label class="grid gap-2 text-sm font-semibold">Slug<input name="slug" value="{{ old('slug', $item->slug) }}" class="rounded border px-4 py-3"></label>
            <label class="grid gap-2 text-sm font-semibold">Industry<input name="industry" value="{{ old('industry', $item->industry) }}" class="rounded border px-4 py-3" required></label>
            <label class="grid gap-2 text-sm font-semibold">Technologies, comma separated<input name="technologies" value="{{ old('technologies', collect($item->technologies)->implode(', ')) }}" class="rounded border px-4 py-3" required></label>
            <label class="grid gap-2 text-sm font-semibold">Image URL<input name="image_url" value="{{ old('image_url', $item->image_url) }}" class="rounded border px-4 py-3" required></label>
            <label class="grid gap-2 text-sm font-semibold">Project URL<input name="project_url" value="{{ old('project_url', $item->project_url) }}" class="rounded border px-4 py-3"></label>
            <label class="grid gap-2 text-sm font-semibold">Overview<textarea name="overview" rows="5" class="rounded border px-4 py-3" required>{{ old('overview', $item->overview) }}</textarea></label>
            <label class="flex items-center gap-2 text-sm font-semibold"><input name="is_featured" value="1" type="checkbox" @checked(old('is_featured', $item->is_featured))> Featured</label>
        </div>
        @if ($errors->any())<p class="mt-4 text-sm text-red-600">{{ $errors->first() }}</p>@endif
        <button class="mt-6 rounded bg-stone-950 px-5 py-3 text-sm font-bold text-white">Save</button>
    </form>
@endsection
