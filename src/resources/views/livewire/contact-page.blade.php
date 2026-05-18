<div>
    <section class="py-20 px-6">
        <div class="max-w-2xl mx-auto">
            <div class="text-center mb-14">
                <h1 class="text-4xl md:text-5xl font-bold mb-3">Get In Touch</h1>
                <p class="text-gray-500">Punya pertanyaan atau project? Hubungi saya!</p>
            </div>

            @if (session('success'))
                <div class="mb-6 p-4 bg-green-500/10 border border-green-500/30 rounded-xl text-green-400 text-center">
                    {{ session('success') }}
                </div>
            @endif

            <div class="bg-gray-900 border border-gray-800 rounded-2xl p-8">
                <div class="space-y-6">
                    {{-- Nama --}}
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Nama Lengkap</label>
                        <input wire:model="name"
                               type="text"
                               placeholder="John Doe"
                               class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-gray-100 placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition" />
                        @error('name')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email & Telepon (2 kolom) --}}
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Email</label>
                            <input wire:model="email"
                                   type="email"
                                   placeholder="john@example.com"
                                   class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-gray-100 placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition" />
                            @error('email')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-sm text-gray-400 mb-2">Nomor Telepon</label>
                            <input wire:model="phone"
                                   type="tel"
                                   placeholder="+62 812 3456 7890"
                                   class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-gray-100 placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition" />
                            @error('phone')
                                <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    {{-- Lokasi --}}
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Lokasi / Kota</label>
                        <input wire:model="location"
                               type="text"
                               placeholder="Jakarta, Indonesia"
                               class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-gray-100 placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition" />
                        @error('location')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Subject --}}
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Subject</label>
                        <input wire:model="subject"
                               type="text"
                               placeholder="Diskusi Project"
                               class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-gray-100 placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition" />
                        @error('subject')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Pesan --}}
                    <div>
                        <label class="block text-sm text-gray-400 mb-2">Pesan</label>
                        <textarea wire:model="message"
                                  rows="5"
                                  placeholder="Tulis pesanmu di sini..."
                                  class="w-full bg-gray-800 border border-gray-700 rounded-xl px-4 py-3 text-gray-100 placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition resize-none"></textarea>
                        @error('message')
                            <p class="mt-1 text-xs text-red-400">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <button wire:click="submit"
                            wire:loading.attr="disabled"
                            class="w-full py-4 bg-indigo-600 hover:bg-indigo-500 disabled:opacity-50 rounded-xl font-semibold transition-all hover:scale-[1.01] active:scale-100">
                        <span wire:loading.remove wire:target="submit">Kirim Pesan</span>
                        <span wire:loading wire:target="submit">Mengirim...</span>
                    </button>
                </div>
            </div>
        </div>
    </section>
</div>