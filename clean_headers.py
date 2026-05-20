import os
import re

dir_path = "/Users/m/Herd/alfacorp/resources/views/pages"
files = [f for f in os.listdir(dir_path) if f.endswith('.blade.php') and f != 'home.blade.php']

for file in files:
    file_path = os.path.join(dir_path, file)
    with open(file_path, 'r') as f:
        content = f.read()
    
    # We want to find the header container. It usually starts with <div class="max-w-7xl... or max-w-4xl...
    # and ends right before </section>
    
    # We can just extract the title from the <h1> and reconstruct it cleanly
    title_match = re.search(r'<h1[^>]*>(.*?)</h1>', content)
    category_match = re.search(r'<span[^>]*bg-white/20[^>]*>(.*?)</span>', content)
    
    if title_match:
        title = title_match.group(1).strip()
        
        # If there's a category badge (like in portfolio-detail or blog-detail), keep it
        category_html = f'<span class="inline-block bg-white/20 backdrop-blur-sm px-4 py-1.5 rounded-full text-sm font-bold tracking-wider mb-3 uppercase text-white shadow-sm">{category_match.group(1).strip()}</span>' if category_match else ''
        
        # The new clean container
        new_container = f"""<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-start md:items-center justify-between gap-6 md:gap-0 mt-4 md:mt-0 text-left">
        <div>
            {category_html}
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-heading font-black text-white drop-shadow-sm tracking-tight">{title}</h1>
        </div>
        <div class="flex items-center gap-2 text-white/90 font-semibold text-sm sm:text-base relative z-10 bg-white/10 px-5 py-2.5 rounded-2xl backdrop-blur-md border border-white/20 shadow-lg">
            <a href="{{{{ route('home') }}}}" class="hover:text-white transition-colors">Beranda</a>
            <span class="text-white/50">/</span>
            <span class="font-bold text-white">{title}</span>
        </div>
    </div>"""
        
        # Replace everything inside the <section ...> ... </section> that is after the background divs
        # Let's find the position of <div class="max-w-
        start_idx = content.find('<div class="max-w-')
        if start_idx != -1:
            # But wait, there might be other max-w- later in the file.
            # We want the FIRST one inside the hero section.
            hero_end = content.find('</section>')
            if start_idx < hero_end:
                old_inner = content[start_idx:hero_end].strip()
                content = content.replace(old_inner, new_container, 1)
                
                # Double check to remove the author info from blog-detail if it was inside the h1 area
                # Actually, blog detail had author info. The user said "hapus subtitle". 
                # Author info might be lost. Let's just restore it if it's blog-detail.
                if 'blog-detail.blade.php' in file:
                    # author info was:
                    author_html = """
        @if($blog->author_name)
        <div class="flex items-center text-white/80 mt-4 font-medium">
            <svg class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
            Oleh {{ $blog->author_name }}
        </div>
        @endif"""
                    content = content.replace(f'</h1>', f'</h1>{author_html}')
                
                with open(file_path, 'w') as f:
                    f.write(content)
                print("Updated " + file)

print("Done")
