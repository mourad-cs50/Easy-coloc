<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Colocation extends Model
{
     use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'token'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)
                    ->withPivot('role', 'status', 'left_at')
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
