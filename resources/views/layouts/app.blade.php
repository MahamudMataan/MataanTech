<!doctype html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Premium custom websites, redesigns, AI integrations, optimisation, SEO, and ongoing support for growing businesses.')">
    <meta name="robots" content="index, follow">
    <title>@yield('title', 'MataanTech | Custom Websites That Grow Your Business')</title>
    <link rel="canonical" href="{{ url()->current() }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700;800&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-950 font-sans text-slate-950 antialiased">
    <div class="pointer-events-none fixed inset-0 z-0 overflow-hidden bg-black">
        <img src="{{ asset('images/mataan-tech-logo.png') }}" alt="" class="absolute -right-56 top-16 w-[1200px] max-w-none opacity-[0.16] blur-[1px] md:-right-36 md:w-[1450px]">
        <img src="{{ asset('images/mataan-tech-logo.png') }}" alt="" class="absolute -left-72 bottom-0 hidden w-[900px] max-w-none opacity-[0.07] blur-[2px] lg:block">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_72%_18%,rgba(37,99,235,.20),transparent_32%),radial-gradient(circle_at_78%_52%,rgba(16,185,129,.16),transparent_34%),linear-gradient(180deg,rgba(0,0,0,.38),#020617_68%,#000)]"></div>
    </div>
    <div class="relative z-10 min-h-screen overflow-hidden">
        <header class="fixed inset-x-0 top-0 z-50 border-b border-white/10 bg-black/90 text-white shadow-sm backdrop-blur-xl">
            <nav class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8" aria-label="Main navigation">
                <a href="{{ route('home') }}" class="flex items-center gap-3 font-semibold tracking-tight">
                    <img src="{{ asset('images/mataan-tech-logo.png') }}" alt="Mataan Tech logo" class="h-11 w-auto object-contain">
                    <span class="sr-only">MataanTech</span>
                </a>
                <button class="rounded p-2 text-white md:hidden" data-menu-toggle aria-label="Open menu">
                    <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 7h16M4 12h16M4 17h16"/></svg>
                </button>
                <div class="hidden items-center gap-7 text-sm font-medium text-slate-300 md:flex">
                    @foreach ([[__('site.nav.home'), 'home'], [__('site.nav.about'), 'about'], [__('site.nav.services'), 'services'], [__('site.nav.pricing'), 'pricing'], [__('site.nav.portfolio'), 'portfolio'], [__('site.nav.contact'), 'contact']] as [$label, $route])
                        <a href="{{ route($route) }}" class="transition hover:text-white {{ request()->routeIs($route) ? 'text-emerald-300' : '' }}">{{ $label }}</a>
                    @endforeach
                    <div class="flex items-center overflow-hidden rounded border border-white/10 text-xs font-bold">
                        <a href="{{ request()->fullUrlWithQuery(['lang' => 'nl']) }}" class="px-2 py-1 {{ app()->getLocale() === 'nl' ? 'bg-emerald-400 text-black' : 'text-slate-300 hover:text-white' }}">NL</a>
                        <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" class="px-2 py-1 {{ app()->getLocale() === 'en' ? 'bg-emerald-400 text-black' : 'text-slate-300 hover:text-white' }}">EN</a>
                    </div>
                    <a href="{{ route('contact') }}" class="rounded bg-emerald-400 px-4 py-2 text-black shadow-[0_0_32px_rgba(52,211,153,.25)] transition hover:bg-emerald-300">{{ __('site.nav.quote') }}</a>
                </div>
            </nav>
            <div class="hidden border-t border-white/10 bg-black px-5 py-4 md:hidden" data-mobile-menu>
                <div class="grid gap-3 text-sm font-medium text-slate-200">
                    @foreach ([[__('site.nav.home'), 'home'], [__('site.nav.about'), 'about'], [__('site.nav.services'), 'services'], [__('site.nav.pricing'), 'pricing'], [__('site.nav.portfolio'), 'portfolio'], [__('site.nav.contact'), 'contact']] as [$label, $route])
                        <a href="{{ route($route) }}" class="py-2">{{ $label }}</a>
                    @endforeach
                    <div class="flex gap-2 py-2">
                        <a href="{{ request()->fullUrlWithQuery(['lang' => 'nl']) }}" class="rounded border border-white/10 px-3 py-1 {{ app()->getLocale() === 'nl' ? 'bg-emerald-400 text-black' : '' }}">NL</a>
                        <a href="{{ request()->fullUrlWithQuery(['lang' => 'en']) }}" class="rounded border border-white/10 px-3 py-1 {{ app()->getLocale() === 'en' ? 'bg-emerald-400 text-black' : '' }}">EN</a>
                    </div>
                </div>
            </div>
        </header>

        <main class="pt-20">
            @if (session('success'))
                <div class="mx-auto mt-6 max-w-7xl px-5 lg:px-8">
                    <div class="rounded border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">{{ session('success') }}</div>
                </div>
            @endif
            @yield('content')
        </main>

        <footer class="bg-black text-white">
            <div class="mx-auto grid max-w-7xl gap-10 px-5 py-14 md:grid-cols-[1.2fr_.8fr_.8fr] lg:px-8">
                <div>
                    <div class="mb-4 flex items-center gap-3 font-semibold">
                        <img src="{{ asset('images/mataan-tech-logo.png') }}" alt="Mataan Tech logo" class="h-16 w-auto object-contain">
                    </div>
                    <p class="max-w-md text-sm leading-7 text-slate-400">Custom websites, redesigns, AI integrations, optimisation, SEO, and reliable care plans for businesses that want a sharper digital presence.</p>
                    <a href="mailto:info@MATAANTECH.COM" class="mt-5 inline-flex text-sm font-semibold text-emerald-300">info@MATAANTECH.COM</a>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-[0.18em] text-emerald-300">Company</h2>
                    <div class="grid gap-3 text-sm text-slate-400">
                        <a href="{{ route('about') }}" class="hover:text-white">{{ __('site.nav.about') }}</a>
                        <a href="{{ route('services') }}" class="hover:text-white">{{ __('site.nav.services') }}</a>
                        <a href="{{ route('portfolio') }}" class="hover:text-white">{{ __('site.nav.portfolio') }}</a>
                    </div>
                </div>
                <div>
                    <h2 class="mb-4 text-sm font-semibold uppercase tracking-[0.18em] text-emerald-300">Start</h2>
                    <div class="grid gap-3 text-sm text-slate-400">
                        <a href="{{ route('pricing') }}" class="hover:text-white">{{ __('site.nav.pricing') }}</a>
                        <a href="{{ route('contact') }}" class="hover:text-white">{{ __('site.nav.quote') }}</a>
                        <a href="https://www.linkedin.com/in/mahamud-mataan-52b84a3b6/" class="hover:text-white" target="_blank" rel="noreferrer">LinkedIn</a>
                        <a href="{{ route('contact') }}#leave-review" class="hover:text-white">{{ __('site.nav.review') }}</a>
                        <a href="{{ route('login') }}" class="hover:text-white">Admin login</a>
                    </div>
                </div>
            </div>
            <div class="mx-auto flex max-w-7xl flex-wrap gap-3 px-5 pb-10 text-sm font-semibold text-slate-400 lg:px-8">
                @foreach ([
                    ['Instagram', '#'],
                    ['TikTok', '#'],
                    ['Facebook', '#'],
                    ['X', '#'],
                    ['YouTube', '#'],
                    ['GitHub', '#'],
                ] as [$label, $url])
                    <a href="{{ $url }}" class="rounded border border-white/10 bg-white/[0.04] px-4 py-2 transition hover:border-emerald-400/40 hover:text-white">{{ $label }}</a>
                @endforeach
            </div>
            <div class="border-t border-white/10 px-5 py-5 text-center text-xs text-slate-500">Copyright {{ date('Y') }} MataanTech. All rights reserved.</div>
        </footer>
    </div>
</body>
</html>
