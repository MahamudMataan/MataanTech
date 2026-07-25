@extends('layouts.app')

@section('title', 'Admin Login')

@section('content')
    <section class="bg-stone-950 py-24 text-white">
        <form method="post" action="{{ route('login.store') }}" class="mx-auto max-w-md rounded border border-white/10 bg-white p-8 text-stone-950 shadow-2xl">
            @csrf
            <h1 class="text-3xl font-semibold">Admin login</h1>
            <label class="mt-6 grid gap-2 text-sm font-semibold">Email<input name="email" type="email" value="{{ old('email') }}" required class="rounded border border-stone-300 px-4 py-3"></label>
            @error('email')<p class="mt-2 text-sm text-red-600">{{ $message }}</p>@enderror
            <label class="mt-4 grid gap-2 text-sm font-semibold">Password<input name="password" type="password" required class="rounded border border-stone-300 px-4 py-3"></label>
            <label class="mt-4 flex items-center gap-2 text-sm"><input name="remember" type="checkbox" class="rounded"> Remember me</label>
            <button class="mt-6 w-full rounded bg-stone-950 px-5 py-3 text-sm font-bold text-white">Login</button>
        </form>
    </section>
@endsection
