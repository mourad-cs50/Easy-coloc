<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colocation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'user_id',
        'status',
        'token',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'colocation_users')
            ->withPivot('role', 'status', 'left_at', 'sold')
            ->withTimestamps();
    }

    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    public function categories()
    {
        return $this->hasMany(Categorie::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
