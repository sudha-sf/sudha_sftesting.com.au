@extends('shared.main-template')

@section('content')
    <div class="col-md-9 col-md-offset-1">

        <form id="assetForm" class="form-horizontal" action="/admin/users/create" method="post"
              enctype="multipart/form-data">

            <fieldset>
                <div class="form-group">
                    <label class="col-md-3 control-label" for="assetType">First Name</label>

                    <div class="col-md-4">
                        <input id="firstName" name="firstName" type="text" class="form-control" value="{{ old('firstName') }}">
                        <span class="text-danger">{{ $errors->first('firstName') }}</span>
                    </div>
                    <label class="col-md-2 control-label" for="uploadDate">Last Name</label>

                    <div class="col-md-3">
                        <input id="lastName" name="lastName" type="text" class="form-control" value="{{ old('lastName') }}">
                        <span class="text-danger">{{ $errors->first('lastName') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="assetType">Password</label>

                    <div class="col-md-4">
                        <input id="newPassword" name="newPassword" type="password" class="form-control" value="{{ old('newPassword') }}">
                        <span class="text-danger">{{ $errors->first('newPassword') }}</span>
                    </div>
                    <label class="col-md-2 control-label" for="uploadDate">Confirm pasword</label>

                    <div class="col-md-3">
                        <input id="confirmPass" name="confirmPass" type="password" class="form-control" value="{{ old('confirmPass') }}">
                        <span class="text-danger">{{ $errors->first('confirmPass') }}</span>
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="assetType">Avatar</label>

                    <div class="col-md-4">
                        <input id="avatar" name="avatar" type="file" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-3 control-label" for="assetType">Email</label>

                    <div class="col-md-4">
                        <input id="email" name="email" type="text" class="form-control" value="{{ old('email') }}">
                        <span class="text-danger">{{ $errors->first('email') }}</span>
                    </div>
                    <label class="col-md-2 control-label" for="uploadDate">Company</label>

                    <div class="col-md-3">
                        <select class="form-control" id="companyID" name="companyID">
                            @foreach($companiesList as $key=>$value)
                                <option value="{{$value->companyID}}">{{$value->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-3">
                        &nbsp;
                    </div>
                    <div class="col-md-4">
                        <div class="checkbox">
                            <label>
                                <input id="enabled" name="enabled" value="1" type="checkbox"> Enable user
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input id="isCompanyAdmin" name="isCompanyAdmin" value="1" type="checkbox"> Is
                                company admin
                            </label>
                        </div>
                    </div>
                </div>



                <!-- Form actions -->
                <div class="form-group">
                    <div class="col-md-12 text-right">
                        <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                        <a href="/admin/users" class="btn btn-primary btn-lg">Cancel</a>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>


@endsection
