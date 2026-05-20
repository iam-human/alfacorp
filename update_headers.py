import os
import re

dir_path = "/Users/m/Herd/alfacorp/resources/views/pages"
files = [f for f in os.listdir(dir_path) if f.endswith('.blade.php') and f != 'home.blade.php']

for file in files:
    file_path = os.path.join(dir_path, file)
    with open(file_path, 'r') as f:
        content = f.read()
    
    old_bg = r'<section class="bg-primary text-white pt-40 lg:pt-48 pb-20 relative overflow-hidden">\s*<div class="absolute inset-0 opacity-10" style="background-image:[^>]+></div>'
    new_bg = """<section class="text-white pt-40 lg:pt-48 pb-20 relative overflow-hidden">
    <img src="https://images.unsplash.com/photo-1451187580459-43490279c0fa?auto=format&fit=crop&w=1920&q=80" class="absolute inset-0 w-full h-full object-cover z-0 opacity-40 dark:opacity-20" alt="Hero Background">
    <div class="absolute inset-0 bg-[#02bbff]/90 mix-blend-multiply z-0"></div>
    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent z-0"></div>"""
    
    # Check if this file has the old bg
    if re.search(old_bg, content):
        content = re.sub(old_bg, new_bg, content)
        
        # Hide subtitle on mobile
        content = content.replace('class="text-primary-light text-lg max-w-2xl mx-auto"', 'class="hidden md:block text-white/90 text-lg max-w-2xl mx-auto relative z-10"')
        
        # Add breadcrumbs right after h1
        # The h1 matching is slightly tricky, we'll match up to </h1>
        content = re.sub(r'(<h1[^>]*>)(.*?)(</h1>)', lambda m: m.group(1) + m.group(2) + m.group(3) + '\n        <div class="flex items-center justify-center gap-2 text-white/90 font-medium text-sm sm:text-base mb-6 mt-3 relative z-10">\n            <a href="{{ route(\'home\') }}" class="hover:text-white transition-colors">Beranda</a>\n            <span>/</span>\n            <span>' + m.group(2).strip() + '</span>\n        </div>', content)
        
        with open(file_path, 'w') as f:
            f.write(content)
        print("Updated " + file)

print("Done")
