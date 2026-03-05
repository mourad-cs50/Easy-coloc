<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colocation;

class ColocationJoinController extends Controller
{
    // عرض نموذج إدخال token
    public function showForm()
    {
        return view('colocation.join'); // Blade خاص بالانضمام
    }

    // معالجة الانضمام
    public function join(Request $request)
    {
        $request->validate([
            'token' => 'required|string|exists:colocations,token',
        ]);

        $colocation = Colocation::where('token', $request->token)->first();

        // تحقق إن المستخدم ليس عضو مسبقًا
        if ($colocation->users()->where('user_id', auth()->id())->exists()) {
            return redirect()->route('dashboard')->with('info', 'You are already a member of this colocation.');
        }

        // ربط المستخدم بالمشاركة
        $colocation->users()->attach(auth()->id(), [
            'role' => 'member',
            'status' => 'active',
            'sold' => 0
        ]);

        return redirect()->route('colocation.workspace', $colocation->id)
                         ->with('success', 'You joined the colocation successfully!');
    }
}
