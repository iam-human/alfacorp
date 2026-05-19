@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')
<!-- Hero Banner -->
<section class="bg-primary text-white pt-40 lg:pt-48 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-bold mb-4">Layanan Unggulan Kami</h1>
        <p class="text-primary-light text-lg max-w-2xl mx-auto">Kami menawarkan solusi teknologi komprehensif yang dirancang untuk mendukung pertumbuhan dan kesuksesan bisnis Anda di era digital.</p>
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
