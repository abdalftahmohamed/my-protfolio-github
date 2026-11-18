<x-admin-layout title="Add Testimonial">
    <form method="POST" action="{{ route('admin.testimonials.store') }}">
        @csrf
        @include('admin.testimonials._form')
    </form>
</x-admin-layout>
