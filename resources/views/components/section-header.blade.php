<div class="text-center max-w-3xl mx-auto mb-16" data-aos="fade-up">
    @if(isset($label))
        <span class="text-primary text-sm font-semibold tracking-widest uppercase block mb-3">{{ $label }}</span>
    @endif
    
    <h2 class="text-slate-900 text-4xl font-heading font-bold mb-6 leading-tight">{{ $title }}</h2>
    
    @if(isset($subtitle))
        <p class="text-slate-500 text-lg">{{ $subtitle }}</p>
    @endif
</div>
