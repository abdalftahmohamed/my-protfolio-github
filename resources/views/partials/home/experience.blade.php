<div class="reveal content px-2 py-12 md:py-18 lg:py-26 max-xxl:px-4" id="experience">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <span class="section-kicker mb-3">Journey</span>
        <p class="section-title">Experience</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-app-content-subtle">
            Companies I've worked with and the impact I made along the way.
        </p>
    </div>

    @if ($experiences->isEmpty())
        <p class="text-center text-app-content-subtle">Experience will show up here once added from the admin panel.</p>
    @else
        <div class="relative mx-auto max-w-3xl space-y-6 before:absolute before:start-5 before:top-3 before:h-[calc(100%-1.5rem)] before:w-px before:bg-gradient-to-b before:from-app-brand before:to-app-line">
            @foreach ($experiences as $experience)
                <div class="relative ps-14">
                    <span class="absolute start-[14px] top-7 h-3 w-3 rounded-full border-2 border-app-brand bg-app-page shadow-[0_0_0_4px_var(--app-brand-soft)]"></span>

                    <div class="surface-card card-lift rounded-2xl p-5 sm:p-7">
                        <div class="flex max-sm:flex-col sm:items-start sm:justify-between gap-2">
                            <div>
                                <p class="text-xl sm:text-2xl font-semibold text-app-content">{{ $experience->role }}</p>
                                <p class="mt-0.5 text-sm font-medium text-app-brand">{{ $experience->company }}</p>
                            </div>
                            <div class="shrink-0 text-[13px] sm:text-[14px] font-medium text-app-content-subtle sm:text-right">
                                {{ $experience->start_date->format('M Y') }}
                                &mdash;
                                {{ $experience->is_current ? 'Present' : ($experience->end_date?->format('M Y') ?? 'Present') }}
                                @if ($experience->location)
                                    <br>{{ $experience->location }}
                                @endif
                            </div>
                        </div>

                        @if ($experience->description)
                            <p class="mt-4 text-[13px] sm:text-[15px] font-normal text-app-content-muted leading-relaxed">{{ $experience->description }}</p>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
