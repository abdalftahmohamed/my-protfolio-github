<x-admin-layout title="Profile">
    <form method="POST" action="{{ route('admin.profile.update') }}" enctype="multipart/form-data" class="space-y-8">
        @csrf
        @method('PUT')

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">Name</label>
                <input type="text" name="name" value="{{ old('name', $profile->name) }}"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
                @error('name')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
            </div>

            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">Title</label>
                <input type="text" name="title" value="{{ old('title', $profile->title) }}"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
                @error('title')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
            </div>
        </div>

        <div>
            <label class="mb-1 block text-xs font-medium text-app-content-muted">Tagline</label>
            <input type="text" name="tagline" value="{{ old('tagline', $profile->tagline) }}"
                class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
        </div>

        <div>
            <label class="mb-1 block text-xs font-medium text-app-content-muted">Bio</label>
            <textarea name="bio" rows="5"
                class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">{{ old('bio', $profile->bio) }}</textarea>
        </div>

        <div class="grid gap-6 sm:grid-cols-3">
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">Email</label>
                <input type="email" name="email" value="{{ old('email', $profile->email) }}"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">Phone</label>
                <input type="text" name="phone" value="{{ old('phone', $profile->phone) }}"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">Location</label>
                <input type="text" name="location" value="{{ old('location', $profile->location) }}"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">GitHub URL</label>
                <input type="url" name="github_url" value="{{ old('github_url', $profile->github_url) }}"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">LinkedIn URL</label>
                <input type="url" name="linkedin_url" value="{{ old('linkedin_url', $profile->linkedin_url) }}"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">Twitter/X URL</label>
                <input type="url" name="twitter_url" value="{{ old('twitter_url', $profile->twitter_url) }}"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">WhatsApp URL</label>
                <input type="url" name="whatsapp_url" value="{{ old('whatsapp_url', $profile->whatsapp_url) }}"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2">
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">Avatar</label>
                @if ($profile->avatar_path)
                    <img src="{{ asset('storage/' . $profile->avatar_path) }}" class="mb-2 h-16 w-16 rounded-full object-cover">
                @endif
                <input type="file" name="avatar" accept="image/*"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none file:mr-3 file:rounded-md file:border-0 file:bg-app-brand file:px-3 file:py-1.5 file:text-white">
                @error('avatar')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
            </div>
            <div>
                <label class="mb-1 block text-xs font-medium text-app-content-muted">CV (PDF)</label>
                @if ($profile->cv_path)
                    <a href="{{ asset('storage/' . $profile->cv_path) }}" target="_blank" class="mb-2 block text-sm text-app-brand hover:text-app-brand-ink">Current CV</a>
                @endif
                <input type="file" name="cv" accept="application/pdf"
                    class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none file:mr-3 file:rounded-md file:border-0 file:bg-app-brand file:px-3 file:py-1.5 file:text-white">
                @error('cv')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
            </div>
        </div>

        <div class="border-t border-app-line pt-6">
            <h2 class="mb-4 text-sm font-semibold text-app-content">Change password</h2>
            <div class="grid gap-6 sm:grid-cols-2">
                <div>
                    <label class="mb-1 block text-xs font-medium text-app-content-muted">New password</label>
                    <input type="password" name="new_password"
                        class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
                    @error('new_password')<p class="mt-1 text-xs text-app-error">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="mb-1 block text-xs font-medium text-app-content-muted">Confirm new password</label>
                    <input type="password" name="new_password_confirmation"
                        class="w-full rounded-lg border border-app-line bg-app-admin-surface px-4 py-2.5 text-sm text-app-content outline-none focus:border-app-brand">
                </div>
            </div>
            <p class="mt-2 text-xs text-app-content-subtle">Leave blank to keep your current password.</p>
        </div>

        <button type="submit" class="rounded-lg bg-app-brand px-6 py-2.5 text-sm font-semibold text-white transition hover:bg-app-brand-hover">
            Save changes
        </button>
    </form>
</x-admin-layout>
