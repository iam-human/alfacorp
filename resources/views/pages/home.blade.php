@extends('layouts.app')

@section('content')

<!-- 2. Hero Section -->
@if($heroes->isNotEmpty())
@php $firstHero = $heroes->first(); @endphp
<section class="relative overflow-hidden bg-white dark:bg-gray-950 pt-10 lg:pt-12" 
         x-data="{ 
            active: 0, 
            count: {{ $heroes->count() }},
            next() { this.active = (this.active + 1) % this.count },
            prev() { this.active = (this.active - 1 + this.count) % this.count },
            init() { setInterval(() => this.next(), 8000) }
         }">

    {{-- Background shapes (Paten/Static) --}}
    <div class="absolute inset-0 pointer-events-none">
        <div class="absolute -top-32 -right-32 w-[600px] h-[600px] rounded-full opacity-[0.06]" style="background:radial-gradient(circle,#02bbff,transparent);"></div>
        <div class="absolute -bottom-20 -left-20 w-[400px] h-[400px] rounded-full opacity-[0.05]" style="background:radial-gradient(circle,#0099d6,transparent);"></div>
        {{-- Hex pattern left --}}
        <svg class="absolute left-0 top-0 h-full opacity-[0.03] dark:opacity-[0.06]" viewBox="0 0 200 600" fill="none" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMinYMin slice">
            <path d="M30 40l20-11.5 20 11.5v23L50 74 30 63V40zM30 90l20-11.5 20 11.5v23L50 124 30 113V90zM30 140l20-11.5 20 11.5v23L50 174 30 163V140zM30 190l20-11.5 20 11.5v23L50 224 30 213V190zM30 240l20-11.5 20 11.5v23L50 274 30 263V240zM30 290l20-11.5 20 11.5v23L50 324 30 313V290zM30 340l20-11.5 20 11.5v23L50 374 30 363V340zM30 390l20-11.5 20 11.5v23L50 424 30 413V390zM80 65l20-11.5 20 11.5v23L100 99 80 88V65zM80 115l20-11.5 20 11.5v23L100 149 80 138V115zM80 165l20-11.5 20 11.5v23L100 199 80 188V165zM80 215l20-11.5 20 11.5v23L100 249 80 238V215zM80 265l20-11.5 20 11.5v23L100 299 80 288V265zM80 315l20-11.5 20 11.5v23L100 349 80 338V315zM80 365l20-11.5 20 11.5v23L100 399 80 388V365z" stroke="#02bbff" stroke-width="1"/>
        </svg>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full" style="margin-top: 60px; margin-bottom: 30px;">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[calc(100vh-14rem)] py-20 lg:py-10">
            
            {{-- BILAH KIRI: Konten Tetap (Paten) --}}
            <div data-aos="fade-right" data-aos-duration="700">
                {{-- Badge --}}
                <div class="inline-flex items-center gap-2 mb-6 px-4 py-2 rounded-full text-xs font-bold uppercase tracking-widest" style="background:#e0f8ff;color:#02bbff;">
                    <span class="w-1.5 h-1.5 rounded-full bg-primary animate-pulse"></span>
                    Andal · Profesional · Cepat
                </div>

                <h1 class="text-4xl sm:text-5xl lg:text-[3.25rem] font-heading font-extrabold text-slate-900 dark:text-white mb-6 leading-[1.12]">
                    {{ $firstHero->headline }}
                </h1>

                <p class="text-lg text-slate-500 dark:text-slate-400 mb-10 leading-relaxed max-w-xl">
                    {{ $firstHero->subheadline }}
                </p>

                {{-- CTAs --}}
                <div class="flex flex-wrap gap-4 mb-12">
                    <a href="{{ $firstHero->cta_primary_url }}"
                       class="group inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-bold text-white text-base transition-all duration-300 hover:-translate-y-0.5 hover:shadow-xl"
                       style="background:linear-gradient(135deg,#02bbff,#0099d6);box-shadow:0 6px 20px rgba(2,187,255,.35);">
                        {{ $firstHero->cta_primary_text }}
                        <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                    @if($firstHero->cta_secondary_text)
                    <a href="{{ $firstHero->cta_secondary_url }}"
                       class="inline-flex items-center gap-2 px-7 py-3.5 rounded-xl font-bold text-primary border-2 border-primary text-base transition-all duration-300 hover:bg-primary hover:text-white hover:-translate-y-0.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14.752 11.168l-3.197-2.132A1 1 0 0010 9.87v4.263a1 1 0 001.555.832l3.197-2.132a1 1 0 000-1.664z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                        {{ $firstHero->cta_secondary_text }}
                    </a>
                    @endif
                </div>

                {{-- Rating trust badge --}}
                <div class="flex items-center gap-3">
                    <div class="flex -space-x-2">
                        @for($i=0;$i<4;$i++)
                        <div class="w-8 h-8 rounded-full border-2 border-white overflow-hidden" style="background:linear-gradient(135deg,#cbd5e1,#94a3b8);"></div>
                        @endfor
                    </div>
                    <div>
                        <div class="flex text-yellow-400 text-sm">★★★★★</div>
                        <p class="text-xs text-slate-500 dark:text-slate-400 mt-0.5">Dipercaya 150+ klien aktif</p>
                    </div>
                </div>
            </div>

            {{-- BILAH KANAN: Visual (Yang Transisi) + Stats (Tetap) --}}
            <div class="relative">
                
                {{-- Container Gambar (Yang Transisi) --}}
                <div class="relative rounded-3xl overflow-hidden shadow-2xl" style="aspect-ratio:4/3;">
                    @foreach($heroes as $index => $hero)
                        <div class="absolute inset-0 transition-all duration-3000"
                             x-show="active === {{ $index }}"
                             x-transition:enter="transition ease-out duration-3000"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="transition ease-in duration-3000"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             style="display: none;">
                            @if($hero->background_image)
                                <img src="{{ Storage::url($hero->background_image) }}" alt="Hero" class="w-full h-full object-cover">
                            @else
                                <div class="w-full h-full flex items-center justify-center" style="background:linear-gradient(135deg,#02bbff 0%,#0099d6 100%);">
                                    <svg class="w-24 h-24 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                </div>
                            @endif
                            {{-- Gradient overlay --}}
                            <div class="absolute bottom-0 left-0 right-0 h-1/3" style="background:linear-gradient(to top, rgba(2,187,255,.4), transparent);"></div>
                        </div>
                    @endforeach
                </div>

                {{-- Floating shape accent (Tetap) --}}
                <div class="absolute -top-4 -right-4 w-20 h-20 rounded-2xl rotate-12 opacity-80" style="background:linear-gradient(135deg,#0099d6,#02bbff);"></div>
                <div class="absolute -bottom-3 -left-3 w-14 h-14 rounded-xl -rotate-6 opacity-60" style="background:#e0f8ff;"></div>

                {{-- Stats row below image (Tetap) --}}
                <div class="mt-6 grid grid-cols-2 sm:grid-cols-3 gap-3"
                     x-data="{
                        counted:false,
                        countUp(el,target,suffix){
                            const dur=1800,start=performance.now();
                            const tick=(now)=>{
                                const p=Math.min((now-start)/dur,1);
                                el.textContent=Math.floor((1-Math.pow(1-p,3))*target)+suffix;
                                if(p<1) requestAnimationFrame(tick);
                            };
                            requestAnimationFrame(tick);
                        },
                        init(){
                            const obs=new IntersectionObserver(([e])=>{
                                if(e.isIntersecting&&!this.counted){
                                    this.counted=true;
                                    this.$nextTick(()=>{
                                        this.$el.querySelectorAll('[data-count]').forEach(el=>{
                                            this.countUp(el,+el.dataset.count,el.dataset.suffix||'');
                                        });
                                    });
                                }
                            },{threshold:0.4});
                            obs.observe(this.$el);
                        }
                     }">

                    @if($firstHero->stat_1_number)
                    @php preg_match('/([\d]+)([^\d]*)/', $firstHero->stat_1_number, $m1); @endphp
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-4 text-center shadow-sm border border-slate-100 dark:border-gray-700 hover:-translate-y-1 transition-transform">
                        <div class="text-2xl font-heading font-extrabold text-primary" data-count="{{ $m1[1]??0 }}" data-suffix="{{ $m1[2]??'' }}">{{ $firstHero->stat_1_number }}</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ $firstHero->stat_1_label }}</div>
                    </div>
                    @endif

                    @if($firstHero->stat_2_number)
                    @php preg_match('/([\d]+)([^\d]*)/', $firstHero->stat_2_number, $m2); @endphp
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-4 text-center shadow-sm border border-slate-100 dark:border-gray-700 hover:-translate-y-1 transition-transform">
                        <div class="text-2xl font-heading font-extrabold text-primary" data-count="{{ $m2[1]??0 }}" data-suffix="{{ $m2[2]??'' }}">{{ $firstHero->stat_2_number }}</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ $firstHero->stat_2_label }}</div>
                    </div>
                    @endif

                    @if($firstHero->stat_3_number)
                    @php preg_match('/([\d]+)([^\d]*)/', $firstHero->stat_3_number, $m3); @endphp
                    <div class="bg-white dark:bg-gray-800 rounded-2xl p-4 text-center shadow-sm border border-slate-100 dark:border-gray-700 hover:-translate-y-1 transition-transform">
                        <div class="text-2xl font-heading font-extrabold text-primary" data-count="{{ $m3[1]??0 }}" data-suffix="{{ $m3[2]??'' }}">{{ $firstHero->stat_3_number }}</div>
                        <div class="text-xs text-slate-500 dark:text-slate-400 mt-1 font-medium">{{ $firstHero->stat_3_label }}</div>
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>


