<div>
    <!-- Filter Tabs -->
    <div class="flex flex-wrap justify-center gap-4 mb-12" data-aos="fade-up">
        <button wire:click="setCategory('all')" 
                class="px-6 py-2 rounded-full font-medium transition-all duration-300 {{ $activeCategory === 'all' ? 'bg-primary text-white shadow-md' : 'bg-surface-alt text-neutral-600 hover:bg-primary/10 hover:text-primary' }}">
            Semua
        </button>
        @foreach($categories as $category)
            <button wire:click="setCategory({{ $category->id }})" 
                    class="px-6 py-2 rounded-full font-medium transition-all duration-300 {{ $activeCategory === $category->id ? 'bg-primary text-white shadow-md' : 'bg-surface-alt text-neutral-600 hover:bg-primary/10 hover:text-primary' }}">
                {{ $category->name }}
            </button>
        @endforeach
    </div>

    <!-- Portfolio Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-8" wire:loading.class="opacity-50 transition-opacity duration-300">
        @forelse($portfolios as $portfolio)
            <div class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-300" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="relative overflow-hidden aspect-[4/3]">
                    <img src="{{ $portfolio->thumbnail ? Storage::url($portfolio->thumbnail) : 'https://placehold.co/800x600/e2e8f0/475569?text=Portfolio' }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end p-6">
                        <a href="{{ route('portfolio.detail', $portfolio->slug) }}" class="text-white font-medium hover:text-secondary transition-colors flex items-center">
                            Lihat Detail 
                            <svg class="w-5 h-5 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
                <div class="p-6">
                    <div class="flex items-center justify-between mb-3">
                        <span class="bg-primary/10 text-primary text-xs font-medium px-3 py-1 rounded-full">
                            {{ $portfolio->category->name }}
                        </span>
                        @if($portfolio->client_name)
                            <span class="text-sm text-neutral-500">{{ $portfolio->client_name }}</span>
                        @endif
                    </div>
                    <h3 class="text-xl font-heading font-bold mb-2 group-hover:text-primary transition-colors">
                        <a href="{{ route('portfolio.detail', $portfolio->slug) }}">{{ $portfolio->title }}</a>
                    </h3>
                    <p class="text-neutral-500 line-clamp-2">{{ $portfolio->short_description }}</p>
                </div>
            </div>
        @empty
            <div class="col-span-full text-center py-12">
                <div class="w-20 h-20 bg-surface-alt rounded-full flex items-center justify-center mx-auto mb-4 text-neutral-400">
                    <svg class="w-10 h-10" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                </div>
                <h3 class="text-xl font-heading font-bold text-neutral-dark mb-2">Belum Ada Portfolio</h3>
                <p class="text-neutral-500">Tidak ada portfolio yang ditemukan untuk kategori ini.</p>
            </div>
        @endforelse
    </div>
</div>
