@extends('shared.main-template')

@section('content')
    <div class="col-md-9 col-md-offset-1">

        <form id="assetForm" class="form-horizontal" action="" method="post" enctype="multipart/form-data">
            <fieldset>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="assetType">First Name</label>

                    <div class="col-md-4">
                        <input id="uploadDate" name="firstName" type="text" class="form-control" value="">
                    </div>
                    <label class="col-md-2 control-label" for="uploadDate">Last Name</label>

                    <div class="col-md-3">
                        <input id="uploadDate" name="lastName" type="text" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="name">Asset Name *</label>

                    <div class="col-md-9">
                        <input id="name" name="name" type="text" class="form-control" required maxlength="450" value="">
                    </div>

                </div>

                <div id="urlSection" class="form-group">
                    <label class="col-md-3 control-label" for="name">URL</label>

                    <div class="col-md-4">
                        <input id="url" name="url" type="text" class="form-control" maxlength="500" value="">
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
                        <textarea class="form-control" id="description" name="description" placeholder="" rows="5"></textarea>
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
                        <a href="" class="btn btn-primary btn-lg">Cancel</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


@endsection
