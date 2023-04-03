<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Rent;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class LeaveStatusUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rents:leaveStatusUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Rents Leave Status Update';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $current_date = Carbon::now();
        $all_rents = Rent::where('leave_status','pending')->get();
        foreach ($all_rents as $rent){
            $leave_date = Carbon::parse($rent->leave_date);
            $month = $leave_date->diffInMonths($current_date);
            if($month>0){
                Rent::where('id',$rent->id)
                ->update([
                    'leave_status'=>'leaved'
                ]);
                Log::info($month);
            }
        }

    }
}
