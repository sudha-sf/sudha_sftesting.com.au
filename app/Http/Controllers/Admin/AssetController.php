<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use App\Project;
use App\Asset;
use App\Http\Requests;

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

    return view('testmate.admin.assets-listing', ['assetsList' => $assetsList, 'page_title' => $pageTitle, 'project' => $project]);
  }

  public function showCreateForm($projectCode) {

    $pageTitle = "Create Asset";

    $project = Project::where('code', $projectCode)->firstOrFail();

    $asset = new Asset();

      if ($project) {
        return view('testmate.admin.assets-form', ['asset' => $asset, 'page_title' => $pageTitle, 'project' => $project]);
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

            return view('testmate.admin.assets-form', ['asset' => $asset, 'page_title' => $pageTitle, 'project' => $project]);
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

            if ($data['assetID']) {

                $id = $data['assetID'];
                $asset = Asset::where('assetID', '=', $id)->where('projectID', '=', $project->projectID)->firstOrFail();
                $asset->update($data);
            } else {

                $asset = new Asset();
                $asset->create($data);
            }

            return Redirect::route('project—listing-admin', array('project' => $project->code));
        } else {

            return redirect()->intended('/'); // invalid request
        }
    }
}
