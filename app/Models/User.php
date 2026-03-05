<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'reputation',
        'is_admin',
        'is_banned',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function colocations(){
         return $this->belongsToMany(Colocation::class, 'colocation_users')
                ->withPivot('role', 'status', 'left_at')
                ->withTimestamps();
    }
   
    public function expenses()
{
    return $this->belongsToMany(Expense::class, 'expenses_users')
                ->withPivot('amount_due', 'is_paid')
                ->withTimestamps();
}
    
    // lmsrof li khales l user
    public function paidExpenses()
    {
        return $this->hasMany(Expense::class, 'payer_id');
    }

    //  lmsrof li khaso ikhales
    public function expenseShares()
    {
        return $this->hasMany(ExpensesUser::class);
    }

    // ta7wilat li sifet
    public function sentPayments()
    {
        return $this->hasMany(Payment::class, 'from_user_id');
    }

    //  ta7wilat li twasal bihom
    public function receivedPayments()
    {
        return $this->hasMany(Payment::class, 'to_user_id');
    }
}
