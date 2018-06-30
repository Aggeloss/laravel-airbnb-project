@extends('layouts.master')

@section('styles')
    <style>
        img.profile {
            background-color: #d9d9d9;
            border-radius: 50px;
        }
        hr {
            border-color: #d9d9d9;
        }
    </style>
@endsection

@section('content')
    <div class="container" style="padding-top: 40px;">
        <div class="row">
            <div id="example-2"></div>
            <div class="col-md-2">
                <div id="app">

                </div>
            </div>
            <div class="col-md-8">
                <div class="panel panel-default">
                    <div class="panel-heading">{{Auth::user()->name}}</div>

                    <div class="panel-body">
                        <div class="col-md-4">
                            @if(Auth::user()->gender=='male')
                            <img class="profile" src="{{url('../')}}/public/imgs/{{Auth::user()->pic}}" height="85" width="85" style="box-shadow: 5px 4px 15px #888888;"/><br><br>
                            @else
                            <img class="profile" src="{{url('../')}}/public/imgs/{{Auth::user()->pic}}" height="85" width="85" style="box-shadow: 5px 4px 15px #888888;"/><br><br>
                            @endif
                            <a href="{{url('/')}}/changePhoto" style="font-size: 16px; color: black">Change Image</a>
                        </div>
                        <div class="col-md-8">
                            <p style="text-align: right; color: black; font-family: sans-serif"><a href="{{url('/')}}/editProfile">Settings</a>&nbsp;<i class="fa fa-cogs" aria-hidden="true"></i></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    @if(session()->has('message'))
        <script>
            window.alert('{{ session()->get('message') }}');
        </script>
    @endif
@endsection
