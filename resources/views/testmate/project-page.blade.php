@extends('shared.main-template')

@section('content')
<div class='row'>
  <div class="col-md-6">
      <div class="box">
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">

          <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Project Assets</h3>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <ul class="products-list product-list-in-box">

                  <?php echo $filesHtml; ?>

                </ul>
              </div>
              <!-- /.box-body -->
            </div>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
    <div class="col-md-6">
      <ul class="timeline">
        <?php echo $timelineHtml; ?>
      </ul>
    </div>
</div>
<div class="col-md-6">

</div>

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

<iframe id="downloaderFrame" style="display:none;"></iframe>

<script>
$(document).ready(function() {
    $('#projectModal').on('shown.bs.modal', function () {
        var main_box = $('.main-comments');
        main_box .scrollTop(main_box .prop('scrollHeight'));
    });
  $(".products-list .asset-VIDEO a.asset-item").click(function(e) {
    var id = $(this).attr("id")  ;
    var url = $(this).attr("href")  ;
    var name = $(this).attr("name")  ;
    var assetType = $(this).attr("asset-type")  ;

    GetVideo(url, name);
    e.preventDefault();  //stop the browser from following
    //window.location.href = url;
      <!-- call action to get all comments in a asset -->
      getAllComments(id);
      <!-- Post a comment for a video with associated asset -->
      $(".postCommnet").click(function(){
          var message = $('#contentPost').val();
          if(message.length <= 0){
              $('.error-message').show();
              return false;
          }
          $.ajax({
              url: baseUrl()+"/comments/"+id,
              method: "POST",
              dataType: 'json',
              data: "message="+message,
              beforeSend: function(){
                  <!--doing something in the cases you want to implement before sending data -->
              },
              success: function(result){
                  var innerHTML = '<div class="box-comment">';
                      innerHTML+= '<img class="img-circle img-sm" src="/testmate/images/default_avatar.png" alt="User Image">';
                      innerHTML+= '<div class="comment-text">';
                      innerHTML+= ' <span class="username">'+result.userComment;
                      innerHTML+= '<span class="text-muted pull-right">'+result.commentDate+'</span></span>'+result.message+'</div></div>';
                  $('.inner-html').after().append(innerHTML);
                  var main_box = $('.main-comments');
                  main_box .scrollTop(main_box .prop('scrollHeight'));
                  $('.error-message').hide();
                  $('#contentPost').val(null);
              }
          });
      });
  });
    $('#resetComment').click(function(){
        $('#contentPost').val('');
        $('#projectModal').modal('toggle');
    });
});
<!-- Define base url -->
function baseUrl(){
    pathArray = location.href.split( '/' );
    protocol = pathArray[0];
    host = pathArray[2];
    url = protocol + '//' + host;
    return url;
}

<!-- Get all comments in a asset-->
function getAllComments(assetID){
    $.ajax({
        url: baseUrl()+"/comments/"+assetID,
        method: "GET",
        dataType: 'json',
        beforeSend: function(){
            <!--doing something in the cases you want to implement before sending data -->
        },
        success: function(result){
            $.each(result,function(index,data){
                var innerHTML = '<div class="box-comment">';
                    innerHTML+= '<img class="img-circle img-sm" src="/testmate/images/default_avatar.png" alt="User Image">';
                    innerHTML+= '<div class="comment-text">';
                    innerHTML+= ' <span class="username">'+data.user_object.firstName+' '+data.user_object.lastName;
                    innerHTML+= '<span class="text-muted pull-right">'+data.date+'</span></span>'+data.comment+'</div></div>';
                $('.inner-html').after().append(innerHTML);
            });

        }
    });
}


function GetVideo(url, name){
  var videoHtml = '<iframe src="https://player.vimeo.com/video/'+url+'" width="500" height="463" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
  $("#projectModal .modal-title").html(name);
  $("#projectModal .modal-body .video-object").html(videoHtml);
  $('#projectModal').modal({
    keyboard: false
  });
}
</script>
@endsection
