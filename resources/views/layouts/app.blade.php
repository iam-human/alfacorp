<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Alfacorp Nusantara')</title>
    <meta name="description" content="@yield('meta_description', 'Kami membantu mentransformasi bisnis Anda dengan teknologi terkini dan desain yang memukau.')">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="/images/favicon.png">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="font-sans text-neutral-dark dark:text-slate-100 bg-neutral-light dark:bg-slate-950 antialiased selection:bg-primary selection:text-white flex flex-col min-h-screen">
    
    

    @include('components.navbar')

    <main class="flex-grow">
        @yield('content')
    </main>

    @include('components.footer')

    {{-- Custom Overlay Scrollbar Thumb --}}
    <div id="custom-scroll-thumb"
         style="position: fixed; right: 4px; top: 0; width: 6px; height: 80px;
                background-color: #02bbff; border-radius: 9999px;
                z-index: 99999; opacity: 0; pointer-events: none;
                transition: opacity 0.3s, height 0.1s, transform 0.1s, width 0.2s, right 0.2s;"></div>

    {{-- Back to Top Button --}}
    <button id="back-to-top"
            onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
            style="display:none; position:fixed; bottom:2rem; right:2rem; z-index:9999;
                   width:48px; height:48px; border-radius:50%; border:none; cursor:pointer;
                   background-color:#02bbff;
                   box-shadow:0 4px 14px rgba(2,187,255,0.45);
                   color:white; align-items:center; justify-content:center;
                   transition: background-color 0.2s, transform 0.2s;"
            onmouseover="this.style.backgroundColor='#0099d6'; this.style.transform='translateY(-3px)';"
            onmouseout="this.style.backgroundColor='#02bbff'; this.style.transform='translateY(0)';"
            aria-label="Kembali ke atas">
        <svg width="22" height="22" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 15l7-7 7 7"/>
        </svg>
    </button>

    <script>
        (function() {
            // Scroll to Top Button
            var btn = document.getElementById('back-to-top');
            
            // Custom Floating Scrollbar Thumb
            var thumb = document.getElementById('custom-scroll-thumb');
            var scrollTimeout;
            
            function updateScrollbar() {
                if (!thumb) return;
                
                var docHeight = document.documentElement.scrollHeight;
                var winHeight = window.innerHeight;
                var scrollTop = window.scrollY || document.documentElement.scrollTop;
                
                var scrollRatio = winHeight / docHeight;
                
                // Hide if page fits in window or is too close to fit
                if (scrollRatio >= 0.99) {
                    thumb.style.opacity = '0';
                    return;
                }
                
                // Calculate dynamic thumb height (min 40px, max 200px)
                var thumbHeight = Math.min(200, Math.max(40, winHeight * scrollRatio));
                var maxScrollTop = docHeight - winHeight;
                var percentScrolled = scrollTop / maxScrollTop;
                
                // Position calculation with padding margins
                var maxThumbTop = winHeight - thumbHeight - 8; // 8px margin bottom
                var thumbTop = 4 + (percentScrolled * maxThumbTop); // 4px margin top
                
                thumb.style.height = thumbHeight + 'px';
                thumb.style.transform = 'translateY(' + thumbTop + 'px)';
                thumb.style.opacity = '0.65'; // Soft overlay primary color
                
                clearTimeout(scrollTimeout);
                scrollTimeout = setTimeout(function() {
                    thumb.style.opacity = '0';
                }, 1200); // Hide after 1.2s of inactivity
            }
            
            window.addEventListener('scroll', function() {
                // Scroll to top visibility check
                if (window.scrollY > 150) {
                    btn.style.display = 'flex';
                } else {
                    btn.style.display = 'none';
                }
                
                // Update scrollbar position
                updateScrollbar();
            }, { passive: true });
            
            window.addEventListener('resize', updateScrollbar, { passive: true });
            
            // Show scrollbar when mouse is near the right edge of the viewport
            window.addEventListener('mousemove', function(e) {
                if (window.innerWidth - e.clientX < 20) {
                    updateScrollbar();
                }
            }, { passive: true });
            
            // Initial render
            setTimeout(updateScrollbar, 300);
        })();
    </script>

    @livewireScripts
{{-- Global Preloader --}}
    <div id="global-preloader" style="z-index: 999999;" class="fixed inset-0 z-50 bg-white dark:bg-gray-950 flex items-center justify-center transition-all duration-700 ease-in-out">
        <div class="relative flex items-center justify-center w-full h-full">
            {{-- Glowing Pulse Rings --}}
            <div class="absolute w-62 h-62 md:w-78 md:h-78 bg-primary/5 rounded-full animate-ping" style="animation-duration: 2.5s;"></div>
            <div class="absolute w-54 h-54 md:w-66 md:h-=66 bg-primary/10 rounded-full animate-pulse" style="animation-duration: 1.5s;"></div>
            
            {{-- Logo --}}
            <img src="/images/preloader_logo.png" alt="AlfaCorp Loading" class="w-40 h-40 md:w-56 md:h-56 object-contain z-10 relative" style="animation: premiumHeartbeat 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;">
            
            <style>
                @keyframes premiumHeartbeat {
                    0%, 100% { transform: scale(1); filter: drop-shadow(0 0 15px rgba(2,187,255,0.3)); opacity: 0.9; }
                    50% { transform: scale(1.1); filter: drop-shadow(0 0 30px rgba(2,187,255,0.6)); opacity: 1; }
                }
            </style>
        </div>
    </div>
    <script>
        window.addEventListener('load', function() {
            const preloader = document.getElementById('global-preloader');
            if (preloader) {
                setTimeout(() => {
                    preloader.style.opacity = '0';
                    preloader.style.transform = 'scale(1.05)';
                    setTimeout(() => {
                        preloader.style.display = 'none';
                    }, 700);
                }, 1000); // Tunda 1 detik agar efek loading pas
            }
        });
    </script>
</body>
</html>
