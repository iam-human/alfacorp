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

    {{-- Background Network Particles & Radial Glows --}}
    <div class="absolute inset-0 z-0 overflow-hidden">
        {{-- Particles Container --}}
        <div id="hero-particles" class="absolute inset-0 w-full h-full"></div>
        {{-- Aesthetic glow shapes --}}
        <div class="absolute -top-32 -right-32 w-[600px] h-[600px] rounded-full opacity-[0.06]" style="background:radial-gradient(circle,#02bbff,transparent);"></div>
        <div class="absolute -bottom-20 -left-20 w-[400px] h-[400px] rounded-full opacity-[0.05]" style="background:radial-gradient(circle,#0099d6,transparent);"></div>
    </div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full mt-10 mb-8 md:mt-[60px] md:mb-[45px] lg:mt-[80px] lg:mb-[60px]">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center min-h-[calc(100vh-14rem)] py-10 lg:py-10">
            
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
                <div class="mt-6 grid grid-cols-3 gap-3"
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

    {{-- tsParticles Library & Config --}}
    <script src="https://cdn.jsdelivr.net/npm/tsparticles-engine@2/tsparticles.engine.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles-basic@2/tsparticles.basic.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles-interaction-particles-links@2/tsparticles.interaction.particles.links.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/tsparticles@2/tsparticles.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            if (typeof tsParticles !== 'undefined') {
                tsParticles.load("hero-particles", {
                    fpsLimit: 60,
                    interactivity: {
                        events: {
                            onHover: { enable: true, mode: "grab" },
                            onClick: { enable: true, mode: "push" },
                            resize: true
                        },
                        modes: {
                            grab: { distance: 200, links: { opacity: 0.8 } },
                            push: { quantity: 4 }
                        }
                    },
                    particles: {
                        color: { value: "#02bbff" },
                        links: {
                            color: "#02bbff",
                            distance: 150,
                            enable: true,
                            opacity: 0.4,
                            width: 1.5
                        },
                        move: {
                            enable: true,
                            speed: 0.8,
                            direction: "none",
                            random: true,
                            straight: false,
                            outModes: "out"
                        },
                        number: { density: { enable: true, area: 800 }, value: 80 },
                        opacity: { value: 0.6 },
                        shape: { type: "circle" },
                        size: { value: { min: 2, max: 4 } }
                    },
                    detectRetina: true
                });
            }
        });
    </script>
</section>
@endif


