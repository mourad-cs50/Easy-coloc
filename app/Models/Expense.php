<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expense extends Model
{
     use HasFactory;

    protected $fillable = [
        'title',
        'amount',
        'payer_id',
        'colocation_id',
        'categorie_id'
    ];

    public function colocation()
    {
        return $this->belongsTo(Colocation::class);
    }

    public function payer()
    {
        return $this->belongsTo(User::class, 'payer_id');
    }

    public function category()
    {
        return $this->belongsTo(Categorie::class, 'categorie_id');
    }

    public function shares()
    {
        return $this->hasMany(ExpensesUser::class);
    }
}
