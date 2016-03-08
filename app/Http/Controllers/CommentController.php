<?php

namespace App\Http\Controllers;
use Log;
use Mail;
use App\Comment;
use App\User;
use App\Project;
use Illuminate\Http\Request;
/*
 *
 */

class CommentController extends Controller
{
    /**
     * Show all the comments
     *
     * Get a JSON representation of all the attributes stored.
     *
     * @Get("/comments/{assetID}")
     * @Versions({"v1"})
     */
      public function index($assetID)
      {
        /*
         * Get all comments which are related assert ID
         * The result order by date(DESC)
         */
        $commentList = Comment::where(array('assetID'=>$assetID))
                              ->with('userObject')
                        //      ->orderBy('date', 'desc')
                              ->get();

        return json_encode($commentList);
      }
    /**
     * Post Comments
     *
     * Post a comment for a video
     *
     * @POST("/comments/{assetID}")
     * @Param ({assID : this is asset ID which are associated, message: The content of comment that the user posted})
     * @Versions({"v1"})
     */
    public function post($assetID, Request $request)
    {
        $params = $request->all();
        //Get project information from asset ID to get CompanyID
        $project = Project::getProjectByAsset($assetID);
        $project = $project[0];
        //$companyID = \Auth::user()->companyID;

        //if the user is from testmate, the receiver will be the customer's team leader for the project
        // if the user is from an external customer, then testmate's admin will receive the email
        $receiverUserID = ((\Auth::user()->companyID == TESTMATE_COMPANY_ID)? $project->userID: $project->adminID);
        $receiverUser = User::find($receiverUserID);

        //Init Comment Object model to assign variable & store new comment
        $comment = new Comment();
        $comment->assetID = $assetID;
        $comment->receiverUserID = $receiverUser->userID;
        $comment->senderUserID = \Auth::user()->userID;
        $comment->comment = ($params['message']?$params['message']:null);
        $comment->date = date('Y-m-d H:i:s');
        //Store comment into database table
        if($comment->save()){
            //Send email to admin user
            $this->sendMail($receiverUser, $assetID);
            //Set message response to client site after save comment successful
            $message = [
                'status'=>true,
                'userComment'=>\Auth::user()->firstName.' '.\Auth::user()->lastName,
                'commentDate'=>date('Y-m-d H:i:s'),
                'message' => ($params['message']?$params['message']:null)
            ];

        }else{
            //Set message response to client site when the comment hasn't been created
            $message = [
                'status'=>fasle,
                'errorMessage'=>'Something went wrong!',
            ];
        }

        return json_encode($message);
    }
    /**
     * Send Email
     *
     * Send an email to admin user when the user post a comments
     *
     * @POST("/comments/{assetID}")
     * @Param ({assID : this is asset ID which are associated, message: The content of comment that the user posted})
     * @Versions({"v1"})
     */
    private function sendMail($receiverUser, $assetID)
    {
      try{
        //Get asset information which are related current comment posted.
        $asset = Comment::where(array('assetID'=>$assetID))->with('assetObject')->get()->first();
        $assetName = $asset->assetObject->name;
        //Get project information from current asset
        $project = Project::where(array('projectID'=>$asset->assetObject->projectID))->get()->first();
        $projectName = $project->name;
        //Define mail content
        $mailContent = new \StdClass();
        $mailContent->subject = '[TESTMATE] - New comment on Project '.$projectName.' - Asset '.$assetName;
        $mailContent->from = \Auth::user()->firstName.' '.\Auth::user()->lastName;
        $mailContent->email_to = $receiverUser->email;
        $mailContent->full_name = $receiverUser->firstName.' '.$receiverUser->lastName;
        $mailContent->access_link = url('projects/'.$project->code);
        $mailContent->title ='Project '.$projectName.' - Asset'.$assetName;

        //Send email to Admin who are related the asset commented by user
        Mail::send('emails.reminder', ['message' => $mailContent,'access_link' => $mailContent->access_link],
            function ($m) use ($mailContent) {
                $m->from(TESTMATE_EMAIL_FROM, TESTMATE_EMAIL_FROM_NAME);
                $m->to($mailContent->email_to, $mailContent->full_name)->subject($mailContent->subject);
            });

        return true;
      }catch(\Exception $e){
         Log::error($e);
      }

    }
}
