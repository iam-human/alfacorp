@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')
<!-- Hero Banner -->
<section class="text-white pt-40 lg:pt-48 pb-20 relative overflow-hidden">
    <img src="/images/header_bg.jpg" class="absolute inset-0 w-full h-full object-cover z-0" alt="Hero Background">
    <div class="absolute inset-0 bg-[#02bbff]/90 mix-blend-multiply z-0"></div>
    <div class="absolute inset-0 bg-slate-900/60 z-0"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 md:gap-0 mt-8 md:mt-0 text-center md:text-left">
        <div>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-heading font-black text-white drop-shadow-sm tracking-tight">Layanan Kami</h1>
        </div>
        <div class="flex items-center gap-2 text-white/90 font-semibold text-sm sm:text-base relative z-10 bg-white/10 px-5 py-2.5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <span class="text-white/50">/</span>
            <span class="font-bold text-white">Layanan Kami</span>
        </div>
    </div>
</section>

<!-- Services Grid -->
<section class="py-24 bg-surface-alt dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $count = $services->count();
            $useThreeCols = ($count > 4 && ($count % 4 === 1));
            $itemWidthClass = $useThreeCols 
                ? 'w-full max-w-[380px] sm:max-w-none sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.35rem)]' 
                : 'w-full max-w-[380px] sm:max-w-none sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.35rem)] xl:w-[calc(25%-1.5rem)]';
        @endphp
        <div class="flex flex-wrap justify-center gap-8">
            @foreach($services as $index => $service)
                <div class="{{ $itemWidthClass }} group bg-white dark:bg-gray-900 rounded-2xl shadow-sm border {{ $service->is_featured ? 'border-primary shadow-primary/10' : 'border-slate-100 dark:border-gray-850' }} p-8 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden flex flex-col">
                    @if($service->is_featured)
                        <div class="absolute top-0 right-0 bg-primary text-white text-xs font-bold px-3 py-1 rounded-bl-lg">Unggulan</div>
                    @endif
                    
                    <div class="w-16 h-16 bg-primary-light text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                        @if($service->icon)
                            @svg($service->icon, 'w-8 h-8')
                        @else
                            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                        @endif
                    </div>
                    
                    <h3 class="text-2xl font-heading font-bold mb-4 text-slate-900 dark:text-white group-hover:text-primary transition-colors">
                        <a href="{{ route('service.detail', $service->slug) }}">{{ $service->title }}</a>
                    </h3>
                    
                    <p class="text-neutral-500 dark:text-slate-400 mb-8 leading-relaxed flex-grow">
                        {{ $service->short_description }}
                    </p>
                    
                    <a href="{{ route('service.detail', $service->slug) }}" class="inline-flex items-center justify-center w-full bg-surface-alt dark:bg-gray-800 hover:bg-primary hover:text-white text-primary dark:text-slate-200 font-semibold px-6 py-3 rounded-xl transition-colors mt-auto">
                        Pelajari Detailnya
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
