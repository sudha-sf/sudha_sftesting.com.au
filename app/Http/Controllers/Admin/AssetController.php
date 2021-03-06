<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use App\Project;
use App\Asset;
use App\User;
use App\Http\Requests;
use Log;
use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class AssetController extends Controller
{
  public function index($projectCode) {
    $pageTitle = "Assets";

    $project = Project::where('code', $projectCode)->firstOrFail();

    $assetsList = Asset::where('projectID', '=', $project->projectID)->get();

    return view('testmate.admin.assets.assets-listing', ['assetsList' => $assetsList, 'page_title' => $pageTitle,
        'project' => $project]);
  }

    public function showCreateForm($projectCode) {

    $pageTitle = "Create Asset";

    $project = Project::where('code', $projectCode)->firstOrFail();

    $asset = new Asset();

      if ($project) {
        return view('testmate.admin.assets.assets-form', ['asset' => $asset, 'page_title' => $pageTitle, 'project' =>
            $project]);
      } else {
        return redirect()->intended('/'); // invalid request
      }
  }

    public function showEditForm($projectCode, $assetID) {

        $pageTitle = "Edit Asset";

        $project = Project::where('code', $projectCode)->firstOrFail();

        $asset = Asset::where('assetID', '=', $assetID)->where('projectID', '=', $project->projectID)->firstOrFail();

        if ($project && $asset) {

            if ($asset['uploadDate']) {
                $asset['uploadDate'] = date('m/d/Y', strtotime($asset['uploadDate']));
            }

            return view('testmate.admin.assets.assets-form', ['asset' => $asset, 'page_title' => $pageTitle, 'project'
            => $project]);
        } else {
            return redirect()->intended('/'); // invalid request
        }
    }

    public function showDeleteForm($projectCode, $assetID, Request $request) {

        $pageTitle = "Delete Asset";

        $project = Project::where('code', $projectCode)->firstOrFail();

        $asset = Asset::where('assetID', '=', $assetID)->where('projectID', '=', $project->projectID)->firstOrFail();


        if ($request->isMethod('post')) {
            if($asset->delete()){
                return Redirect::route('project—listing-admin', array('project' => $project->code));
            }
        }
        if ($project && $asset) {

            if ($asset['uploadDate']) {
                $asset['uploadDate'] = date('m/d/Y', strtotime($asset['uploadDate']));
            }

            return view('testmate.admin.assets.delete-form', ['asset' => $asset, 'page_title' => $pageTitle,
                'project' =>
                $project]);
        } else {
            return redirect()->intended('/'); // invalid request
        }
    }

    public function save($projectCode, Request $request) {

        $project = Project::where('code', $projectCode)->firstOrFail();
        $date = new \DateTime();
        $data = Input::all();

        if ($data['uploadDate']) {

            $strs = explode('/', $data['uploadDate']);
            $date->setDate($strs[2], 0 + $strs[0], 0 + $strs[1]);
            $data['uploadDate'] = $date->format('Y-m-d');
        } else {

            $data['uploadDate'] = $date->format('Y-m-d');
        }

        if ($project){
            $file = array_get($data,'uploadFile');
            if($file){
                // SET UPLOAD PATH
                $destinationPath = "uploads/assets/".$projectCode;
                // GET THE FILE EXTENSION
                $extension = $file->getClientOriginalExtension();
                // RENAME THE UPLOAD WITH RANDOM NUMBER
                $fileName = rand(11111, 99999) . '.' . $extension;
                // MOVE THE UPLOADED FILES TO THE DESTINATION DIRECTORY
                $upload_success = $file->move($destinationPath, $fileName);

                if($upload_success){
                    $data['file'] = $fileName;
                }
            }

            if ($data['assetID']) {
                $id = $data['assetID'];

                $asset = Asset::where('assetID', '=', $id)->where('projectID', '=', $project->projectID)->firstOrFail();
                $asset->update($data);
                $assetID = $id;
            } else {

                $asset = new Asset();
                $assetObj = $asset->create($data);
                $assetID = $assetObj->assetID;
            }
            //Just send email to lead if the user pick to "Notify Project Team Lead about new asset"
            if(isset($data['notify']) && ($data['notify'] === 'on' || $data['notify'] == 1)){
                //if the user is from testmate, the receiver will be the customer's team leader for the project
                // if the user is from an external customer, then testmate's admin will receive the email
                $receiverUserID = ((\Auth::user()->companyID == TESTMATE_COMPANY_ID)? $project->userID: $project->adminID);
                $receiverUser = User::find($receiverUserID);
                //Call action send mail to leader
                $this->sendMail($receiverUser, $assetID) ;
            }
            return Redirect::route('project—listing-admin', array('project' => $project->code));
        } else {

            return redirect()->intended('/'); // invalid request
        }
    }

    /*
     * Delete Asset
     *
     * */
   /* public function delete($projectCode, Request $request) {

        $project = Project::where('code', $projectCode)->firstOrFail();

        var_dump($projectCode);die();
        if ($project){
//            $asset = Asset::where('assetID', '=', $id)->where('projectID', '=', $project->projectID)->firstOrFail();

            return Redirect::route('project—listing-admin', array('project' => $project->code));
        } else {

            return redirect()->intended('/'); // invalid request
        }
    }*/

    /**
     * Send Email
     *
     * Send an email to lead user when the user post a asset
     *
     * @Param ({receiverUser : this is user information which are associated, assetID: The ID of asset that the user created})
     * @Versions({"v1"})
     */
    private function sendMail($receiverUser, $assetID)
    {
        try{
            //Get asset information which are related current comment posted.
            $asset = Asset::where(array('assetID'=>$assetID))->get()->first();
            $assetName = $asset->name;
            //Get project information from current asset
            $project = Project::where(array('projectID'=>$asset->projectID))->get()->first();
            $projectName = $project->name;
            //Define mail content
            $mailContent = new \StdClass();
            $mailContent->subject = '[TESTMATE] - Notifications for the '.$projectName.' - project for '.$asset->uploadDate;
            $mailContent->from = \Auth::user()->firstName.' '.\Auth::user()->lastName;
            $mailContent->email_to = $receiverUser->email;
            $mailContent->full_name = $receiverUser->firstName.' '.$receiverUser->lastName;
            $mailContent->access_link = url('projects/'.$project->code.'/asset/'.$asset->assetID);
            $mailContent->title ='Project '.$projectName.' - Asset '.$assetName;
            $mailContent->projectName =strtoupper($project->name);
            $mailContent->assetName = strtoupper($asset->name);

            //Send email to Admin who are related the asset commented by user
            Mail::send('emails.asset-notifications', ['message' => $mailContent,
                'full_name'=>$mailContent->full_name,
                'access_link'=>$mailContent->access_link,
                'title'=>$mailContent->title,
                'projectName'=>$mailContent->projectName,
                'assetName'=>$mailContent->assetName,
            ],
                function ($m) use ($mailContent) {
                    $m->from(TESTMATE_EMAIL_FROM, TESTMATE_EMAIL_FROM_NAME);
                    $m->to($mailContent->email_to, $mailContent->full_name)->subject($mailContent->subject);
                });

            return true;
        }catch(\Exception $e){
            Log::error($e);
        }

    }
    /*
     * Upload file for asset
     */
    public function uploadFile($file)
    {
        $destinationPath = 'uploads/assets/'; // upload path
        //$extension = \File::extension($file['name']);
        $extension = Input::file('uploadFile'); // getting image extension

        $fileName = 'asset_'.rand(11111,99999).'.'.$extension; // renameing image
        Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

        return $fileName;
    }
}
