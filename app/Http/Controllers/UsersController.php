<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Log;

class UsersController extends Controller
{
    /*
     *
     */
    public function forgot(Request $request)
    {
        $message = null;
        if($request->isMethod('post')){
            //Get User Info from email
            $userInfo = User::where(array('email'=>$request->get('email')))->get()->first();
            if($userInfo && $userInfo->email){
                $newPass = md5(time());
                $password = \Hash::make($newPass);
                $userInfo->password = $password;
                if($userInfo->save()){
                    //Send mail to user when updated new password
                    $mailStatus = $this->sendMail($userInfo, $newPass);
                    if($mailStatus == true){
                        $message = "Your account have been reset, Please check your email!";
                    }
                }
            }else{
                $message = "Sorry! this email doesn't exist, please check again!";
            }
        }

        return view('testmate.forgot-password',['message'=>$message]);
    }

    /**
     * Send Email
     *
     * Send an email to user when they reset a password
     *
     * @Param ({receiverUser : this is user information which are associated, newPass: The password was reset for user})
     * @Versions({"v1"})
     */
    private function sendMail($receiverUser, $newPass)
    {
        try{
            //Define mail content
            $mailContent = new \StdClass();
            $mailContent->subject = '[TESTMATE] - Reset password successful!';
            $mailContent->from = 'no-reply@testmate.com';
            $mailContent->email_to = $receiverUser->email;
            $mailContent->full_name = $receiverUser->firstName.' '.$receiverUser->lastName;
            $mailContent->password = $newPass;

            //Send email to Admin who are related the asset commented by user
            Mail::send('emails.user-reset-password', ['message' => $mailContent, 'newPass'=>$newPass, 'fullname'=>$mailContent->full_name], function ($m) use ($mailContent) {
                $m->from(TESTMATE_EMAIL_FROM, TESTMATE_EMAIL_FROM_NAME);
                $m->to($mailContent->email_to, $mailContent->full_name)->subject($mailContent->subject);
            });

            return true;
        }catch(\Exception $e){
            Log::error($e);
        }

    }
}
