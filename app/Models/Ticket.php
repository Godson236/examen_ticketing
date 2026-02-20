<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'description', 'category', 'status', 'user_id'];

    // Un ticket appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Un ticket a plusieurs réponses
    public function responses()
    {
        return $this->hasMany(Response::class);
    }
}