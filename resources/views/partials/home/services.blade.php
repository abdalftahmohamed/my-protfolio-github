@php
    $services = [
        [
            'title' => 'Web Platforms',
            'description' => 'Scalable web platforms and custom business applications designed for performance, usability, and long-term growth.',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="4" width="18" height="12" rx="2"/><path d="M8 20h8M12 16v4"/></svg>',
        ],
        [
            'title' => 'Mobile Applications',
            'description' => 'Modern mobile applications with responsive interfaces, secure APIs, real-time features, and seamless user experiences.',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><rect x="6" y="2" width="12" height="20" rx="2"/><path d="M11 18h2"/></svg>',
        ],
        [
            'title' => 'Enterprise & ERP Solutions',
            'description' => 'End-to-end ERP and business management platforms covering finance, inventory, CRM, HR, and payroll.',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 21h18M5 21V7l7-4 7 4v14M9 9h1m4 0h1m-6 4h1m4 0h1m-6 4h1m4 0h1"/></svg>',
        ],
        [
            'title' => 'Database Design',
            'description' => 'Efficient database architecture and optimized MySQL queries focused on data integrity, performance, and scalability.',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><ellipse cx="12" cy="5" rx="8" ry="3"/><path d="M4 5v14c0 1.66 3.58 3 8 3s8-1.34 8-3V5M4 12c0 1.66 3.58 3 8 3s8-1.34 8-3"/></svg>',
        ],
        [
            'title' => 'System Integration',
            'description' => 'Third-party integrations including payment gateways, notifications, video streaming, external APIs, and real-time services.',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 17H7a5 5 0 0 1 0-10h2m6 0h2a5 5 0 0 1 0 10h-2M8 12h8"/></svg>',
        ],
        [
            'title' => 'Security & Access Control',
            'description' => 'Secure authentication, authorization, and Role-Based Access Control (RBAC) built into every system we ship.',
            'icon' => '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 3l7 3v6c0 4.5-3 7.5-7 9-4-1.5-7-4.5-7-9V6l7-3z"/><path d="m9.5 12 1.8 1.8L14.5 10.4"/></svg>',
        ],
    ];
@endphp
<div class="reveal content px-2 py-10 md:py-15 lg:py-25 max-xxl:px-4" id="services">
    <div class="max-sm:px-2 text-center mx-auto max-w-165 mb-12 md:mb-16">
        <p class="section-title">What We Do</p>
        <p class="font-normal text-[18px] max-sm:text-[14px] pt-6 text-app-content-subtle">
            We specialize in building reliable, secure, and high-performance systems that power real businesses.
        </p>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @foreach ($services as $service)
            <div class="rounded-xl bg-app-surface shadow-app-card shadow-lg p-6 sm:p-8">
                <div class="mb-5 flex h-11 w-11 items-center justify-center rounded-lg bg-picto-primary/10 text-picto-primary">
                    {!! $service['icon'] !!}
                </div>
                <p class="mb-3 text-lg font-semibold text-app-content">{{ $service['title'] }}</p>
                <p class="text-[14px] sm:text-[15px] font-normal text-app-content-muted">{{ $service['description'] }}</p>
            </div>
        @endforeach
    </div>
</div>
