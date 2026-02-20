<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    // Afficher la liste des tickets
    public function index()
    {
        if (Auth::user()->email === 'admin@admin.com') {
            // Si c'est l'admin, voir tous les tickets
            $tickets = Ticket::with('user')->latest()->get();
        } else {
            // Sinon, voir seulement ses tickets
            $tickets = Auth::user()->tickets()->latest()->get();
        }
        
        return view('tickets.index', compact('tickets'));
    }

    // Afficher le formulaire de création
    public function create()
    {
        return view('tickets.create');
    }

    // Enregistrer un nouveau ticket
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10',
            'category' => 'required',
        ]);

        Ticket::create([
            'title' => $request->title,
            'description' => $request->description,
            'category' => $request->category,
            'user_id' => Auth::id(),
            'status' => 'ouvert',
        ]);

        return redirect()->route('tickets.index')->with('success', 'Ticket créé avec succès !');
    }

    // Afficher le détail d'un ticket
    public function show(Ticket $ticket)
    {
        // Vérifier que l'utilisateur a le droit de voir ce ticket
        if (Auth::user()->email !== 'admin@admin.com' && $ticket->user_id !== Auth::id()) {
            abort(403);
        }

        $responses = $ticket->responses()->with('user')->latest()->get();
        return view('tickets.show', compact('ticket', 'responses'));
    }

    // Ajouter une réponse
    public function response(Request $request, Ticket $ticket)
    {
        $request->validate([
            'message' => 'required|min:3',
        ]);

        Response::create([
            'message' => $request->message,
            'ticket_id' => $ticket->id,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('tickets.show', $ticket)->with('success', 'Réponse ajoutée !');
    }
    public function destroy(Ticket $ticket)
{
    if (Auth::user()->email !== 'admin@admin.com') {
        abort(403);
    }
    
    $ticket->delete();
    return redirect()->route('tickets.index')->with('success', 'Ticket supprimé avec succès !');
}

    // Changer le statut (pour admin)
    public function status(Request $request, Ticket $ticket)
    {
        if (Auth::user()->email !== 'admin@admin.com') {
            abort(403);
        }

        $request->validate([
            'status' => 'required|in:ouvert,en_cours,resolu,ferme',
        ]);

        $ticket->update([
            'status' => $request->status
        ]);

        return redirect()->route('tickets.show', $ticket)->with('success', 'Statut mis à jour !');
    }
}