<!-- 4. Mengapa Harus Kami Section -->
<section class="relative pt-20 pb-10 bg-white dark:bg-gray-950 overflow-hidden" style="border-top: 2px solid rgba(2,187,255,0.5); border-bottom: 2px solid rgba(2,187,255,0.5); min-height: 680px;">
    {{-- Background Ornaments --}}
    <img src="/images/why_us_bg.png" class="absolute inset-0 w-full h-full object-fill pointer-events-none select-none z-0 opacity-85 hidden lg:block dark:hidden" alt="">

    {{-- Absolute Decorative Background (like testimonial) --}}
    <div class="absolute -top-32 -right-32 w-[500px] h-[500px] bg-primary/5 rounded-full blur-3xl pointer-events-none z-0"></div>
    <div class="absolute -bottom-32 -left-32 w-[400px] h-[400px] bg-secondary/5 rounded-full blur-3xl pointer-events-none z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">

            {{-- KIRI: 1 Foto, presisi tinggi dengan sisi kanan --}}
            <div class="w-full" data-aos="fade-right" data-aos-duration="700">
                {{-- Wrapper relative agar garis biru bisa di-overlay di luar overflow-hidden --}}
                <div class="relative w-full" style="height: 500px;">

                    {{-- Gambar dengan overflow-hidden untuk rounded corners --}}
                    <div class="absolute inset-0 rounded-3xl overflow-hidden shadow-2xl">
                        <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=900&q=80"
                             alt="Tim Profesional Alfacorp"
                             class="w-full h-full object-cover">
                    </div>

                    {{-- Garis kotak biru: di LUAR overflow-hidden, selalu tampil di atas gambar --}}
                    <div class="absolute pointer-events-none rounded-2xl"
                         style="inset: 20px; border: 3px solid #02bbff; z-index: 20;"></div>

                </div>
            </div>

            {{-- KANAN: Konten + Accordion (height pre-allocated agar section tidak naik turun) --}}
            <div class="py-4" style="min-height: 500px;" data-aos="fade-left" data-aos-duration="700" data-aos-delay="100">
                <span class="text-primary text-sm font-bold tracking-widest uppercase block mb-3">Mengapa Harus Kami?</span>
                <h2 class="text-slate-900 dark:text-white text-4xl font-heading font-extrabold mb-4 leading-tight">
                    Solusi IT <span style="color:#02bbff;">All-in-One</span><br>untuk Bisnis Anda
                </h2>
                <!-- <p class="text-slate-500 dark:text-slate-300 text-base mb-6 leading-relaxed">
                    Klien kami adalah prioritas utama. Kami mengutamakan kebutuhan mereka dan bekerja sama untuk menghadirkan solusi digital yang tepat sasaran.
                </p> -->

                {{-- Accordion: toggle saling menutup berurutan (close then open), animasi sangat smooth --}}
                <div x-data="{ 
                    active: 1,
                    isAnimating: false,
                    select(id) {
                        if (this.isAnimating) return;
                        if (this.active === id) {
                            this.active = null;
                            return;
                        }
                        if (this.active === null) {
                            this.active = id;
                            return;
                        }
                        this.isAnimating = true;
                        this.active = null; // Tutup yang sedang terbuka terlebih dahulu
                        setTimeout(() => {
                            this.active = id; // Buka yang baru setelah yang lama selesai menutup (250ms)
                            this.isAnimating = false;
                        }, 250);
                    }
                }" class="space-y-4">

                    {{-- Item 1 --}}
                    <div class="rounded-2xl border border-slate-200 dark:border-gray-700 overflow-hidden bg-slate-50 dark:bg-gray-900 transition-all duration-300">
                        <button @click="select(1)"
                                class="w-full flex items-center gap-4 px-5 py-4 text-left transition-all duration-300"
                                :class="active === 1 ? 'bg-primary text-white' : 'hover:bg-slate-100 dark:hover:bg-gray-800 text-slate-900 dark:text-white'">
                            <div class="w-9 h-9 rounded-full flex-shrink-0 flex items-center justify-center font-extrabold text-sm shadow-md transition-all duration-300"
                                 :style="active === 1 ? 'background:white; color:#02bbff;' : 'background:linear-gradient(135deg,#02bbff,#0099d6); color:white;'">1</div>
                            <span class="font-bold text-sm flex-1">Solusi Teknologi Tersesuaikan</span>
                            <svg class="w-4 h-4 flex-shrink-0 transition-all duration-300"
                                 :class="active === 1 ? 'rotate-180 text-white' : 'text-slate-400'"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="active === 1" x-collapse>
                            <div class="px-5 pb-5 pl-[3.75rem] text-slate-500 dark:text-slate-400 text-sm leading-relaxed border-t border-slate-100 dark:border-gray-700 pt-3">
                                Layanan IT yang dirancang khusus sesuai kebutuhan unik bisnis Anda — dari manajemen jaringan, integrasi cloud, hingga pengembangan perangkat lunak.
                            </div>
                        </div>
                    </div>

                    {{-- Item 2 --}}
                    <div class="rounded-2xl border border-slate-200 dark:border-gray-700 overflow-hidden bg-slate-50 dark:bg-gray-900 transition-all duration-300">
                        <button @click="select(2)"
                                class="w-full flex items-center gap-4 px-5 py-4 text-left transition-all duration-300"
                                :class="active === 2 ? 'bg-primary text-white' : 'hover:bg-slate-100 dark:hover:bg-gray-800 text-slate-900 dark:text-white'">
                            <div class="w-9 h-9 rounded-full flex-shrink-0 flex items-center justify-center font-extrabold text-sm shadow-md transition-all duration-300"
                                 :style="active === 2 ? 'background:white; color:#02bbff;' : 'background:linear-gradient(135deg,#02bbff,#0099d6); color:white;'">2</div>
                            <span class="font-bold text-sm flex-1">Dukungan & Pemeliharaan Proaktif</span>
                            <svg class="w-4 h-4 flex-shrink-0 transition-all duration-300"
                                 :class="active === 2 ? 'rotate-180 text-white' : 'text-slate-400'"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="active === 2" x-collapse>
                            <div class="px-5 pb-5 pl-[3.75rem] text-slate-500 dark:text-slate-400 text-sm leading-relaxed border-t border-slate-100 dark:border-gray-700 pt-3">
                                Pemantauan 24/7, pembaruan sistem berkala, dan dukungan teknis cepat untuk mencegah masalah sebelum terjadi dan meminimalkan downtime bisnis Anda.
                            </div>
                        </div>
                    </div>

                    {{-- Item 3 --}}
                    <div class="rounded-2xl border border-slate-200 dark:border-gray-700 overflow-hidden bg-slate-50 dark:bg-gray-900 transition-all duration-300">
                        <button @click="select(3)"
                                class="w-full flex items-center gap-4 px-5 py-4 text-left transition-all duration-300"
                                :class="active === 3 ? 'bg-primary text-white' : 'hover:bg-slate-100 dark:hover:bg-gray-800 text-slate-900 dark:text-white'">
                            <div class="w-9 h-9 rounded-full flex-shrink-0 flex items-center justify-center font-extrabold text-sm shadow-md transition-all duration-300"
                                 :style="active === 3 ? 'background:white; color:#02bbff;' : 'background:linear-gradient(135deg,#02bbff,#0099d6); color:white;'">3</div>
                            <span class="font-bold text-sm flex-1">Tim Berpengalaman & Bersertifikat</span>
                            <svg class="w-4 h-4 flex-shrink-0 transition-all duration-300"
                                 :class="active === 3 ? 'rotate-180 text-white' : 'text-slate-400'"
                                 fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div x-show="active === 3" x-collapse>
                            <div class="px-5 pb-5 pl-[3.75rem] text-slate-500 dark:text-slate-400 text-sm leading-relaxed border-t border-slate-100 dark:border-gray-700 pt-3">
                                Didukung oleh para profesional bersertifikat dengan pengalaman bertahun-tahun di industri teknologi informasi nasional maupun global.
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
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
<section class="py-24 bg-white dark:bg-gray-950 relative overflow-hidden" style="z-index: 10; border-top: 2px solid rgba(2,187,255,0.5); border-bottom: 2px solid rgba(2,187,255,0.5);" x-data="{ 
    scroll: 0,
    isDragging: false, isDown: false, startX: 0, scrollLeftPos: 0, velocity: 0, lastX: 0, rafId: null,
    startDrag(e) {
        this.isDown = true; this.isDragging = false;
        if (this.rafId) { cancelAnimationFrame(this.rafId); this.rafId = null; }
        this.startX = e.pageX - this.$refs.portfolioContainer.offsetLeft;
        this.scrollLeftPos = this.$refs.portfolioContainer.scrollLeft;
        this.lastX = e.pageX; this.velocity = 0;
    },
    endDrag() {
        if (!this.isDown) return;
        this.isDown = false;
        const container = this.$refs.portfolioContainer;
        const decelerate = () => {
            if (Math.abs(this.velocity) < 0.5) return;
            this.velocity *= 0.88;
            container.scrollLeft -= this.velocity;
            this.rafId = requestAnimationFrame(decelerate);
        };
        this.rafId = requestAnimationFrame(decelerate);
    },
    onDrag(e) {
        if (!this.isDown) return;
        e.preventDefault();
        const x = e.pageX - this.$refs.portfolioContainer.offsetLeft;
        const walk = (x - this.startX) * 1.5;
        if (Math.abs(walk) > 5) this.isDragging = true;
        this.velocity = e.pageX - this.lastX;
        this.lastX = e.pageX;
        this.$refs.portfolioContainer.scrollLeft = this.scrollLeftPos - walk;
    },
    scrollTo(dir) {
        const container = $refs.portfolioContainer;
        if (!container || !container.firstElementChild) return;
        const cardWidth = container.firstElementChild.offsetWidth + 24; 
        container.scrollBy({ left: dir * cardWidth, behavior: 'smooth' });
    }
}">
    {{-- Background Ornaments --}}
    <img src="/images/portfolio_bg.png" class="absolute inset-0 w-full h-full object-fill pointer-events-none select-none z-0 opacity-85 hidden lg:block dark:hidden" alt="">

    {{-- Decorative Background Circle --}}
    <div class="absolute -top-24 -right-24 w-64 h-64 bg-primary/5 rounded-full blur-3xl z-0"></div>
    <div class="absolute -bottom-24 -left-24 w-64 h-64 bg-secondary/5 rounded-full blur-3xl z-0"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">

            @include('components.section-header', [
                'label' => 'PROJECT WE\'VE COMPLETE',
                'title' => 'Discover Our Latest Projects',
                'subtitle' => 'Beberapa proyek terbaik yang telah kami selesaikan dengan sukses.'
            ])

            <div class="relative mt-12">
                {{-- Navigation Arrows --}}
                <div class="absolute inset-y-0 -left-4 sm:-left-10 flex items-center z-10">
                    <button @click="scrollTo(-1)" class="w-10 h-10 rounded-full bg-white dark:bg-gray-800 shadow-xl flex items-center justify-center text-primary hover:bg-primary dark:hover:bg-primary hover:text-white transition-all">
                        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/></svg>
                    </button>
                </div>

                {{-- Portfolio Slider --}}
                <div x-ref="portfolioContainer" @mousedown="startDrag" @mouseleave="endDrag" @mouseup="endDrag" @mousemove="onDrag" @dragstart.prevent class="flex overflow-x-auto gap-6 pb-8 scrollbar-hide cursor-grab active:cursor-grabbing select-none">
                    @foreach($portfolios as $index => $portfolio)
                        @php
                            $fallbacks = [
                                'https://images.unsplash.com/photo-1460925895917-afdab827c52f?auto=format&fit=crop&w=800&q=80',
                                'https://images.unsplash.com/photo-1522542550221-31fd19575a2d?auto=format&fit=crop&w=800&q=80',
                                'https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?auto=format&fit=crop&w=800&q=80',
                                'https://images.unsplash.com/photo-1531403009284-440f080d1e12?auto=format&fit=crop&w=800&q=80',
                                'https://images.unsplash.com/photo-1542744094-3a31f103e35f?auto=format&fit=crop&w=800&q=80',
                                'https://images.unsplash.com/photo-1551434678-e076c223a692?auto=format&fit=crop&w=800&q=80',
                            ];
                            $thumbnailUrl = $portfolio->thumbnail ? Storage::url($portfolio->thumbnail) : $fallbacks[$index % count($fallbacks)];
                        @endphp
                        <div class="flex-shrink-0 w-[85%] sm:w-[48%] lg:w-[31.5%] snap-center group relative overflow-hidden rounded-[2rem] aspect-[3/4] shadow-md hover:shadow-2xl transition-all duration-500" data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                            
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

                            {{-- Hover State Blue Overlay with Centered White Content (Matches Ref Image Exactly!) --}}
                            <div class="absolute inset-0 flex flex-col justify-center items-center text-center p-8 bg-gradient-to-b from-[#02bbff]/75 to-[#0099d6]/80 opacity-0 group-hover:opacity-100 transition-all duration-500 ease-out z-20">
                                {{-- Category (Upper Case, Tracking Wider) --}}
                                <span class="text-white/80 text-[10px] font-bold uppercase tracking-widest mb-2 transform -translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-[50ms]">
                                    {{ $portfolio->category->name }}
                                </span>
                                
                                {{-- Title (Large Bold White) --}}
                                <h3 class="text-2xl font-heading font-bold text-white mb-4 transform -translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-[100ms]">
                                    {{ $portfolio->title }}
                                </h3>
                                
                                {{-- Divider --}}
                                <div class="w-12 h-0.5 bg-white/30 mb-4 transform scale-x-0 group-hover:scale-x-100 transition-transform duration-500 delay-[150ms]"></div>
                                
                                {{-- Description --}}
                                <p class="text-white/90 text-xs max-w-md mb-6 leading-relaxed line-clamp-3 transform -translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-[200ms]">
                                    {{ $portfolio->short_description }}
                                </p>
                                
                                {{-- Pill Button (View Details) --}}
                                <div class="transform translate-y-4 group-hover:translate-y-0 transition-transform duration-500 delay-[250ms]">
                                    <a href="{{ route('portfolio.detail', $portfolio->slug) }}" class="inline-flex items-center justify-center px-6 py-2.5 rounded-full text-xs font-bold text-[#0099d6] bg-white hover:bg-slate-100 hover:scale-105 transition-all duration-300 shadow-lg">
                                        Detail Proyek
                                    </a>
                                </div>
                            </div>
                            
                        </div>
                    @endforeach
                </div>

                <div class="absolute inset-y-0 -right-4 sm:-right-10 flex items-center z-10">
                    <button @click="scrollTo(1)" class="w-10 h-10 rounded-full bg-white dark:bg-gray-800 shadow-xl flex items-center justify-center text-primary hover:bg-primary dark:hover:bg-primary hover:text-white transition-all">
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
                instagram: '{{ addslashes($member->instagram_url ?? '') }}',
                linkedin: '{{ addslashes($member->linkedin_url ?? '') }}',
                email: '{{ addslashes($member->email ?? '') }}',
                phone: '{{ addslashes($member->phone ?? '') }}'
            }{{ !$loop->last ? ',' : '' }}
            @endforeach
        ],
        openModal(index) { this.activeTeam = this.teams[index]; this.modalOpen = true; },
        closeModal() { this.modalOpen = false; setTimeout(() => this.activeTeam = null, 300); },
        isDragging: false, isDown: false, startX: 0, scrollLeftPos: 0, velocity: 0, lastX: 0, rafId: null,
        startDrag(e) {
            this.isDown = true; this.isDragging = false;
            if (this.rafId) { cancelAnimationFrame(this.rafId); this.rafId = null; }
            this.startX = e.pageX - this.$refs.teamContainer.offsetLeft;
            this.scrollLeftPos = this.$refs.teamContainer.scrollLeft;
            this.lastX = e.pageX; this.velocity = 0;
        },
        endDrag() {
            if (!this.isDown) return;
            this.isDown = false;
            const container = this.$refs.teamContainer;
            const decelerate = () => {
                if (Math.abs(this.velocity) < 0.5) return;
                this.velocity *= 0.88;
                container.scrollLeft -= this.velocity;
                this.rafId = requestAnimationFrame(decelerate);
            };
            this.rafId = requestAnimationFrame(decelerate);
        },
        onDrag(e) {
            if (!this.isDown) return;
            e.preventDefault();
            const x = e.pageX - this.$refs.teamContainer.offsetLeft;
            const walk = (x - this.startX) * 1.5;
            if (Math.abs(walk) > 5) this.isDragging = true;
            this.velocity = e.pageX - this.lastX;
            this.lastX = e.pageX;
            this.$refs.teamContainer.scrollLeft = this.scrollLeftPos - walk;
        }
    }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @include('components.section-header', [
            'label' => 'Tim Kami',
            'title' => 'Para Profesional Dibalik Layanan Kami',
            'subtitle' => 'Dukungan penuh dari tim ahli untuk memastikan kesuksesan proyek Anda.'
        ])

        <div x-ref="teamContainer" @mousedown="startDrag" @mouseleave="endDrag" @mouseup="endDrag" @mousemove="onDrag" @dragstart.prevent class="flex overflow-x-auto gap-8 pb-28 scrollbar-hide -mx-4 px-4 sm:mx-0 sm:px-0 cursor-grab active:cursor-grabbing select-none">
            @foreach($teams as $index => $member)
                <div class="relative w-[85%] sm:w-[45%] lg:w-[calc(33.333%-1.35rem)] flex-shrink-0" 
                     data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    
                    {{-- Photo Container (Only hover/click triggers here) --}}
                    <div class="group peer relative aspect-[4/5] rounded-[2rem] overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                         @click="if (!isDragging) openModal({{ $index }})">
                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" draggable="false" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700 pointer-events-none">
                        
                        {{-- Translucent Inner Blue Glow Overlay (Cahaya dari Pinggiran Dalam Card) --}}
                        <div class="absolute inset-0 rounded-[2rem] pointer-events-none z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 shadow-[inset_0_0_35px_rgba(2,187,255,0.55)]"></div>
                    </div>

                    {{-- Floating Info Box (Only moves on sibling peer-hover) --}}
                    <div class="absolute bottom-0 inset-x-0 w-[90%] mx-auto bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-xl border border-slate-100 dark:border-gray-700 translate-y-1/2 transform peer-hover:-translate-y-2 transition-all duration-500">
                        <div class="relative">
                            <h4 class="text-base sm:text-lg font-bold text-slate-900 dark:text-white pr-10 truncate">{{ $member->name }}</h4>
                            <p class="text-sm text-primary font-medium mt-1">{{ $member->position }}</p>
                            
                            {{-- Info Icon: hover (desktop) + click (touch) --}}
                            @if($member->instagram_url || $member->linkedin_url)
                            <div class="absolute top-0 right-0"
                                 x-data="{ showSocial: false, isHover: window.matchMedia('(hover: hover)').matches }"
                                 @mouseenter="if(isHover) showSocial = true"
                                 @mouseleave="if(isHover) showSocial = false"
                                 @click.outside="showSocial = false">
                                {{-- Social Media Tooltip Popup --}}
                                <div x-show="showSocial"
                                     x-transition:enter="transition ease-out duration-200"
                                     x-transition:enter-start="opacity-0 translate-y-2"
                                     x-transition:enter-end="opacity-100 translate-y-0"
                                     x-transition:leave="transition ease-in duration-150"
                                     x-transition:leave-start="opacity-100 translate-y-0"
                                     x-transition:leave-end="opacity-0 translate-y-2"
                                     class="absolute bottom-full left-1/2 -translate-x-1/2 mb-1 flex flex-col gap-2 bg-white dark:bg-gray-700 border border-slate-100 dark:border-gray-600 rounded-full p-1.5 shadow-xl z-30"
                                     style="display:none;">
                                    @if($member->instagram_url)
                                    <a href="{{ $member->instagram_url }}" target="_blank" class="w-7 h-7 rounded-full bg-pink-50 dark:bg-pink-900/30 flex items-center justify-center text-pink-600 hover:bg-pink-600 hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/></svg>
                                    </a>
                                    @endif
                                    @if($member->linkedin_url)
                                    <a href="{{ $member->linkedin_url }}" target="_blank" class="w-7 h-7 rounded-full bg-blue-50 dark:bg-blue-900/30 flex items-center justify-center text-blue-700 hover:bg-blue-700 hover:text-white transition-all shadow-sm">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                    </a>
                                    @endif
                                </div>

                                {{-- Icon Circle Trigger --}}
                                <div @click.stop="if(!isHover) showSocial = !showSocial"
                                     class="w-8 h-8 rounded-full flex items-center justify-center transition-all duration-300 cursor-pointer shadow-sm z-10"
                                     :class="showSocial ? 'bg-primary text-white' : 'bg-primary/10 text-primary hover:bg-primary hover:text-white'">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                    </svg>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    {{-- Team Member Modal (Premium Version) --}}
    <div x-show="modalOpen" x-cloak
         class="fixed inset-0 z-50 flex items-center justify-center p-4 sm:p-6"
         x-transition:enter="transition ease-out duration-250"
         x-transition:enter-start="opacity-0"
         x-transition:enter-end="opacity-100"
         x-transition:leave="transition ease-in duration-150"
         x-transition:leave-start="opacity-100"
         x-transition:leave-end="opacity-0">
         
        {{-- Backdrop --}}
        <div class="absolute inset-0 bg-slate-900/60 backdrop-blur-md" @click="closeModal()"></div>
        
        {{-- Modal Content --}}
        <div class="relative bg-white dark:bg-gray-900 rounded-[2rem] sm:rounded-[3rem] shadow-2xl max-w-3xl w-full overflow-hidden z-10 border border-white/20 dark:border-gray-800"
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0 scale-95 translate-y-8 sm:translate-y-12"
             x-transition:enter-end="opacity-100 scale-100 translate-y-0"
             x-transition:leave="transition ease-in duration-200"
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
                            <h3 class="text-xl font-heading font-extrabold text-white drop-shadow-md truncate" x-text="activeTeam.name"></h3>
                            <p class="text-primary-light font-medium text-sm drop-shadow-md" x-text="activeTeam.position"></p>
                        </div>
                    </div>

                    {{-- Right: Content Area --}}
                    <div class="w-full sm:w-3/5 p-6 sm:p-10 flex flex-col overflow-y-auto scrollbar-hide">
                        
                        {{-- Header (Desktop only) --}}
                        <div class="hidden sm:block mb-6">
                            <h3 class="text-2xl font-heading font-extrabold text-slate-900 dark:text-white truncate" x-text="activeTeam.name"></h3>
                            <div class="inline-flex items-center mt-2 px-3 py-1 rounded-full bg-primary/10 text-primary text-sm font-bold uppercase tracking-wider" x-text="activeTeam.position"></div>
                        </div>

                        {{-- Bio Section --}}
                        <div class="mb-8 flex-grow">
                            <h4 class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-3">Tentang</h4>
                            <p class="text-slate-600 dark:text-slate-300 leading-relaxed" x-show="activeTeam.bio" x-text="activeTeam.bio"></p>
                            <p class="text-slate-400 italic" x-show="!activeTeam.bio">Belum ada biografi yang ditambahkan.</p>
                        </div>

                        <div class="pt-6 border-t border-slate-100 dark:border-gray-800 grid grid-cols-1 sm:grid-cols-2 gap-6">
                            {{-- Left Column: Hubungi --}}
                            <template x-if="activeTeam.email || activeTeam.phone">
                                <div class="flex flex-col">
                                    <h4 class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-3">Hubungi</h4>
                                    <div class="flex flex-wrap gap-3">
                                        {{-- Email Button --}}
                                        <template x-if="activeTeam.email">
                                            <a :href="'mailto:' + activeTeam.email" class="w-10 h-10 rounded-full bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 flex items-center justify-center text-slate-700 dark:text-slate-200 hover:bg-primary/5 hover:text-primary hover:border-primary/30 transition-all shadow-sm">
                                                <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                                            </a>
                                        </template>

                                        {{-- WhatsApp Button --}}
                                        <template x-if="activeTeam.phone">
                                            <a :href="'https://wa.me/' + activeTeam.phone.replace(/[^0-9]/g, '')" target="_blank" class="w-10 h-10 rounded-full bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 flex items-center justify-center text-slate-700 dark:text-slate-200 hover:bg-green-50 dark:hover:bg-green-900/20 hover:text-green-600 dark:hover:text-green-400 hover:border-green-300 dark:hover:border-green-700 transition-all shadow-sm">
                                                <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 24 24">
                                                    <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.73-1.45L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.859-4.42 9.863-9.864.002-2.637-1.023-5.116-2.887-6.98C16.576 1.897 14.1 1.872 12.012 1.872c-5.437 0-9.862 4.42-9.866 9.865-.001 2.079.525 4.117 1.52 5.92l-.995 3.634 3.738-.98c1.684.92 3.51 1.403 5.238 1.403zm11.393-7.79c-.31-.155-1.838-.907-2.122-1.01-.285-.104-.492-.155-.7.156-.207.31-.8.155-.98.362-.18.207-.363.233-.674.078-.31-.156-1.31-.483-2.495-1.54-.922-.822-1.544-1.838-1.725-2.148-.18-.31-.02-.477.136-.632.14-.14.31-.362.466-.544.156-.18.208-.31.311-.518.104-.207.052-.389-.026-.544-.078-.155-.7-1.688-.958-2.31-.25-.607-.527-.523-.72-.533-.186-.01-.4-.01-.613-.01-.212 0-.557.08-.847.4-.29.32-1.11 1.087-1.11 2.65 0 1.563 1.139 3.076 1.295 3.283.155.207 2.24 3.42 5.426 4.79.758.326 1.35.52 1.812.666.76.242 1.452.208 2.001.126.61-.09 1.838-.75 2.096-1.448.259-.699.259-1.295.182-1.425-.078-.13-.285-.207-.595-.363z"/>
                                                </svg>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </template>

                            {{-- Right Column: Ikuti --}}
                            <template x-if="activeTeam.instagram || activeTeam.linkedin">
                                <div class="flex flex-col">
                                    <h4 class="text-xs font-bold text-slate-400 dark:text-slate-500 uppercase tracking-widest mb-3">Ikuti</h4>
                                    <div class="flex flex-wrap gap-3">
                                        {{-- Instagram Button --}}
                                        <template x-if="activeTeam.instagram">
                                            <a :href="activeTeam.instagram" target="_blank" class="w-10 h-10 rounded-full bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 flex items-center justify-center text-slate-700 dark:text-slate-200 hover:bg-pink-50 dark:hover:bg-pink-900/20 hover:text-pink-600 dark:hover:text-pink-400 hover:border-pink-300 dark:hover:border-pink-700 transition-all shadow-sm">
                                                <svg class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                                            </a>
                                        </template>

                                        {{-- LinkedIn Button --}}
                                        <template x-if="activeTeam.linkedin">
                                            <a :href="activeTeam.linkedin" target="_blank" class="w-10 h-10 rounded-full bg-slate-50 dark:bg-gray-800 border border-slate-200 dark:border-gray-700 flex items-center justify-center text-slate-700 dark:text-slate-200 hover:bg-blue-50 dark:hover:bg-blue-900/20 hover:text-blue-600 dark:hover:text-blue-400 hover:border-blue-300 dark:hover:border-blue-700 transition-all shadow-sm">
                                                <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                                            </a>
                                        </template>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>
