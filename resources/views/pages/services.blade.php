@extends('layouts.app')

@section('title', 'Services | Websites, AI Integrations, SEO and Support')

@section('content')
    <section class="bg-black py-24 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <p class="mb-5 text-sm font-semibold uppercase tracking-[0.24em] text-emerald-300">Services</p>
            <h1 class="max-w-4xl text-5xl font-semibold tracking-tight md:text-7xl">Everything your website needs to perform, improve, and scale.</h1>
        </div>
    </section>
    <section class="bg-[#05080d] py-24">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                @foreach ($services as $service)
                    <x-service-card :service="$service" />
                @endforeach
            </div>
        </div>
    </section>
@endsection
