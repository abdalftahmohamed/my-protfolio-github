<div class="reveal content px-2 pb-12 md:pb-18 lg:pb-26 max-xxl:px-4" id="education">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <span class="section-kicker mb-3">Background</span>
        <p class="section-title">Education</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-app-content-subtle">
            My academic background.
        </p>
    </div>

    @if ($educations->isEmpty())
        <p class="text-center text-app-content-subtle">Education will show up here once added from the admin panel.</p>
    @else
        <div class="relative mx-auto max-w-3xl space-y-6 before:absolute before:start-5 before:top-3 before:h-[calc(100%-1.5rem)] before:w-px before:bg-gradient-to-b before:from-app-brand before:to-app-line">
            @foreach ($educations as $education)
                <div class="relative ps-14">
                    <span class="absolute start-[14px] top-7 h-3 w-3 rounded-full border-2 border-app-brand bg-app-page shadow-[0_0_0_4px_var(--app-brand-soft)]"></span>

                    <div class="surface-card card-lift rounded-2xl p-5 sm:p-7">
                        <p class="text-[13px] font-medium text-app-content-subtle">
                            {{ $education->start_date->format('Y') }} &mdash; {{ $education->end_date?->format('Y') ?? 'Present' }}
                        </p>
                        <p class="mt-1 text-lg sm:text-xl font-semibold text-app-content">{{ $education->degree }}</p>
                        @if ($education->field)
                            <p class="text-app-content-muted">{{ $education->field }}</p>
                        @endif
                        <p class="mt-2 inline-flex items-center gap-2 text-sm font-medium text-app-brand">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-4 w-4" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 21h18M5 21V7l7-4 7 4v14M9 9h1m4 0h1m-6 4h1m4 0h1m-6 4h1m4 0h1"/>
                            </svg>
                            {{ $education->institution }}
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
