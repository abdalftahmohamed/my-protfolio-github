@php $project ??= null; @endphp

<div>
    <label class="mb-1 block text-xs font-medium text-app-content-muted">Title</label>
    <input type="text" name="title" value="{{ old('title', $project->title ?? '') }}"
        class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
    @error('title')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-app-content-muted">Description</label>
    <textarea name="description" rows="4"
        class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">{{ old('description', $project->description ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-app-content-muted">Tech stack (comma-separated)</label>
    <input type="text" name="tech_stack" value="{{ old('tech_stack', isset($project) ? implode(', ', $project->tech_stack ?? []) : '') }}"
        placeholder="Laravel, MySQL, Tailwind"
        class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">GitHub URL</label>
        <input type="url" name="github_url" value="{{ old('github_url', $project->github_url ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('github_url')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Live URL</label>
        <input type="url" name="live_url" value="{{ old('live_url', $project->live_url ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('live_url')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Image</label>
        @if (!empty($project->image_path))
            <img src="{{ asset('storage/' . $project->image_path) }}" class="mb-2 h-16 w-24 rounded-lg object-cover">
        @endif
        <input type="file" name="image" accept="image/*"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none file:mr-3 file:rounded-md file:border-0 file:bg-app-brand file:px-3 file:py-1.5 file:text-white">
        @error('image')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $project->order ?? 0) }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">

        <label class="mt-4 flex items-center gap-2 text-sm text-app-content-muted">
            <input type="checkbox" name="featured" value="1" @checked(old('featured', $project->featured ?? false)) class="rounded border-app-line bg-app-admin-surface">
            Featured project
        </label>
    </div>
</div>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-app-brand px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-app-brand-hover">
        Save
    </button>
    <a href="{{ route('admin.projects.index') }}" class="text-sm text-app-content-subtle hover:text-app-content">Cancel</a>
</div>
