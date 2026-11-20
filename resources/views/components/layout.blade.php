@props(['profile' => null])
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('partials.theme-head')
    <meta name="google-site-verification" content="HNDDrb5cQoensf_rR5XK7xu2vfQ7wZ0mLflPLRLvyR0" />

    @php
        $seoName = $profile->name ?? config('app.name');
        $seoTitle = $seoName . ' — ' . ($profile->title ?? 'Portfolio');
        $seoDescription = $profile->tagline
            ?: ($profile->bio ? \Illuminate\Support\Str::limit(trim(preg_replace('/\s+/', ' ', $profile->bio)), 160) : null)
            ?: "Portfolio of {$seoName}, " . ($profile->title ?? 'developer') . '.';
        $seoImage = $profile?->avatar_path ? asset('storage/' . $profile->avatar_path) : asset('favicon.ico');
        $seoUrl = url('/');
    @endphp

    <title>{{ $seoTitle }}</title>
    <meta name="description" content="{{ $seoDescription }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ $seoUrl }}">

    <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

    <meta property="og:type" content="website">
    <meta property="og:site_name" content="{{ $seoName }}">
    <meta property="og:title" content="{{ $seoTitle }}">
    <meta property="og:description" content="{{ $seoDescription }}">
    <meta property="og:url" content="{{ $seoUrl }}">
    <meta property="og:image" content="{{ $seoImage }}">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $seoTitle }}">
    <meta name="twitter:description" content="{{ $seoDescription }}">
    <meta name="twitter:image" content="{{ $seoImage }}">

    <script type="application/ld+json">
        {!! json_encode([
            '@context' => 'https://schema.org',
            '@type' => 'Person',
            'name' => $seoName,
            'jobTitle' => $profile->title ?? null,
            'url' => $seoUrl,
            'image' => $seoImage,
            'email' => $profile->email ?? null,
            'sameAs' => array_values(array_filter([
                $profile->github_url ?? null,
                $profile->linkedin_url ?? null,
                $profile->twitter_url ?? null,
            ])),
        ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
    </script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=work-sans:400,500,600,700" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative bg-app-page text-app-content antialiased transition-colors duration-500">

    <noscript><style>#preloader { display: none !important; }</style></noscript>
    <div id="preloader" role="presentation" aria-hidden="true">
        <img src="{{ asset('img/codeverse-logo.png') }}" alt="" width="220" height="76">
    </div>

    @php
        $sectionVisible = fn (string $key): bool => (bool) ($siteSections->get($key)?->is_visible ?? true);
        $navItems = collect([
            ['id' => 1, 'name' => 'Home', 'url' => 'introduction'],
            ['id' => 2, 'name' => 'About', 'url' => 'profile'],
            ['id' => 3, 'name' => 'Skills', 'url' => 'skills', 'section' => 'skills'],
            ['id' => 4, 'name' => 'Projects', 'url' => 'portfolio', 'section' => 'projects'],
            ['id' => 5, 'name' => 'Experience', 'url' => 'experience', 'section' => 'experiences'],
            ['id' => 6, 'name' => 'Services', 'url' => 'services'],
            ['id' => 7, 'name' => 'Testimonials', 'url' => 'testimonials', 'section' => 'testimonials'],
        ])->filter(fn ($item) => ! isset($item['section']) || $sectionVisible($item['section']))->values()->all();
    @endphp

    <div id="navbar" class="sticky top-0 z-50 border-b border-transparent bg-app-page/90 backdrop-blur-xl transition-all duration-500">
        <div class="navbar flex w-full justify-between gap-2 px-4 sm:px-6 xxl:px-10">
            <div class="flex min-w-0 items-center gap-3">
                <div class="dropdown">
                    <div tabindex="0" role="button" class="btn btn-ghost xl:hidden">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                        </svg>
                    </div>
                    <ul tabindex="0" class="menu menu-lg dropdown-content z-1 mt-3 w-56 p-2 rounded-2xl font-semibold flex-nowrap surface-card shadow-app-card-lg text-app-content">
                        @foreach ($navItems as $item)
                            <li><a data-nav-link data-menu-link href="#{{ $item['url'] }}" class="hover:text-app-brand px-5 py-3 mx-1 rounded-lg">{{ $item['name'] }}</a></li>
                        @endforeach
                    </ul>
                </div>

                <a href="#introduction" class="flex items-center border-0 min-w-0 xl:max-xxl:ps-5">
                    <span class="flex h-9 w-9 sm:h-14 sm:w-14 shrink-0 items-center justify-center rounded-2xl bg-gradient-to-br from-app-brand via-fuchsia-500 to-app-brand-hover text-base sm:text-2xl font-bold text-white shadow-lg shadow-app-brand/25">
                        {{ mb_substr($profile->name ?? 'P', 0, 1) }}
                    </span>
                    <p class="truncate text-base xs:text-lg sm:text-2xl md:text-[32px] my-auto ms-[12px] font-semibold">{{ $profile->name ?? 'Portfolio' }}</p>
                </a>
            </div>

            <div class="flex items-center shrink-0 gap-2 max-xs:gap-1">
                <ul class="hidden xl:flex menu menu-horizontal text-[15px] font-medium shrink-0">
                    @foreach ($navItems as $item)
                        <li><a data-nav-link href="#{{ $item['url'] }}" class="hover:text-app-brand px-3 py-3 rounded-lg transition-colors">{{ $item['name'] }}</a></li>
                    @endforeach
                </ul>
                <button type="button" data-theme-toggle
                    class="btn btn-ghost btn-sm xs:btn-md sm:btn-lg px-1.5 xs:px-2 shrink-0 text-app-content"
                    aria-label="Toggle dark mode" aria-pressed="false">
                    <svg class="theme-icon-dark h-4.5 w-4.5 xs:h-5 xs:w-5 sm:h-6 sm:w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="4"/><path d="M12 2v2m0 16v2M4.93 4.93l1.41 1.41m11.32 11.32 1.41 1.41M2 12h2m16 0h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/>
                    </svg>
                    <svg class="theme-icon-light h-4.5 w-4.5 xs:h-5 xs:w-5 sm:h-6 sm:w-8" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79Z"/>
                    </svg>
                </button>
                <p class="shrink-0">
                    <a href="#contact" class="btn btn-sm xs:btn-md sm:btn-lg btn-primary">Contact</a>
                </p>
            </div>
        </div>
    </div>

    <main>
        {{ $slot }}
    </main>

    <div class="relative overflow-hidden bg-[#2A374A] before:absolute before:inset-x-0 before:top-0 before:h-px before:bg-gradient-to-r before:from-transparent before:via-app-brand before:to-transparent">
        <div class="ambient-orb -top-24 left-1/4 h-64 w-64 bg-app-brand/20"></div>
        <div class="ambient-orb -bottom-32 right-1/4 h-72 w-72 bg-app-mint/10"></div>
        @php
            $footerItems = collect([
                ['id' => 1, 'name' => 'Home', 'url' => 'introduction'],
                ['id' => 2, 'name' => 'About', 'url' => 'profile'],
                ['id' => 3, 'name' => 'Skills', 'url' => 'skills', 'section' => 'skills'],
                ['id' => 4, 'name' => 'Projects', 'url' => 'portfolio', 'section' => 'projects'],
                ['id' => 5, 'name' => 'Experience', 'url' => 'experience', 'section' => 'experiences'],
                ['id' => 6, 'name' => 'Services', 'url' => 'services'],
                ['id' => 7, 'name' => 'Testimonials', 'url' => 'testimonials', 'section' => 'testimonials'],
                ['id' => 8, 'name' => 'Contact', 'url' => 'contact'],
            ])->filter(fn ($item) => ! isset($item['section']) || $sectionVisible($item['section']))->values()->all();
        @endphp
        <div class="relative z-10 w-full px-4 pt-25 sm:px-6 md:pt-40 xxl:px-10">
            <div class="flex max-md:flex-col justify-between mx-0 items-center h-full w-full text-neutral-200">
                <a href="#introduction" class="flex items-center border-0">
                    <span class="flex h-8 w-8 sm:h-14 sm:w-14 items-center justify-center rounded-2xl bg-picto-primary text-lg sm:text-2xl font-bold text-white">
                        {{ mb_substr($profile->name ?? 'P', 0, 1) }}
                    </span>
                    <p class="text-3xl sm:text-[32px] my-auto ms-[12px] font-semibold">{{ $profile->name ?? 'Portfolio' }}</p>
                </a>
                <div class="mx-7 max-md:my-7 text-center">
                    @foreach ($footerItems as $item)
                        <a class="mx-2 group inline-block relative w-fit text-[12px] sm:text-[16px]" href="#{{ $item['url'] }}">
                            {{ $item['name'] }}
                            <span class="absolute left-0 bottom-0 h-0.5 w-full bg-app-surface scale-x-0 duration-300 group-hover:scale-x-100"></span>
                        </a>
                    @endforeach
                </div>
                <p class="text-[12px] sm:text-[16px]">Copyright &copy; {{ date('Y') }} {{ $profile->name ?? 'Portfolio' }}.</p>
            </div>
            <div class="flex justify-center gap-2 py-6">
                <x-social-media :profile="$profile" class="!text-white/80 hover:!bg-app-brand hover:!text-white rounded-full" />
            </div>
        </div>
    </div>

    <div class="flex justify-end relative sm:me-10 z-10">
        <a id="scroll-to-top"
            class="fixed bottom-10 me-5 w-10 h-10 sm:w-12.5 sm:h-12.5 lg:w-15 lg:h-15 flex justify-center items-center rounded-full transition delay-150 duration-500 ease-in-out hover:scale-120 hover:cursor-pointer bg-picto-primary hover:bg-picto-primary-dark text-white scale-0">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path d="m18 15-6-6-6 6"/>
            </svg>
        </a>
    </div>
</body>
</html>
