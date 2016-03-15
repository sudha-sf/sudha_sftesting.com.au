@extends('shared.main-template')

@section('content')
    <form id="assetForm" class="form-horizontal" action="/admin/assets/{{$project['code']}}/{{ $asset['assetID'] }}/delete" method="post">
        <div class="col-md-6">
            <h3>Do you want to delete <b>{{$asset['name']}}</b> ?</h3>
            <a href="/admin/assets/{{$project['code']}}" type="button" class="btn btn-primary">No</a>
            <button type="submit" class="btn btn-success">Yes</button>
        </div>
    </form>
@endsection
