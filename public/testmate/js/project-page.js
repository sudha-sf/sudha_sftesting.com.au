$(document).ready(function() {
    $('#projectModal').on('shown.bs.modal', function () {
        var main_box = $('.main-comments');
        main_box .scrollTop(main_box .prop('scrollHeight'));
    });
    $('.create_project').click(function(){
        $('#projectCreate').modal({
            keyboard: false
        });
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
      $( ".postCommnet" ).unbind();
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
          ShowComments(result);
        }
    });
}

function ShowComments(result){
  var innerHTML ='';
  $.each(result,function(index,data){
          innerHTML += '<div class="box-comment">';
          innerHTML+= '<img class="img-circle img-sm" src="/testmate/images/default_avatar.png" alt="User Image">';
          innerHTML+= '<div class="comment-text">';
          if(data.user_object != null){
              innerHTML+= ' <span class="username">'+data.user_object.firstName+' '+data.user_object.lastName;
          }
          innerHTML+= '<span class="text-muted pull-right">'+data.date+'</span></span>'+data.comment+'</div></div>';

  });
  $('.inner-html').html(innerHTML);
}

function GetVideo(url, name){
  var videoHtml = '<iframe src="https://player.vimeo.com/video/'+url+'" width="500" height="463" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>';
  $("#projectModal .modal-title").html(name);
  $("#projectModal .modal-body .video-object").html(videoHtml);
  $('#projectModal').modal({
    keyboard: false
  });
}
