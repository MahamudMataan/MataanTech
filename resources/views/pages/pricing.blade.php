@extends('layouts.app')

@section('title', 'Pricing | Website Packages and Optional Care Plans')

@section('content')
    <section class="bg-black py-24 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <p class="mb-5 text-sm font-semibold uppercase tracking-[0.24em] text-emerald-300">Pricing</p>
            <h1 class="max-w-4xl text-5xl font-semibold tracking-tight md:text-7xl">Professional website packages for serious growth.</h1>
            <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-300">Transparent starting points for projects in the EUR 750 to EUR 3,500+ range, with scope shaped around your business goals.</p>
        </div>
    </section>
    <section class="bg-[#05080d] py-24">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-3">
                @foreach ($packages as $package)
                    <x-package-card :package="$package" />
                @endforeach
            </div>
        </div>
    </section>
    <section class="bg-black py-24 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <x-section-heading eyebrow="Optional website care plans" title="Support after launch, only if you want it." copy="Monthly care plans are completely optional. Every client owns their website after completion." tone="dark" />
            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @foreach ($carePlans as $package)
                    <x-package-card :package="$package" />
                @endforeach
            </div>
        </div>
    </section>
@endsection
