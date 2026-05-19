<div>
    <!-- Filter Tabs -->
    <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up">
        <button wire:click="setCategory('all')" 
                class="px-6 py-2 rounded-full font-medium transition-all duration-300 {{ $activeCategory === 'all' ? 'bg-primary text-white shadow-md' : 'bg-surface-alt dark:bg-gray-800 text-neutral-600 dark:text-slate-300 hover:bg-primary/10 hover:text-primary' }}">
            Semua
        </button>
        @foreach($categories as $category)
            <button wire:click="setCategory({{ $category->id }})" 
                    class="px-6 py-2 rounded-full font-medium transition-all duration-300 {{ $activeCategory === $category->id ? 'bg-primary text-white shadow-md' : 'bg-surface-alt dark:bg-gray-800 text-neutral-600 dark:text-slate-300 hover:bg-primary/10 hover:text-primary' }}">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    @php
        $count = $portfolios->count();
        $useThreeCols = ($count > 4 && ($count % 4 === 1));
        $itemWidthClass = $useThreeCols 
            ? 'w-full max-w-[380px] sm:max-w-none sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)]' 
            : 'w-full max-w-[380px] sm:max-w-none sm:w-[calc(50%-12px)] lg:w-[calc(33.333%-16px)] xl:w-[calc(25%-18px)]';
    @endphp

    <!-- Portfolio Grid (Centered and dynamically columns-calculated) -->
    <div class="flex flex-wrap justify-center gap-6" wire:loading.class="opacity-50 transition-opacity duration-300">
        @forelse($portfolios as $portfolio)
            @php
                $fallbacks = [
                    'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1542744094-3a31f103e35f?auto=format&fit=crop&w=800&q=80',
                    'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=800&q=80',
                ];
                $thumbnailUrl = $portfolio->thumbnail ? Storage::url($portfolio->thumbnail) : $fallbacks[$loop->index % count($fallbacks)];
            @endphp
            
            <div class="{{ $itemWidthClass }} group relative overflow-hidden rounded-[2rem] aspect-[3/4] shadow-md hover:shadow-2xl transition-all duration-500" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                
                {{-- Card Background Image with Hover Zoom --}}
                <img src="{{ $thumbnailUrl }}" alt="{{ $portfolio->title }}" class="absolute inset-0 w-full h-full object-cover transform scale-100 group-hover:scale-110 transition-transform duration-[1.4s] ease-out z-0">
                
                {{-- Normal State Floating Content Card at Bottom --}}
                <div class="absolute bottom-6 left-6 right-6 bg-white dark:bg-gray-900 rounded-2xl p-5 shadow-lg z-10 flex flex-col opacity-100 group-hover:!opacity-0 group-hover:!invisible group-hover:scale-95 transition-all duration-500 ease-out">
                    {{-- Category Label --}}
                    <span class="text-[10px] font-bold text-primary uppercase tracking-widest mb-1.5 block">
                        {{ $portfolio->category->name }}
                    </span>
                    
                    {{-- Bold Title --}}
                    <h3 class="text-lg font-heading font-bold text-slate-900 dark:text-white line-clamp-1">
                        {{ $portfolio->title }}
                    </h3>
                </div>

                {{-- Hover State Blue Overlay with Centered White Content --}}
                <div class="absolute inset-0 flex flex-col justify-center items-center text-center p-6 bg-gradient-to-b from-[#02bbff]/75 to-[#0099d6]/80 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out z-20">
                    {{-- Category --}}
                    <span class="text-white/80 text-[10px] font-bold uppercase tracking-widest mb-2 transform -translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-[50ms]">
                        {{ $portfolio->category->name }}
                    </span>
                    
                    {{-- Title --}}
                    <h3 class="text-xl font-heading font-bold text-white mb-3 transform -translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-[100ms] line-clamp-2">
                        {{ $portfolio->title }}
                    </h3>
                    
                    {{-- Divider --}}
                    <div class="w-12 h-0.5 bg-white/30 mb-3 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 delay-[150ms]"></div>
                    
                    {{-- Description --}}
                    <p class="text-white/90 text-xs max-w-md mb-5 leading-relaxed line-clamp-3 transform -translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-[200ms]">
                        {{ $portfolio->short_description }}
                    </p>
                    
                    {{-- Pill Button --}}
                    <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-[250ms]">
                        <a href="{{ route('portfolio.detail', $portfolio->slug) }}" class="inline-flex items-center justify-center px-5 py-2 rounded-full text-xs font-bold text-[#0099d6] bg-white hover:bg-slate-100 hover:scale-105 transition-all duration-300 shadow-lg">
                            Detail Proyek
                        </a>
                    </div>
                </div>
                
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="w-20 h-20 bg-surface-alt dark:bg-gray-800 rounded-full flex items-center justify-center mx-auto mb-4 text-neutral-400">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-xl font-heading font-bold text-neutral-dark dark:text-white mb-2">Belum Ada Portfolio</h3>
                <p class="text-neutral-500 dark:text-slate-400">Tidak ada portfolio yang ditemukan untuk kategori ini.</p>
            </div>
        @endforelse
    </div>
</div>
