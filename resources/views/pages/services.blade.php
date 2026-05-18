@extends('layouts.app')

@section('title', 'Layanan Kami')

@section('content')
<!-- Hero Banner -->
<section class="bg-primary text-white pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-bold mb-4">Layanan Unggulan Kami</h1>
        <p class="text-primary-light text-lg max-w-2xl mx-auto">Kami menawarkan solusi teknologi komprehensif yang dirancang untuk mendukung pertumbuhan dan kesuksesan bisnis Anda di era digital.</p>
    </div>
</section>

<!-- Services Grid -->
<section class="py-24 bg-surface-alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($services as $index => $service)
                <div class="group bg-white rounded-2xl shadow-sm border {{ $service->is_featured ? 'border-primary shadow-primary/10' : 'border-slate-100' }} p-8 hover:shadow-xl hover:-translate-y-2 transition-all duration-300 relative overflow-hidden">
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
                    
                    <h3 class="text-2xl font-heading font-bold mb-4 group-hover:text-primary transition-colors">
                        <a href="{{ route('service.detail', $service->slug) }}">{{ $service->title }}</a>
                    </h3>
                    
                    <p class="text-neutral-500 mb-8 leading-relaxed">
                        {{ $service->short_description }}
                    </p>
                    
                    <a href="{{ route('service.detail', $service->slug) }}" class="inline-flex items-center justify-center w-full bg-surface-alt hover:bg-primary hover:text-white text-primary font-semibold px-6 py-3 rounded-xl transition-colors mt-auto">
                        Pelajari Detailnya
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
