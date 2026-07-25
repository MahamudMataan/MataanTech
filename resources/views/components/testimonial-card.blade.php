@props(['testimonial'])

<article class="rounded border border-white/10 bg-white/[0.055] p-7 text-white shadow-[0_24px_70px_rgba(0,0,0,.22)] backdrop-blur">
    <div class="mb-5 flex gap-1 text-emerald-400" aria-label="{{ $testimonial->rating }} star rating">
        @for ($i = 0; $i < $testimonial->rating; $i++)
            <span>*</span>
        @endfor
    </div>
    <p class="text-base leading-8 text-slate-300">"{{ $testimonial->quote }}"</p>
    <div class="mt-6 border-t border-white/10 pt-5">
        <p class="font-semibold text-white">{{ $testimonial->client_name }}</p>
        <p class="text-sm text-slate-400">{{ $testimonial->role }}{{ $testimonial->role ? ', ' : '' }}{{ $testimonial->company }}</p>
    </div>
</article>