</section>
@endif

<!-- 3. Clients Section -->
<section id="clients" class="py-20 overflow-hidden relative" style="background: linear-gradient(135deg, #02bbff, #0099d6)">
    <div class="flex overflow-hidden group">
        {{-- Group 1 --}}
        <div class="flex space-x-20 animate-marquee whitespace-nowrap pr-20 py-4">
            @foreach($partners as $partner)
                <div class="flex-shrink-0 bg-white rounded-3xl p-5 m-20 shadow-xl flex items-center justify-center w-40 h-25 transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-full max-w-full object-contain">
                </div>
            @endforeach
            {{-- Double the content inside the group to ensure it's wider than the screen --}}
            @foreach($partners as $partner)
                <div class="flex-shrink-0 bg-white rounded-3xl m-20 p-5 shadow-xl flex items-center justify-center w-40 h-25 transform hover:scale-105 transition-transform duration-300">
                    <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-full max-w-full object-contain">
                </div>
            @endforeach
        </div>
    </div>

    <style>
        @keyframes marquee-scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-100%); }
        }
        .animate-marquee {
            animation: marquee-scroll 40s linear infinite;
        }
    </style>
</section>

<!-- 4. Services Section -->
<section class="py-24 bg-slate-50 dark:bg-gray-950 overflow-hidden" x-data="{ 
    interval: null,
    scrollToNext() {
        const container = this.$refs.serviceContainer;
        if (!container) return;
        
        const firstCard = container.firstElementChild;
        if (!firstCard) return;

        const cardWidth = firstCard.offsetWidth + 32; 
        const isAtEnd = container.scrollLeft + container.offsetWidth >= container.scrollWidth - 10;
        
        if (isAtEnd) {
            container.scrollTo({ left: 0, behavior: 'smooth' });
        } else {
            container.scrollBy({ left: cardWidth, behavior: 'smooth' });
        }
    },
    startAutoSlide() {
        this.stopAutoSlide();
        this.interval = setInterval(() => { this.scrollToNext(); }, 2000);
    },
    stopAutoSlide() {
        if (this.interval) clearInterval(this.interval);
    }
}" x-init="setTimeout(() => startAutoSlide(), 500)" @mouseenter="stopAutoSlide()" @mouseleave="startAutoSlide()">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('components.section-header', [
            'label' => 'Layanan Kami',
            'title' => 'Solusi Inovatif untuk Bisnis Anda',
            'subtitle' => 'Kami menawarkan berbagai layanan digital profesional untuk membantu bisnis Anda berkembang lebih cepat.'
        ])

        <div class="relative">
            {{-- Slider Container --}}
            <div x-ref="serviceContainer" class="flex overflow-x-auto gap-8 pb-8 scrollbar-hide snap-x snap-mandatory touch-pan-y -mx-4 px-4 sm:mx-0 sm:px-0">
                @foreach($services as $index => $service)
                    <div class="group bg-white dark:bg-gray-900 rounded-3xl shadow-sm border {{ $service->is_featured ? 'border-primary shadow-primary/10' : 'border-slate-100 dark:border-gray-800' }} p-8 hover:shadow-xl transition-all duration-300 relative overflow-hidden flex-shrink-0 w-[85%] sm:w-[45%] lg:w-[calc(33.333%-1.35rem)] snap-center" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                        @if($service->is_featured)
                            <div class="absolute top-0 right-0 bg-primary text-white text-[10px] font-bold px-3 py-1 rounded-bl-xl uppercase tracking-wider">Unggulan</div>
                        @endif
                        
                        <div class="w-14 h-14 bg-primary/5 text-primary rounded-2xl flex items-center justify-center mb-6 group-hover:bg-primary group-hover:text-white transition-colors duration-300">
                            @if($service->icon)
                                @svg($service->icon, 'w-7 h-7')
                            @else
                                <svg class="w-7 h-7" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                            @endif
                        </div>
                        
                        <h3 class="text-xl font-heading font-black mb-4 group-hover:text-primary transition-colors dark:text-white line-clamp-1">
                            <a href="{{ route('service.detail', $service->slug) }}">{{ $service->title }}</a>
                        </h3>
                        
                        <p class="text-slate-500 dark:text-slate-400 mb-8 line-clamp-3 text-sm leading-relaxed">
                            {{ $service->short_description }}
                        </p>
                        
                        <a href="{{ route('service.detail', $service->slug) }}" class="inline-flex items-center text-primary font-bold text-sm group-hover:gap-2 transition-all mt-auto">
                            Selengkapnya 
                            <svg class="w-4 h-4 ml-2 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>

