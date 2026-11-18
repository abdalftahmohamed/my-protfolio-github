@php $skill ??= null; @endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Name</label>
        <input type="text" name="name" value="{{ old('name', $skill->name ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('name')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Category</label>
        <select name="category" class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
            @foreach (['backend' => 'Backend', 'frontend' => 'Frontend', 'database' => 'Database', 'tools' => 'Tools & DevOps', 'other' => 'Other'] as $value => $label)
                <option value="{{ $value }}" @selected(old('category', $skill->category ?? 'backend') === $value)>{{ $label }}</option>
            @endforeach
        </select>
        @error('category')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-3">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Level (0-100)</label>
        <input type="number" name="level" min="0" max="100" value="{{ old('level', $skill->level ?? 80) }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('level')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Icon (emoji, optional)</label>
        <input type="text" name="icon" value="{{ old('icon', $skill->icon ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
    </div>

    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $skill->order ?? 0) }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
    </div>
</div>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-app-brand px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-app-brand-hover">
        Save
    </button>
    <a href="{{ route('admin.skills.index') }}" class="text-sm text-app-content-subtle hover:text-app-content">Cancel</a>
</div>
