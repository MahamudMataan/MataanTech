@extends('layouts.app')

@section('title', 'MataanTech | Custom Websites That Help Your Business Grow')
@section('description', 'Premium websites, redesigns, AI integrations, optimisation, SEO, and support for businesses that want more enquiries and less wasted time.')

@section('content')
    <section class="relative bg-transparent text-white">
        <div class="absolute inset-0 bg-[linear-gradient(90deg,rgba(0,0,0,.78),rgba(2,6,23,.55)_48%,rgba(2,6,23,.18))]"></div>
        <div class="relative mx-auto grid min-h-[760px] max-w-7xl content-center px-5 py-20 lg:px-8">
            <div class="max-w-5xl animate-rise">
                <p class="mb-5 text-sm font-semibold uppercase tracking-[0.24em] text-emerald-300">{{ __('site.home.eyebrow') }}</p>
                <h1 class="text-5xl font-semibold tracking-tight md:text-7xl">{{ __('site.home.headline') }}</h1>
                <p class="mt-7 max-w-3xl text-lg leading-8 text-slate-200">{{ __('site.home.intro') }}</p>
                <div class="mt-9 flex flex-col gap-3 sm:flex-row">
                    <a href="{{ route('contact') }}" class="inline-flex items-center justify-center gap-2 rounded bg-emerald-400 px-6 py-4 text-sm font-bold text-black shadow-[0_0_40px_rgba(52,211,153,.30)] transition hover:bg-emerald-300">{{ __('site.home.quote') }} <x-icon name="arrow" class="size-4"/></a>
                    <a href="{{ route('portfolio') }}" class="inline-flex items-center justify-center rounded border border-white/20 bg-white/5 px-6 py-4 text-sm font-bold text-white backdrop-blur transition hover:bg-white/10">{{ __('site.home.work') }}</a>
                </div>
            </div>

            <div class="mt-16 grid gap-4 md:grid-cols-3">
                @foreach ([['Projects from EUR 750+', 'Clear packages for new, growing, and established businesses.'], ['Built by a driven student founder', 'Hardworking, detail-focused, and serious about helping local businesses look premium online.'], ['AI-ready websites', 'Chatbots, lead forms, automations, analytics, and CRM integrations when your business needs them.']] as [$title, $copy])
                    <article class="rounded border border-white/10 bg-white/[0.06] p-5 shadow-[0_24px_70px_rgba(0,0,0,.25)] backdrop-blur-xl">
                        <h2 class="text-base font-semibold">{{ $title }}</h2>
                        <p class="mt-2 text-sm leading-6 text-slate-300">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-[#05080d] py-24 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <x-section-heading eyebrow="Why choose us" :title="__('site.home.why_title')" :copy="__('site.home.why_copy')" tone="dark" />
            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ([['Conversion first', 'Every page is planned around clarity, trust, and the next action your customer should take.'], ['Luxury feel, clean layout', 'Deep contrast, polished spacing, sharp cards, and a professional visual system that makes the business feel established.'], ['Long-term support', 'Launch is only the start. We can keep improving speed, SEO, AI workflows, and conversion as your business grows.']] as [$title, $copy])
                    <article class="rounded border border-white/10 bg-white/[0.055] p-7 shadow-[0_24px_70px_rgba(0,0,0,.22)] backdrop-blur transition hover:-translate-y-1 hover:border-emerald-400/40 hover:bg-white/[0.08]">
                        <div class="mb-6 h-1.5 w-16 rounded-full bg-gradient-to-r from-blue-700 to-emerald-400"></div>
                        <h3 class="text-xl font-semibold text-white">{{ $title }}</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-300">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-slate-950 py-24 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <x-section-heading eyebrow="Our process" :title="__('site.home.process_title')" tone="dark" />
            <div class="mt-12 grid gap-5 md:grid-cols-4">
                @foreach ([['01', 'Discover', 'We clarify your goals, audience, offer, pages, and what your website needs to achieve.'], ['02', 'Design', 'We craft a premium interface with strong spacing, trust signals, and clear conversion paths.'], ['03', 'Develop', 'We build clean Laravel, Blade, Tailwind, and database-backed features where they add value.'], ['04', 'Launch', 'We test, optimise, deploy, and support you after the site goes live.']] as [$number, $title, $copy])
                    <article class="rounded border border-white/10 bg-white/[0.06] p-6 shadow-[0_24px_70px_rgba(0,0,0,.18)]">
                        <p class="mb-8 text-sm font-bold text-emerald-300">{{ $number }}</p>
                        <h3 class="text-xl font-semibold">{{ $title }}</h3>
                        <p class="mt-3 text-sm leading-7 text-slate-300">{{ $copy }}</p>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-[#05080d] py-20 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <x-section-heading eyebrow="Technologies" :title="__('site.home.tech_title')" copy="The stack is strong enough for premium custom projects, but still practical for small businesses that need speed, clarity, and easy maintenance." tone="dark" />
            <div class="mt-10 grid gap-3 sm:grid-cols-2 lg:grid-cols-5">
                @foreach (['Laravel 12', 'Blade', 'Tailwind CSS', 'MySQL', 'AI chatbots', 'CRM integrations', 'Google Analytics', 'SEO tooling', 'Automation workflows', 'Performance optimisation'] as $technology)
                    <span class="rounded border border-white/10 bg-white/[0.055] px-4 py-4 text-sm font-semibold text-slate-100 shadow-sm">{{ $technology }}</span>
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-black py-24 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="flex flex-col justify-between gap-6 md:flex-row md:items-end">
                <x-section-heading eyebrow="Featured projects" :title="__('site.home.projects_title')" tone="dark" />
                <a href="{{ route('portfolio') }}" class="inline-flex items-center gap-2 text-sm font-bold text-emerald-300 underline decoration-emerald-400 decoration-2 underline-offset-4">View all projects <x-icon name="arrow" class="size-4"/></a>
            </div>
            <div class="mt-12 grid gap-6 lg:grid-cols-3">
                @foreach ($projects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-[#05080d] py-24 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <x-section-heading eyebrow="Testimonials" :title="__('site.home.testimonials_title')" align="center" tone="dark" />
            <div class="mt-12 grid gap-6 md:grid-cols-3">
                @foreach ($testimonials as $testimonial)
                    <x-testimonial-card :testimonial="$testimonial" />
                @endforeach
            </div>
        </div>
    </section>

    <section class="bg-[#05080d] py-24 text-white">
        <div class="mx-auto grid max-w-7xl gap-10 px-5 lg:grid-cols-[.9fr_1.1fr] lg:px-8">
            <div>
                <x-section-heading eyebrow="Founder story" :title="__('site.home.story_title')" tone="dark" />
            </div>
            <div class="rounded border border-white/10 bg-gradient-to-br from-blue-950/80 via-slate-950 to-black p-8 text-white shadow-[0_35px_100px_rgba(15,23,42,.28)]">
                <p class="text-lg leading-8 text-slate-200">{{ __('site.home.story_1') }}</p>
                <p class="mt-5 text-lg leading-8 text-slate-200">{{ __('site.home.story_2') }}</p>
                <div class="mt-7 flex flex-wrap gap-3">
                    @foreach (['Student founder', 'Family business roots', 'Modern websites', 'AI integrations', 'Long-term support'] as $tag)
                        <span class="rounded bg-white/10 px-4 py-2 text-sm font-semibold text-emerald-200 ring-1 ring-white/10">{{ $tag }}</span>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section class="bg-black py-24 text-white">
        <div class="mx-auto flex max-w-7xl flex-col justify-between gap-8 px-5 md:flex-row md:items-center lg:px-8">
            <div>
                <p class="mb-4 text-sm font-semibold uppercase tracking-[0.2em] text-emerald-300">Ready to grow?</p>
                <h2 class="max-w-3xl text-4xl font-semibold tracking-tight md:text-5xl">{{ __('site.home.cta_title') }}</h2>
                <p class="mt-5 text-slate-400">Email info@MATAANTECH.COM or request a quote through the form.</p>
            </div>
            <a href="{{ route('contact') }}" class="inline-flex shrink-0 items-center justify-center gap-2 rounded bg-emerald-400 px-6 py-4 text-sm font-bold text-black transition hover:bg-emerald-300">Request a Free Quote <x-icon name="arrow" class="size-4"/></a>
        </div>
    </section>
@endsection
