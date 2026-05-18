<div>
    <section class="py-20 px-6">
        <div class="max-w-6xl mx-auto">
            <div class="text-center mb-14">
                <h1 class="text-4xl md:text-5xl font-bold mb-3">All Projects</h1>
                <p class="text-gray-500">Semua project yang pernah dan sedang saya kerjakan</p>
            </div>

            <div class="flex flex-col sm:flex-row gap-4 mb-10">
                <input wire:model.live.debounce.300ms="search"
                       type="text"
                       placeholder="Cari project..."
                       class="flex-1 bg-gray-900 border border-gray-800 rounded-xl px-4 py-3 text-gray-300 placeholder-gray-600 focus:outline-none focus:border-indigo-500 transition" />

                <select wire:model.live="status"
                        class="bg-gray-900 border border-gray-800 rounded-xl px-4 py-3 text-gray-300 focus:outline-none focus:border-indigo-500 transition">
                    <option value="">Semua Status</option>
                    <option value="ongoing">Ongoing</option>
                    <option value="completed">Completed</option>
                    <option value="archived">Archived</option>
                </select>
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
                                    <svg class="w-10 h-10 text-indigo-500/40" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                                              d="M4 5a1 1 0 011-1h14a1 1 0 011 1v2a1 1 0 01-1 1H5a1 1 0 01-1-1V5zM4 13a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H5a1 1 0 01-1-1v-6zM16 13a1 1 0 011-1h2a1 1 0 011 1v6a1 1 0 01-1 1h-2a1 1 0 01-1-1v-6z"/>
                                    </svg>
                                </div>
                            @endif
                            <div class="p-6">
                                <div class="flex items-start justify-between mb-2 gap-2">
                                    <h3 class="font-bold text-lg leading-tight">{{ $project->title }}</h3>
                                    <span class="shrink-0 text-xs px-2 py-1 rounded-full
                                        {{ $project->status === 'completed' ? 'bg-green-500/10 text-green-400' :
                                           ($project->status === 'ongoing'   ? 'bg-yellow-500/10 text-yellow-400' :
                                                                               'bg-gray-500/10 text-gray-400') }}">
                                        {{ ucfirst($project->status) }}
                                    </span>
                                </div>
                                <p class="text-gray-500 text-sm mb-4">{{ $project->description }}</p>
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
                <div class="mt-10">
                    {{ $projects->links() }}
                </div>
            @else
                <div class="text-center py-20 text-gray-600">
                    <p class="text-lg">Tidak ada project ditemukan.</p>
                </div>
            @endif
        </div>
    </section>
</div>