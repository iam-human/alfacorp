import os
import re

dir_path = "/Users/m/Herd/alfacorp/resources/views/pages"
files = ['blog-detail.blade.php', 'portfolio-detail.blade.php']

for file in files:
    file_path = os.path.join(dir_path, file)
    with open(file_path, 'r') as f:
        content = f.read()
    
    title_match = re.search(r'<h1[^>]*>(.*?)</h1>', content)
    subtitle_match = re.search(r'<p class="hidden md:block[^>]*>(.*?)</p>', content)
    
    if title_match:
        title = title_match.group(1).strip()
        subtitle = subtitle_match.group(1).strip() if subtitle_match else ""
        
        if subtitle:
            subtitle_html = f'<p class="hidden lg:block text-white/80 text-lg max-w-xl mt-3">{subtitle}</p>'
        else:
            subtitle_html = ''
            
        new_container = f"""<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 flex flex-col md:flex-row items-center justify-between gap-6 md:gap-0 mt-4 md:mt-0 text-center md:text-left">
        <div>
            <h1 class="text-4xl md:text-5xl font-heading font-bold text-white">{title}</h1>
            {subtitle_html}
        </div>
        <div class="flex items-center justify-center md:justify-end gap-2 text-white/90 font-medium text-sm sm:text-base relative z-10">
            <a href="{{{{ route('home') }}}}" class="hover:text-white transition-colors">Beranda</a>
            <span>/</span>
            <span class="font-bold text-white">{title}</span>
        </div>
    </div>"""
        
        start_idx = content.find('<div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 text-center">')
        if start_idx != -1:
            end_idx = content.find('</section>', start_idx)
            if end_idx != -1:
                old_section_inner = content[start_idx:end_idx].strip()
                content = content.replace(old_section_inner, new_container)
                
                with open(file_path, 'w') as f:
                    f.write(content)
                print("Updated " + file)

print("Done")
