<div class="reveal w-full px-4 py-10 sm:px-6 md:py-15 lg:py-25 xxl:px-10" id="testimonials">
    <div class="max-sm:px-2 text-center mx-auto max-w-165 mb-12 md:mb-16">
        <span class="section-kicker mb-3">Kind words</span>
        <p class="section-title">What Clients Say</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-app-content-subtle">
            Feedback from the people and businesses I've worked with.
        </p>
    </div>

    @if ($testimonials->isEmpty())
        <p class="text-center text-app-content-subtle">Testimonials will show up here once added from the admin panel.</p>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($testimonials as $testimonial)
                <div class="surface-card card-lift flex flex-col rounded-2xl p-6 sm:p-7">
                    <div class="mb-4 flex items-center justify-between">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-8 w-8 text-app-brand/30" fill="currentColor">
                            <path d="M9.5 5C6.5 6.6 4.8 9.3 4.8 12.8c0 .6.1 1.2.2 1.7h3.6c0-2.1.9-3.4 2.7-4.2L9.5 5Zm9.1 0c-3 1.6-4.7 4.3-4.7 7.8 0 .6.1 1.2.2 1.7h3.6c0-2.1.9-3.4 2.7-4.2L18.6 5Z"/>
                        </svg>
                        <div class="text-xs tracking-wider text-app-brand" aria-hidden="true">&#9733;&#9733;&#9733;&#9733;&#9733;</div>
                    </div>
                    <p class="flex-1 text-[13px] sm:text-[14px] leading-relaxed text-app-content-muted italic">
                        &ldquo;{{ $testimonial->quote }}&rdquo;
                    </p>
                    <div class="mt-5 flex items-center gap-3 border-t border-app-line pt-4">
                        <span class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-gradient-to-br from-app-brand to-fuchsia-500 text-xs font-semibold text-white">
                            {{ collect(explode(' ', $testimonial->name))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                        </span>
                        <div>
                            <p class="text-[13px] font-semibold text-app-content">{{ $testimonial->name }}</p>
                            <p class="text-[11px] text-app-content-subtle">{{ $testimonial->role }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
