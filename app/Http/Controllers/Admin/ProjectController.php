<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use DB;
use App\Project;
use App\Asset;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
  /**
   * Process get project list
   * @GET("/admin/projects") to get the list with all project
   * @Versions({"v1"})
   */
  public function index(Request $request) {
    $pageTitle = "ADMIN - Projects";
    //Get all projects from database for a company
    $projectsList = Project::with('companyObject')->get();
    return view('testmate.admin.projects-listing', ['projectsList' => $projectsList, 'page_title' => $pageTitle]);
  }
  /*
   * Create new project
   *
   * @POST('/admin/projects')
   * @Params({'companyID', 'name', 'description', 'startingDate', 'lastUpdateDate', 'status', 'code', 'userID', 'adminID',
   *   'testersAmount', 'projectBriefPercentCompleted', 'kickOffMeetingPercentCompleted', 'recruitmentPercentCompleted',
   *  'userTestPlanPercentCompleted', 'userTestingPercentCompleted', 'resultsAnalysisPercentCompleted',
   * 'preliminaryFindingsPercentCompleted', 'finalReportPercentCompleted', 'highlightsVideoPercentCompleted', 'susScore'})
   * @Version({'v1'})
   */
  public function create(Request $request)
  {
    $params = $request->all();
    $project = new Project();
    $project->companyID = Auth::user()->companyID;
    $project->name = $params['name'];
    $project->code = 'WES-'.strtoupper($params['name']);
    $project->description = $params['description'];
    $project->startingDate = date('Y-m-d',strtotime($params['startingDate']));
    $project->testersAmount = $params['testersAmount'];
    $project->status = 'APPROVAL PENDING';
    $project->projectBriefPercentCompleted = $params['projectBriefPercentCompleted'];
    $project->kickOffMeetingPercentCompleted = $params['kickOffMeetingPercentCompleted'];
    $project->recruitmentPercentCompleted = $params['recruitmentPercentCompleted'];
    $project->userTestPlanPercentCompleted = $params['userTestPlanPercentCompleted'];
    $project->userTestingPercentCompleted = $params['userTestingPercentCompleted'];
    $project->resultsAnalysisPercentCompleted = $params['resultsAnalysisPercentCompleted'];
    $project->preliminaryFindingsPercentCompleted = $params['preliminaryFindingsPercentCompleted'];
    $project->finalReportPercentCompleted = $params['finalReportPercentCompleted'];
    $project->highlightsVideoPercentCompleted = $params['highlightsVideoPercentCompleted'];
    $project->userID = Auth::user()->userID;
    $project->adminID = (Auth::user()->isCompanyAdmin == 1? Auth::user()->userID: null);
    $project->lastUpdateDate = date('Y-m-d');
    $project->save();

    return json_encode(array('status'=>true,'massage'=>'Create new project successfully!'));
  }
  /*
   * Update a project
   *
   * @PUT('/admin/projects/{projectID}')
   * @Params({'companyID', 'name', 'description', 'startingDate', 'lastUpdateDate', 'status', 'code', 'userID', 'adminID',
   *   'testersAmount', 'projectBriefPercentCompleted', 'kickOffMeetingPercentCompleted', 'recruitmentPercentCompleted',
   *  'userTestPlanPercentCompleted', 'userTestingPercentCompleted', 'resultsAnalysisPercentCompleted',
   * 'preliminaryFindingsPercentCompleted', 'finalReportPercentCompleted', 'highlightsVideoPercentCompleted', 'susScore'})
   * @Version({'v1'})
   */
  public function update($projectID, Request $request)
  {
    $params = $request->all();

    $project = Project::where(array('projectID'=>$projectID))->get()->first();
    $project->name = $params['name'];
    $project->description = $params['description'];
    $project->startingDate = date('Y-m-d',strtotime($params['startingDate']));
    $project->status = $params['status'];
    $project->testersAmount = $params['testersAmount'];
    $project->projectBriefPercentCompleted = $params['projectBriefPercentCompleted'];
    $project->kickOffMeetingPercentCompleted = $params['kickOffMeetingPercentCompleted'];
    $project->recruitmentPercentCompleted = $params['recruitmentPercentCompleted'];
    $project->userTestPlanPercentCompleted = $params['userTestPlanPercentCompleted'];
    $project->userTestingPercentCompleted = $params['userTestingPercentCompleted'];
    $project->resultsAnalysisPercentCompleted = $params['resultsAnalysisPercentCompleted'];
    $project->preliminaryFindingsPercentCompleted = $params['preliminaryFindingsPercentCompleted'];
    $project->finalReportPercentCompleted = $params['finalReportPercentCompleted'];
    $project->highlightsVideoPercentCompleted = $params['highlightsVideoPercentCompleted'];
    $project->save();

    return json_encode(array('status'=>true,'massage'=>'Updated project successfully!'));
  }
  /*
   * Show project ìnoformation
   */
  public function show($projectID)
  {
    $projectInfo = Project::where(array('projectID'=>$projectID))->get()->first();

    return json_encode($projectInfo);
  }
}
