<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'Admin') | MataanTech</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-stone-100 text-stone-950 antialiased">
    <div class="min-h-screen">
        <header class="border-b border-stone-200 bg-white">
            <div class="mx-auto flex max-w-7xl items-center justify-between px-5 py-4 lg:px-8">
                <a href="{{ route('admin.dashboard') }}" class="font-semibold">Mataan Admin</a>
                <nav class="hidden items-center gap-5 text-sm font-medium text-stone-600 md:flex">
                    <a href="{{ route('admin.services.index') }}" class="hover:text-stone-950">Services</a>
                    <a href="{{ route('admin.projects.index') }}" class="hover:text-stone-950">Projects</a>
                    <a href="{{ route('admin.packages.index') }}" class="hover:text-stone-950">Pricing</a>
                    <a href="{{ route('admin.testimonials.index') }}" class="hover:text-stone-950">Testimonials</a>
                    <a href="{{ route('admin.submissions.index') }}" class="hover:text-stone-950">Leads</a>
                    <a href="{{ route('home') }}" class="hover:text-stone-950">Website</a>
                    <form method="post" action="{{ route('logout') }}">@csrf<button class="rounded bg-stone-950 px-4 py-2 text-white">Logout</button></form>
                </nav>
            </div>
        </header>
        <main class="mx-auto max-w-7xl px-5 py-10 lg:px-8">
            @if (session('success'))
                <div class="mb-6 rounded border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-800">{{ session('success') }}</div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
</html>
