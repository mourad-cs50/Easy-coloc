<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colocation;


class ColocationController extends Controller
{
    public function create()
    {
        $ownerColoc = auth()->user()->colocations()->wherePivot('role', 'owner')->first();
        if ($ownerColoc) {
            return redirect()->route('dashboard')->with('error', 'You already own a colocation. You must delete it first.');
        }
        $categories = ['Water', 'WiFi', 'Electricity', 'Gas', 'Internet'];
        return view('colocation.create-coloc', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        $token = bin2hex(random_bytes(5));

        $coloc = Colocation::create([
            'name' => $request->name,
            'token' => $token,
        ]);

        $coloc->users()->attach(auth()->id(), [
            'role' => 'owner',
            'status' => 'active',
            'sold' => 0
        ]);
        return redirect()->route('colocation.workspace', $coloc->id);
    }

    public function addCategory(Request $request, Colocation $colocation)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        $colocation->categories()->create([
            'name' => $request->name
        ]);

        return back();
    }

    public function workspace(Colocation $colocation)
    {
        $colocation = Colocation::with([
            'users',
            'expenses',
            'categories',
            'expenses.users'
        ])->findOrFail($colocation->id);
        return view('colocation.workspace', compact('colocation'));
    }
}