<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function dashboard(){
        return view('admin.dashboard', [
        'totalUsers' => User::count(),
        'totalExpenses' => Expense::count(),
        'totalAmount' => Expense::sum('amount'),
        ]);
    }

    public function index(){
        $users =User::all();
        return view('admin.users.index', compact('users'));
    }
    
    public function expenseIndex(){
        $expenses = Expense::all();
        return view('admin.expenses.index', compact('expenses'));
    }

    public function userEdit($id){
        $users = User::findOrFail($id);
        return view('admin.users.edit', compact('users'));
    }
    public function userUpdate(Request $request, $id ){
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);
        $users = User::findOrFail($id);
        $users->update($incomingFields);
        return redirect()->route('admin.users.index', $users->id);
    }

    public function createUser(){
        return view('admin.users.create');
    }

    public function adminStoreUser(Request $request){
        $incomingFields = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);
        User::create([
            'name' => $incomingFields['name'],
            'email' => $incomingFields['email'],
            'password' => bcrypt($incomingFields['password'])
        ]);

        return redirect()->route('admin.users.index')->with('success', 'User registered successfully');
    }

    public function destroy($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function createExpenses(){
        $users = User::all();
        return view('admin.expenses.create', compact('users'));
    }

    public function storeExpenses(Request $request){
        $incomingFields = $request->validate([
            'user_id' =>'required|exists:users,id',
            'title' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'description' => 'required',
        ]);
        Expense::create([
            'user_id' => $incomingFields['user_id'],
            'title' => $incomingFields['title'],
            'amount' => $incomingFields['amount'],
            'category' => $incomingFields['category'],
            'description' => $incomingFields['description']
        ]);
         return redirect()->route('admin.expenses.index');
    }

    public function editExpenses($id){
        $expense = Expense::findOrFail($id);
        return view('admin.expenses.edit', compact('expense'));
    }

    public function updateExpenses(Request $request, $id)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($incomingFields);
         return redirect()->route('admin.expenses.index');

    }

    public function destroyExpense($id){
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->route('admin.expenses.index');
    }

      public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    public function userProfile($id)
    {
        $user = User::findOrFail($id);

        $profile = Profile::where('user_id', $id)->first();

        return view('admin.users.profile', compact('user', 'profile'));
    }

}