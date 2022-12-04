<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use DB;

class SmsController extends Controller
{
    public function index()
    {
        return view('sms.index');
    }


    public function sendSmsFunction($message, $to)
    {
        $twilioSID = getenv('TWILIO_SID');
        $twilioAuthToken = getenv('TWILIO_AUTH_TOKEN');
        $twilioNumber = getenv('TWILIO_NUMBER');
        $client = new Client($twilioSID, $twilioAuthToken);
        $client->messages->create($to, ['from' => $twilioNumber, 'body' => $message]);
    }


    public function sendSms(Request $request) 
    {

        $userExist = DB::table('user_mobiles')->where('phone', $request->phone)->exists();
        if($userExist) {
        $userExist = DB::table('user_mobiles')->where('phone', $request->phone)->get('id');
            
            DB::table('message_record')->insert([
                "userId" => $userExist[0]->id,
                "message" => $request->message,
                "created_at" => NOW()
            ]);

            $this->sendSmsFunction($request->message, $request->phone);
            dd('sms sent'); 

        } else {
            $userCreate = DB::table('user_mobiles')->insert([
                'name' => $request->name,
                'phone' => $request->phone
            ]);
            DB::table('message_record')->insert([
                "userId" => $userExist[0]->id,
                "message" => $request->message,
                "created_at" => NOW()
            ]);

            $this->sendSmsFunction($request->message, $request->phone);
            dd('sms sent');

        }


    }


}
