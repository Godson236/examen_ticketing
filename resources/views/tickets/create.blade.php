<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('tickets.index') }}" class="text-gray-500 hover:text-purple-600 transition">
                <i class="fas fa-arrow-left mr-2"></i> Retour
            </a>
            <span class="text-xl">Nouveau ticket</span>
        </div>
    </x-slot>

    <div class="max-w-3xl mx-auto">
        <div class="card overflow-hidden">
            <div class="p-8">
                <form method="POST" action="{{ route('tickets.store') }}">
                    @csrf

                    <div class="space-y-6">
                        <!-- Titre -->
                        <div>
                            <label for="title" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-heading mr-2 text-purple-600"></i>Titre
                            </label>
                            <input type="text" name="title" id="title" 
                                   value="{{ old('title') }}"
                                   class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('title') border-red-500 @enderror"
                                   placeholder="Ex: Problème de connexion...">
                            @error('title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Catégorie -->
                        <div>
                            <label for="category" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-tag mr-2 text-purple-600"></i>Catégorie
                            </label>
                            <select name="category" id="category" 
                                    class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent">
                                <option value="technique">🔧 Technique</option>
                                <option value="rh">👥 Ressources Humaines</option>
                                <option value="commercial">💰 Commercial</option>
                                <option value="autre">❓ Autre</option>
                            </select>
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fas fa-align-left mr-2 text-purple-600"></i>Description
                            </label>
                            <textarea name="description" id="description" rows="6"
                                      class="w-full border rounded-lg px-4 py-3 focus:ring-2 focus:ring-purple-500 focus:border-transparent @error('description') border-red-500 @enderror"
                                      placeholder="Décrivez votre problème en détail...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Boutons -->
                        <div class="flex items-center justify-end space-x-4 pt-4 border-t">
                            <a href="{{ route('tickets.index') }}" class="px-6 py-3 text-gray-600 hover:text-gray-900">
                                Annuler
                            </a>
                            <button type="submit" class="btn-primary">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Créer le ticket
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>