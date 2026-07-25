@extends('layouts.app')

@section('title', 'Portfolio | Web Design Case Studies')

@section('content')
    <section class="bg-black py-24 text-white">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <p class="mb-5 text-sm font-semibold uppercase tracking-[0.24em] text-emerald-300">Portfolio</p>
            <h1 class="max-w-4xl text-5xl font-semibold tracking-tight md:text-7xl">Case studies for websites built to earn trust.</h1>
        </div>
    </section>
    <section class="bg-[#05080d] py-24">
        <div class="mx-auto max-w-7xl px-5 lg:px-8">
            <div class="grid gap-6 lg:grid-cols-3">
                @foreach ($projects as $project)
                    <x-project-card :project="$project" />
                @endforeach
            </div>
            <div class="mt-10">{{ $projects->links() }}</div>
        </div>
    </section>
@endsection
