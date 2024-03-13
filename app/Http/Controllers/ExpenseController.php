<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expense;

class ExpenseController extends Controller
{
    public function index()
{
    $expenses = Expense::all(); // Fetch all expenses from the database
    return view('expenses.index', compact('expenses'));
}

    public function create()
    {
        return view('expenses.create');
    }

    public function store(Request $request)
{
    // Validate the incoming request data

    // Get the authenticated user
    $user = Auth::user();

    // Create a new expense instance
    $expense = new Expense();

    // Assign the logged-in user's ID to the user_id field
    $expense->user_id = $user->id;

    // Set the name of the expense to the username of the authenticated user
    $expense->name = $user->name;

    // Set other fields of the expense from the request data
    $expense->amount = $request->input('amount');
    $expense->description = $request->input('description');
    // Set other fields as necessary...

    // Save the expense to the database
    $expense->save();

    return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
}

    public function show(Expense $expense)
    {
        return view('expenses.show', compact('expense'));
    }

    public function edit(Expense $expense)
    {
    $this->authorize('update', $expense);

    return view('expenses.edit', compact('expense'));
    }

    public function update(Request $request, Expense $expense)
    {
         $expense->update([
        'amount' => $request->amount,
        'description' => $request->description,
        // Update other fields as needed
    ]);

    return redirect()->route('expenses.index')->with('success', 'Expense updated successfully.');
    }

    public function destroy(Expense $expense)
    {
        // Delete expense
    }

    public function approve(Expense $expense)
    {
    $expense->status = 'approved';
    $expense->save();

    return redirect()->back()->with('success', 'Expense approved.');
    }

    public function deny(Expense $expense)
    {
    $expense->status = 'denied';
    $expense->save();

    return redirect()->back()->with('success', 'Expense denied.');
    }

    public function revert(Expense $expense)
    {
    $expense->status = 'pending';
    $expense->save();

    return redirect()->back()->with('success', 'Expense status reverted.');
    }

    

};