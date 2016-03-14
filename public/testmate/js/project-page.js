$(document).ready(function() {
    $('.project-status').hide();
    $('#projectModal').on('shown.bs.modal', function () {
        var main_box = $('.main-comments');
        main_box .scrollTop(main_box .prop('scrollHeight'));
    });
    //Filter asset in project detail
    var filterKey = getUrlParameter('filterKey');
    if(filterKey !== undefined && filterKey !== 'ALL'){
        $('#assetTypeInProject').val(filterKey);
    }
    $('#assetTypeInProject').change(function(){
        var filterVal = $(this).val();
        var urlAction = null;
        urlAction = $('#filterAsset').attr('action')+'/filter?filterKey='+filterVal;
        window.location.href = urlAction;
    });
    //Open project form to create a new project
    $('.create_project').click(function(){
        $('#projectCreate').modal({
            keyboard: false
        });
    });
    //Include date picker for input form
    $.fn.datepicker.defaults.format = "yyyy-mm-dd";
    $('#datePicker input').datepicker({
        startDate: '-3d',
        autoclose: true,
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
    $('.cancelProject').click(function(){
        $('#projectCreate').modal('toggle');
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
//Open lightbox in the case access asset from home-dashboard
window.onload = function(){
    if($('#assetID').val() != null){
        var assetID = $('#assetID').val();
        $(".products-list .asset-VIDEO a#"+assetID).click();
    }
}
//Create/Update project for admin user
$('.submit_project').click(function(e){
    var Url = null;
    var dataObj = new FormData();
    dataObj.append( 'name', $('#name').val() );
    dataObj.append( 'description', $('#description').val() );
    dataObj.append( 'startingDate', $('#startingDate').val() );
    dataObj.append( 'testersAmount', $('#testersAmount').val() );
    dataObj.append( 'projectBriefPercentCompleted', $('#projectBriefPercentCompleted').val() );
    dataObj.append( 'kickOffMeetingPercentCompleted', $('#kickOffMeetingPercentCompleted').val() );
    dataObj.append( 'recruitmentPercentCompleted', $('#recruitmentPercentCompleted').val() );
    dataObj.append( 'userTestPlanPercentCompleted', $('#userTestPlanPercentCompleted').val() );
    dataObj.append( 'userTestingPercentCompleted', $('#userTestingPercentCompleted').val() );
    dataObj.append( 'resultsAnalysisPercentCompleted', $('#resultsAnalysisPercentCompleted').val() );
    dataObj.append( 'preliminaryFindingsPercentCompleted', $('#preliminaryFindingsPercentCompleted').val() );
    dataObj.append( 'finalReportPercentCompleted', $('#finalReportPercentCompleted').val() );
    dataObj.append( 'highlightsVideoPercentCompleted', $('#highlightsVideoPercentCompleted').val() );
    dataObj.append( 'status', $('#status').val() );
    dataObj.append( 'code', $('#code').val() );
    dataObj.append( 'companyID', $('#companyID').val() );
    if($('#projectID').val() != undefined && $('#projectID').val() != null){
        Url = baseUrl()+'/admin/projects/update/'+$('#projectID').val();
    }else{
        Url = baseUrl()+'/admin/projects/create';
    }
    return submitProject(dataObj, Url);
    e.preventDefault();
});
//Show & Update project
function UpdateProject(projectID){
    var URL = baseUrl()+'/admin/projects/'+projectID;
    $.ajax({
        url:URL,
        method: 'GET',
        dataType: 'json',
        success: function(result){
            if(result != undefined &&result != null){
                $('#create_project').attr('action',URL);
                $('#create_project').attr('method','PUT');
                $('#create_project').attr('enctype','application/x-www-form-urlencoded');
                $('#name').val(result.name);
                var code = result.code;
                var res = code.replace(/-/gi, " ");
                $('#code').val(res);
                $('#companyID').val(result.companyID);
                $('#description').val(result.description);
                $('#startingDate').val(result.startingDate);
                $('#testersAmount').val(result.testersAmount);
                $('#projectBriefPercentCompleted').val(result.projectBriefPercentCompleted);
                $('#kickOffMeetingPercentCompleted').val(result.kickOffMeetingPercentCompleted);
                $('#recruitmentPercentCompleted').val(result.recruitmentPercentCompleted);
                $('#userTestPlanPercentCompleted').val(result.userTestPlanPercentCompleted);
                $('#userTestingPercentCompleted').val(result.userTestingPercentCompleted);
                $('#resultsAnalysisPercentCompleted').val(result.resultsAnalysisPercentCompleted);
                $('#preliminaryFindingsPercentCompleted').val(result.preliminaryFindingsPercentCompleted);
                $('#finalReportPercentCompleted').val(result.finalReportPercentCompleted);
                $('#highlightsVideoPercentCompleted').val(result.highlightsVideoPercentCompleted);
                $('#status').val(result.status);
                $('.project-status').show();
                $('#projectCreate').modal({
                    keyboard: false
                });
                $('#create_project').after().append('<input type="hidden" id="projectID" name="projectID" value="'+projectID+'" />');
            }
        }
    });

}
//Submit & save form information
function submitProject(dataObj, Url){
    $.ajax({
        url : Url,
        method: 'POST',
        data: dataObj,
        dataType: 'json',
        processData: false,
        contentType: false,
        success: function(result){
            if(result.status == true){
                window.location.reload();
            }
        }
    });
}
//Get params from URL
function getUrlParameter(sParam) {
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : sParameterName[1];
        }
    }
};