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


<div class="modal fade" id="projectModal" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"></h4>
      </div>
      <div class="modal-body">

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Send message</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<iframe id="downloaderFrame" style="display:none;"></iframe>

<script>
$(document).ready(function() {
  $(".products-list .asset-VIDEO a.asset-item").click(function(e) {
    var id = $(this).attr("id")  ;
    var url = $(this).attr("href")  ;
    var name = $(this).attr("name")  ;
    var assetType = $(this).attr("asset-type")  ;

    GetVideo(url, name);
    e.preventDefault();  //stop the browser from following
    //window.location.href = url;
  });
});

function GetVideo(url, name){
  var videoHtml = '<iframe src="https://player.vimeo.com/video/'+url+'" width="500" height="463" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
  $("#projectModal .modal-title").html(name);
  $("#projectModal .modal-body").html(videoHtml);
  $('#projectModal').modal({
    keyboard: false
  });
}
</script>
@endsection
