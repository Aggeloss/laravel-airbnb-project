@extends('layouts.master')

@section('content')
    <div class="container" style="padding-top: 100px;>
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{Auth::user()->name}}</div>

                    <div class="panel-body">
                        <div class="col-md-4">
                            @if(Auth::user()->gender=='male')
                            <img class="profile" src="{{url('../')}}/public/imgs/{{Auth::user()->pic}}" height="100" width="100" style="box-shadow: 5px 4px 15px #888888;"/><br><br>
                            @else
                            <img class="profile" src="{{url('../')}}/public/imgs/{{Auth::user()->pic}}" height="100" width="100" style="box-shadow: 5px 4px 15px #888888;"/><br><br>
                            @endif
                            <form action="{{url('/')}}/uploadPhoto" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="file" name="pic" class="form-control"/><br>
                                <input type="submit" class="btn btn-success" name="btn"/>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection