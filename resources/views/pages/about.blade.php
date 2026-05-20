@extends('layouts.app')

@section('title', 'Tentang Kami')

@section('content')
<!-- Hero Banner -->
<section class="text-white pt-40 lg:pt-48 pb-20 relative overflow-hidden">
    <img src="/images/header_bg.jpg" class="absolute inset-0 w-full h-full object-cover z-0" alt="Hero Background">
    <div class="absolute inset-0 bg-[#02bbff]/90 mix-blend-multiply z-0"></div>
    <div class="absolute inset-0 bg-slate-900/60 z-0"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 md:gap-0 mt-8 md:mt-0 text-center md:text-left">
        <div>
            
            <h1 class="text-3xl md:text-5xl lg:text-6xl font-heading font-black text-white drop-shadow-sm tracking-tight">Tentang Kami</h1>
        </div>
        <div class="flex items-center gap-2 text-white/90 font-semibold text-sm sm:text-base relative z-10 bg-white/10 px-5 py-2.5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
            <a href="{{ route('home') }}" class="hover:text-white transition-colors">Beranda</a>
            <span class="text-white/50">/</span>
            <span class="font-bold text-white">Tentang Kami</span>
        </div>
    </div>
</section>

<!-- Story -->
<section class="py-20 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <div>
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Tim Kami" class="rounded-2xl shadow-lg">
            </div>
            <div>
                <span class="text-primary text-sm font-semibold tracking-widest uppercase block mb-3">Cerita Kami</span>
                <h2 class="text-3xl font-heading font-bold mb-6 text-slate-900 dark:text-white">Inovasi yang Mengubah Cara Bisnis Bekerja</h2>
                <div class="prose prose-lg text-neutral-600 dark:text-slate-300">
                    <p>Berdiri sejak tahun 2012, CompanyLogo bermula dari semangat sekelompok talenta muda yang ingin memberikan dampak positif melalui teknologi. Kami percaya bahwa setiap bisnis berhak mendapatkan solusi digital terbaik yang efisien dan tepat sasaran.</p>
                    <p>Perjalanan kami penuh dengan tantangan, namun komitmen terhadap kualitas dan kepuasan klien selalu menjadi kompas utama kami. Kini, kami telah bertransformasi menjadi salah satu penyedia layanan IT terkemuka dengan portofolio yang terus berkembang.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission -->
<section class="py-20 bg-surface-alt dark:bg-gray-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-white dark:bg-gray-900 p-10 rounded-2xl shadow-sm border border-slate-100 dark:border-gray-800 text-center hover:shadow-md transition-shadow">
                <div class="w-16 h-16 bg-primary-light text-primary rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/></svg>
                </div>
                <h3 class="text-2xl font-heading font-bold mb-4 text-slate-900 dark:text-white">Visi Kami</h3>
                <p class="text-neutral-600 dark:text-slate-300">Menjadi mitra transformasi digital paling terpercaya yang mendorong inovasi dan pertumbuhan berkelanjutan bagi bisnis di seluruh dunia.</p>
            </div>
            <div class="bg-white dark:bg-gray-900 p-10 rounded-2xl shadow-sm border border-slate-100 dark:border-gray-800 text-center hover:shadow-md transition-shadow">
                <div class="w-16 h-16 bg-secondary/10 text-secondary rounded-2xl flex items-center justify-center mx-auto mb-6">
                    <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21l-7-5-7 5V5a2 2 0 012-2h10a2 2 0 012 2v16z"/></svg>
                </div>
                <h3 class="text-2xl font-heading font-bold mb-4 text-slate-900 dark:text-white">Misi Kami</h3>
                <p class="text-neutral-600 dark:text-slate-300">Menyediakan solusi teknologi inovatif, memberdayakan bisnis melalui desain solutif, dan memberikan nilai tambah melalui kolaborasi strategis dengan klien.</p>
            </div>
        </div>
    </div>
</section>

<!-- Values -->
<section class="py-20 bg-white dark:bg-gray-950">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        @include('components.section-header', [
            'title' => 'Nilai Inti Kami',
            'subtitle' => 'Prinsip yang membimbing setiap langkah dan keputusan kami.'
        ])
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-12">
            <div>
                <h4 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">Integritas</h4>
                <p class="text-neutral-500 dark:text-slate-400">Kami menjunjung tinggi kejujuran, transparansi, dan etika profesional dalam setiap interaksi dan layanan.</p>
            </div>
            <div>
                <h4 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">Inovasi</h4>
                <p class="text-neutral-500 dark:text-slate-400">Kami tidak pernah berhenti belajar dan selalu mencari cara baru yang lebih efektif dan efisien.</p>
            </div>
            <div>
                <h4 class="text-xl font-bold mb-3 text-slate-900 dark:text-white">Kolaborasi</h4>
                <p class="text-neutral-500 dark:text-slate-400">Kerja sama tim yang kuat dan hubungan kemitraan dengan klien adalah kunci kesuksesan bersama.</p>
            </div>
        </div>
    </div>
</section>

@endsection
