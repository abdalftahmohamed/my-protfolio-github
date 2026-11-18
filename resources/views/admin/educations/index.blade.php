<x-admin-layout title="Education">
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.educations.create') }}" class="rounded-lg bg-app-brand px-4 py-2 text-sm font-semibold text-white hover:bg-app-brand-hover">
            Add education
        </a>
    </div>

    @if ($educations->isEmpty())
        <p class="text-sm text-app-content-subtle">No education entries yet.</p>
    @else
        <div class="divide-y divide-app-line rounded-2xl border border-app-line bg-app-admin-surface">
            @foreach ($educations as $education)
                <div class="flex items-center justify-between gap-4 px-5 py-4">
                    <div>
                        <p class="text-sm font-medium text-app-content">{{ $education->degree }} &middot; {{ $education->institution }}</p>
                        <p class="text-xs text-app-content-subtle">
                            {{ $education->start_date->format('Y') }} &mdash; {{ $education->end_date?->format('Y') ?? 'Present' }}
                        </p>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <a href="{{ route('admin.educations.edit', $education) }}" class="text-app-content-muted hover:text-app-content">Edit</a>
                        <form method="POST" action="{{ route('admin.educations.destroy', $education) }}" onsubmit="return confirm('Delete this entry?')">
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
