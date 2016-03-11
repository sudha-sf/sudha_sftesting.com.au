<div class="box">
  <div class="box-header">
    <h3 class="box-title">Project Status Update</h3>
  </div>
  <?php //dump($project->name);die; ?>
  <!-- /.box-header -->
  <div class="box-body no-padding">
    <table class="table table-condensed">
      <tbody><tr>
        <th style="width: 10px">#</th>
        <th>Task</th>
        <th>Progress</th>
        <th style="width: 40px">Label</th>
      </tr>
      <tr>
        <td>1.</td>
        <td>Project Brief</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar {{($project->projectBriefPercentCompleted == 0)? 'progress-bar-danger':(($project->projectBriefPercentCompleted == 100)?'progress-bar-success':'progress-bar-yellow')}} " style="width: {{$project->projectBriefPercentCompleted}}%"></div>
          </div>
        </td>
        <td><span class="badge {{($project->projectBriefPercentCompleted == 0)? 'bg-red':(($project->projectBriefPercentCompleted == 100)?'bg-green':'bg-yellow')}} ">{{$project->projectBriefPercentCompleted}}%</span></td>
      </tr>
      <tr>
        <td>2.</td>
        <td>Kick Off Meeting</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar {{($project->kickOffMeetingPercentCompleted == 0)? 'progress-bar-danger':(($project->kickOffMeetingPercentCompleted == 100)?'progress-bar-success':'progress-bar-yellow')}} " style="width: {{$project->kickOffMeetingPercentCompleted}}%"></div>
          </div>
        </td>
        <td><span class="badge {{($project->kickOffMeetingPercentCompleted == 0)? 'bg-red':(($project->kickOffMeetingPercentCompleted == 100)?'bg-green':'bg-yellow')}} ">{{$project->kickOffMeetingPercentCompleted}}%</span></td>
      </tr>
      <tr>
        <td>3.</td>
        <td>Recruitment</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar {{($project->recruitmentPercentCompleted == 0)? 'progress-bar-danger':(($project->recruitmentPercentCompleted == 100)?'progress-bar-success':'progress-bar-yellow')}} " style="width: {{$project->recruitmentPercentCompleted}}%"></div>
          </div>
        </td>
        <td><span class="badge {{($project->recruitmentPercentCompleted == 0)? 'bg-red':(($project->recruitmentPercentCompleted == 100)?'bg-green':'bg-yellow')}} ">{{$project->recruitmentPercentCompleted}}%</span></td>
      </tr>
      <tr>
        <td>4.</td>
        <td>User Test Plan</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar {{($project->userTestPlanPercentCompleted == 0)? 'progress-bar-danger':(($project->userTestPlanPercentCompleted == 100)?'progress-bar-success':'progress-bar-yellow')}} " style="width: {{$project->userTestPlanPercentCompleted}}%"></div>
          </div>
        </td>
        <td><span class="badge {{($project->userTestPlanPercentCompleted == 0)? 'bg-red':(($project->userTestPlanPercentCompleted == 100)?'bg-green':'bg-yellow')}} ">{{$project->userTestPlanPercentCompleted}}%</span></td>
      </tr>
      <tr>
        <td>5.</td>
        <td>User Testing</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar {{($project->userTestingPercentCompleted == 0)? 'progress-bar-danger':(($project->userTestingPercentCompleted == 100)?'progress-bar-success':'progress-bar-yellow')}} " style="width: {{$project->userTestingPercentCompleted}}%"></div>
          </div>
        </td>
        <td><span class="badge {{($project->userTestingPercentCompleted == 0)? 'bg-red':(($project->userTestingPercentCompleted == 100)?'bg-green':'bg-yellow')}} ">{{$project->userTestingPercentCompleted}}%</span></td>
      </tr>
      <tr>
        <td>6.</td>
        <td>Results Analysis</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar {{($project->resultsAnalysisPercentCompleted == 0)? 'progress-bar-danger':(($project->resultsAnalysisPercentCompleted == 100)?'progress-bar-success':'progress-bar-yellow')}} " style="width: {{$project->resultsAnalysisPercentCompleted}}%"></div>
          </div>
        </td>
        <td><span class="badge {{($project->resultsAnalysisPercentCompleted == 0)? 'bg-red':(($project->resultsAnalysisPercentCompleted == 100)?'bg-green':'bg-yellow')}} ">{{$project->resultsAnalysisPercentCompleted}}%</span></td>
      </tr>
      <tr>
        <td>7.</td>
        <td>Preliminary Findings</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar {{($project->preliminaryFindingsPercentCompleted == 0)? 'progress-bar-danger':(($project->preliminaryFindingsPercentCompleted == 100)?'progress-bar-success':'progress-bar-yellow')}} " style="width: {{$project->preliminaryFindingsPercentCompleted}}%"></div>
          </div>
        </td>
        <td><span class="badge {{($project->preliminaryFindingsPercentCompleted == 0)? 'bg-red':(($project->preliminaryFindingsPercentCompleted == 100)?'bg-green':'bg-yellow')}} ">{{$project->preliminaryFindingsPercentCompleted}}%</span></td>
      </tr>
      <tr>
        <td>8.</td>
        <td>Final Report</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar {{($project->finalReportPercentCompleted == 0)? 'progress-bar-danger':(($project->finalReportPercentCompleted == 100)?'progress-bar-success':'progress-bar-yellow')}} " style="width: {{$project->finalReportPercentCompleted}}%"></div>
          </div>
        </td>
        <td><span class="badge {{($project->finalReportPercentCompleted == 0)? 'bg-red':(($project->finalReportPercentCompleted == 100)?'bg-green':'bg-yellow')}} ">{{$project->finalReportPercentCompleted}}%</span></td>
      </tr>
      <tr>
        <td>9.</td>
        <td>Highlights video</td>
        <td>
          <div class="progress progress-xs">
            <div class="progress-bar {{($project->highlightsVideoPercentCompleted == 0)? 'progress-bar-danger':(($project->highlightsVideoPercentCompleted == 100)?'progress-bar-success':'progress-bar-yellow')}} " style="width: {{$project->highlightsVideoPercentCompleted}}%"></div>
          </div>
        </td>
        <td><span class="badge {{($project->highlightsVideoPercentCompleted == 0)? 'bg-red':(($project->highlightsVideoPercentCompleted == 100)?'bg-green':'bg-yellow')}} ">{{$project->highlightsVideoPercentCompleted}}%</span></td>
      </tr>
    </tbody></table>
  </div>
  <!-- /.box-body -->
</div>
