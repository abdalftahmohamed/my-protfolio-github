@php
    $sayHelloUrl = $profile?->whatsapp_url ?: ($profile?->email ? 'mailto:'.$profile->email : '#contact');
    $sayHelloExternal = (bool) $profile?->whatsapp_url;
    $initials = collect(explode(' ', $profile->name ?? 'Y N'))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('');
@endphp

<div class="reveal relative w-full overflow-hidden px-4 pt-12 pb-10 sm:px-6 lg:pt-20 lg:pb-16 xxl:px-10 introduction-profile-background" id="introduction">
    <div class="ambient-orb -left-24 top-0 h-72 w-72 bg-app-brand/15"></div>
    <div class="ambient-orb -right-20 bottom-0 h-80 w-80 bg-app-mint/20"></div>

    <div class="relative z-10 flex max-lg:flex-col-reverse items-center justify-between gap-12 lg:gap-8">
        <div class="w-full max-w-2xl max-lg:text-center">
            <span class="section-kicker mb-6">Welcome to my portfolio</span>

            <p class="text-2xl xxs:text-3xl sm:text-4xl lg:text-5xl font-medium text-app-content">
                Hello, I'm
            </p>
            <h1 class="gradient-text mt-1 text-4xl xxs:text-5xl sm:text-6xl lg:text-7xl font-bold leading-[1.1] tracking-tight">
                {{ $profile->name ?? 'Your Name' }}
            </h1>

            <p class="mt-6 max-w-xl text-sm xxs:text-base lg:text-lg leading-relaxed text-app-content-muted max-lg:mx-auto">
                I'm a <span class="bg-highlight font-semibold text-app-content">{{ $profile->title ?? 'Backend Developer' }}</span>
                @if ($profile?->location)
                    based in <span class="bg-highlight font-semibold text-app-content">{{ $profile->location }}</span>.
                @endif
                {{ $profile->tagline ?? '' }}
            </p>

            <div class="mt-8 flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a class="btn btn-primary btn-sm xs:btn-md sm:btn-lg px-6" href="{{ $sayHelloUrl }}" @if ($sayHelloExternal) target="_blank" rel="noopener" @endif>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
                    </svg>
                    Let's talk
                </a>

                @if ($profile?->cv_path)
                    <a class="btn btn-sm xs:btn-md sm:btn-lg px-6 border-app-line bg-app-surface text-app-content hover:border-app-brand hover:text-app-brand transition-all duration-300"
                        href="{{ asset('storage/' . $profile->cv_path) }}" target="_blank">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 15V3m0 12-4-4m4 4 4-4M4 17v2a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2"/>
                        </svg>
                        Download CV
                    </a>
                @endif

                <a href="#portfolio" class="inline-flex items-center gap-2 rounded-full px-3 py-2 text-sm font-semibold text-app-content-muted transition-colors hover:text-app-brand">
                    Explore my work
                    <span aria-hidden="true">&rarr;</span>
                </a>
            </div>

            <div class="mt-10 flex flex-wrap items-center justify-center lg:justify-start gap-x-6 gap-y-2 text-xs sm:text-sm text-app-content-subtle">
                <span class="inline-flex items-center gap-2">
                    <span class="relative flex h-2 w-2">
                        <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex h-2 w-2 rounded-full bg-emerald-500"></span>
                    </span>
                    Available for new projects
                </span>
                @if ($profile?->phone)
                    <a href="tel:{{ preg_replace('/[^0-9+]/', '', $profile->phone) }}" class="inline-flex items-center gap-2 transition-colors hover:text-app-brand">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 text-app-brand" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92Z"/>
                        </svg>
                        {{ $profile->phone }}
                    </a>
                @endif
                @if ($profile?->location)
                    <span class="inline-flex items-center gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4 text-app-brand" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M20 10c0 7-9 13-9 13S2 17 2 10a9 9 0 1 1 18 0Z"/><circle cx="12" cy="10" r="3"/>
                        </svg>
                        {{ $profile->location }}
                    </span>
                @endif
            </div>
        </div>

        <div class="relative w-full max-w-md shrink-0 lg:max-w-[430px]">
            <div class="relative mx-auto aspect-[536/636] w-full">
                <div class="absolute inset-0 rounded-[2rem] bg-gradient-to-br from-app-brand via-fuchsia-400 to-app-mint p-1 shadow-2xl shadow-app-brand/20">
                    <div class="relative h-full w-full overflow-hidden rounded-[1.7rem] bg-app-surface">
                        @if ($profile?->avatar_path)
                            <img class="h-full w-full object-cover" src="{{ asset('storage/' . $profile->avatar_path) }}" alt="{{ $profile->name }}">
                        @else
                            <div class="flex h-full w-full items-center justify-center bg-gradient-to-br from-app-brand/10 to-app-mint/30">
                                <span class="gradient-text text-8xl font-bold">{{ $initials }}</span>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="surface-card card-lift absolute -bottom-5 -left-2 rounded-2xl px-5 py-4 sm:-left-6">
                    <p class="text-[11px] font-medium uppercase tracking-widest text-app-content-subtle">Currently</p>
                    <p class="mt-0.5 text-sm font-semibold text-app-content">{{ $profile->title ?? 'Backend Developer' }}</p>
                </div>

                <div class="absolute -right-3 -top-4 flex h-14 w-14 rotate-6 items-center justify-center rounded-2xl bg-app-brand text-2xl text-white shadow-lg shadow-app-brand/30">
                    &#10022;
                </div>
            </div>
        </div>
    </div>

    <div class="relative z-10 mt-14 hidden justify-center lg:flex">
        <a href="#profile" class="flex flex-col items-center gap-2 text-[10px] font-semibold uppercase tracking-[0.25em] text-app-content-subtle transition-colors hover:text-app-brand">
            <span>Scroll down</span>
            <span class="flex h-9 w-5 justify-center rounded-full border border-app-line pt-2">
                <span class="h-2 w-1 animate-bounce rounded-full bg-app-brand"></span>
            </span>
        </a>
    </div>
</div>
