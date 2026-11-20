@php $education ??= null; @endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Institution</label>
        <input type="text" name="institution" value="{{ old('institution', $education->institution ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('institution')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Degree</label>
        <input type="text" name="degree" value="{{ old('degree', $education->degree ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('degree')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-app-content-muted">Field of study</label>
    <input type="text" name="field" value="{{ old('field', $education->field ?? '') }}"
        class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-3">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Start date</label>
        <input type="date" name="start_date" value="{{ old('start_date', $education?->start_date?->format('Y-m-d') ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('start_date')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">End date</label>
        <input type="date" name="end_date" value="{{ old('end_date', $education?->end_date?->format('Y-m-d') ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('end_date')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $education->order ?? 0) }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
    </div>
</div>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-app-brand px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-app-brand-hover">
        Save
    </button>
    <a href="{{ route('admin.educations.index') }}" class="text-sm text-app-content-subtle hover:text-app-content">Cancel</a>
</div>