@endif

<!-- 3. Clients Section -->
@if($partners->isNotEmpty())
@php
    // Repeat partners list to ensure seamless infinite loop
    $displayPartners = collect();
    while ($displayPartners->count() < 24) {
        $displayPartners = $displayPartners->concat($partners);
    }
@endphp
<section id="clients" class="py-16 bg-primary overflow-hidden relative">
    {{-- Aesthetic background radial glow --}}
    <div class="absolute inset-0 bg-[radial-gradient(circle_at_top_right,rgba(255,255,255,0.15),transparent)] pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div x-data="{
            currentIndex: {{ $partners->count() }},
            transitionEnabled: true,
            total: {{ $partners->count() }},
            stepWidth: 25,
            updateStepWidth() {
                if (window.innerWidth >= 1024) {
                    this.stepWidth = 25;
                } else if (window.innerWidth >= 768) {
                    this.stepWidth = 33.33333;
                } else {
                    this.stepWidth = 50;
                }
            },
            next() {
                if (this.total <= 1) return;
                this.transitionEnabled = true;
                this.currentIndex++;
                
                if (this.currentIndex === this.total * 2) {
                    setTimeout(() => {
                        this.transitionEnabled = false;
                        this.currentIndex = this.total;
                    }, 1000);
                }
            },
            init() {
                if (this.total > 1) {
                    this.updateStepWidth();
                    window.addEventListener('resize', () => this.updateStepWidth());
                    setInterval(() => {
                        this.next();
                    }, 3000);
                }
            }
        }" class="relative overflow-hidden w-full py-4">
            
            {{-- Flex Track --}}
            <div class="flex items-center -mx-2 sm:-mx-3"
                 :class="transitionEnabled ? 'transition-transform duration-1000 ease-in-out' : ''"
                 :style="total > 1 ? 'transform: translateX(-' + (currentIndex * stepWidth) + '%)' : 'justify-content: center;'">
                 
                 @foreach($displayPartners as $partner)
                     <div class="w-1/2 md:w-1/3 lg:w-1/4 flex-shrink-0 px-2 sm:px-3">
                         <div class="bg-white rounded-2xl p-4 sm:p-5 shadow-lg border border-white/10 flex items-center justify-center h-20 sm:h-24 transform hover:scale-[1.03] transition-all duration-300">
                             <img src="{{ Storage::url($partner->logo) }}" alt="{{ $partner->name }}" class="max-h-[70%] max-w-[85%] object-contain filter hover:brightness-105 transition-all">
                         </div>
                     </div>
                 @endforeach
                 
            </div>
        </div>
    </div>
