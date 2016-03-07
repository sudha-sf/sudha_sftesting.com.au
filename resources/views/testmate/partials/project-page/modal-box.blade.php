<div class="modal fade testmate-modal" id="projectModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div style="clear: both;"></div>
        <!-- Box Comment -->
          <div class="box box-widget">
              <!-- /.box-header -->
              <div class="box-body col-md-7">
                  {{--<img class="img-responsive pad" src="https://almsaeedstudio.com/themes/AdminLTE/dist/img/photo2.png" alt="Photo">--}}
                  <div class="video-object"></div>
                  <div class="video-bottom hidden">
                      <p>I took this photo this morning. What do you guys think?</p>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
                      <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
                      <span class="pull-right text-muted">127 likes - 3 comments</span>
                  </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer box-comments col-md-5">
                  <select class="form-control type-comment">
                      <option>Approved / Pending Review</option>
                      <option>Other Select</option>
                  </select>
                  <h3 class="heading-comment">Comments</h3>
                  <div class="main-comments">
                      <!-- box-comments-->
                      <div class="inner-html"></div>
                      <!-- /box-comments-->
                  </div>
                  <div class="box-post">
                      <form action="#" method="post">
                          <img class="img-responsive img-circle img-sm" src="/testmate/images/default_avatar.png" alt="Alt Text">
                          <!-- .img-push is used to add margin to elements next to floating images -->
                          <div class="img-push">
                              <span class="error-message" style="color: red;display: none;">Please fill in a message!</span>
                              <input type="text" class="form-control input-sm" id="contentPost"
                                     placeholder="Press enter to post comment">
                          </div>
                          <div class="modal-footer">
                              <button type="button" class="btn btn-primary postCommnet">Post Comment</button>
                              <button type="button" class="btn btn-default" id="resetComment">Cancel</button>
                          </div>
                      </form>
                  </div>
              </div>
          </div>
        <!-- /.box -->
      </div>
      <div style="clear: both;"></div>

    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
