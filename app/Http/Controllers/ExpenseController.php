<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    public function create() {
        return view('expenses.create');
    }

    public function storeExpenses(Request $request) {
     $incomingFields = $request->validate([
        'title' => 'required',
        'amount' => 'required',
        'category' =>'required',
        'description' => 'required'
    ]);

    $incomingFields['title'] = strip_tags($incomingFields['title']);
    $incomingFields['amount'] = strip_tags($incomingFields['amount']);
    $incomingFields['description'] = strip_tags($incomingFields['description']);
    $incomingFields['user_id'] = auth()->id();

    $expense = Expense::create($incomingFields);

    return redirect()->route('expenses.index');
    }

    public function index() {
        $expenses = Expense::where('user_id', auth()->id())->get();
        $total = Expense::where('user_id', auth()->id())->sum('amount');
       return view('expenses.index', compact('expenses', 'total'));
    }

    public function destroy($id) {
        $expense = Expense::findOrFail($id);
        $expense->delete();
        return redirect()->route('expenses.index')->with('success', 'Expense deleted successfully');
    }

    public function update(Request $request, $id)
    {
        $incomingFields = $request->validate([
            'title' => 'required',
            'amount' => 'required',
            'category' => 'required',
            'description' => 'required'
        ]);

        $expense = Expense::findOrFail($id);
        $expense->update($incomingFields);
         return redirect()->route('expenses.index')->with('success', 'Expense updated successfully');

    }

    public function edit($id)
    {
        $expense = Expense::findOrFail($id);
        return view('expenses.edit', compact('expense'));
       
    }

}
