@props(['project'])

<article class="group overflow-hidden rounded border border-white/10 bg-white/[0.055] text-white shadow-[0_24px_70px_rgba(0,0,0,.24)] backdrop-blur transition duration-300 hover:-translate-y-1 hover:border-emerald-400/40 hover:shadow-[0_30px_90px_rgba(16,185,129,.14)]">
    <img src="{{ $project->image_url }}" alt="{{ $project->client_name }} project preview" class="h-64 w-full object-cover transition duration-500 group-hover:scale-105" loading="lazy">
    <div class="p-6">
        <div class="mb-3 flex items-center justify-between gap-4">
            <p class="text-sm font-semibold text-emerald-300">{{ $project->industry }}</p>
            @if ($project->project_url)
                <a href="{{ $project->project_url }}" class="text-sm font-semibold text-emerald-300 underline decoration-emerald-400 decoration-2 underline-offset-4" target="_blank" rel="noreferrer">View project</a>
            @endif
        </div>
        <h3 class="text-2xl font-semibold tracking-tight">{{ $project->client_name }}</h3>
        <p class="mt-3 text-sm leading-7 text-slate-300">{{ $project->overview }}</p>
        <div class="mt-5 flex flex-wrap gap-2">
            @foreach ($project->technologies as $technology)
                <span class="rounded bg-emerald-400/10 px-3 py-1 text-xs font-semibold text-emerald-200 ring-1 ring-emerald-400/20">{{ $technology }}</span>
            @endforeach
        </div>
    </div>
</article>
