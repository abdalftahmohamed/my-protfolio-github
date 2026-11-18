@props(['title' => 'Dashboard'])
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }} — Admin</title>
    @include('partials.theme-head')
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600,700" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen bg-app-admin-page font-sans text-app-content antialiased transition-colors duration-500">

    @php
        $navItems = [
            ['route' => 'admin.dashboard', 'label' => 'Dashboard'],
            ['route' => 'admin.profile.edit', 'label' => 'Profile'],
            ['route' => 'admin.skills.index', 'label' => 'Skills'],
            ['route' => 'admin.projects.index', 'label' => 'Projects'],
            ['route' => 'admin.experiences.index', 'label' => 'Experience'],
            ['route' => 'admin.educations.index', 'label' => 'Education'],
            ['route' => 'admin.testimonials.index', 'label' => 'Testimonials'],
            ['route' => 'admin.messages.index', 'label' => 'Messages'],
        ];
    @endphp

    <aside class="hidden w-60 shrink-0 border-r border-app-line bg-app-admin-surface p-6 md:block">
        <a href="{{ route('home') }}" class="mb-8 block text-lg font-semibold text-app-content">
            Admin<span class="text-app-brand">.</span>
        </a>

        <nav class="space-y-1 text-sm">
            @foreach ($navItems as $item)
                <a href="{{ route($item['route']) }}"
                    class="block rounded-lg px-3 py-2 transition {{ request()->routeIs($item['route'].'*') || request()->routeIs(str($item['route'])->beforeLast('.').'.*') ? 'bg-app-brand/15 text-app-brand-ink' : 'text-app-content-muted hover:bg-app-surface-hover hover:text-app-content' }}">
                    {{ $item['label'] }}
                </a>
            @endforeach
        </nav>

        <form method="POST" action="{{ route('logout') }}" class="mt-8">
            @csrf
            <button type="submit" class="block w-full rounded-lg px-3 py-2 text-left text-sm text-app-content-subtle hover:bg-app-surface-hover hover:text-app-content">
                Log out
            </button>
        </form>
    </aside>

    <main class="flex-1 p-6 md:p-10">
        <div class="mx-auto max-w-5xl">
            <div class="mb-8 flex flex-wrap items-center justify-between gap-3">
                <h1 class="text-xl font-semibold text-app-content sm:text-2xl">{{ $title }}</h1>
                <div class="flex items-center gap-2 shrink-0">
                    <button type="button" data-theme-toggle
                        class="shrink-0 rounded-lg border border-app-line bg-app-admin-surface p-1.5 text-app-content transition hover:bg-app-surface-hover sm:p-2"
                        aria-label="Toggle dark mode" aria-pressed="false">
                        <svg class="theme-icon-dark h-4.5 w-4.5 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32 1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                        </svg>
                        <svg class="theme-icon-light h-4.5 w-4.5 sm:h-5 sm:w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"/>
                        </svg>
                    </button>
                    <a href="{{ route('home') }}" target="_blank" class="text-sm text-app-content-subtle hover:text-app-content"><span class="hidden sm:inline">View site </span>&rarr;</a>
                </div>
            </div>

            @if (session('status'))
                <p class="mb-6 rounded-lg border border-app-success/30 bg-app-success/10 px-4 py-3 text-sm text-app-success">
                    {{ session('status') }}
                </p>
            @endif

            {{ $slot }}
        </div>
    </main>
</body>
</html>
