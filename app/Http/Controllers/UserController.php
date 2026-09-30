<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function dashboard(){
         $totalExpenses = Expense::where('user_id', auth()->id())->count();
         $totalAmount = Expense::where('user_id', auth()->id())->sum('amount');
         $thisMonthAmount = Expense::where('user_id', auth()->id())
         ->whereMonth('created_at', now()->month)
         ->whereYear('created_at', now()->year)
         ->sum('amount');
        return view('user.dashboard', compact('totalExpenses', 'totalAmount', 'thisMonthAmount'));
    }
     public function show()
    {
        $user = auth()->user();
        return view('user.show', compact('user'));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|email',
        ]);

        $user = User::findOrFail($id);
        $user->update($validated);

        return redirect()->route('user.show') ->with('success', 'updated successfully');
       
    }
}
