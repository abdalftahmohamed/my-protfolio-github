<div class="reveal content px-2 py-10 md:py-15 lg:py-25 max-xxl:px-4" id="testimonials">
    <div class="max-sm:px-2 text-center mx-auto max-w-165 mb-12 md:mb-16">
        <p class="section-title">What Clients Say</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-gray-400">
            Feedback from the people and businesses I've worked with.
        </p>
    </div>

    @if ($testimonials->isEmpty())
        <p class="text-center text-gray-400">Testimonials will show up here once added from the admin panel.</p>
    @else
        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
            @foreach ($testimonials as $testimonial)
                <div class="flex flex-col rounded-xl bg-white shadow-gray-300 shadow-lg p-6 sm:p-7">
                    <div class="mb-3 text-picto-primary text-sm tracking-wider" aria-hidden="true">★★★★★</div>
                    <p class="flex-1 text-[13px] sm:text-[14px] leading-relaxed text-gray-600 italic">
                        &ldquo;{{ $testimonial->quote }}&rdquo;
                    </p>
                    <div class="mt-5 flex items-center gap-3">
                        <span class="flex h-9 w-9 shrink-0 items-center justify-center rounded-full bg-picto-primary/10 text-xs font-semibold text-picto-primary">
                            {{ collect(explode(' ', $testimonial->name))->map(fn ($p) => mb_substr($p, 0, 1))->take(2)->implode('') }}
                        </span>
                        <div>
                            <p class="text-[13px] font-semibold text-[#132238]">{{ $testimonial->name }}</p>
                            <p class="text-[11px] text-gray-400">{{ $testimonial->role }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
