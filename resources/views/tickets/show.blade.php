<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <div class="flex items-center space-x-4">
                <a href="{{ route('tickets.index') }}" class="text-gray-500 hover:text-purple-600 transition">
                    <i class="fas fa-arrow-left mr-2"></i> Retour
                </a>
                <span class="text-xl">Ticket #{{ $ticket->id }}</span>
                <span class="badge badge-{{ $ticket->status }}">{{ $ticket->status }}</span>
            </div>
        </div>
    </x-slot>

    <div class="space-y-6">
        @if(session('success'))
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded">
                <i class="fas fa-check-circle mr-2"></i> {{ session('success') }}
            </div>
        @endif

        <!-- Carte principale du ticket -->
        <div class="card overflow-hidden">
            <div class="p-6">
                <div class="flex items-start justify-between mb-6">
                    <div>
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ $ticket->title }}</h2>
                        <div class="flex items-center space-x-4 text-sm text-gray-500">
                            <span><i class="fas fa-user mr-1"></i> {{ $ticket->user->name }}</span>
                            <span><i class="fas fa-tag mr-1"></i> {{ $ticket->category }}</span>
                            <span><i class="fas fa-calendar mr-1"></i> {{ $ticket->created_at->format('d/m/Y H:i') }}</span>
                        </div>
                    </div>
                </div>
                
                <div class="bg-gray-50 rounded-lg p-4 mb-6">
                    <p class="text-gray-700">{{ $ticket->description }}</p>
                </div>

                <!-- Actions admin -->
                @if(Auth::user()->email === 'admin@admin.com')
                    <div class="border-t pt-6">
                        <div class="flex flex-wrap gap-4">
                            <form method="POST" action="{{ route('tickets.status', $ticket) }}" class="flex items-center space-x-2">
                                @csrf
                                @method('PUT')
                                <select name="status" class="border rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-500">
                                    <option value="ouvert" {{ $ticket->status == 'ouvert' ? 'selected' : '' }}>Ouvert</option>
                                    <option value="en_cours" {{ $ticket->status == 'en_cours' ? 'selected' : '' }}>En cours</option>
                                    <option value="resolu" {{ $ticket->status == 'resolu' ? 'selected' : '' }}>Résolu</option>
                                    <option value="ferme" {{ $ticket->status == 'ferme' ? 'selected' : '' }}>Fermé</option>
                                </select>
                                <button type="submit" class="btn-primary">
                                    <i class="fas fa-sync-alt mr-2"></i> Mettre à jour
                                </button>
                            </form>

                            <form method="POST" action="{{ route('tickets.destroy', $ticket) }}" 
                                  onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce ticket ?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">
                                    <i class="fas fa-trash mr-2"></i> Supprimer
                                </button>
                            </form>
                        </div>
                    </div>
                @endif
            </div>
        </div>

        <!-- Section des réponses -->
        <div class="card overflow-hidden">
            <div class="p-6">
                <h3 class="text-lg font-semibold mb-6">
                    <i class="fas fa-comments mr-2 text-purple-600"></i>
                    Réponses ({{ $responses->count() }})
                </h3>

                <!-- Formulaire de réponse -->
                <form method="POST" action="{{ route('tickets.response', $ticket) }}" class="mb-8">
                    @csrf
                    <div class="mb-4">
                        <textarea name="message" rows="3" 
                                  class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent"
                                  placeholder="Écrivez votre réponse..." required></textarea>
                    </div>
                    <div class="flex justify-end">
                        <button type="submit" class="btn-primary">
                            <i class="fas fa-paper-plane mr-2"></i> Envoyer
                        </button>
                    </div>
                </form>

                <!-- Liste des réponses -->
                @if($responses->isEmpty())
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-comment-dots text-4xl mb-3"></i>
                        <p>Aucune réponse pour le moment</p>
                    </div>
                @else
                    <div class="space-y-4">
                        @foreach($responses as $response)
                            <div class="bg-gray-50 rounded-lg p-4 {{ $response->user->email === 'admin@admin.com' ? 'border-l-4 border-purple-500' : '' }}">
                                <div class="flex justify-between items-center mb-2">
                                    <div class="flex items-center space-x-2">
                                        <span class="font-semibold">{{ $response->user->name }}</span>
                                        @if($response->user->email === 'admin@admin.com')
                                            <span class="badge badge-admin">Support</span>
                                        @endif
                                    </div>
                                    <span class="text-sm text-gray-500">{{ $response->created_at->format('d/m/Y H:i') }}</span>
                                </div>
                                <p class="text-gray-700">{{ $response->message }}</p>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>