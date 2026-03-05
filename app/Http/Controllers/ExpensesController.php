<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use App\Models\Colocation;
use App\Models\Expense;

class ExpensesController extends Controller
{
    // Show add expense form
    public function create(Colocation $colocation)
    {
      
        $categories = Categorie::where('colocation_id', $colocation->id)->get();
        return view('colocation.expenses.create', compact('colocation', 'categories'));
    }

    // Store expense
    public function store(Request $request, Colocation $colocation)
    {
         $request->validate([
        'title' => 'required|string|max:255',
        'amount' => 'required|numeric|min:1',
    ]);

    // 1️⃣ إنشاء expense
    $expense = $colocation->expenses()->create([
        'title' => $request->title,
        'amount' => $request->amount,
        'payer_id' => auth()->id(),
        'category_id' => $request->category_id,
    ]);

    // 2️⃣ جلب جميع الأعضاء
    $members = $colocation->users;

    $count = $members->count();

    // 3️⃣ حساب الحصة لكل واحد
    $share = $request->amount / $count;

    foreach ($members as $member) {

        if ($member->id == auth()->id()) {
            // 👇 creator يعتبر دافع
            $expense->users()->attach($member->id, [
                'amount_due' => 0,
                'is_paid' => true
            ]);
        } else {
            $expense->users()->attach($member->id, [
                'amount_due' => $share,
                'is_paid' => false
            ]);
        }
    }

    return redirect()->route('colocation.workspace', $colocation->id);
    }


    public function pay(Expense $expense)
{
    $user = auth()->user();

    $record = $expense->users()
        ->where('user_id', $user->id)
        ->first();

    if (!$record || $record->pivot->paid) {
        return back();
    }

    // تحديث الحالة
    $expense->users()->updateExistingPivot($user->id, [
        'is_paid' => true
    ]);

    // إنقاص الرصيد
    $colocUser = $expense->colocation
        ->users()
        ->where('user_id', $user->id)
        ->first();

    $colocUser->pivot->sold -= $record->pivot->share;
    $colocUser->pivot->save();

    return back()->with('success', 'Payment confirmed!');
}

    // Show all expenses
    public function index(Colocation $colocation)
    {
         $colocation = Colocation::with(['users', 'expenses',])->findOrFail($colocation->id);
         $categories = $colocation->categories()->get();
        return view('colocation.expenses.index', compact('colocation', 'categories'));
    }

}