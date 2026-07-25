@extends('layouts.app')

@section('title', 'Contact | Request a Free Quote')

@section('content')
    <section class="bg-black py-24 text-white">
        <div class="mx-auto grid max-w-7xl gap-12 px-5 lg:grid-cols-[.9fr_1.1fr] lg:px-8">
            <div>
                <p class="mb-5 text-sm font-semibold uppercase tracking-[0.24em] text-emerald-300">Contact</p>
                <h1 class="text-5xl font-semibold tracking-tight md:text-7xl">{{ __('site.contact.title') }}</h1>
                <p class="mt-7 text-lg leading-8 text-slate-300">{{ __('site.contact.intro') }}</p>
                <div class="mt-6 grid gap-3 text-sm font-semibold text-emerald-300">
                    <a href="mailto:info@MATAANTECH.COM">info@MATAANTECH.COM</a>
                    <a href="https://www.linkedin.com/in/mahamud-mataan-52b84a3b6/" target="_blank" rel="noreferrer" class="inline-flex items-center gap-2 underline decoration-emerald-400/60 underline-offset-4">{{ __('site.contact.linkedin') }} <x-icon name="arrow" class="size-4"/></a>
                </div>
                <div class="mt-8 flex flex-wrap gap-3 text-sm font-semibold text-slate-300">
                    @foreach ([
                        ['Instagram', '#'],
                        ['TikTok', '#'],
                        ['Facebook', '#'],
                        ['X', '#'],
                        ['YouTube', '#'],
                        ['GitHub', '#'],
                    ] as [$label, $url])
                        <a href="{{ $url }}" class="rounded border border-white/10 bg-white/[0.055] px-4 py-2 transition hover:border-emerald-400/40 hover:text-white">{{ $label }}</a>
                    @endforeach
                </div>
            </div>
            <form action="{{ route('contact.store') }}" method="post" class="rounded border border-white/10 bg-white/[0.055] p-6 text-white shadow-[0_35px_100px_rgba(16,185,129,.16)] backdrop-blur md:p-8">
                @csrf
                <div class="grid gap-5 md:grid-cols-2">
                    @foreach ([['name', __('site.contact.name'), 'text'], ['email', __('site.contact.email'), 'email'], ['company', __('site.contact.company'), 'text'], ['phone', __('site.contact.phone'), 'text']] as [$name, $label, $type])
                        <label class="grid gap-2 text-sm font-semibold">
                            {{ $label }}
                            <input type="{{ $type }}" name="{{ $name }}" value="{{ old($name) }}" class="rounded border border-white/10 bg-black/40 px-4 py-3 text-sm text-white outline-none transition focus:border-emerald-400 focus:ring-4 focus:ring-emerald-400/10" @if (in_array($name, ['name', 'email'])) required @endif>
                            @error($name)<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                        </label>
                    @endforeach
                    <label class="grid gap-2 text-sm font-semibold md:col-span-2">
                        {{ __('site.contact.message') }}
                        <textarea name="message" rows="6" class="rounded border border-white/10 bg-black/40 px-4 py-3 text-sm text-white outline-none transition focus:border-emerald-400 focus:ring-4 focus:ring-emerald-400/10" required>{{ old('message') }}</textarea>
                        @error('message')<span class="text-xs text-red-600">{{ $message }}</span>@enderror
                    </label>
                </div>
                <button class="mt-6 inline-flex w-full items-center justify-center gap-2 rounded bg-emerald-400 px-6 py-4 text-sm font-bold text-black transition hover:bg-emerald-300">{{ __('site.contact.button') }} <x-icon name="arrow" class="size-4"/></button>
            </form>
        </div>
    </section>

    <section id="leave-review" class="bg-[#05080d] py-20 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="rounded border border-white/10 bg-white/[0.055] p-8 shadow-[0_24px_70px_rgba(0,0,0,.22)]">
                <p class="text-sm font-semibold uppercase tracking-[0.2em] text-emerald-300">Leave a review</p>
                <h2 class="mt-4 text-3xl font-semibold tracking-tight md:text-5xl">{{ __('site.contact.review_title') }}</h2>
                <p class="mt-5 max-w-2xl text-slate-300">{{ __('site.contact.review_copy') }}</p>
                <a href="mailto:info@MATAANTECH.COM?subject=MataanTech%20Review" class="mt-7 inline-flex rounded bg-emerald-400 px-6 py-4 text-sm font-bold text-black transition hover:bg-emerald-300">{{ __('site.nav.review') }}</a>
            </div>
        </div>
    </section>
@endsection
