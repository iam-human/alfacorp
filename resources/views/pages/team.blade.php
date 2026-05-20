@extends('layouts.app')

@section('title', 'Tim Kami')

@section('content')
<!-- Hero Banner -->
<section class="text-white pt-40 lg:pt-48 pb-20 relative overflow-hidden">
    <img src="/images/header_bg.jpg" class="absolute inset-0 w-full h-full object-cover z-0" alt="Hero Background">
    <div class="absolute inset-0 bg-[#02bbff]/90 mix-blend-multiply z-0"></div>
    <div class="absolute inset-0 bg-slate-900/60 z-0"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 md:gap-0 mt-8 md:mt-0 text-center md:text-left">
        <div>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-heading font-black text-white drop-shadow-sm tracking-tight">Tim Kami</h1>
        </div>
        <div class="flex items-center gap-2 text-white/90 font-semibold text-sm sm:text-base relative z-10 bg-white/10 px-5 py-2.5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <span class="text-white/50">/</span>
            <span class="font-bold text-white">Tim Kami</span>
        </div>
    </div>
</section>

<!-- Team Grid Section -->
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
        closeModal() { this.modalOpen = false; setTimeout(() => this.activeTeam = null, 300); }
    }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        @php
            $count = $teams->count();
            $useThreeCols = ($count > 4 && ($count % 4 === 1));
            $itemWidthClass = $useThreeCols 
                ? 'w-full max-w-[320px] sm:max-w-none sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.35rem)]' 
                : 'w-full max-w-[320px] sm:max-w-none sm:w-[calc(50%-1rem)] lg:w-[calc(33.333%-1.35rem)] xl:w-[calc(25%-1.5rem)]';
        @endphp
        <div class="flex flex-wrap justify-center gap-x-8 gap-y-28 pb-20">
            @foreach($teams as $index => $member)
                <div class="{{ $itemWidthClass }} relative" 
                     data-aos="fade-up" data-aos-delay="{{ $index * 100 }}">
                    
                    {{-- Photo Container (Only hover/click triggers here) --}}
                    <div class="group peer relative aspect-[4/5] rounded-[2rem] overflow-hidden cursor-pointer shadow-sm hover:shadow-xl transition-all duration-500"
                         @click="openModal({{ $index }})">
                        <img src="{{ Storage::url($member->photo) }}" alt="{{ $member->name }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700">
                        
                        {{-- Translucent Inner Blue Glow Overlay (Cahaya dari Pinggiran Dalam Card) --}}
                        <div class="absolute inset-0 rounded-[2rem] pointer-events-none z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-500 shadow-[inset_0_0_35px_rgba(2,187,255,0.55)]"></div>
                    </div>

                    {{-- Floating Info Box (Only moves on sibling peer-hover) --}}
                    <div class="absolute bottom-0 inset-x-0 w-[90%] mx-auto bg-white dark:bg-gray-800 rounded-3xl p-5 shadow-xl border border-slate-100 dark:border-gray-700 translate-y-1/2 transform peer-hover:-translate-y-2 transition-all duration-500">
                        <div class="relative">
                            <h4 class="text-lg font-bold text-slate-900 dark:text-white pr-10 truncate">{{ $member->name }}</h4>
                            <p class="text-sm text-primary font-medium mt-1">{{ $member->position }}</p>
                            
                            {{-- Info Icon Trigger with Floating Social Tooltip --}}
                            <div class="absolute top-0 right-0 group/info">
                                {{-- Social Media Tooltip Popup --}}
                                @if($member->instagram_url || $member->linkedin_url)
                                <div class="absolute bottom-full left-1/2 -translate-x-1/2 mb-1 flex flex-col gap-2 bg-white dark:bg-gray-700 border border-slate-100 dark:border-gray-600 rounded-full p-1.5 shadow-xl opacity-0 translate-y-2 pointer-events-none group-hover/info:opacity-100 group-hover/info:translate-y-0 group-hover/info:pointer-events-auto transition-all duration-300 z-30 before:content-[''] before:absolute before:-bottom-2 before:inset-x-0 before:h-2">
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
                                @endif

                                {{-- Icon Circle Trigger --}}
                                <div class="w-8 h-8 rounded-full bg-primary/10 flex items-center justify-center text-primary transition-all duration-300 peer-hover:bg-primary peer-hover:text-white hover:bg-primary hover:text-white cursor-pointer shadow-sm z-10">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 111.063.852l-.708 2.836a.75.75 0 001.063.852l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z" />
                                    </svg>
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
                                                <svg class="w-5 h-5 text-pink-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259 0 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
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

@endsection
