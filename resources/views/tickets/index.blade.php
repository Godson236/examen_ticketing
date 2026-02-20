<x-app-layout>
    <!-- Styles personnalisés -->
    <style>
        .dashboard-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.02);
            border: 1px solid #f0f0f0;
            transition: all 0.2s ease;
        }
        
        .dashboard-card:hover {
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.05);
            border-color: #e0e0e0;
        }
        
        .stat-card {
            padding: 24px;
            background: white;
            border-radius: 12px;
            border: 1px solid #f0f0f0;
        }
        
        .stat-icon {
            width: 48px;
            height: 48px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }
        
        .badge-statut {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.85rem;
            font-weight: 500;
        }
        
        .badge-ouvert { background: #fff2f0; color: #f5222d; }
        .badge-en_cours { background: #fff7e6; color: #fa8c16; }
        .badge-resolu { background: #f6ffed; color: #52c41a; }
        .badge-ferme { background: #f5f5f5; color: #8c8c8c; }
        
        .btn-nouveau {
            background: #4f46e5;
            color: white;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: 500;
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-nouveau:hover {
            background: #4338ca;
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }
        
        .table-header {
            background: #fafafa;
            font-weight: 600;
            color: #4b5563;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 0.05em;
        }
        
        .table-row {
            transition: all 0.2s;
            border-bottom: 1px solid #f0f0f0;
        }
        
        .table-row:hover {
            background: #fafafa;
        }
        
        .link-action {
            color: #4f46e5;
            font-weight: 500;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .link-action:hover {
            color: #4338ca;
            text-decoration: underline;
        }
        
        /* Mode sombre automatique */
        @media (prefers-color-scheme: dark) {
            body {
                background: #111827;
                color: #f3f4f6;
            }
            .dashboard-card, .stat-card {
                background: #1f2937;
                border-color: #374151;
            }
            .table-header {
                background: #1a1f2e;
                color: #9ca3af;
            }
            .table-row {
                border-bottom-color: #374151;
            }
            .table-row:hover {
                background: #2d3748;
            }
            .badge-ferme { background: #2d3748; color: #9ca3af; }
        }
    </style>

    <!-- En-tête -->
    <div class="flex justify-between items-center mb-8">
        <div>
            <h1 class="text-2xl font-bold text-gray-800 dark:text-white flex items-center gap-2">
                @if(Auth::user()->email === 'admin@admin.com')
                    <i class="fas fa-crown text-yellow-500"></i> 
                    <span>Tableau de bord administrateur</span>
                @else
                    <i class="fas fa-ticket-alt text-indigo-600"></i>
                    <span>Mes tickets</span>
                @endif
            </h1>
            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">
                {{ Auth::user()->email === 'admin@admin.com' ? 'Gérez l\'ensemble des tickets' : 'Suivez vos demandes en cours' }}
            </p>
        </div>
        <a href="{{ route('tickets.create') }}" class="btn-nouveau">
            <i class="fas fa-plus"></i>
            Nouveau ticket
        </a>
    </div>

    <!-- Messages de succès -->
    @if(session('success'))
        <div class="mb-6 p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg text-green-700 dark:text-green-300 flex items-center gap-3">
            <i class="fas fa-check-circle"></i>
            {{ session('success') }}
        </div>
    @endif

    <!-- Statistiques (admin seulement) -->
    @if(Auth::user()->email === 'admin@admin.com')
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
        <div class="stat-card">
            <div class="flex items-center gap-4">
                <div class="stat-icon" style="background: #eef2ff; color: #4f46e5;">
                    <i class="fas fa-ticket-alt"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Total</p>
                    <p class="text-2xl font-bold">{{ $tickets->count() }}</p>
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="flex items-center gap-4">
                <div class="stat-icon" style="background: #fff2f0; color: #f5222d;">
                    <i class="fas fa-clock"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Ouverts</p>
                    <p class="text-2xl font-bold">{{ $tickets->where('status', 'ouvert')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="flex items-center gap-4">
                <div class="stat-icon" style="background: #fff7e6; color: #fa8c16;">
                    <i class="fas fa-sync-alt"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">En cours</p>
                    <p class="text-2xl font-bold">{{ $tickets->where('status', 'en_cours')->count() }}</p>
                </div>
            </div>
        </div>
        <div class="stat-card">
            <div class="flex items-center gap-4">
                <div class="stat-icon" style="background: #f6ffed; color: #52c41a;">
                    <i class="fas fa-check-circle"></i>
                </div>
                <div>
                    <p class="text-sm text-gray-500 dark:text-gray-400">Résolus</p>
                    <p class="text-2xl font-bold">{{ $tickets->where('status', 'resolu')->count() }}</p>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Liste des tickets -->
    <div class="dashboard-card">
        <div class="p-6">
            @if($tickets->isEmpty())
                <div class="text-center py-16">
                    <div class="mb-4">
                        <i class="fas fa-ticket-alt text-5xl text-gray-300 dark:text-gray-600"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-2">
                        Aucun ticket
                    </h3>
                    <p class="text-gray-500 dark:text-gray-400 mb-6">
                        Commencez par créer votre première demande
                    </p>
                    <a href="{{ route('tickets.create') }}" class="btn-nouveau">
                        <i class="fas fa-plus"></i>
                        Créer un ticket
                    </a>
                </div>
            @else
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="table-header">
                                <th class="px-4 py-3 text-left">Titre</th>
                                <th class="px-4 py-3 text-left">Catégorie</th>
                                <th class="px-4 py-3 text-left">Statut</th>
                                @if(Auth::user()->email === 'admin@admin.com')
                                    <th class="px-4 py-3 text-left">Créé par</th>
                                @endif
                                <th class="px-4 py-3 text-left">Date</th>
                                <th class="px-4 py-3 text-left">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($tickets as $ticket)
                                <tr class="table-row">
                                    <td class="px-4 py-4 font-medium">{{ $ticket->title }}</td>
                                    <td class="px-4 py-4">
                                        <span class="px-3 py-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 rounded-full text-sm">
                                            {{ $ticket->category }}
                                        </span>
                                    </td>
                                    <td class="px-4 py-4">
                                        <span class="badge-statut badge-{{ $ticket->status }}">
                                            {{ $ticket->status == 'ouvert' ? 'Ouvert' : ($ticket->status == 'en_cours' ? 'En cours' : ($ticket->status == 'resolu' ? 'Résolu' : 'Fermé')) }}
                                        </span>
                                    </td>
                                    @if(Auth::user()->email === 'admin@admin.com')
                                        <td class="px-4 py-4 text-gray-600 dark:text-gray-400">{{ $ticket->user->name }}</td>
                                    @endif
                                    <td class="px-4 py-4 text-gray-500 dark:text-gray-400 text-sm">
                                        {{ $ticket->created_at->format('d/m/Y H:i') }}
                                    </td>
                                    <td class="px-4 py-4">
                                        <a href="{{ route('tickets.show', $ticket) }}" class="link-action">
                                            <i class="fas fa-eye"></i>
                                            Détail
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>