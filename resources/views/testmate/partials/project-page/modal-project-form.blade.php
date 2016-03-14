<div class="modal fade testmate-modal" id="projectCreate" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <!-- Box Comment -->
          <div class="box box-widget">
              <!-- /.box-body -->
              <div class="col-md-12">
                  <!-- Horizontal Form -->
                  <div class="box box-info">
                      <div class="box-header with-border">
                          <h3 class="box-title">Project Editor</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form action="" class="form-horizontal" method="post" id="create_project" enctype="multipart/form-data">
                          <div class="box-body">
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="inputEmail3">Name</label>

                                  <div class="col-sm-10">
                                      <input type="text" placeholder="Please enter name of project" id="name" name="name" class="form-control" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="inputEmail3">Code</label>

                                  <div class="col-sm-10">
                                      <input type="text" placeholder="Please enter code of project" id="code" name="code" class="form-control" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="inputEmail3">Company</label>

                                  <div class="col-sm-10">
                                      <select class="form-control" id="companyID" name="companyID">
                                          @foreach($companies as $key=>$value)
                                            <option value="{{$value->companyID}}">{{$value->name}}</option>
                                          @endforeach
                                      </select>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="inputPassword3">Description</label>

                                  <div class="col-sm-10">
                                      <input type="text" placeholder="Please enter a description" id="description" name="description" class="form-control" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="inputPassword3">Start Date</label>

                                  <div class="col-sm-3" id="datePicker">
                                      <input type="text" data-mask="" data-inputmask="'alias': 'dd/mm/yyyy'" class="form-control" id="startingDate" name="startingDate" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="inputPassword3">Testers Amount</label>

                                  <div class="col-sm-10">
                                      <input type="text" placeholder="Please select a date" id="testersAmount" name="testersAmount" class="form-control" required>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label" for="inputPassword3">Project Brief</label>

                                      <div class="col-sm-8">
                                          <select class="form-control" id="projectBriefPercentCompleted" name="projectBriefPercentCompleted">
                                              <option value="0">0%</option>
                                              <option value="5">5%</option>
                                              <option value="10">10%</option>
                                              <option value="15">15%</option>
                                              <option value="20">20%</option>
                                              <option value="25">25%</option>
                                              <option value="30">30%</option>
                                              <option value="35">35%</option>
                                              <option value="40">40%</option>
                                              <option value="45">45%</option>
                                              <option value="50">50%</option>
                                              <option value="55">55%</option>
                                              <option value="60">60%</option>
                                              <option value="65">65%</option>
                                              <option value="70">70%</option>
                                              <option value="75">75%</option>
                                              <option value="80">80%</option>
                                              <option value="85">85%</option>
                                              <option value="90">90%</option>
                                              <option value="95">95%</option>
                                              <option value="100">100%</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label" for="inputPassword3">Kick Off Meeting</label>

                                      <div class="col-sm-8">
                                          <select class="form-control" id="kickOffMeetingPercentCompleted" name="kickOffMeetingPercentCompleted">
                                              <option value="0">0%</option>
                                              <option value="5">5%</option>
                                              <option value="10">10%</option>
                                              <option value="15">15%</option>
                                              <option value="20">20%</option>
                                              <option value="25">25%</option>
                                              <option value="30">30%</option>
                                              <option value="35">35%</option>
                                              <option value="40">40%</option>
                                              <option value="45">45%</option>
                                              <option value="50">50%</option>
                                              <option value="55">55%</option>
                                              <option value="60">60%</option>
                                              <option value="65">65%</option>
                                              <option value="70">70%</option>
                                              <option value="75">75%</option>
                                              <option value="80">80%</option>
                                              <option value="85">85%</option>
                                              <option value="90">90%</option>
                                              <option value="95">95%</option>
                                              <option value="100">100%</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label" for="inputPassword3">Recruitment</label>

                                      <div class="col-sm-8">
                                          <select class="form-control" id="recruitmentPercentCompleted" name="recruitmentPercentCompleted">
                                              <option value="0">0%</option>
                                              <option value="5">5%</option>
                                              <option value="10">10%</option>
                                              <option value="15">15%</option>
                                              <option value="20">20%</option>
                                              <option value="25">25%</option>
                                              <option value="30">30%</option>
                                              <option value="35">35%</option>
                                              <option value="40">40%</option>
                                              <option value="45">45%</option>
                                              <option value="50">50%</option>
                                              <option value="55">55%</option>
                                              <option value="60">60%</option>
                                              <option value="65">65%</option>
                                              <option value="70">70%</option>
                                              <option value="75">75%</option>
                                              <option value="80">80%</option>
                                              <option value="85">85%</option>
                                              <option value="90">90%</option>
                                              <option value="95">95%</option>
                                              <option value="100">100%</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label" for="inputPassword3">User Test Plan</label>

                                      <div class="col-sm-8">
                                          <select class="form-control" id="userTestPlanPercentCompleted" name="userTestPlanPercentCompleted">
                                              <option value="0">0%</option>
                                              <option value="5">5%</option>
                                              <option value="10">10%</option>
                                              <option value="15">15%</option>
                                              <option value="20">20%</option>
                                              <option value="25">25%</option>
                                              <option value="30">30%</option>
                                              <option value="35">35%</option>
                                              <option value="40">40%</option>
                                              <option value="45">45%</option>
                                              <option value="50">50%</option>
                                              <option value="55">55%</option>
                                              <option value="60">60%</option>
                                              <option value="65">65%</option>
                                              <option value="70">70%</option>
                                              <option value="75">75%</option>
                                              <option value="80">80%</option>
                                              <option value="85">85%</option>
                                              <option value="90">90%</option>
                                              <option value="95">95%</option>
                                              <option value="100">100%</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label" for="inputPassword3">User Testing</label>

                                      <div class="col-sm-8">
                                          <select class="form-control" id="userTestingPercentCompleted" name="userTestingPercentCompleted">
                                              <option value="0">0%</option>
                                              <option value="5">5%</option>
                                              <option value="10">10%</option>
                                              <option value="15">15%</option>
                                              <option value="20">20%</option>
                                              <option value="25">25%</option>
                                              <option value="30">30%</option>
                                              <option value="35">35%</option>
                                              <option value="40">40%</option>
                                              <option value="45">45%</option>
                                              <option value="50">50%</option>
                                              <option value="55">55%</option>
                                              <option value="60">60%</option>
                                              <option value="65">65%</option>
                                              <option value="70">70%</option>
                                              <option value="75">75%</option>
                                              <option value="80">80%</option>
                                              <option value="85">85%</option>
                                              <option value="90">90%</option>
                                              <option value="95">95%</option>
                                              <option value="100">100%</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                              <div class="col-sm-6">
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label" for="inputPassword3">Results Analysis</label>

                                      <div class="col-sm-8">
                                          <select class="form-control" id="resultsAnalysisPercentCompleted" name="resultsAnalysisPercentCompleted">
                                              <option value="0">0%</option>
                                              <option value="5">5%</option>
                                              <option value="10">10%</option>
                                              <option value="15">15%</option>
                                              <option value="20">20%</option>
                                              <option value="25">25%</option>
                                              <option value="30">30%</option>
                                              <option value="35">35%</option>
                                              <option value="40">40%</option>
                                              <option value="45">45%</option>
                                              <option value="50">50%</option>
                                              <option value="55">55%</option>
                                              <option value="60">60%</option>
                                              <option value="65">65%</option>
                                              <option value="70">70%</option>
                                              <option value="75">75%</option>
                                              <option value="80">80%</option>
                                              <option value="85">85%</option>
                                              <option value="90">90%</option>
                                              <option value="95">95%</option>
                                              <option value="100">100%</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label" for="inputPassword3">Preliminary Findings</label>

                                      <div class="col-sm-8">
                                          <select class="form-control" id="preliminaryFindingsPercentCompleted" name="preliminaryFindingsPercentCompleted">
                                              <option value="0">0%</option>
                                              <option value="5">5%</option>
                                              <option value="10">10%</option>
                                              <option value="15">15%</option>
                                              <option value="20">20%</option>
                                              <option value="25">25%</option>
                                              <option value="30">30%</option>
                                              <option value="35">35%</option>
                                              <option value="40">40%</option>
                                              <option value="45">45%</option>
                                              <option value="50">50%</option>
                                              <option value="55">55%</option>
                                              <option value="60">60%</option>
                                              <option value="65">65%</option>
                                              <option value="70">70%</option>
                                              <option value="75">75%</option>
                                              <option value="80">80%</option>
                                              <option value="85">85%</option>
                                              <option value="90">90%</option>
                                              <option value="95">95%</option>
                                              <option value="100">100%</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label" for="inputPassword3">Final Rep</label>

                                      <div class="col-sm-8">
                                          <select class="form-control" id="finalReportPercentCompleted" name="finalReportPercentCompleted">
                                              <option value="0">0%</option>
                                              <option value="5">5%</option>
                                              <option value="10">10%</option>
                                              <option value="15">15%</option>
                                              <option value="20">20%</option>
                                              <option value="25">25%</option>
                                              <option value="30">30%</option>
                                              <option value="35">35%</option>
                                              <option value="40">40%</option>
                                              <option value="45">45%</option>
                                              <option value="50">50%</option>
                                              <option value="55">55%</option>
                                              <option value="60">60%</option>
                                              <option value="65">65%</option>
                                              <option value="70">70%</option>
                                              <option value="75">75%</option>
                                              <option value="80">80%</option>
                                              <option value="85">85%</option>
                                              <option value="90">90%</option>
                                              <option value="95">95%</option>
                                              <option value="100">100%</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group">
                                      <label class="col-sm-4 control-label" for="inputPassword3">Highlights Video</label>

                                      <div class="col-sm-8">
                                          <select class="form-control" id="highlightsVideoPercentCompleted" name="highlightsVideoPercentCompleted">
                                              <option value="0">0%</option>
                                              <option value="5">5%</option>
                                              <option value="10">10%</option>
                                              <option value="15">15%</option>
                                              <option value="20">20%</option>
                                              <option value="25">25%</option>
                                              <option value="30">30%</option>
                                              <option value="35">35%</option>
                                              <option value="40">40%</option>
                                              <option value="45">45%</option>
                                              <option value="50">50%</option>
                                              <option value="55">55%</option>
                                              <option value="60">60%</option>
                                              <option value="65">65%</option>
                                              <option value="70">70%</option>
                                              <option value="75">75%</option>
                                              <option value="80">80%</option>
                                              <option value="85">85%</option>
                                              <option value="90">90%</option>
                                              <option value="95">95%</option>
                                              <option value="100">100%</option>
                                          </select>
                                      </div>
                                  </div>
                                  <div class="form-group project-status">
                                      <label class="col-sm-4 control-label" for="inputPassword3">Project Status</label>
                                      <div class="col-sm-8">
                                          <select class="form-control" id="status" name="status">
                                              <option value="APPROVAL PENDING">APPROVAL PENDING</option>
                                              <option value="IN PROGRESS">IN PROGRESS</option>
                                              <option value="COMPLETED">COMPLETED</option>
                                              <option value="DELAYED">DELAYED</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                              <button class="btn btn-default cancelProject" type="button">Cancel</button>
                              <button class="btn btn-info pull-right submit_project" type="button">Save</button>
                          </div>
                          <!-- /.box-footer -->
                      </form>
                  </div>
                  <!-- /.box -->
              </div>
          </div>
        <!-- /.box -->
      </div>
      <div style="clear: both;"></div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
