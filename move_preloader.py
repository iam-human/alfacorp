import re

file_path = "/Users/m/Herd/alfacorp/resources/views/layouts/app.blade.php"
with open(file_path, 'r') as f:
    content = f.read()

# Extract preloader block
preloader_match = re.search(r'(\{\{-- Global Preloader --\}\}.*?</script>)', content, re.DOTALL)
if preloader_match:
    preloader_block = preloader_match.group(1)
    
    # Remove from current location
    content = content.replace(preloader_block, '')
    
    # Fix the z-index just in case tailwind JIT didn't catch it
    preloader_block = preloader_block.replace('z-[999999]', 'z-50') # remove it from class
    preloader_block = preloader_block.replace('id="global-preloader"', 'id="global-preloader" style="z-index: 999999;"')
    
    # Insert right before </body>
    content = content.replace('</body>', preloader_block + '\n</body>')
    
    with open(file_path, 'w') as f:
        f.write(content)
    print("Preloader moved and fixed")
else:
    print("Preloader not found")
