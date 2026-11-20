<x-admin-layout title="Testimonials">
    <div class="mb-6 flex flex-wrap items-center justify-end gap-3">
        <x-admin.section-toggle section-key="testimonials" />
        <a href="{{ route('admin.testimonials.create') }}" class="rounded-lg bg-app-brand px-4 py-2 text-sm font-semibold text-white hover:bg-app-brand-hover">
            Add testimonial
        </a>
    </div>

    @if ($testimonials->isEmpty())
        <p class="text-sm text-app-content-subtle">No testimonials yet.</p>
    @else
        <div class="divide-y divide-app-line rounded-2xl border border-app-line bg-app-admin-surface">
            @foreach ($testimonials as $testimonial)
                <div class="flex items-center justify-between gap-4 px-5 py-4">
                    <div class="min-w-0">
                        <p class="text-sm font-medium text-app-content">{{ $testimonial->name }}</p>
                        <p class="text-xs text-app-content-subtle">{{ $testimonial->role }}</p>
                        <p class="mt-1 truncate text-xs text-app-content-muted">{{ $testimonial->quote }}</p>
                    </div>
                    <div class="flex shrink-0 items-center gap-4 text-sm">
                        <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="text-app-content-muted hover:text-app-content">Edit</a>
                        <form method="POST" action="{{ route('admin.testimonials.destroy', $testimonial) }}" onsubmit="return confirm('Delete this testimonial?')">
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
