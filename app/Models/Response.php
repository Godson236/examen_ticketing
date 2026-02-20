<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    use HasFactory;

    protected $fillable = ['message', 'ticket_id', 'user_id'];

    // Une réponse appartient à un ticket
    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    // Une réponse appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}