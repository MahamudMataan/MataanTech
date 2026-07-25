@extends('layouts.app')

@section('title', 'Register Admin')

@section('content')
    <section class="bg-stone-950 py-24 text-white">
        <form method="post" action="{{ route('register.store') }}" class="mx-auto max-w-md rounded border border-white/10 bg-white p-8 text-stone-950 shadow-2xl">
            @csrf
            <h1 class="text-3xl font-semibold">Create admin account</h1>
            <label class="mt-6 grid gap-2 text-sm font-semibold">Name<input name="name" value="{{ old('name') }}" required class="rounded border border-stone-300 px-4 py-3"></label>
            <label class="mt-4 grid gap-2 text-sm font-semibold">Email<input name="email" type="email" value="{{ old('email') }}" required class="rounded border border-stone-300 px-4 py-3"></label>
            <label class="mt-4 grid gap-2 text-sm font-semibold">Password<input name="password" type="password" required class="rounded border border-stone-300 px-4 py-3"></label>
            <label class="mt-4 grid gap-2 text-sm font-semibold">Confirm password<input name="password_confirmation" type="password" required class="rounded border border-stone-300 px-4 py-3"></label>
            @if ($errors->any())<p class="mt-4 text-sm text-red-600">{{ $errors->first() }}</p>@endif
            <button class="mt-6 w-full rounded bg-stone-950 px-5 py-3 text-sm font-bold text-white">Create account</button>
        </form>
    </section>
@endsection