<!-- 5. Portfolio Section -->
<section class="py-24 bg-white relative overflow-hidden" x-data="{ 
    scroll: 0,
    scrollTo(dir) {
        const container = $refs.portfolioContainer;
        if (!container || !container.firstElementChild) return;
        const cardWidth = container.firstElementChild.offsetWidth + 24; 
        container.scrollBy({ left: dir * cardWidth, behavior: 'smooth' });
    }
}">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="bg-[#F3F6FD] dark:bg-gray-800/40 rounded-[3rem] py-16 px-6 sm:px-10 lg:px-14 relative overflow-hidden">
            {{-- Decorative Background Circle --}}
            <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary/5 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-secondary/5 rounded-full blur-3xl"></div>

            @include('components.section-header', [
                'label' => 'PROJECT WE\'VE COMPLETE',
                'title' => 'Discover Our Latest Projects',
                'subtitle' => 'Beberapa proyek terbaik yang telah kami selesaikan dengan sukses.'
            ])

            <div class="relative mt-12">
                {{-- Navigation Arrows --}}
                <div class="absolute inset-y-0 -left-4 sm:-left-10 flex items-center z-10">
                    <button @click="scrollTo(-1)" class="w-10 h-10 rounded-full bg-white shadow-xl flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                </div>

                {{-- Portfolio Slider --}}
                <div x-ref="portfolioContainer" class="flex overflow-x-auto gap-6 pb-8 scrollbar-hide snap-x snap-mandatory">
                    @foreach($portfolios as $index => $portfolio)
                        <div class="flex-shrink-0 w-[85%] sm:w-[48%] lg:w-[31.5%] snap-center group" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            <div class="bg-white dark:bg-gray-900 rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition-all duration-500 border border-slate-100 dark:border-gray-800 h-full flex flex-col">
                                <div class="relative aspect-[4/3] overflow-hidden">
                                    <img src="{{ Storage::url($portfolio->thumbnail) }}" alt="{{ $portfolio->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex flex-col justify-end p-6">
                                        <span class="text-white/80 text-xs font-bold uppercase tracking-wider mb-2">{{ $portfolio->category->name }}</span>
                                        <h4 class="text-white text-lg font-bold">{{ $portfolio->title }}</h4>
                                    </div>
                                </div>
                                <div class="p-6 flex flex-col flex-grow">
                                    <div class="flex items-center justify-between mb-4">
                                        <span class="px-3 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-wider">{{ $portfolio->category->name }}</span>
                                    </div>
                                    <h3 class="text-xl font-heading font-bold text-slate-900 dark:text-white mb-3 line-clamp-1">{{ $portfolio->title }}</h3>
                                    <p class="text-slate-500 dark:text-slate-400 text-sm line-clamp-2 mb-6">{{ $portfolio->short_description }}</p>
                                    <a href="{{ route('portfolio.detail', $portfolio->slug) }}" class="mt-auto inline-flex items-center gap-2 text-primary font-bold text-sm group-hover:gap-3 transition-all">
                                        Lihat Proyek
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="absolute inset-y-0 -right-4 sm:-right-10 flex items-center z-10">
                    <button @click="scrollTo(1)" class="w-10 h-10 rounded-full bg-white shadow-xl flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/></svg>
                    </button>
                </div>
            </div>
            
            <div class="mt-10 text-center">
                <a href="{{ route('portfolio') }}" class="inline-flex items-center gap-2 text-primary font-bold hover:gap-3 transition-all">
                    Lihat Semua Portfolio
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- 6. Team Section -->
@if($teams->isNotEmpty())
<section class="py-24 bg-slate-50 dark:bg-gray-950 overflow-hidden" 
    x-data="{ 
        activeTeam: null, 
        modalOpen: false,
        teams: [
            @foreach($teams as $member)
            {
                name: '{{ addslashes($member->name) }}',
                position: '{{ addslashes($member->position) }}',
                bio: '{{ addslashes($member->bio ?? '') }}',
                photo: '{{ Storage::url($member->photo) }}',
                instagram: '{{ addslashes($member->instagram ?? '') }}',
                linkedin: '{{ addslashes($member->linkedin ?? '') }}',
                email: '{{ addslashes($member->email ?? '') }}'
            }{{ !$loop->last ? ',' : '' }}
            @endforeach
        ],
        openModal(index) { this.activeTeam = this.teams[index]; this.modalOpen = true; },
        closeModal() { this.modalOpen = false; setTimeout(() => this.activeTeam = null, 300); }
    }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('components.section-header', [
            'label' => 'Tim Kami',
            'title' => 'Para Profesional Dibalik Layanan Kami',
            'subtitle' => 'Dukungan penuh dari tim ahli untuk memastikan kesuksesan proyek Anda.'
        ])

        <div class="flex overflow-x-auto gap-8 pb-28 scrollbar-hide -mx-4 px-4 sm:mx-0 sm:px-0 touch-pan-y">
            @foreach($teams as $index => $member)
                <div class="relative group cursor-pointer w-[85%] sm:w-[45%] lg:w-[calc(33.333%-1.35rem)] flex-shrink-0" 
                     @click="openModal({{ $index }})"
                     data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    
                    {{-- Photo Container --}}
                    <div class="relative aspect-[4/5] rounded-[2rem] overflow-hidden shadow-sm group-hover:shadow-xl transition-all duration-500">
                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        
                        {{-- Social Links Hover --}}
                        <div class="absolute top-4 right-4 flex flex-col gap-2 translate-x-12 opacity-0 group-hover:translate-x-0 group-hover:opacity-100 transition-all duration-300">
                            @if($member->instagram)
                            <a href="{{ $member->instagram }}" target="_blank" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-pink-600 shadow-lg hover:bg-pink-600 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/></svg>
                            </a>
                            @endif
                            @if($member->linkedin)
                            <a href="{{ $member->linkedin }}" target="_blank" class="w-10 h-10 rounded-full bg-white flex items-center justify-center text-blue-700 shadow-lg hover:bg-blue-700 hover:text-white transition-all">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                            @endif
                        </div>
                    </div>

                    {{-- Floating Info Box --}}
                    <div class="absolute bottom-0 inset-x-0 w-[90%] mx-auto bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-xl border border-slate-100 dark:border-gray-700 translate-y-1/2 transform group-hover:-translate-y-2 transition-all duration-500">
                        <div class="relative">
                            <h4 class="text-lg font-bold text-slate-900 dark:text-white pr-10">{{ $member->name }}</h4>
                            <p class="text-sm text-primary font-medium mt-1">{{ $member->position }}</p>
                            
                            {{-- Share Icon Trigger --}}
                            <div class="absolute top-0 right-0">
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/></svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Team Member Modal (Premium Version) --}}
    <div x-show="modalOpen" x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
         x-transition:enter="transition ease-out duration-500"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
         
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-md" @click="closeModal()"></div>
        
        {{-- Modal Content --}}
        <div class="relative bg-white dark:bg-gray-900 rounded-[2rem] sm:rounded-[3rem] shadow-2xl max-w-3xl w-full overflow-hidden z-10 border border-white/20 dark:border-gray-800"
             x-transition:enter="transition ease-out duration-500"
             x-transition:enter-start="opacity-0 scale-95 translate-y-8 sm:translate-y-12"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-300"
             x-transition:leave-start="opacity-100 scale-100 translate-y-0"
             x-transition:leave-end="opacity-0 scale-95 translate-y-8 sm:translate-y-12">
             
            <button @click="closeModal()" class="absolute top-4 right-4 sm:top-6 sm:right-6 w-10 h-10 rounded-full bg-slate-100/50 hover:bg-slate-100 dark:bg-gray-800/50 dark:hover:bg-gray-800 flex items-center justify-center text-slate-500 dark:text-slate-400 hover:text-primary dark:hover:text-primary transition-all z-20 backdrop-blur-sm">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>

            <template x-if="activeTeam">
                <div class="flex flex-col sm:flex-row h-full max-h-[85vh] sm:max-h-[70vh]">
                    {{-- Left: Photo Area --}}
                    <div class="w-full sm:w-2/5 relative h-64 sm:h-auto overflow-hidden bg-slate-100 dark:bg-gray-800">
                        <img :src="activeTeam.photo" :alt="activeTeam.name" class="w-full h-full object-cover object-top">
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/10 to-transparent sm:bg-gradient-to-r sm:from-transparent sm:via-transparent sm:to-black/30"></div>
                        
                        {{-- Name Badge Mobile (Floating on photo) --}}
                        <div class="absolute bottom-4 left-4 right-4 sm:hidden">
                            <h3 class="text-2xl font-heading font-extrabold text-white drop-shadow-md" x-text="activeTeam.name"></h3>
                            <p class="text-primary-light font-medium text-sm drop-shadow-md" x-text="activeTeam.position"></p>
                        </div>
                    </div>

                    {{-- Right: Content Area --}}
                    <div class="w-full sm:w-3/5 p-6 sm:p-10 flex flex-col overflow-y-auto scrollbar-hide">
                        
                        {{-- Header (Desktop only) --}}
                        <div class="hidden sm:block mb-6">
                            <h3 class="text-3xl font-heading font-extrabold text-slate-900 dark:text-white" x-text="activeTeam.name"></h3>
                            <div class="inline-flex items-center mt-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-bold uppercase tracking-wider" x-text="activeTeam.position"></div>
                        </div>

                        {{-- Bio Section --}}
                        <div class="mb-8 flex-grow">
                            <h4 class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-3">Tentang</h4>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed" x-show="activeTeam.bio" x-text="activeTeam.bio"></p>
                            <p class="text-slate-400 italic" x-show="!activeTeam.bio">Belum ada biografi yang ditambahkan.</p>
                        </div>

                        {{-- Contact & Socials --}}
                        <div class="pt-6 border-t border-slate-100 dark:border-gray-800">
                            <h4 class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-4">Hubungi</h4>
                            <div class="flex flex-wrap gap-3">
                                <template x-if="activeTeam.email">
                                    <a :href="'mailto:' + activeTeam.email" class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-50 hover:bg-primary/5 dark:bg-gray-800 dark:hover:bg-gray-700 text-slate-700 dark:text-slate-200 hover:text-primary transition-all border border-slate-200 dark:border-gray-700">
                                        <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                        <span class="text-sm font-semibold">Email</span>
                                    </a>
                                </template>
                                
                                <template x-if="activeTeam.instagram">
                                    <a :href="activeTeam.instagram" target="_blank" class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-50 hover:bg-pink-50 dark:bg-gray-800 dark:hover:bg-pink-900/20 text-slate-700 dark:text-slate-200 hover:text-pink-600 dark:hover:text-pink-400 transition-all border border-slate-200 dark:border-gray-700">
                                        <svg class="w-4 h-4 text-pink-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                        <span class="text-sm font-semibold">Instagram</span>
                                    </a>
                                </template>

                                <template x-if="activeTeam.linkedin">
                                    <a :href="activeTeam.linkedin" target="_blank" class="flex items-center gap-2 px-4 py-2.5 rounded-xl bg-slate-50 hover:bg-blue-50 dark:bg-gray-800 dark:hover:bg-blue-900/20 text-slate-700 dark:text-slate-200 hover:text-blue-600 dark:hover:text-blue-400 transition-all border border-slate-200 dark:border-gray-700">
                                        <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                        <span class="text-sm font-semibold">LinkedIn</span>
                                    </a>
                                </template>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>
