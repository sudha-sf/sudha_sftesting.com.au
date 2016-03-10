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
                          <h3 class="box-title">Horizontal Form</h3>
                      </div>
                      <!-- /.box-header -->
                      <!-- form start -->
                      <form class="form-horizontal" method="post" id="create_project">
                          <div class="box-body">
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="inputEmail3">Name</label>

                                  <div class="col-sm-10">
                                      <input type="text" placeholder="Please enter name of project" id="name" name="name" class="form-control" required>
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

                                  <div class="col-sm-10">
                                      <input type="date" placeholder="Please select a date" id="startingDate" name="startingDate" class="form-control" required>
                                  </div>
                              </div>
                              <div class="form-group">
                                  <label class="col-sm-2 control-label" for="inputPassword3">Testers Amount</label>

                                  <div class="col-sm-10">
                                      <input type="text" placeholder="Please select a date" id="testersAmount" name="testersAmount" class="form-control" required>
                                  </div>
                              </div>
                          </div>
                          <!-- /.box-body -->
                          <div class="box-footer">
                              <button class="btn btn-default" type="button">Cancel</button>
                              <button class="btn btn-info pull-right" type="submit">Sign in</button>
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
