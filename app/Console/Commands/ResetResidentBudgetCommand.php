<?php

namespace App\Console\Commands;

use App\Models\Budget;
use App\Models\Resident;
use Illuminate\Console\Command;

class ResetResidentBudgetCommand extends Command
{
    protected $signature = 'app:reset-resident-budget';

    protected $description = 'Resets the remaining budget for residents if their active budget period has expired.';

    public function handle(): void
    {
        $budgetsToReset = Budget::whereDate('active_until', '<', now())->get();

        $budgetsToReset->each(function (Budget $budget) {
            $budget->update(['remaining' => $budget->value]);
        });

        $this->info("Successfully reset the budget for {$budgetsToReset->count()} residents.");
    }
}
