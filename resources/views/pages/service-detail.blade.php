@extends('layouts.app')

@section('title', $service->title)

@section('content')
<!-- Hero Banner -->
<section class="bg-primary text-white pt-40 lg:pt-48 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <div class="w-20 h-20 bg-white/10 text-white rounded-2xl flex items-center justify-center mx-auto mb-6 backdrop-blur-sm">
            @if($service->icon)
                @svg($service->icon, 'w-10 h-10')
            @endif
        </div>
        <h1 class="text-4xl md:text-5xl font-heading font-bold mb-4">{{ $service->title }}</h1>
        <p class="text-primary-light text-lg max-w-2xl mx-auto">{{ $service->short_description }}</p>
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
