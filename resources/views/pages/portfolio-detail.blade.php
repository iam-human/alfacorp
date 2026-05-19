@extends('layouts.app')

@section('title', $portfolio->title)

@section('content')
<!-- Hero Banner -->
<section class="bg-primary text-white pt-40 lg:pt-48 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <span class="inline-block bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-semibold mb-6">{{ $portfolio->category->name }}</span>
        <h1 class="text-4xl md:text-5xl font-heading font-bold mb-4">{{ $portfolio->title }}</h1>
        <p class="text-primary-light text-lg max-w-2xl">{{ $portfolio->short_description }}</p>
    </div>
</section>

<!-- Project Content -->
<section class="py-20 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                @if($portfolio->thumbnail)
                    <div class="mb-12 rounded-2xl overflow-hidden shadow-lg border border-slate-100 dark:border-gray-800">
                        <img src="{{ Storage::url($portfolio->thumbnail) }}" alt="{{ $portfolio->title }}" class="w-full h-auto">
                    </div>
                @endif
                
                <h2 class="text-3xl font-heading font-bold mb-6 text-slate-900 dark:text-white">Tentang Proyek</h2>
                <div class="prose prose-lg prose-slate dark:prose-invert max-w-none mb-12">
                    {!! $portfolio->full_description !!}
                </div>

                @if($portfolio->images->count() > 0)
                    <h3 class="text-2xl font-heading font-bold mb-6 text-slate-900 dark:text-white">Galeri Proyek</h3>
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6" x-data="{ imgModal : false, imgModalSrc : '', imgModalDesc : '' }">
                        @foreach($portfolio->images as $image)
                            <div class="relative group cursor-pointer overflow-hidden rounded-xl border border-border dark:border-gray-800" @click="imgModal = true; imgModalSrc = '{{ Storage::url($image->image_path) }}'; imgModalDesc = '{{ $image->caption }}'">
                                <img src="{{ Storage::url($image->image_path) }}" alt="{{ $image->caption }}" class="w-full aspect-[4/3] object-cover group-hover:scale-105 transition-transform duration-500">
                                @if($image->caption)
                                    <div class="absolute inset-x-0 bottom-0 bg-black/60 text-white p-4 translate-y-full group-hover:translate-y-0 transition-transform duration-300">
                                        <p class="text-sm">{{ $image->caption }}</p>
                                    </div>
                                @endif
                                <div class="absolute inset-0 bg-black/20 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                    <svg class="w-10 h-10 text-white drop-shadow-md" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                </div>
                            </div>
                        @endforeach
                        
                        <!-- Lightbox Modal -->
                        <div x-show="imgModal" x-transition.opacity.duration.300ms style="display: none;" class="fixed inset-0 z-[100] flex items-center justify-center bg-black/90 p-4">
                            <button @click="imgModal = false" class="absolute top-6 right-6 text-white/70 hover:text-white">
                                <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                            <div class="max-w-5xl w-full flex flex-col items-center" @click.away="imgModal = false">
                                <img :src="imgModalSrc" class="max-h-[80vh] rounded-lg shadow-2xl object-contain">
                                <p x-text="imgModalDesc" class="text-white mt-4 text-center text-lg"></p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div>
                <div class="bg-surface-alt dark:bg-gray-900 rounded-2xl p-8 border border-slate-100 dark:border-gray-800 sticky top-28">
                    <h3 class="text-xl font-heading font-bold mb-6 text-slate-900 dark:text-white border-b border-border dark:border-gray-800 pb-4">Informasi Proyek</h3>
                    
                    <div class="space-y-6">
                        @if($portfolio->client_name)
                        <div>
                            <span class="text-sm text-neutral-500 dark:text-slate-400 block mb-1">Klien</span>
                            <span class="font-bold text-slate-900 dark:text-white">{{ $portfolio->client_name }}</span>
                        </div>
                        @endif
                        
                        <div>
                            <span class="text-sm text-neutral-500 dark:text-slate-400 block mb-1">Kategori</span>
                            <span class="font-bold text-slate-900 dark:text-white">{{ $portfolio->category->name }}</span>
                        </div>
                        
                        @if($portfolio->project_date)
                        <div>
                            <span class="text-sm text-neutral-500 dark:text-slate-400 block mb-1">Tanggal Selesai</span>
                            <span class="font-bold text-slate-900 dark:text-white">{{ $portfolio->project_date->format('d F Y') }}</span>
                        </div>
                        @endif
                        
                        @if($portfolio->project_url)
                        <div class="pt-4 border-t border-border dark:border-gray-800 mt-6">
                            <a href="{{ $portfolio->project_url }}" target="_blank" rel="noopener noreferrer" class="flex items-center justify-center w-full border-2 border-primary text-primary dark:text-slate-200 hover:bg-primary hover:text-white dark:hover:text-white transition-colors py-3 rounded-xl font-semibold">
                                Kunjungi Website
                                <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@if($relatedPortfolios->count() > 0)
<!-- Related Projects -->
<section class="py-20 bg-surface-alt dark:bg-gray-950/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h3 class="text-3xl font-heading font-bold mb-10 text-center text-slate-900 dark:text-white">Proyek Serupa</h3>
        <div class="flex flex-wrap justify-center gap-8">
            @foreach($relatedPortfolios as $related)
                <div class="w-full max-w-[380px] sm:max-w-none sm:w-[calc(50%-1rem)] md:w-[calc(33.333%-1.35rem)] group bg-white dark:bg-gray-900 rounded-2xl shadow-sm border border-slate-100 dark:border-gray-800 overflow-hidden hover:shadow-md transition-all">
                    <div class="relative overflow-hidden aspect-[4/3]">
                        <img src="{{ $related->thumbnail ? Storage::url($related->thumbnail) : 'https://placehold.co/800x600/e2e8f0/475569?text=Portfolio' }}" alt="{{ $related->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <span class="bg-primary/10 text-primary text-xs font-medium px-3 py-1 rounded-full mb-3 inline-block">
                            {{ $related->category->name }}
                        </span>
                        <h4 class="text-xl font-heading font-bold mb-2 text-slate-900 dark:text-white group-hover:text-primary transition-colors">
                            <a href="{{ route('portfolio.detail', $related->slug) }}">{{ $related->title }}</a>
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endif

@endsection
