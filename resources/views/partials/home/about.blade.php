@php
    $initials = collect(explode(' ', $profile->name ?? 'Y N'))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('');
@endphp

<div class="reveal relative mx-4 xxl:mx-auto xxl:max-w-[1320px] -mt-6 z-10 rounded-3xl surface-card shadow-app-card-lg max-xl:mb-5 p-6 sm:p-10 lg:p-16 xl:p-22" id="profile">
    <div class="flex max-md:flex-col items-center gap-10 lg:gap-16">
        <div class="w-full max-w-sm shrink-0">
            <div class="rounded-2xl bg-gradient-to-br from-app-brand/60 via-fuchsia-400/40 to-app-mint/60 p-1">
                <div class="h-80 w-full overflow-hidden rounded-[1rem] bg-app-surface-muted center sm:h-96">
                    @if ($profile?->avatar_path)
                        <img class="h-full w-full object-cover" src="{{ asset('storage/' . $profile->avatar_path) }}" alt="{{ $profile->name }}">
                    @else
                        <span class="gradient-text text-7xl font-bold">{{ $initials }}</span>
                    @endif
                </div>
            </div>

            <div class="relative -mt-8 flex justify-center">
                <div class="surface-card card-lift flex items-center gap-1 rounded-2xl px-4 py-3 shadow-app-card-lg">
                    <x-social-media :profile="$profile" class="!rounded-full hover:!text-white" />
                </div>
            </div>
        </div>

        <div class="min-w-0 flex-1 max-md:text-center">
            <span class="section-kicker mb-4">About me</span>
            <h2 class="text-2xl xxs:text-3xl sm:text-4xl lg:text-[42px] leading-tight font-semibold">
                I am <span class="gradient-text">{{ $profile->title ?? 'a Backend Developer' }}</span>
            </h2>

            <div class="mt-6 text-xs xs:text-[16px] lg:text-lg font-normal leading-relaxed text-app-content-muted">
                @if ($profile?->bio)
                    @foreach (explode("\n", $profile->bio) as $paragraph)
                        @if (trim($paragraph) !== '')
                            <p class="mt-3 first:mt-0">{{ $paragraph }}</p>
                        @endif
                    @endforeach
                @else
                    <p>Bio coming soon — edit this from the admin panel.</p>
                @endif
            </div>

            <div class="mt-8 flex flex-wrap items-center justify-center lg:justify-start gap-3">
                <a href="#contact" class="btn btn-primary btn-sm sm:btn-md">Let's collaborate</a>
                <a href="#portfolio" class="btn btn-sm sm:btn-md border-app-line bg-app-surface text-app-content hover:border-app-brand hover:text-app-brand transition-all duration-300">
                    View projects
                </a>
            </div>
        </div>
    </div>
</div>
