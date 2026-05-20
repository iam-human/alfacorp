import os
import re

dir_path = "/Users/m/Herd/alfacorp/resources/views/pages"
files = [f for f in os.listdir(dir_path) if f.endswith('.blade.php') and f != 'home.blade.php']

for file in files:
    file_path = os.path.join(dir_path, file)
    with open(file_path, 'r') as f:
        content = f.read()
    
    # We replace the previous img and overlay div
    old_img_regex = r'<img src="https://images\.unsplash\.com/photo-1451187580459-43490279c0fa\?auto=format&fit=crop&w=1920&q=80"[^>]+>'
    
    new_img = '<img src="/images/header_bg.jpg" class="absolute inset-0 w-full h-full object-cover z-0" alt="Hero Background">'
    
    content = re.sub(old_img_regex, new_img, content)
    
    # Update overlays to dark blue effect
    old_overlay_1 = r'<div class="absolute inset-0 bg-\[#02bbff\]/90 mix-blend-multiply z-0"></div>'
    old_overlay_2 = r'<div class="absolute inset-0 bg-gradient-to-t from-slate-900/80 to-transparent z-0"></div>'
    
    new_overlay_1 = '<div class="absolute inset-0 bg-blue-900/60 mix-blend-multiply z-0"></div>'
    new_overlay_2 = '<div class="absolute inset-0 bg-slate-900/60 z-0"></div>'
    
    content = content.replace(old_overlay_1, new_overlay_1)
    content = content.replace(old_overlay_2, new_overlay_2)
    
    with open(file_path, 'w') as f:
        f.write(content)
print("Updated background images!")
