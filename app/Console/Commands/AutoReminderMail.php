<?php

namespace App\Console\Commands;

use App\Mail\ReminderMail;
use App\Models\Reminder;
use Mail;
use Illuminate\Console\Command;

class AutoReminderMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reminder = Reminder::whereMonth('datetime', date('m'))
        ->whereDay('datetime', date('d'))
        ->get();

        if ($reminder->count() > 0) {
        foreach ($reminder as $user) {
            Mail::to($user)->send(new ReminderMail($user));
        }
        }

return 0;
    }
}
