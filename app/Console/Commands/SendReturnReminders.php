<?php
namespace App\Console\Commands;


use App\Models\Loan;
use App\Mail\ReturnReminderMail;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use Illuminate\Console\Command;

class SendReturnReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-return-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // We zoeken leningen die over precies 2 dagen verlopen
    // We filteren op status 'approved' omdat je geen herinnering wilt voor rejected leningen
    $loans = Loan::where('status', 'approved')
        ->whereDate('due_date', Carbon::now()->addDays(2))
        ->get();

    foreach ($loans as $loan) {
        // Mail::to($loan->user->email)->send(new ReturnReminderMail($loan));
    }

    $this->info($loans->count() . ' herinneringen verstuurd naar Mailtrap.');
    }
}