</section>
@endif

<!-- 7. Testimonial Section -->
@if($testimonials->isNotEmpty())
<section class="py-24 bg-white dark:bg-gray-950 overflow-hidden relative" style="z-index: 10; border-top: 2px solid rgba(2,187,255,0.5); border-bottom: 2px solid rgba(2,187,255,0.5);">
    {{-- Background Ornaments --}}
    <img src="/images/testimonial_bg.png" class="absolute inset-0 w-full h-full object-fill pointer-events-none select-none z-0 opacity-85 hidden lg:block dark:hidden" alt="">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            
            {{-- Bagian Kiri --}}
            <div data-aos="fade-right">
                <span class="text-primary text-sm font-semibold tracking-widest uppercase block mb-3">Testimoni</span>
                <h2 class="text-slate-900 dark:text-white text-4xl font-heading font-extrabold mb-6 leading-tight">Apa Kata Klien Tentang Kami?</h2>
                <p class="text-slate-500 dark:text-slate-400 text-lg mb-10 leading-relaxed">Kepercayaan klien adalah prioritas utama kami. Berikut adalah pengalaman mereka bekerja sama dengan kami dalam menciptakan solusi digital terbaik.</p>
                
                <div class="grid grid-cols-2 gap-6">
                    <div class="p-6 rounded-3xl bg-slate-50 dark:bg-gray-900 border border-slate-100 dark:border-gray-800 transition-all hover:-translate-y-1">
                        <div class="text-3xl font-extrabold text-primary mb-1">98%</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400 font-medium">Tingkat Kepuasan</div>
                    </div>
                    <div class="p-6 rounded-3xl bg-slate-50 dark:bg-gray-900 border border-slate-100 dark:border-gray-800 transition-all hover:-translate-y-1">
                        <div class="text-3xl font-extrabold text-primary mb-1">24/7</div>
                        <div class="text-sm text-slate-600 dark:text-slate-400 font-medium">Dukungan Teknis</div>
                    </div>
                </div>
            </div>

            {{-- Bagian Kanan (Kartu Testimoni Slider Vertikal) --}}
            <div class="relative" data-aos="fade-left">
                <div class="absolute -top-10 -right-10 w-40 h-40 bg-primary/5 rounded-full blur-3xl pointer-events-none"></div>
                <div class="absolute -bottom-10 -left-10 w-40 h-40 bg-secondary/5 rounded-full blur-3xl pointer-events-none"></div>
                
                @php
                    $displayTestimonials = collect();
                    while ($displayTestimonials->count() < max(12, $testimonials->count() * 3)) {
                        $displayTestimonials = $displayTestimonials->concat($testimonials);
                    }
                @endphp

                <div x-data="{
                    currentIndex: {{ $testimonials->count() }},
                    transitionEnabled: true,
                    total: {{ $testimonials->count() }},
                    next() {
                        if (this.total <= 2) return;
                        this.transitionEnabled = true;
                        this.currentIndex++;
                        
                        if (this.currentIndex === this.total * 2) {
                            setTimeout(() => {
                                this.transitionEnabled = false;
                                this.currentIndex = this.total;
                            }, 1000);
                        }
                    },
                    init() {
                        if (this.total > 2) {
                            setInterval(() => {
                                this.next();
                            }, 3500);
                        }
                    }
                }" class="relative overflow-hidden rounded-3xl w-full" style="height: 504px; mask-image: linear-gradient(to bottom, transparent, black 5%, black 95%, transparent); -webkit-mask-image: linear-gradient(to bottom, transparent, black 5%, black 95%, transparent);">
                    
                    <div class="flex flex-col gap-6 w-full"
                         :class="transitionEnabled ? 'transition-transform duration-1000 ease-in-out' : ''"
                         :style="total > 2 ? 'transform: translateY(-' + (currentIndex * 264) + 'px)' : ''">
                        
                        @foreach($displayTestimonials as $index => $testimonial)
                            <div class="bg-white dark:bg-gray-900 p-8 rounded-3xl shadow-xl border border-slate-100 dark:border-gray-800 relative w-full flex-shrink-0 flex flex-col justify-between" style="height: 240px;">
                                
                                {{-- Header Profil --}}
                                <div class="flex items-center justify-between w-full relative z-10">
                                    <div class="flex items-center gap-4">
                                        <div class="w-14 h-14 rounded-2xl overflow-hidden ring-4 ring-primary/5 bg-slate-100 dark:bg-gray-800 flex flex-shrink-0 items-center justify-center text-xl font-bold text-primary">
                                            @if($testimonial->client_photo)
                                                <img src="{{ Storage::url($testimonial->client_photo) }}" alt="{{ $testimonial->client_name }}" class="w-full h-full object-cover">
                                            @else
                                                {{ substr($testimonial->client_name, 0, 1) }}
                                            @endif
                                        </div>
                                        <div>
                                            <h4 class="font-bold text-slate-900 dark:text-white text-lg">{{ $testimonial->client_name }}</h4>
                                            <p class="text-xs text-slate-500 font-medium">{{ $testimonial->client_position }} {{ $testimonial->client_company ? ' • ' . $testimonial->client_company : '' }}</p>
                                        </div>
                                    </div>
                                    
                                    {{-- Icon Quote Background --}}
                                    <div class="text-primary/10">
                                        <svg class="w-10 h-10" fill="currentColor" viewBox="0 0 24 24"><path d="M14.017 21L14.017 18C14.017 16.8954 14.9124 16 16.017 16H19.017C20.1216 16 21.017 16.8954 21.017 18V21C21.017 22.1046 20.1216 23 19.017 23H16.017C14.9124 23 14.017 22.1046 14.017 21ZM14.017 21V10C14.017 8.89543 14.9124 8 16.017 8H19.017C20.1216 8 21.017 8.89543 21.017 10V13C21.017 14.1046 20.1216 15 19.017 15H16.017M3 21L3 18C3 16.8954 3.89543 16 5 16H8C9.10457 16 10 16.8954 10 18V21C10 22.1046 9.10457 23 8 23H5C3.89543 23 3 22.1046 3 21ZM3 21V10C3 8.89543 3.89543 8 5 8H8C9.10457 8 10 8.89543 10 10V13C10 14.1046 9.10457 15 8 15H5"></path></svg>
                                    </div>
                                </div>

                                {{-- Rating Bintang --}}
                                <div class="flex mt-4 mb-2 space-x-1 relative z-10">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg class="w-4 h-4 {{ $i <= ($testimonial->rating ?: 5) ? 'text-yellow-400' : 'text-slate-200 dark:text-slate-700' }} fill-current" viewBox="0 0 20 20"><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/></svg>
                                    @endfor
                                </div>
                                
                                {{-- Pesan --}}
                                <div class="flex-grow overflow-hidden relative z-10">
                                    <p class="text-slate-600 dark:text-slate-400 italic leading-relaxed line-clamp-3">"{{ $testimonial->content }}"</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
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
