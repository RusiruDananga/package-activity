<?php

namespace RusiruD\Activity\Http\Controllers;

use RusiruD\Activity\Models\Payment;
use RusiruD\Activity\Models\Customer;
use RusiruD\Activity\Helpers\CheckImage;
use RusiruD\Activity\Helpers\ActivityLog;
use RusiruD\Activity\Models\ActivityLogs;
use App\Http\Controllers\Controller;

class ActivitiesController extends Controller
{
    //Get all activities from db
    public function fetchActivities(){
        $activities = ActivityLog::getActivities();

        return $activities;
    }

    //Fetch 3 latest email logs
    public function fetchMailLogs(){
        $logs = ActivityLogs::where('activity', 'like', 'Invoice email sent to' . '%')->orderBy('updated_at','desc')->limit(3)->get();

        $payments = array();

        foreach ($logs as $log) {
            array_push($payments, Payment::where('id', $log->payment_id)->get()[0]);
        }

        foreach ($payments as $payment) {
            $customerDetails = Customer::where('id', '=', $payment['customers_id'])->first();

            $payment['customer_email'] = $customerDetails['email'];
            $payment['customer_name'] = $customerDetails['first_name'] . ' ' . $customerDetails['last_name'];
            $payment['customer_image'] = $customerDetails['image'];

            $payment = CheckImage::checkImageExists($payment['customer_image'], 'customers', $payment, 'customer_image');
        }

        return $payments;
    }   
}
