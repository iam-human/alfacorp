@extends('layouts.app')

@section('title', $service->title)

@section('content')
<!-- Hero Banner -->
<section class="text-white pt-40 lg:pt-48 pb-20 relative overflow-hidden">
    <img src="/images/header_bg.jpg" class="absolute inset-0 w-full h-full object-cover z-0" alt="Hero Background">
    <div class="absolute inset-0 bg-[#02bbff]/90 mix-blend-multiply z-0"></div>
    <div class="absolute inset-0 bg-slate-900/60 z-0"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 md:gap-0 mt-8 md:mt-0 text-center md:text-left">
        <div>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-heading font-black text-white drop-shadow-sm tracking-tight">{{ $service->title }}</h1>
        </div>
        <div class="flex items-center gap-2 text-white/90 font-semibold text-sm sm:text-base relative z-10 bg-white/10 px-5 py-2.5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <span class="text-white/50">/</span>
            <span class="font-bold text-white">{{ $service->title }}</span>
        </div>
    </div>
</section>

<!-- Content -->
<section class="py-20 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Main Content -->
            <div class="lg:col-span-2">
                @if($service->image)
                    <div class="mb-10 rounded-2xl overflow-hidden shadow-lg border border-slate-100 dark:border-gray-800">
                        <img src="{{ Storage::url($service->image) }}" alt="{{ $service->title }}" class="w-full h-auto">
                    </div>
                @endif
                
                <div class="prose prose-lg prose-slate dark:prose-invert max-w-none">
                    {!! $service->full_description !!}
                </div>
            </div>

            <!-- Sidebar -->
            <div>
                <div class="bg-surface-alt dark:bg-gray-900 rounded-2xl p-8 border border-slate-100 dark:border-gray-800 sticky top-28">
                    <h3 class="text-xl font-heading font-bold mb-6 text-slate-900 dark:text-white border-b border-border dark:border-gray-800 pb-4">Layanan Lainnya</h3>
                    <ul class="space-y-4">
                        @foreach($relatedServices as $related)
                            <li>
                                <a href="{{ route('service.detail', $related->slug) }}" class="flex items-center group">
                                    <div class="w-10 h-10 bg-white dark:bg-gray-800 text-primary rounded-lg flex items-center justify-center mr-4 group-hover:bg-primary group-hover:text-white transition-colors border border-slate-100 dark:border-gray-700">
                                        @if($related->icon)
                                            @svg($related->icon, 'w-5 h-5')
                                        @endif
                                    </div>
                                    <span class="font-medium text-neutral-600 dark:text-slate-300 group-hover:text-primary transition-colors">{{ $related->title }}</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                    
                    <div class="mt-8 pt-8 border-t border-border dark:border-gray-800">
                        <h3 class="font-bold text-slate-900 dark:text-white mb-4">Tertarik dengan layanan ini?</h3>
                        <a href="{{ route('contact') }}?service={{ $service->id }}" class="block text-center bg-primary text-white px-6 py-3 rounded-xl font-semibold hover:bg-primary-dark transition-colors">
                            Hubungi Kami
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
