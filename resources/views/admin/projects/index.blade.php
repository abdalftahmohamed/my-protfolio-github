<x-admin-layout title="Projects">
    <div class="mb-6 flex justify-end">
        <a href="{{ route('admin.projects.create') }}" class="rounded-lg bg-app-brand px-4 py-2 text-sm font-semibold text-white hover:bg-app-brand-hover">
            Add project
        </a>
    </div>

    @if ($projects->isEmpty())
        <p class="text-sm text-app-content-subtle">No projects yet.</p>
    @else
        <div class="divide-y divide-app-line rounded-2xl border border-app-line bg-app-admin-surface">
            @foreach ($projects as $project)
                <div class="flex items-center justify-between gap-4 px-5 py-4">
                    <div class="flex items-center gap-4">
                        <div class="h-12 w-12 shrink-0 overflow-hidden rounded-lg bg-app-admin-surface">
                            @if ($project->image_path)
                                <img src="{{ asset('storage/' . $project->image_path) }}" class="h-full w-full object-cover">
                            @endif
                        </div>
                        <div>
                            <p class="text-sm font-medium text-app-content">
                                {{ $project->title }}
                                @if ($project->featured)
                                    <span class="ml-2 rounded-full bg-app-brand/20 px-2 py-0.5 text-xs text-app-brand-ink">Featured</span>
                                @endif
                            </p>
                            <p class="text-xs text-app-content-subtle">{{ implode(', ', $project->tech_stack ?? []) }}</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-4 text-sm">
                        <a href="{{ route('admin.projects.edit', $project) }}" class="text-app-content-muted hover:text-app-content">Edit</a>
                        <form method="POST" action="{{ route('admin.projects.destroy', $project) }}" onsubmit="return confirm('Delete this project?')">
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
