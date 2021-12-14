<?php

namespace App\Http\Controllers;

use App\Helper\FunctionHelper;
use App\Models\License;
use App\Services\DataService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function sendMessage(): \Illuminate\Http\RedirectResponse
    {
        $licenses= License::where('starting_date','<',now()->addMonth())->get();

        foreach ($licenses as $license){
            $details = DataService::getLicencePersonInChargeContactAndHealthFacilityName($license->id)[0];
            $message ="\nHello,\nWe'd like to remind you that the license for ".$details->facility_name." is set to expire on ".Carbon::parse($details->ending_date)->format("F jS Y").", and you should renew it as soon as possible!";
            FunctionHelper::sendMessage($message,$details->phone_no);
        }
        return back();
    }

    public function mailbox() 
    {
        return view('registrar.mailbox');
    }
}
