@extends('shared.main-template')

@section('content')
    <div class="col-md-9 col-md-offset-1">

        <form id="assetForm" class="form-horizontal" action="/admin/assets/{{$project['code']}}/save" method="post" enctype="multipart/form-data">
            <input type="hidden" name="assetID" value="{{$asset['assetID']}}"/>
            <input type="hidden" name="projectID" value="{{$project['projectID']}}"/>
            <fieldset>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="assetType">Asset Type *</label>

                    <div class="col-md-4">
                        <select id="assetType" name="assetType" class="form-control" required>
                            <option value="">Please Select</option>
                            <option value="VIDEO">VIDEO</option>
                            <option value="DOCUMENT">DOCUMENT</option>
                            <option value="TIMELINE">TIMELINE</option>
                        </select>
                    </div>
                    <label class="col-md-2 control-label" for="uploadDate">Upload Date</label>

                    <div class="col-md-3">
                        <input id="uploadDate" name="uploadDate" type="text" class="form-control"
                               value="{{$asset['uploadDate']}}">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="name">Asset Name *</label>

                    <div class="col-md-9">
                        <input id="name" name="name" type="text" class="form-control" required maxlength="450"
                               value="{{$asset['name']}}">
                    </div>

                </div>

                <div id="urlSection" class="form-group">
                    <label class="col-md-3 control-label" for="name">URL</label>

                    <div class="col-md-4">
                        <input id="url" name="url" type="text" class="form-control" maxlength="500"
                               value="{{$asset['url']}}">
                    </div>

                    <label class="col-md-2 control-label">Upload File</label>

                    <div class="col-md-2">
                        <input id="uploadFile" name="uploadFile" type="file" class="form-control" value="">
                    </div>
                    <div class="col-md-1">
                        <button type="button" id="removeUploadFile" class="btn btn-primary">Remove</button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="status">Status</label>

                    <div class="col-md-9">
                        <select id="status" name="status" class="form-control">
                            <option value="">Please Select</option>
                            <option value="APPROVED">APPROVED</option>
                            <option value="PENDING">PENDING APPROVAL</option>
                            <option value="CANCELLED">CANCELLED</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="message">Asset Description</label>

                    <div class="col-md-9">
                        <textarea class="form-control" id="description" name="description" placeholder=""
                                  rows="5">{{$asset['description']}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-12 col-md-offset-1">
                        <input type="checkbox" name="notify">
                        <span>Notify Project Team Lead about new asset</span>
                    </div>
                </div>

                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        <a href="/project-admin/{{$project['code']}}" class="btn btn-primary btn-lg">Cancel</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.15.0/jquery.validate.min.js"></script>

    <script>
        $(document).ready(function () {
            $('#uploadDate').datepicker();
            $('#assetType').val("{{$asset['assetType']}}");
            $('#status').val("{{$asset['status']}}");


            $('#removeUploadFile').click(function(){
                $('#uploadFile').val('');
            });

            var changeType = function () {

                var type = $('#assetType').val();
                if (type === 'TIMELINE') {
                    $('#status').val('APPROVED');
                    $('#url').val('');
                    $('#urlSection').hide();
                } else {
                    $('#status').val('');
                    $('#urlSection').show();
                }
            }

            if ($('#assetType').val() === 'TIMELINE') {
                changeType();
            }

            $("#assetForm").validate({
                errorPlacement: function (error, element) {
                    $(element).parent().append(error);
                },
                errorElement: "span",
                messages: {
                    assetType: {
                        required: " (required)"
                    },
                    name: {
                        required: " (required)"
                    },
                }
            });

            $('#assetType').change(function () {

                changeType();
            });
        });
    </script>
@endsection
