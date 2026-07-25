@props(['service'])

<article class="group rounded border border-white/10 bg-white/[0.055] p-7 text-white shadow-[0_24px_70px_rgba(0,0,0,.22)] backdrop-blur transition duration-300 hover:-translate-y-1 hover:border-emerald-400/40 hover:bg-white/[0.08] hover:shadow-[0_30px_90px_rgba(16,185,129,.14)]">
    <div class="mb-6 grid size-14 place-items-center rounded bg-emerald-400 text-black shadow-[0_0_38px_rgba(52,211,153,.22)]"><x-icon :name="$service->icon"/></div>
    <h3 class="text-xl font-semibold tracking-tight text-white">{{ $service->title }}</h3>
    <p class="mt-3 text-sm leading-7 text-slate-300">{{ $service->description }}</p>
</article>
