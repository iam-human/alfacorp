<div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
    <!-- Main Content -->
    <div class="lg:col-span-2">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8 mb-12">
            @forelse($blogs as $blog)
                <div class="group bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden hover:shadow-md hover:-translate-y-1 transition-all duration-300">
                    <div class="aspect-video overflow-hidden">
                        <img src="{{ $blog->thumbnail ? Storage::url($blog->thumbnail) : 'https://placehold.co/800x450/e2e8f0/475569?text=Blog' }}" alt="{{ $blog->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500">
                    </div>
                    <div class="p-6">
                        <div class="flex items-center gap-4 mb-4">
                            <span class="bg-primary/10 text-primary text-xs font-medium px-3 py-1 rounded-full">
                                {{ $blog->category->name }}
                            </span>
                            <span class="text-sm text-neutral-400 flex items-center">
                                <svg class="w-4 h-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $blog->published_at->format('d M Y') }}
                            </span>
                        </div>
                        <h3 class="text-xl font-heading font-bold mb-3 group-hover:text-primary transition-colors line-clamp-2">
                            <a href="{{ route('blog.detail', $blog->slug) }}">{{ $blog->title }}</a>
                        </h3>
                        <p class="text-neutral-500 mb-4 line-clamp-3">{{ $blog->excerpt }}</p>
                        <a href="{{ route('blog.detail', $blog->slug) }}" class="inline-flex items-center text-primary font-semibold hover:text-primary-dark transition-colors">
                            Baca Selengkapnya
                            <svg class="w-4 h-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 bg-white rounded-2xl border border-border">
                    <p class="text-neutral-500">Tidak ada artikel yang ditemukan.</p>
                </div>
            @endforelse
        </div>
        
        <!-- Pagination -->
        <div class="mt-8">
            {{ $blogs->links() }}
        </div>
    </div>

    <!-- Sidebar -->
    <div class="space-y-8">
        <!-- Search -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h4 class="text-lg font-heading font-bold mb-4">Pencarian</h4>
            <div class="relative">
                <input type="text" wire:model.live.debounce.300ms="search" placeholder="Cari artikel..." class="w-full pl-10 pr-4 py-3 rounded-xl border border-border focus:border-primary focus:ring focus:ring-primary/20 transition-shadow outline-none">
                <svg class="w-5 h-5 text-neutral-400 absolute left-3 top-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/></svg>
            </div>
        </div>

        <!-- Categories -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h4 class="text-lg font-heading font-bold mb-4">Kategori</h4>
            <ul class="space-y-2">
                <li>
                    <button wire:click="setCategory(null)" class="w-full text-left flex items-center justify-between py-2 {{ is_null($category_slug) ? 'text-primary font-semibold' : 'text-neutral-500 hover:text-primary' }} transition-colors">
                        <span>Semua Kategori</span>
                    </button>
                </li>
                @foreach($categories as $category)
                    <li>
                        <button wire:click="setCategory('{{ $category->slug }}')" class="w-full text-left flex items-center justify-between py-2 {{ $category_slug === $category->slug ? 'text-primary font-semibold' : 'text-neutral-500 hover:text-primary' }} transition-colors">
                            <span>{{ $category->name }}</span>
                            <span class="bg-surface-alt px-2 py-0.5 rounded-md text-xs">{{ $category->blogs()->where('status','published')->count() }}</span>
                        </button>
                    </li>
                @endforeach
            </ul>
        </div>

        <!-- Recent Posts -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h4 class="text-lg font-heading font-bold mb-4">Artikel Terbaru</h4>
            <div class="space-y-4">
                @foreach($recentPosts as $post)
                    <a href="{{ route('blog.detail', $post->slug) }}" class="flex gap-4 group">
                        <div class="w-20 h-20 flex-shrink-0 rounded-lg overflow-hidden">
                            <img src="{{ $post->thumbnail ? Storage::url($post->thumbnail) : 'https://placehold.co/100x100/e2e8f0/475569?text=Blog' }}" alt="{{ $post->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                        </div>
                        <div>
                            <h5 class="text-sm font-heading font-bold leading-tight mb-2 group-hover:text-primary transition-colors line-clamp-2">{{ $post->title }}</h5>
                            <span class="text-xs text-neutral-400">{{ $post->published_at->format('d M Y') }}</span>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