@endif

<!-- 7. Testimonial Section -->
@if($testimonials->isNotEmpty())
<section class="py-24 bg-white overflow-hidden">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div data-aos="fade-right">
                <span class="text-primary text-sm font-semibold tracking-widest uppercase block mb-3">Testimoni</span>
                <h2 class="text-slate-900 dark:text-white text-4xl font-heading font-bold mb-6 leading-tight">Apa Kata Klien Tentang Kami?</h2>
                <p class="text-slate-500 dark:text-slate-400 text-lg mb-10">Kepercayaan klien adalah prioritas utama kami. Berikut adalah pengalaman mereka bekerja sama dengan kami.</p>
                
                <div class="grid grid-cols-2 gap-6">
                    <div class="p-6 rounded-3xl bg-slate-50 dark:bg-gray-800 border border-slate-100 dark:border-gray-700">
                        <div class="text-3xl font-extrabold text-primary mb-1">98%</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">Tingkat Kepuasan</div>
                    </div>
                    <div class="p-6 rounded-3xl bg-slate-50 dark:bg-gray-800 border border-slate-100 dark:border-gray-700">
                        <div class="text-3xl font-extrabold text-primary mb-1">24/7</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400">Dukungan Teknis</div>
                    </div>
                </div>
            </div>

            <div class="relative" data-aos="fade-left">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-primary/5 rounded-full blur-3xl"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-secondary/5 rounded-full blur-3xl"></div>
                
                <div class="relative space-y-6">
                    @foreach($testimonials->take(2) as $index => $testimonial)
                        <div class="bg-white dark:bg-gray-900 p-8 rounded-[2rem] shadow-xl border border-slate-50 dark:border-gray-800 relative">
                            <div class="absolute top-8 right-8 text-primary/10">
                                <svg class="w-12 h-12" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C20.1216 16 21.017 16.8954 21.017 18V21C21.017 22.1046 20.1216 23 19.017 23H16.017C14.9124 23 14.017 22.1046 14.017 21ZM14.017 21V10C14.017 8.89543 14.9124 8 16.017 8H19.017C20.1216 8 21.017 8.89543 21.017 10V13C21.017 14.1046 20.1216 15 19.017 15H16.017M3 21L3 18C3 16.8954 3.89543 16 5 16H8C9.10457 16 10 16.8954 10 18V21C10 22.1046 9.10457 23 8 23H5C3.89543 23 3 22.1046 3 21ZM3 21V10C3 8.89543 3.89543 8 5 8H8C9.10457 8 10 8.89543 10 10V13C10 14.1046 9.10457 15 8 15H5"></path></svg>
                            </div>
                            <div class="flex items-center gap-4 mb-6">
                                <div class="w-14 h-14 rounded-2xl overflow-hidden ring-4 ring-primary/5">
                                    <img src="{{ Storage::url($testimonial->photo) }}" alt="{{ $testimonial->name }}" class="w-full h-full object-cover">
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-900 dark:text-white">{{ $testimonial->name }}</h4>
                                    <p class="text-xs text-slate-500">{{ $testimonial->position }}</p>
                                </div>
                            </div>
                            <p class="text-slate-600 dark:text-slate-400 italic leading-relaxed">"{{ $testimonial->message }}"</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
