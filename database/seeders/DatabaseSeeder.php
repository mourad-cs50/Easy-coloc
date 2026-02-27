<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Colocation;
use App\Models\ColocationUser; 
use App\Models\Expense;
use App\Models\ExpensesUser;
use App\Models\Payment;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $users = User::factory(5)->create();

        Colocation::factory(2)->create()->each(function ($colocation) use ($users) {

           
            foreach ($users as $user) {
                ColocationUser::create([
                    'colocation_id' => $colocation->id,
                    'user_id' => $user->id,
                    'role' => 'member',
                    'status' => 'active',
                    'left_at' => null,
                ]);
            }

            $categories = Categorie::factory(3)->create([
                'colocation_id' => $colocation->id
            ]);

            Expense::factory(4)->create([
                'colocation_id' => $colocation->id,
                'payer_id' => $users->random()->id,
                'categorie_id' => $categories->random()->id
            ])->each(function ($expense) use ($users) {

                $selectedUsers = $users->random(3);

                foreach ($selectedUsers as $user) {
                    ExpensesUser::create([
                        'expense_id' => $expense->id,
                        'user_id' => $user->id,
                        'amount_due' => $expense->amount / 3,
                        'is_paid' => false,
                    ]);
                }
            });

           
            for ($i = 0; $i < 3; $i++) {
                $from = $users->random();
                $to = $users->where('id', '!=', $from->id)->random();

                Payment::create([
                    'amount' => rand(50, 300),
                    'from_user_id' => $from->id,
                    'to_user_id' => $to->id,
                    'colocation_id' => $colocation->id,
                ]);
            }
        });
    }
}