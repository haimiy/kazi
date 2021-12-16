<?php

namespace App\Http\Controllers;

use App\Helper\FunctionHelper;
use App\Models\License;
use App\Services\DataService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendMessageController extends Controller
{
    public function sendMessage(): \Illuminate\Http\RedirectResponse
    {
        $licenses= License::where('starting_date','<',now()->addMonth())->get();

        foreach ($licenses as $license){
            $details = DataService::getLicencePersonInChargeContactAndHealthFacilityName($license->id)[0];
            $message ="Hello,We'd like to remind you that the license for ".$details->facility_name." is set to expire on ".Carbon::parse($details->ending_date)->format("F jS Y").", and you should renew it as soon as possible!";
            FunctionHelper::sendMessage($message,$details->phone_no);
        }
        return back();
    }

    public function sendMessageInterface()
    {
        $hospitals = DB::select('SELECT hf.id,hf.facility_name,u.phone_no,u.first_name,u.middle_name,u.last_name FROM health_facility hf
            LEFT JOIN owner_health_facility ohf on ohf.health_facility_id = hf.id
            LEFT JOIN owner o ON o.id = ohf.owner_id
            LEFT JOIN users u on u.id = o.person_incharge');
            return view('registrar.send_message')->with('hospitals',$hospitals);
    }

    public function storeSendMessageInterface(Request $request){
        foreach ($request->recepients as $recepient) {
            $message = $request->message;
            FunctionHelper::sendMessage($message,$recepient);
        }
        return back();
    }
}
