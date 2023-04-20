<?php

namespace App\Jobs;

use DB;
use App\Models\Admin\City;
use App\Models\Admin\State;
use App\Models\Admin\Pincode;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class AddPincodes implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(){
        $pincodes = DB::table('pincodes_list')->get();
        foreach($pincodes as $pincode){
            $state = State::where('name',$pincode->state)->first();
            if(!$state){
                $state = new State;
                $state->country_id = 1;
                $state->name = $pincode->state;
                $state->save();
            }
            $city = City::where('name',$pincode->city)->first();
            if(!$city){
                $city = new City;
                $city->country_id = 1;
                $city->state_id = $state->id;
                $city->name = $pincode->city;
                $city->save();
            }
            $pincod = Pincode::where('pincode',$pincode->pincode)->first();
            if(!$pincod){
                $pincod = new Pincode;
                $pincod->country_id = 1;
                $pincod->state_id = $state->id;
                $pincod->city_id = $city->id;
                $pincod->pincode = $pincode->pincode;
                $pincod->save();
            }
        }
    }
}
