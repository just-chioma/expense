<?php

namespace Database\Seeders;

use App\Models\Expense;
use Illuminate\Database\Seeder;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          Expense::create([
            'title' => 'Lunch',
            'amount' => 2500,
            'category' => 'Food',
            'description' => 'Rice and chicken',
            'user_id' => 1
        ]);

        Expense::create([
            'title' => 'MTN Data',
            'amount' => 5000,
            'category' => 'Data',
            'description' => 'Monthly subscription',
            'user_id' => 1
        ]);

        Expense::create([
            'title' => 'Transport',
            'amount' => 1500,
            'category' => 'Transport',
            'description' => 'Taxi fare',
            'user_id' => 2
        ]);
    }
}
