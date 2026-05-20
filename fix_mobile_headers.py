import os
import glob

files = glob.glob('/Users/m/Herd/alfacorp/resources/views/pages/*.blade.php')

for file in files:
    if 'home.blade.php' in file:
        continue
        
    with open(file, 'r') as f:
        content = f.read()
        
    # Replace container class
    old_container = 'items-start md:items-center justify-between gap-6 md:gap-0 mt-4 md:mt-0 text-left'
    new_container = 'items-center justify-between gap-6 md:gap-0 mt-8 md:mt-0 text-center md:text-left'
    
    # Replace h1 class
    old_h1 = 'text-4xl md:text-5xl lg:text-6xl font-heading font-black'
    new_h1 = 'text-3xl md:text-5xl lg:text-6xl font-heading font-black'
    
    # Replace container for portfolio-detail if different? No, my previous script made them all the same format.
    # But wait, in the previous script I used:
    # "flex flex-col md:flex-row items-start md:items-center justify-between gap-6 md:gap-0 mt-4 md:mt-0 text-left"
    
    updated = content.replace(old_container, new_container)
    updated = updated.replace(old_h1, new_h1)
    
    if updated != content:
        with open(file, 'w') as f:
            f.write(updated)
        print("Updated " + os.path.basename(file))
print("Done!")