@endif

<!-- 8. CTA Section -->
<section class="py-24 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative rounded-[3.5rem] overflow-hidden bg-primary px-8 py-16 sm:px-16 sm:py-24 text-center">
            {{-- Decorative Background --}}
            <div class="absolute inset-0 opacity-10">
                <svg class="h-full w-full" fill="none" viewBox="0 0 400 400">
                    <defs><pattern id="grid" width="40" height="40" patternUnits="userSpaceOnUse"><path d="M 40 0 L 0 0 0 40" fill="none" stroke="white" stroke-width="1"/></pattern></defs>
                    <rect width="100%" height="100%" fill="url(#grid)"/>
                </svg>
            </div>
            <div class="absolute -top-24 -left-24 w-64 h-64 bg-white/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 -right-24 w-64 h-64 bg-black/20 rounded-full blur-3xl"></div>

            <div class="relative z-10 max-w-2xl mx-auto">
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-heading font-black text-white mb-8 leading-tight">Siap Untuk Memulai Transformasi Digital?</h2>
                <p class="text-white/80 text-lg mb-12">Konsultasikan kebutuhan bisnis Anda dengan tim ahli kami dan dapatkan solusi terbaik sekarang juga.</p>
                <div class="flex flex-wrap justify-center gap-4">
                    <a href="{{ route('contact') }}" class="px-8 py-4 bg-white text-primary rounded-2xl font-bold hover:shadow-xl transition-all hover:-translate-y-1">Hubungi Kami</a>
                    <a href="{{ route('services') }}" class="px-8 py-4 bg-black/20 text-white border border-white/30 rounded-2xl font-bold hover:bg-black/30 transition-all">Lihat Layanan</a>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
