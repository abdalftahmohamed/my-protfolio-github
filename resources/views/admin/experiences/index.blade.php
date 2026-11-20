<x-admin-layout title="Experience">
    <div class="mb-6 flex flex-wrap items-center justify-end gap-3">
        <x-admin.section-toggle section-key="experiences" />
        <a href="{{ route('admin.experiences.create') }}" class="rounded-lg bg-app-brand px-4 py-2 text-sm font-semibold text-white hover:bg-app-brand-hover">
            Add experience
        </a>
    </div>

    @if ($experiences->isEmpty())
        <p class="text-sm text-app-content-subtle">No experience entries yet.</p>
    @else
        <div class="divide-y divide-app-line rounded-2xl border border-app-line bg-app-admin-surface">
            @foreach ($experiences as $experience)
                <div class="flex items-center justify-between gap-4 px-5 py-4">
                    <div>
                        <p class="text-sm font-medium text-app-content">{{ $experience->role }} &middot; {{ $experience->company }}</p>
                        <p class="text-xs text-app-content-subtle">
                            {{ $experience->start_date->format('M Y') }} &mdash;
                            {{ $experience->is_current ? 'Present' : ($experience->end_date?->format('M Y') ?? 'Present') }}
                        </p>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <a href="{{ route('admin.experiences.edit', $experience) }}" class="text-app-content-muted hover:text-app-content">Edit</a>
                        <form method="POST" action="{{ route('admin.experiences.destroy', $experience) }}" onsubmit="return confirm('Delete this entry?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-app-error hover:opacity-80">Delete</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</x-admin-layout>
