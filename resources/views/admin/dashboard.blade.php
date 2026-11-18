<x-admin-layout title="Dashboard">
    <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-6">
        @foreach ([
            ['label' => 'Projects', 'value' => $stats['projects']],
            ['label' => 'Skills', 'value' => $stats['skills']],
            ['label' => 'Experience', 'value' => $stats['experiences']],
            ['label' => 'Education', 'value' => $stats['educations']],
            ['label' => 'Testimonials', 'value' => $stats['testimonials']],
            ['label' => 'Unread messages', 'value' => $stats['unread_messages']],
        ] as $card)
            <div class="rounded-2xl border border-app-line bg-app-admin-surface p-5">
                <p class="text-2xl font-semibold text-app-content">{{ $card['value'] }}</p>
                <p class="mt-1 text-sm text-app-content-subtle">{{ $card['label'] }}</p>
            </div>
        @endforeach
    </div>

    <div class="mt-10">
        <h2 class="mb-4 text-lg font-semibold text-app-content">Recent messages</h2>

        @if ($recentMessages->isEmpty())
            <p class="text-sm text-app-content-subtle">No messages yet.</p>
        @else
            <div class="divide-y divide-app-line rounded-2xl border border-app-line bg-app-admin-surface">
                @foreach ($recentMessages as $message)
                    <a href="{{ route('admin.messages.show', $message) }}" class="flex items-center justify-between gap-4 px-5 py-4 hover:bg-app-surface-hover">
                        <div>
                            <p class="text-sm font-medium text-app-content">
                                {{ $message->name }}
                                @unless ($message->is_read)
                                    <span class="ml-2 rounded-full bg-app-brand/20 px-2 py-0.5 text-xs text-app-brand-ink">New</span>
                                @endunless
                            </p>
                            <p class="text-xs text-app-content-subtle">{{ $message->subject ?: 'No subject' }}</p>
                        </div>
                        <span class="shrink-0 text-xs text-app-content-subtle">{{ $message->created_at->diffForHumans() }}</span>
                    </a>
                @endforeach
            </div>
        @endif
    </div>
</x-admin-layout>
