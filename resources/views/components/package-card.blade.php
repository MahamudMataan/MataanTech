@props(['package'])

<article class="relative flex h-full flex-col rounded border {{ $package->is_featured ? 'border-emerald-400/70 bg-gradient-to-br from-emerald-950 via-slate-950 to-black text-white shadow-[0_35px_100px_rgba(16,185,129,.22)]' : 'border-white/10 bg-white/[0.055] text-white shadow-[0_24px_70px_rgba(0,0,0,.22)] backdrop-blur' }} p-7">
    @if ($package->is_featured)
        <span class="absolute right-5 top-5 rounded bg-emerald-400 px-3 py-1 text-xs font-bold uppercase tracking-[0.12em] text-black">Popular</span>
    @endif
    <h3 class="text-2xl font-semibold">{{ $package->name }}</h3>
    <div class="mt-5 flex items-end gap-1">
        <span class="text-4xl font-semibold tracking-tight">{{ $package->price }}</span>
        @if ($package->billing_period)
            <span class="pb-1 text-sm text-slate-300">{{ $package->billing_period }}</span>
        @endif
    </div>
    <p class="mt-5 text-sm leading-7 text-slate-300">{{ $package->description }}</p>
    <ul class="mt-6 grid gap-3 text-sm">
        @foreach ($package->features as $feature)
            <li class="flex gap-3"><x-icon name="check" class="mt-0.5 size-5 shrink-0 text-emerald-300"/><span>{{ $feature }}</span></li>
        @endforeach
    </ul>
    <a href="{{ route('contact') }}" class="mt-8 inline-flex items-center justify-center gap-2 rounded {{ $package->is_featured ? 'bg-emerald-400 text-black hover:bg-emerald-300' : 'bg-white/10 text-white ring-1 ring-white/10 hover:bg-white/15' }} px-5 py-3 text-sm font-semibold transition">Request a Quote <x-icon name="arrow" class="size-4"/></a>
</article>
