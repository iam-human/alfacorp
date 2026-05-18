@extends('layouts.app')

@section('title', $blog->title)

@section('content')
<!-- Hero Banner -->
<section class="bg-primary text-white pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="flex items-center justify-center gap-4 mb-6">
            <span class="inline-block bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-semibold">{{ $blog->category->name }}</span>
            <span class="text-primary-light flex items-center text-sm">
                <svg class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                {{ $blog->published_at->format('d F Y') }}
            </span>
        </div>
        <h1 class="text-4xl md:text-5xl font-heading font-bold mb-6 leading-tight">{{ $blog->title }}</h1>
        @if($blog->author_name)
        <div class="flex items-center justify-center text-primary-light">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            Oleh {{ $blog->author_name }}
        </div>
        @endif
    </div>
</section>

<!-- Content -->
<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        @if($blog->thumbnail)
            <div class="mb-12 rounded-2xl overflow-hidden shadow-lg border border-slate-100">
                <img src="{{ Storage::url($blog->thumbnail) }}" alt="{{ $blog->title }}" class="w-full h-auto">
            </div>
        @endif
        
        <div class="prose prose-lg prose-slate max-w-none">
            {!! $blog->content !!}
        </div>
        
        <!-- Share -->
        <div class="mt-16 pt-8 border-t border-border flex items-center justify-between">
            <h4 class="font-bold text-slate-900">Bagikan Artikel Ini:</h4>
            <div class="flex space-x-4">
                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->fullUrl()) }}" target="_blank" class="w-10 h-10 rounded-full bg-surface-alt flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.469h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.469h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>
                </a>
                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text={{ urlencode($blog->title) }}" target="_blank" class="w-10 h-10 rounded-full bg-surface-alt flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-colors">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

@if($relatedBlogs->count() > 0)
<!-- Related Posts -->
<section class="py-20 bg-surface-alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-3xl font-heading font-bold mb-10 text-center">Artikel Terkait</h3>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach($relatedBlogs as $related)
                <div class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ $related->thumbnail ? Storage::url($related->thumbnail) : 'https://placehold.co/800x450/e2e8f0/475569?text=Blog' }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <span class="text-xs text-neutral-400 mb-2 block">{{ $related->published_at->format('d M Y') }}</span>
                        <h4 class="text-lg font-heading font-bold mb-2 group-hover:text-primary transition-colors line-clamp-2">
                            <a href="{{ route('blog.detail', $related->slug) }}">{{ $related->title }}</a>
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
