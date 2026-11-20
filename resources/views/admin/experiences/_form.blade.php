@php $experience ??= null; @endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Company</label>
        <input type="text" name="company" value="{{ old('company', $experience->company ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('company')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Role</label>
        <input type="text" name="role" value="{{ old('role', $experience->role ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('role')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-app-content-muted">Description</label>
    <textarea name="description" rows="4"
        class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">{{ old('description', $experience->description ?? '') }}</textarea>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-app-content-muted">Location</label>
    <input type="text" name="location" value="{{ old('location', $experience->location ?? '') }}"
        class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-3">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Start date</label>
        <input type="date" name="start_date" value="{{ old('start_date', $experience?->start_date?->format('Y-m-d') ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('start_date')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">End date</label>
        <input type="date" name="end_date" value="{{ old('end_date', $experience?->end_date?->format('Y-m-d') ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('end_date')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $experience->order ?? 0) }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
    </div>
</div>

<label class="mt-4 flex items-center gap-2 text-sm text-app-content-muted">
    <input type="checkbox" name="is_current" value="1" @checked(old('is_current', $experience->is_current ?? false)) class="rounded border-app-line bg-app-admin-surface">
    I currently work here
</label>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-app-brand px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-app-brand-hover">
        Save
    </button>
    <a href="{{ route('admin.experiences.index') }}" class="text-sm text-app-content-subtle hover:text-app-content">Cancel</a>
</div>
