<div>
    <section class="min-h-screen flex items-center justify-center px-6 relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-900/20 via-gray-950 to-purple-900/20 pointer-events-none"></div>
        <div class="relative z-10 max-w-4xl mx-auto text-center">
            <h1 class="text-5xl md:text-7xl font-bold mb-6 bg-gradient-to-r from-white via-indigo-200 to-purple-300 bg-clip-text text-transparent leading-tight">
                Hallo Saya <span class="text-indigo-400">Fiery</span>
            </h1>
            
            </p>
            <p class="text-gray-500 max-w-2xl mx-auto mb-10 leading-relaxed">
                Belajar membangun website dinamis yang modern, rapi, dan fungsional agar bisa menjadi Web Devoloper
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="{{ route('projects') }}"
                   class="px-8 py-4 bg-indigo-600 hover:bg-indigo-500 rounded-xl font-semibold transition-all hover:scale-105">
                    Lihat Projects
                </a>
                <a href="{{ route('contact') }}"
                   class="px-8 py-4 border border-gray-700 hover:border-indigo-500 rounded-xl font-semibold transition-all hover:scale-105">
                    Hubungi Saya
                </a>
            </div>
        </div>
    </section>

    <section class="py-20 px-6 bg-gray-900/40">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">Biodata Singkat</h2>
                <p class="text-gray-500">Saya adalah seorang mahasiswa semester 4 di Universitas Esa Unggul dan seorang web developer yang berfokus pada pengembangan aplikasi web menggunakan Laravel, Filament, Livewire, Blade, dan MariaDB untuk membangun sistem informasi yang efisien, aman, mudah digunakan, dan memiliki tampilan yang nyaman untuk user.</p>
            </div>
            @if ($skills->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($skills as $category => $items)
                        <div class="bg-gray-900 border border-gray-800 rounded-2xl p-6 hover:border-indigo-500/50 transition">
                            <h3 class="text-indigo-400 font-semibold text-sm uppercase tracking-wider mb-5">
                                {{ $category }}
                            </h3>
                            <div class="space-y-4">
                                @foreach ($items as $skill)
                                    <div>
                                        <div class="flex justify-between text-sm mb-1">
                                            <span class="text-gray-300">{{ $skill->name }}</span>
                                            <span class="text-gray-500">{{ $skill->level }}%</span>
                                        </div>
                                        <div class="w-full bg-gray-800 rounded-full h-2">
                                            <div class="bg-gradient-to-r from-indigo-500 to-purple-500 h-2 rounded-full"
                                                 style="width: {{ $skill->level }}%"></div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-center text-gray-600">Belum ada skill. Tambahkan di Admin Panel.</p>
            @endif
        </div>
    </section>

    <section class="py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14">
                <h2 class="text-3xl md:text-4xl font-bold mb-3">Featured Projects</h2>
                <p class="text-gray-500">Beberapa project terbaru yang saya kerjakan</p>
            </div>
            @if ($projects->count() > 0)
                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($projects as $project)
                        <div class="bg-gray-900 border border-gray-800 rounded-2xl overflow-hidden hover:border-indigo-500/50 transition group">
                            @if ($project->image)
                                <img src="{{ Storage::url($project->image) }}"
                                     alt="{{ $project->title }}"
                                     class="w-full h-48 object-cover group-hover:scale-105 transition duration-300" />
                            @else
                                <div class="w-full h-48 bg-gradient-to-br from-indigo-900/40 to-purple-900/40 flex items-center justify-center">
                                    <svg class="w-12 h-12 text-indigo-500/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-2 gap-2">
                                    <h3 class="font-bold text-lg leading-tight">Sistem Manajemen Antrian Harian dengan Estimasi Waktu Tunggu Berbasis Web</h3>
                                    <span class="shrink-0 text-xs px-2 py-1 rounded-full
                                        {{ $project->status === 'completed' ? 'bg-green-500/10 text-green-400' :
                                           ($project->status === 'ongoing'   ? 'bg-yellow-500/10 text-yellow-400' :
                                                                               'bg-gray-500/10 text-gray-400') }}">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </div>
                                <p class="text-gray-500 text-sm mb-4 line-clamp-2">Project ini dibuat untuk membantu pencatatan Antrian agar lebih rapi, cepat, dan mudah dipantau oleh</p>
                                @if ($project->tech_stack)
                                    <p class="text-xs text-indigo-400 mb-4">{{ $project->tech_stack }}</p>
                                @endif
                                <div class="flex gap-4">
                                    @if ($project->demo_url)
                                        <a href="{{ $project->demo_url }}" target="_blank"
                                           class="text-sm text-indigo-400 hover:text-indigo-300 transition">Demo →</a>
                                    @endif
                                    @if ($project->repo_url)
                                        <a href="{{ $project->repo_url }}" target="_blank"
                                           class="text-sm text-gray-400 hover:text-gray-300 transition">Repo →</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="text-center mt-10">
                    <a href="{{ route('projects') }}"
                       class="inline-block px-6 py-3 border border-gray-700 hover:border-indigo-500 rounded-xl transition">
                        Lihat Semua Projects →
                    </a>
                </div>
            @else
                <p class="text-center text-gray-600">Belum ada project. Tambahkan di Admin Panel.</p>
            @endif
        </div>
    </section>
</div>