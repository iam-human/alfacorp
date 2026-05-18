<div>
    @if($successMessage)
        <div class="bg-green-50 text-green-800 rounded-xl p-6 mb-8 flex items-start" x-data="{ show: true }" x-show="show" x-transition>
            <svg class="w-6 h-6 text-green-500 mr-3 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            <div>
                <h4 class="text-lg font-bold mb-1">Pesan Berhasil Terkirim!</h4>
                <p class="text-green-700">Terima kasih telah menghubungi kami. Tim kami akan segera merespon pesan Anda secepatnya.</p>
            </div>
            <button @click="show = false" class="ml-auto text-green-500 hover:text-green-700">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
            </button>
        </div>
    @endif

    <form wire:submit="submit" class="space-y-6">
        <!-- Honeypot -->
        <input type="text" wire:model="honeypot" class="hidden" style="display: none;">

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="name" class="block text-sm font-medium text-slate-700 mb-2">Nama Lengkap *</label>
                <input type="text" id="name" wire:model.blur="name" class="w-full px-4 py-3 rounded-xl border {{ $errors->has('name') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20' }} outline-none transition-shadow" placeholder="Masukkan nama Anda">
                @error('name') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-slate-700 mb-2">Email *</label>
                <input type="email" id="email" wire:model.blur="email" class="w-full px-4 py-3 rounded-xl border {{ $errors->has('email') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20' }} outline-none transition-shadow" placeholder="nama@email.com">
                @error('email') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="phone" class="block text-sm font-medium text-slate-700 mb-2">Nomor Telepon/WA</label>
                <input type="text" id="phone" wire:model.blur="phone" class="w-full px-4 py-3 rounded-xl border {{ $errors->has('phone') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20' }} outline-none transition-shadow" placeholder="0812xxxxxx">
                @error('phone') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
            <div>
                <label for="service" class="block text-sm font-medium text-slate-700 mb-2">Layanan yang Diminati</label>
                <select id="service" wire:model="service_id" class="w-full px-4 py-3 rounded-xl border {{ $errors->has('service_id') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20' }} outline-none transition-shadow bg-white">
                    <option value="">Pilih Layanan</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}">{{ $service->title }}</option>
                    @endforeach
                </select>
                @error('service_id') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
            </div>
        </div>

        <div>
            <label for="message" class="block text-sm font-medium text-slate-700 mb-2">Pesan *</label>
            <textarea id="message" wire:model.blur="message" rows="5" class="w-full px-4 py-3 rounded-xl border {{ $errors->has('message') ? 'border-red-500 focus:border-red-500 focus:ring-red-500/20' : 'border-slate-200 focus:border-primary focus:ring-primary/20' }} outline-none transition-shadow" placeholder="Ceritakan detail kebutuhan atau proyek Anda..."></textarea>
            @error('message') <span class="text-red-500 text-xs mt-1 block">{{ $message }}</span> @enderror
        </div>

        <button type="submit" class="w-full md:w-auto bg-primary text-white px-8 py-4 rounded-xl font-bold hover:bg-primary-dark transition-colors duration-300 flex items-center justify-center disabled:opacity-70" wire:loading.attr="disabled">
            <span wire:loading.remove>Kirim Pesan Sekarang</span>
            <span wire:loading>
                <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white inline-block" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                Mengirim...
            </span>
        </button>
    </form>
</div>
