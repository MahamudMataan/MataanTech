@extends('layouts.app')

@section('title', 'About | MataanTech')

@section('content')
    <section class="relative bg-black py-24 text-white">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_20%_20%,rgba(37,99,235,.38),transparent_30%),radial-gradient(circle_at_80%_10%,rgba(16,185,129,.25),transparent_26%)]"></div>
        <div class="relative mx-auto max-w-7xl px-5 lg:px-8">
            <p class="mb-5 text-sm font-semibold uppercase tracking-[0.24em] text-emerald-300">About MataanTech</p>
            <h1 class="max-w-4xl text-5xl font-semibold tracking-tight md:text-7xl">A student-founded web agency built on hard work, family, and ambition.</h1>
            <p class="mt-7 max-w-2xl text-lg leading-8 text-slate-300">MataanTech helps businesses look more premium online with custom websites, redesigns, AI integrations, optimisation, SEO, and ongoing support.</p>
        </div>
    </section>

    <section class="bg-[#05080d] py-24 text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 lg:grid-cols-[.85fr_1.15fr] lg:px-8">
            <div>
                <x-section-heading eyebrow="Founder story" title="It started by helping family build their business presence." tone="dark" />
            </div>
            <div class="space-y-6 rounded border border-white/10 bg-white/[0.055] p-8 text-lg leading-8 text-slate-300 shadow-[0_24px_70px_rgba(0,0,0,.22)] backdrop-blur">
                <p>I started MataanTech while working hard as a student and learning how much a professional website can change the way people see a business. My first real motivation came from helping my own family create and improve their business online.</p>
                <p>That experience showed me that many small businesses have real talent, real service, and real value, but their websites do not always show it. I wanted to build websites that make businesses look trustworthy, modern, and ready for serious customers.</p>
                <p>Today the goal is simple: create premium websites that are easy to understand, easy to use, and built to help businesses grow.</p>
            </div>
        </div>
    </section>

    <section class="bg-slate-950 py-24 text-white">
        <div class="mx-auto grid max-w-7xl gap-6 px-5 md:grid-cols-3 lg:px-8">
            @foreach ([['Hardworking', 'Student discipline, fast learning, and careful attention to the details that make a site feel premium.'], ['Practical', 'Clear pages, clear pricing, clear contact paths, and technology that solves real business problems.'], ['Personal', 'Built from family-business roots, with respect for every client trying to grow something properly.']] as [$title, $copy])
                <article class="rounded border border-white/10 bg-white/[0.06] p-7 shadow-[0_24px_70px_rgba(0,0,0,.20)]">
                    <h2 class="text-xl font-semibold">{{ $title }}</h2>
                    <p class="mt-3 text-sm leading-7 text-slate-300">{{ $copy }}</p>
                </article>
            @endforeach
        </div>
    </section>
@endsection
