@props(['sectionKey'])

@php
    $section = $siteSections->get($sectionKey);
@endphp

@if ($section)
    <form method="POST" action="{{ route('admin.sections.toggle', $section) }}" class="shrink-0">
        @csrf
        @method('PATCH')
        <button type="submit"
            class="inline-flex items-center gap-2 rounded-lg border border-app-line bg-app-admin-surface px-3 py-2 text-sm font-semibold text-app-content-muted transition hover:border-app-brand hover:text-app-brand"
            aria-label="Toggle {{ $sectionKey }} visibility on the website">
            <span class="relative inline-flex h-4 w-7 items-center rounded-full transition-colors {{ $section->is_visible ? 'bg-app-brand' : 'bg-app-line' }}">
                <span class="absolute start-0.5 h-3 w-3 rounded-full bg-white shadow transition-transform duration-200 {{ $section->is_visible ? 'translate-x-3' : 'translate-x-0' }}"></span>
            </span>
            <span class="hidden sm:inline">{{ $section->is_visible ? 'Visible on site' : 'Hidden from site' }}</span>
        </button>
    </form>
@endif
