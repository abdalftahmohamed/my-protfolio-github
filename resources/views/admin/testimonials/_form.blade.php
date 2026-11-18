@php $testimonial ??= null; @endphp

<div class="grid gap-6 sm:grid-cols-2">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Client name</label>
        <input type="text" name="name" value="{{ old('name', $testimonial->name ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('name')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>

    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Role / relationship (optional)</label>
        <input type="text" name="role" value="{{ old('role', $testimonial->role ?? '') }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        @error('role')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
    </div>
</div>

<div class="mt-6">
    <label class="mb-1 block text-xs font-medium text-app-content-muted">Quote</label>
    <textarea name="quote" rows="4"
        class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">{{ old('quote', $testimonial->quote ?? '') }}</textarea>
    @error('quote')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
</div>

<div class="mt-6 grid gap-6 sm:grid-cols-3">
    <div>
        <label class="mb-1 block text-xs font-medium text-app-content-muted">Order</label>
        <input type="number" name="order" min="0" value="{{ old('order', $testimonial->order ?? 0) }}"
            class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
    </div>
</div>

<div class="mt-8 flex items-center gap-4">
    <button type="submit" class="rounded-lg bg-app-brand px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-app-brand-hover">
        Save
    </button>
    <a href="{{ route('admin.testimonials.index') }}" class="text-sm text-app-content-subtle hover:text-app-content">Cancel</a>
</div>
