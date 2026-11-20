<x-layout :profile="$profile">
    <div class="relative site-canvas overflow-hidden">
        @include('partials.home.hero')
        @include('partials.home.about')
        <div class="bg-app-surface-muted">
            @include('partials.home.work-process')
        </div>
        @if ($siteSections->get('skills')?->is_visible ?? true)
            @include('partials.home.skills')
        @endif
        @if ($siteSections->get('projects')?->is_visible ?? true)
            @include('partials.home.projects')
        @endif
        @if ($siteSections->get('experiences')?->is_visible ?? true)
            @include('partials.home.experience')
        @endif
        @if ($siteSections->get('educations')?->is_visible ?? true)
            @include('partials.home.education')
        @endif
        @include('partials.home.work-together')
        <div class="bg-app-surface-muted">
            @include('partials.home.services')
        </div>
        @if ($siteSections->get('testimonials')?->is_visible ?? true)
            @include('partials.home.testimonials')
        @endif
        @include('partials.home.contact')
    </div>
</x-layout>
