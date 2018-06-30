@extends('layouts.master')

@section('styles')
    <style>
        img.profile {
            background-color: #d9d9d9;
            border-radius: 50px;
        }
    </style>
@endsection

@section('content')
    <div class="container" style="padding-top: 40px;">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{Auth::user()->name}}</div>

                    <div class="panel-body">
                        <div class="col-md-4">
                            @if(Auth::user()->gender=='male')
                                <img class="profile" src="{{url('../')}}/public/imgs/{{Auth::user()->pic}}" height="85" width="85" style="box-shadow: 5px 4px 15px #888888;"/><br><br>
                            @else
                                <img class="profile" src="{{url('../')}}/public/imgs/{{Auth::user()->pic}}" height="85" width="85" style="box-shadow: 5px 4px 15px #888888;"/><br><br>
                            @endif
                            <a href="{{url('/')}}/changePhoto">Change Image</a>
                        </div>
                        <div class="col-md-8">
                            <form action="{{ route('edit') }}" method="post">
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" id="city" name="city" value="{{$data->city}}" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="about">About Me</label>
                                    <textarea type="text" id="about" name="about" class="form-control" rows="10">{{$data->about}}</textarea>
                                </div>
                                <input type="submit" style="float: right;" class="btn btn-success" name="btn"/>
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection