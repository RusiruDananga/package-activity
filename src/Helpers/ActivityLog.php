<?php

namespace RusiruD\Activity\Helpers;

use App\Http\Models\User;
use RusiruD\Activity\Models\ActivityLogs;
use Illuminate\Support\Facades\Auth;

class ActivityLog
{
    static public function createActivity($user_id, $activity, $payment_id = null, $customer_id = null)
    {
        $create = ActivityLogs::create([
            'activity' => $activity, 
            'users_id' => $user_id,
            'payment_id' => $payment_id,
            'customer_id' => $customer_id,
        ]);

        return 1;
    }

    static public function getActivities()
    {
        $user_type = Auth::user()->type;
        $user_id = Auth::user()->id;

        if($user_type == "Super Admin")
        {
            $activities = ActivityLogs::orderBy('created_at', 'DESC')->get();

            foreach($activities as $activity)
            {
                if(isset($activity))
                {
                    $user_details = User::where('id', $activity['users_id'])->first();
                    $activity['user_name'] = "By " . $user_details['name'];
                    $old_date_timestamp = strtotime($activity['created_at']);
                    $activity['created_date'] = date('Y-m-d H:i:s', $old_date_timestamp);
                }
            }
        }
        else
        {
            $activities = ActivityLogs::where('users_id', $user_id)->orderBy('created_at', 'DESC')->get();

            foreach($activities as $activity)
            {
                if(isset($activity))
                {
                    $user_details = User::where('id', $activity['users_id'])->first();
                    $old_date_timestamp = strtotime($activity['created_at']);
                    $activity['created_date'] = date('Y-m-d H:i:s', $old_date_timestamp);
                }
            }
        }

        return $activities;
    }
}