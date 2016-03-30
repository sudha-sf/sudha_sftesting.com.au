@extends('shared.main-template')

@section('content')
    <div class="col-md-9 col-md-offset-1">

        <form id="assetForm" class="form-horizontal" action="/admin/companies/create" method="post"
              enctype="multipart/form-data">

            <fieldset>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="assetType">Company Name</label>

                    <div class="col-md-4">
                        <input id="companyName" name="companyName" type="text" class="form-control" value="{{ old('companyName') }}">
                        <span class="text-danger">{{ $errors->first('companyName') }}</span>
                    </div>
                    
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="assetType">Company Logo</label>

                    <div class="col-md-4">
                        <input id="logo" name="logo" type="file" class="form-control" value="">
                    </div>
                </div>

                

                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        <a href="/admin/companies" class="btn btn-primary btn-lg">Cancel</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


@endsection
