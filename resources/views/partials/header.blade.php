<div style="display: none">{{$currentName = Route::currentRouteName()}}</div>

@if($currentName != 'user.profile' && $currentName != 'edit' && $currentName != 'pic')
    {{--<nav>
        <div>
            <div>
                <ul>
                  @if(Auth::check())
                    <li>
                        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="profile" src="{{url('../')}}/public/imgs/{{Auth::user()->pic}}" height="30" width="30"/>&nbsp; {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul>
                            <li><a href="{{route('user.profile')}}">Προφίλ</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('user.logout')}}">Αποσύνδεση</a></li>
                        </ul>
                    </li>
                  @else
                      <div class="fixTop">
                        <a href="{{ route('login') }}" style="text-decoration:none; color: black;"> Σύνδεση</span></a>
                        <a href="{{ route('user.signup') }}" style="text-decoration:none; color: black;"> Έγγραφή</span></a>
                      </div>
                  @endif
                </ul>
            </div>
        </div>
    </nav>--}}
    <nav>
        <div>
            <div>
                <div class="banner">
                  <div class="pull-left" style="margin-top:15px; margin-left:15px;">
                    <a href="{{route('home')}}"><img class="logo" src="{{url('../')}}/public/imgs/35082848_1914263692205424_7119110044913762304_n.png" alt="aribnb" width="32" height="35"/></a>
                  </div>
                  <div onclick="change_position()" class="pull-left">
                    <select id="arrow-flex">
                      <option value="dest1">Athens</option>
                      <option value="dest2">New York</option>
                      <option value="dest3">Abu Dhabi</option>
                      <option value="dest4">Netherland</option>
                    </select>
                  </div>
                  @if(Auth::check())
                    <div class="content pull-right">
                      <a href="{{route('assign')}}"> Γίνετε οικοδεσπότης</span></a>
                      <a href="#"> Κερδίστε πόντους</span></a>
                      <a href="#"> Βοήθεια</span></a>
                      <a href="{{route('user.profile')}}"> Προφίλ</span></a>
                      <a href="{{route('user.logout')}}"> Αποσύνδεση</span></a>
                    </div>
                  @else
                    <div class="content pull-right">
                      <a href="#"> Γίνετε οικοδεσπότης</span></a>
                      <a href="#"> Κερδίστε πόντους</span></a>
                      <a href="#"> Βοήθεια</span></a>
                      <a onclick="document.getElementById('id02').style.display='block', hideOverflow(), setYears(), setDays(), setMonths()" href="#"> Έγγραφή</span></a>
                      <a onclick="document.getElementById('id01').style.display='block', hideOverflow()" href="#"> Σύνδεση</span></a>
                    </div>
                  @endif
                </div>
                <!--/ul-->
            </div>
        </div>
    </nav>
@else
    <nav>
        <div>

            <div>
                <a href="{{route('home')}}">Αρχική</a>
            </div>

            <div>
                <ul>
                    <li>
                        <a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><img class="profile" src="{{url('../')}}/public/imgs/{{Auth::user()->pic}}" height="30" width="30"/>&nbsp; {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul>
                            <li><a href="{{route('user.profile')}}">Διαχείρηση Προφίλ</a></li>
                            <li role="separator" class="divider"></li>
                            <li><a href="{{route('user.logout')}}">Αποσύνδεση</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
@endif
    <!--/div--><!-- /.container-fluid -->
<!--/nav-->
