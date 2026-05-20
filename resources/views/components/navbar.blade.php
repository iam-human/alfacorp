{{-- HEADER WRAPPER --}}
<div id="site-header"
     x-data="{
         isHome: {{ request()->routeIs('home') ? 'true' : 'false' }},
         scrolled: {{ request()->routeIs('home') ? 'false' : 'true' }},
         darkMode: localStorage.getItem('darkMode') === 'true',
         mobileOpen: false,
         toggleDark() {
             this.darkMode = !this.darkMode;
             localStorage.setItem('darkMode', this.darkMode);
             document.documentElement.classList.toggle('dark', this.darkMode);
         },
         init() {
             document.documentElement.classList.toggle('dark', this.darkMode);
             window.addEventListener('scroll', () => {
                 if (this.isHome) {
                     this.scrolled = window.scrollY > 20;
                 }
             });
         }
     }"
     class="fixed top-0 left-0 right-0 z-50">

    {{-- ── TOP BAR: blue zone includes text row + 30px extra strip for card overlap ── --}}
    <div class="hidden lg:block overflow-hidden transition-all duration-700 ease-in-out"
         :class="scrolled ? 'max-h-0 opacity-0' : 'max-h-14 opacity-100'"
         style="background-color:#02bbff;">

        {{-- Info row --}}
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex items-center justify-between py-3">
            {{-- Left: WA + Lokasi --}}
            <div class="flex items-center divide-x divide-white/40">
                <span class="flex items-center gap-2 text-white text-sm font-medium pr-6">
                    <svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    Probolinggo, Jawa Timur
                </span>
            </div>
            {{-- Right: Social --}}
            <div class="flex items-center gap-3">
                <span class="text-white text-sm font-medium">Ikuti Kami:</span>
                <!-- <a href="#" class="w-7 h-7 rounded-full bg-white/20 hover:bg-white/40 flex items-center justify-center transition-colors" aria-label="Facebook">
                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z"/></svg>
                </a>
                <a href="#" class="w-7 h-7 rounded-full bg-white/20 hover:bg-white/40 flex items-center justify-center transition-colors" aria-label="Twitter">
                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M8.29 20.251c7.547 0 11.675-6.253 11.675-11.675 0-.178 0-.355-.012-.53A8.348 8.348 0 0022 5.92a8.19 8.19 0 01-2.357.646 4.118 4.118 0 001.804-2.27 8.224 8.224 0 01-2.605.996 4.107 4.107 0 00-6.993 3.743 11.65 11.65 0 01-8.457-4.287 4.106 4.106 0 001.27 5.477A4.072 4.072 0 012.8 9.713v.052a4.105 4.105 0 003.292 4.022 4.095 4.095 0 01-1.853.07 4.108 4.108 0 003.834 2.85A8.233 8.233 0 012 18.407a11.616 11.616 0 006.29 1.84"/></svg>
                </a> -->
                <a href="#" class="w-7 h-7 rounded-full bg-white/20 hover:bg-white/40 flex items-center justify-center transition-colors" aria-label="Instagram">
                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M12.315 2c2.43 0 2.784.013 3.808.06 1.064.049 1.791.218 2.427.465a4.902 4.902 0 011.772 1.153 4.902 4.902 0 011.153 1.772c.247.636.416 1.363.465 2.427.048 1.067.06 1.407.06 4.123v.08c0 2.643-.012 2.987-.06 4.043-.049 1.064-.218 1.791-.465 2.427a4.902 4.902 0 01-1.153 1.772 4.902 4.902 0 01-1.772 1.153c-.636.247-1.363.416-2.427.465-1.067.048-1.407.06-4.123.06h-.08c-2.643 0-2.987-.012-4.043-.06-1.064-.049-1.791-.218-2.427-.465a4.902 4.902 0 01-1.772-1.153 4.902 4.902 0 01-1.153-1.772c-.247-.636-.416-1.363-.465-2.427-.047-1.024-.06-1.379-.06-3.808v-.63c0-2.43.013-2.784.06-3.808.049-1.064.218-1.791.465-2.427a4.902 4.902 0 011.153-1.772A4.902 4.902 0 015.45 2.525c.636-.247 1.363-.416 2.427-.465C8.901 2.013 9.256 2 11.685 2h.63zm-.081 1.802h-.468c-2.456 0-2.784.011-3.807.058-.975.045-1.504.207-1.857.344-.467.182-.8.398-1.15.748-.35.35-.566.683-.748 1.15-.137.353-.3.882-.344 1.857-.047 1.023-.058 1.351-.058 3.807v.468c0 2.456.011 2.784.058 3.807.045.975.207 1.504.344 1.857.182.466.399.8.748 1.15.35.35.683.566 1.15.748.353.137.882.3 1.857.344 1.054.048 1.37.058 4.041.058h.08c2.597 0 2.917-.01 3.96-.058.976-.045 1.505-.207 1.858-.344.466-.182.8-.398 1.15-.748.35-.35.566-.683.748-1.15.137-.353.3-.882.344-1.857.048-1.055.058-1.37.058-4.041v-.08c0-2.597-.01-2.917-.058-3.96-.045-.976-.207-1.505-.344-1.858a3.097 3.097 0 00-.748-1.15 3.098 3.098 0 00-1.15-.748c-.353-.137-.882-.3-1.857-.344-1.023-.047-1.351-.058-3.807-.058zM12 6.865a5.135 5.135 0 110 10.27 5.135 5.135 0 010-10.27zm0 1.802a3.333 3.333 0 100 6.666 3.333 3.333 0 000-6.666zm5.338-3.205a1.2 1.2 0 110 2.4 1.2 1.2 0 010-2.4z"/></svg>
                </a>
                <a href="#" class="w-7 h-7 rounded-full bg-white/20 hover:bg-white/40 flex items-center justify-center transition-colors" aria-label="YouTube">
                    <svg class="w-3.5 h-3.5 text-white" fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 00-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 00.502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 002.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 002.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>
                </a>
            </div>
        </div>

    </div>

    <div class="hidden lg:block transition-all duration-700 ease-in-out"
         :class="scrolled ? 'px-4 sm:px-6 lg:px-8 mt-0' : 'px-0'">
        <div :class="scrolled ? 'max-w-7xl mx-auto' : ''">
            <nav class="bg-white dark:bg-gray-900 transition-all duration-700 ease-in-out"
                 :class="scrolled ? 'rounded-2xl shadow-xl' : 'shadow-md'">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-3 flex items-center justify-between">

                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 flex-shrink-0">
                    <img src="/images/logo.png" alt="AlfaCorp Logo" class="w-9 h-9 object-contain flex-shrink-0">
                    <span class="text-xl font-heading font-bold text-slate-900 dark:text-white">
                        Alfa<span style="color:#02bbff;">Corp</span>
                    </span>
                </a>

                {{-- Nav Links --}}
                <div class="flex items-center gap-1">
                    @php
                        $links = [
                            ['name' => 'Beranda',   'route' => 'home'],
                            ['name' => 'Tentang',   'route' => 'about'],
                            ['name' => 'Layanan',   'route' => 'services'],
                            ['name' => 'Portfolio', 'route' => 'portfolio'],
                            ['name' => 'Tim',       'route' => 'team'],
                            ['name' => 'Kontak',    'route' => 'contact'],
                        ];
                    @endphp
                    @foreach ($links as $link)
                        <a href="{{ route($link['route']) }}"
                           class="px-4 py-2 rounded-lg text-sm font-semibold transition-all duration-200 {{ request()->routeIs($link['route'].'*') ? 'text-[#0099d6] bg-[#e0f8ff]' : 'text-slate-600 dark:text-slate-300 hover:text-[#02bbff] hover:bg-[#e0f8ff]' }}">
                            {{ $link['name'] }}
                        </a>
                    @endforeach
                </div>

                {{-- Right: dark toggle + CTA + hamburger --}}
                <div class="flex items-center gap-2">
                    <button @click="toggleDark()"
                            class="w-9 h-9 rounded-lg flex items-center justify-center transition-all text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800"
                            title="Toggle dark mode">
                        <svg x-show="!darkMode" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/>
                        </svg>
                        <svg x-show="darkMode" style="display:none" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </button>

                    <a href="{{ route('contact') }}"
                       class="inline-flex items-center gap-2 px-5 py-2.5 rounded-xl font-bold text-sm text-white transition-all duration-200 hover:-translate-y-0.5 hover:shadow-lg"
                       style="background: linear-gradient(135deg, #02bbff, #0099d6); box-shadow:0 4px 14px rgba(2,187,255,.4);">
                        Mulai Proyek
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </nav>
        </div>
    </div>

    {{-- ── MOBILE NAV ── --}}
    <nav class="lg:hidden w-full bg-white/95 dark:bg-gray-900/95 backdrop-blur-md border-b border-slate-100 dark:border-gray-800 shadow-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="flex items-center justify-between py-4">
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 flex-shrink-0">
                    <img src="/images/logo.png" alt="AlfaCorp Logo" class="w-9 h-9 object-contain flex-shrink-0">
                    <span class="text-xl font-heading font-bold text-slate-900 dark:text-white">
                        Alfa<span style="color:#02bbff;">Corp</span>
                    </span>
                </a>
                <div class="flex items-center gap-2">
                    <button @click="toggleDark()" class="w-9 h-9 rounded-lg flex items-center justify-center text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-gray-800">
                        <svg x-show="!darkMode" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                        <svg x-show="darkMode" style="display:none" class="w-4.5 h-4.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                    </button>
                    <button @click="mobileOpen = !mobileOpen"
                            class="w-10 h-10 flex flex-col items-center justify-center gap-1.5 rounded-lg transition-all text-slate-700 dark:text-slate-300 hover:bg-slate-100 dark:hover:bg-gray-800">
                        <span class="block w-5 h-0.5 bg-current transition-all duration-300" :class="mobileOpen ? 'rotate-45 translate-y-2' : ''"></span>
                        <span class="block w-5 h-0.5 bg-current transition-all duration-300" :class="mobileOpen ? 'opacity-0' : ''"></span>
                        <span class="block w-5 h-0.5 bg-current transition-all duration-300" :class="mobileOpen ? '-rotate-45 -translate-y-2' : ''"></span>
                    </button>
                </div>
            </div>
        </div>
        <div x-show="mobileOpen"
             x-transition:enter="transition ease-out duration-250"
             x-transition:enter-start="opacity-0 -translate-y-3"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-180"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-3"
             style="display:none"
             class="absolute top-full left-0 w-full bg-white dark:bg-gray-900 border-b border-slate-100 dark:border-gray-800 shadow-xl">
            <div class="px-4 py-5 space-y-1">
                @foreach ($links as $link)
                    <a href="{{ route($link['route']) }}"
                       @click="mobileOpen = false"
                       class="flex items-center px-4 py-3.5 rounded-xl text-base font-medium transition-all min-h-[48px] {{ request()->routeIs($link['route'].'*') ? 'text-[#0099d6] bg-[#e0f8ff]' : 'text-slate-700 dark:text-slate-300 hover:bg-[#e0f8ff] hover:text-[#02bbff]' }}">
                        {{ $link['name'] }}
                    </a>
                @endforeach
                <div class="pt-3 border-t border-slate-100 dark:border-gray-800">
                    <a href="{{ route('contact') }}"
                       class="flex items-center justify-center gap-2 w-full py-3 rounded-xl font-bold text-sm text-white transition-all shadow-md active:scale-[0.98]"
                       style="background: linear-gradient(135deg, #02bbff, #0099d6);">
                        Mulai Proyek
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                        </svg>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</div>


