@php
    $categoryLabels = [
        'backend' => 'Backend',
        'frontend' => 'Frontend',
        'database' => 'Database',
        'tools' => 'Tools & DevOps',
        'other' => 'Other',
    ];
@endphp

<div class="reveal content px-2 py-12 md:py-18 lg:py-26 max-xxl:px-4" id="skills">
    <div class="max-sm:px-2 text-center mx-auto max-w-144.25 mb-12">
        <span class="section-kicker mb-3">Toolkit</span>
        <p class="section-title">Skills</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-app-content-subtle">
            The technologies and tools I use to design, build, and ship backend systems.
        </p>
    </div>

    @if ($skills->isEmpty())
        <p class="text-center text-app-content-subtle">Skills will show up here once added from the admin panel.</p>
    @else
        <div class="mx-auto grid max-w-6xl gap-6 md:grid-cols-2">
            @foreach ($skills as $category => $items)
                <div class="surface-card card-lift rounded-2xl p-6 sm:p-7">
                    <div class="mb-5 flex items-center justify-between gap-3">
                        <p class="text-xs font-semibold uppercase tracking-widest text-app-content">
                            {{ $categoryLabels[$category] ?? ucfirst($category) }}
                        </p>
                        <span class="rounded-full bg-app-brand/10 px-3 py-1 text-xs font-semibold text-app-brand">
                            {{ count($items) }}
                        </span>
                    </div>

                    <div class="space-y-3">
                        @foreach ($items as $skill)
                            <div class="rounded-xl border border-app-line bg-app-page/50 px-4 py-3 transition-colors duration-300 hover:border-app-brand/40">
                                <div class="flex items-center justify-between gap-3">
                                    <span class="inline-flex items-center gap-2 text-sm font-medium text-app-content">
                                        @if ($skill->icon)<span class="text-base">{{ $skill->icon }}</span>@endif
                                        {{ $skill->name }}
                                    </span>
                                    <span class="text-xs font-semibold text-app-content-subtle">{{ (int) $skill->level }}%</span>
                                </div>
                                <div class="mt-2 h-1.5 overflow-hidden rounded-full bg-app-line/60">
                                    <div class="h-full rounded-full bg-gradient-to-r from-app-brand to-fuchsia-400" style="width: {{ (int) $skill->level }}%"></div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
