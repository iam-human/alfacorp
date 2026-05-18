@extends('layouts.app')

@section('title', 'Blog & Artikel')

@section('content')
<!-- Hero Banner -->
<section class="bg-primary text-white pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-bold mb-4">Blog & Artikel</h1>
        <p class="text-primary-light text-lg max-w-2xl mx-auto">Kumpulan informasi, insight, dan berita terbaru seputar dunia teknologi dan bisnis digital.</p>
    </div>
</section>

<!-- Blog Area -->
<section class="py-24 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @livewire('blog-list')
    </div>
</section>
@endsection
