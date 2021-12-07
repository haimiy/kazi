<?php

namespace App\Http\Controllers;

use App\Helper\FunctionHelper;
use Illuminate\Http\Request;

class SendMessageController extends Controller
{
    public function sendMessage(){
        $message = "Hellow Khairat,\n We'd like to remind you that your Tanzania Clinic license is about to expire on December 31, 2021, and you should renew it as soon as possible!";
        $phone ="+255692083464";
        FunctionHelper::sendMessage($message,$phone);
    }
}
