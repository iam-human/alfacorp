@extends('layouts.app')

@section('title', 'Hubungi Kami')

@section('content')
<!-- Hero Banner -->
<section class="bg-primary text-white pt-32 pb-20 relative overflow-hidden">
    <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(circle at 2px 2px, white 1px, transparent 0); background-size: 24px 24px;"></div>
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-heading font-bold mb-4">Hubungi Kami</h1>
        <p class="text-primary-light text-lg max-w-2xl mx-auto">Kami siap mendengarkan kebutuhan bisnis Anda dan membantu merancang solusi digital terbaik.</p>
    </div>
</section>

<!-- Contact Form Section -->
<section class="py-24 bg-surface-alt">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-12">
            <!-- Info -->
            <div>
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 h-full">
                    <h3 class="text-2xl font-heading font-bold mb-8 text-slate-900">Informasi Kontak</h3>
                    
                    <div class="space-y-8">
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary-light text-primary rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Kantor Pusat</h4>
                                <p class="text-neutral-500">Jl. Sudirman No. 123, SCBD<br>Jakarta Selatan, 12190<br>Indonesia</p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary-light text-primary rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Email</h4>
                                <p class="text-neutral-500">
                                    <a href="mailto:halo@company.com" class="hover:text-primary transition-colors">halo@company.com</a><br>
                                    <a href="mailto:support@company.com" class="hover:text-primary transition-colors">support@company.com</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary-light text-primary rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Telepon & WA</h4>
                                <p class="text-neutral-500">
                                    <a href="tel:+6281234567890" class="hover:text-primary transition-colors">+62 812 3456 7890</a><br>
                                    <a href="tel:0215550123" class="hover:text-primary transition-colors">(021) 555-0123</a>
                                </p>
                            </div>
                        </div>
                        
                        <div class="flex items-start">
                            <div class="w-12 h-12 bg-primary-light text-primary rounded-xl flex items-center justify-center flex-shrink-0 mr-4">
                                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                            </div>
                            <div>
                                <h4 class="font-bold text-lg mb-1">Jam Kerja</h4>
                                <p class="text-neutral-500">Senin - Jumat: 09:00 - 17:00 WIB<br>Sabtu - Minggu: Tutup</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-12 pt-8 border-t border-border">
                        <h4 class="font-bold text-lg mb-4">Media Sosial</h4>
                        <div class="flex space-x-4">
                            <a href="#" class="w-10 h-10 rounded-full bg-surface-alt flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259 0 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                            </a>
                            <a href="#" class="w-10 h-10 rounded-full bg-surface-alt flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-colors">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-8 md:p-12">
                    <h3 class="text-2xl font-heading font-bold mb-2 text-slate-900">Kirim Pesan</h3>
                    <p class="text-neutral-500 mb-8">Silakan isi formulir di bawah ini dan kami akan segera menghubungi Anda.</p>
                    
                    @livewire('contact-form')
                </div>
            </div>
        </div>
    </div>
</section>
        </div>
    </div>
</section>

<!-- Maps -->
<section class="h-96 w-full bg-slate-200">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126920.2400977227!2d106.74418659109033!3d-6.229746499999993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x100c5e82dd4b820!2sJakarta%20Selatan%2C%20Kota%20Jakarta%20Selatan%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1715410142316!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</section>

@endsection
