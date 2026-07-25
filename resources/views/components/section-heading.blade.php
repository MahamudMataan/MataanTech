@props(['eyebrow' => null, 'title', 'copy' => null, 'align' => 'left', 'tone' => 'light'])

<div class="{{ $align === 'center' ? 'mx-auto text-center' : '' }} max-w-3xl">
    @if ($eyebrow)
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.2em] text-emerald-500">{{ $eyebrow }}</p>
    @endif
    <h2 class="text-3xl font-semibold tracking-tight text-white md:text-5xl">{{ $title }}</h2>
    @if ($copy)
        <p class="mt-5 text-lg leading-8 text-slate-300">{{ $copy }}</p>
    @endif
</div>
