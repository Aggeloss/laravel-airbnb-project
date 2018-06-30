@extends('layouts.master')

@section('content')
@php
  $pictures = json_decode($accommondation->pic, true);
@endphp
<div style="max-width:100%; padding-top: 50px;">
  <img  id="radius" src="{{$pictures['data'][0]['path']}}" alt="Generic placeholder image" width=100% height="600" onclick="openModal(), currentSlide(1)">
</div>
<div class="container">
    <div class="row">
      <div style="margin-bottom:600px;">
        <div class="im col-md-6">
          <h2>Title</h2>
          <h2>Place</h2>
          <p>description</p>
          <h2>Time of check in:</h2>
          <h2>Time of check out:</h2>
          <h2>Rating:</h2>
          <p>Comments:</p>
        </div>
        <!--End of Modal-->
        <form action="{{route('accommondation', ['id' => $id])}}" method="post" runat="server" enctype="multipart/form-data">
        <div class="reservation col-md-6">
          <div class="price">
          <span><h3>price</h3></span>
          </div>
          <div class="empty">
          <span><h3></h3></span>
          </div>
          <div class="component">
            <label>Ημερομηνίες</label>
            <div class="date">
              <div class="check">
                <input type="text" class="checkIn" aria-label="Άφιξη" id="checkin" name="checkin" value="" placeholder="Άφιξη" autocomplete="off">
              </div>
              <div class="to" aria-label="&rarr"  role="presentation">
                &rarr;
              </div>
              <div class="check">
                <input type="text" class="checkOut" aria-label="Αναχώρηση" id="checkout" name="checkout" value="" placeholder="Αναχώρηση" autocomplete="off" onclick=openCalendar2()>
              </div>
              <svg role="presentation" focusable="false" id="up">
                <path class="line1" d="M0,10 20,10 10,0z"></path>
                <path class="line2" d="M0,10 10,0 20,10"></path>
              </svg>
              <svg role="presentation" focusable="false" id="up2">
                <path class="line1" d="M0,10 20,10 10,0z"></path>
                <path class="line2" d="M0,10 10,0 20,10"></path>
              </svg>
            </div>
          </div>
          <div class="component2">
      			<label>Επισκέπτες</label>
      			<div class="visitors">
      				<div id="vBtn" class="visitors_btn">
      						<span id="s1">1 Επισκέπτης</span>
      						<svg id="svgD" viewBox="0 0 18 18" role="presentation" aria-hidden="true" focusable="false" style="height: 16px; width: 16px; display: block; fill: currentcolor;">
      							<path id="path1" d="m16.29 4.3a1 1 0 1 1 1.41 1.42l-8 8a1 1 0 0 1 -1.41 0l-8-8a1 1 0 1 1 1.41-1.42l7.29 7.29z" fill-rule="evenodd">
      							</path>
      							<path id="path2" d="m1.71 13.71a1 1 0 1 1 -1.42-1.42l8-8a1 1 0 0 1 1.41 0l8 8a1 1 0 1 1 -1.41 1.42l-7.29-7.29z" fill-rule="evenodd">
      							</path>
      						</svg>

      					<div id="visitorsPick" class="visitorsPicker" >
      						<label class="lbl" id="lb1">Ενήλικες
      						<button id="minus1" class="minus" type="button">-</button>
      						<div class="inp"  id="inp1" name="inp1"  >
      							<input class="par" id="p1" type="text" name="visitor_adult" value="1">
      						</div>
      						<button id="plus1" class="plus" type="button">+</button>
      						</label>
      						<label class="lbl" id="lb2">Παιδιά
      						<button id="minus2" class="minus" type="button">-</button>
      						<div class="inp"  id="inp2" name="inp2" >
      							<input class="par" id="p2" type="text" name="visitor_child" value="0">
      						</div>
      						<button id="plus2" class="plus" type="button">+</button>
      						</label>
      						<label class="lbl" id="lb3">Βρέφη
      						<button id="minus3" class="minus" type="button">-</button>
      						<div class="inp"  id="inp3" name="inp3" >
      							<input class="par" id="p3" type="text" name="visitor_baby" value="0">
      						</div>
      						<button id="plus3" class="plus" type="button">+</button>
      						</label>
      					</div>
      				</div>
      		   </div>
      		</div>
        @if(Auth::check())
        <a href="#">
        <button  type="submit" class="box" onclick="">
          <span style="text-decoration: none; font-size: 17px; color:white;">Κάντε Κράτηση</span>
        </button></a>
        @else
        <a href="#"><button  type="button" class="box" onclick="document.getElementById('id02').style.display='block', hideOverflow(), setYears(), setDays(), setMonths()">
          <span style="text-decoration: none; font-size: 17px; color:white;">Κάντε Κράτηση</span>
        </button></a>
        @endif
        </div>
        {{ csrf_field() }}
      </form>
    </div>
</div>

<!-- The Modal -->
      <div id="myModal" class="second_modal">
      <span class="close cursor" onclick="closeModal()">&times;</span>
      @php
        $pictures = json_decode($accommondation->pic, true);
      @endphp
      <div class="second_modal-content">
          @foreach($pictures['data'] as $pic)
          <div class="mySlides_2">
            <div class="numbertext" alt="{{$pic['id']}}/4"></div>
            <img src="{{$pic['path']}}" style="width:100%">
          </div>
          @endforeach

        <div class="caption-container">
          <p id="caption"></p>
        </div>
        @foreach($pictures['data'] as $pic)
        <div class="im2">
            <img class="demo" src="{{$pic['path']}}" style="width:20%" onclick="currentSlide(1)" alt="Nature and sunrise">
        </div>
        @endforeach
      </div>
      <a class="second_prev" onclick="plusSlides(-1)">&#10094;</a>
      <a class="second_next" onclick="plusSlides(1)">&#10095;</a>
      </div>

      <div id="id01" class="modal">

        @if(count($errors) > 0)
        <div class="alert alert-danger">
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
        @endif

        @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif

        <form class="modal-content animate" action="{{ route('login') }}" method="post">
          <div class="close_container">
            <span onclick="document.getElementById('id01').style.display='none', displayOverflow()" class="close" title="Close Modal">&times;</span>
          </div>

          <div class="container_con_signin">
            <input type="text" placeholder="Διεύθυνση email" id="email" name="email" required>

            <input type="password" placeholder="Κωδικός πρόσβασης" id="password" name="password" required>

            <button id="formButton" type="submit">Σύνδεση</button>
            <label class="_4m7syz">
              <input type="checkbox" name="remember"> <span style="vertical-align: top;">Αποθήκευση στοιχείων </span>
            </label>
          </div>

          <div class="container_con_signin" style="text-align: center">
            <span class="psw"><a href="#">Ξεχάσατε τον κωδικό πρόσβασης;</a></span>
            <div class="separator"></div>
            <span class="psw">Δεν έχετε λογαριασμό;
              <a onclick="document.getElementById('id01').style.display='none', document.getElementById('id02').style.display='block', setYears(), setDays(), setMonths()" name="terms_signin" value="terms_signin" href="#"> Εγγραφή</a>
            </span>
          </div>
          {{ csrf_field() }}
        </form>
      </div>

    <div id="id02" class="modal">

      @if(count($errors) > 0)
          <div class="alert alert-danger">
              @foreach($errors->all() as $error)
                  <p>{{ $error }}</p>
              @endforeach
          </div>
      @endif

      @if(session()->has('message'))
          <div class="alert alert-danger">
              {{ session()->get('message') }}
          </div>
      @endif

      @section('scripts')
        <script>
          function loadFile(event) {
            console.log(event);
            var reader = new FileReader();
            reader.onload = function(){
              var output = document.getElementById('output');
              output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
          }
        </script>
      @endsection

      <form class="modal-content animate" action="{{ route('user.signup') }}" method="post" runat="server" enctype="multipart/form-data">
        <div class="close_container">
          <span onclick="document.getElementById('id02').style.display='none', displayOverflow()" class="close" title="Close Modal">&times;</span>
        </div>

        <div class="container_con_signup" style="padding-top:20px;">
          <label class="custom-file-upload">
              <input type="file" accept="image/*" name="pic" onchange="loadFile(event)">
              Ανέβασε Φωτογραφία
          </label>

          <div class="img_container">
            <p style="text-align:center;"><img class="img" id="output"/></p>
          </div>

          <input type="text" placeholder="Ψευδώνυμο" id="nickname" name="nickname" >

          <input type="text" placeholder="Όνομα" id="fname" name="fname" >

          <input type="text" placeholder="Επίθετο" id="lname" name="lname" >

          <input type="text" placeholder="Διεύθυνση email" id="email" name="email" >

          <input type="password" placeholder="Δημιουργήστε έναν κωδικό πρόσβασης" id="password" name="password" >

          <h3 style="margin-bottom: 0 !important;">Ημερομηνία γέννησης</h3>
          <p>Για να εγγραφείτε, πρέπει να είστε τουλάχιστον 18 ετών. Η ημερομηνία γέννησής σας δεν θα είναι ορατή στους άλλους χρήστες.</p>

          <div class="register_container">
            <select id="arrow-flex" name="month" class="register_dropbox_month">
            </select>
            <select id="arrow-flex" name="day" class="register register_dropbox_day">
            </select>
            <select id="arrow-flex" name="year" class="register register_dropbox_year">
              <!--edw 8a pesei javascript gia times mexri to 1898-->
            </select>
          </div>

          <button id="formButton" type="submit">Εγγραφή</button>
          <label class="_4m7syz">
            <div class="._gyif22">
              <div class="_zkrkb6">
                <span class="_foa2bi">
                  <input type="checkbox" name="terms">
                </span>
              </div>
              <div class="_zkrkb6">
                <span class="_zkege2">Δεν θέλω να λαμβάνω διαφημιστικά μηνύματα από την Airbnb. Επίσης, μπορώ ανά πάσα στιγμή να επιλέξω να μη λαμβάνω
                  τέτοια μηνύματα από τις ρυθμίσεις του λογαριασμού μου ή μέσω του συνδέσμου που περιλαμβάνεται στο μήνυμα.</span>
              </div>
            </div>
          </label>
        </div>

        <div class="container_con_signup" style="text-align: center; padding: 30px;">
          <div class="separator"></div>
          <span class="psw">Έχετε ήδη λογαριασμό στην Airbnb;
            <a onclick="document.getElementById('id02').style.display='none', document.getElementById('id01').style.display='block'" name="terms_reg" value="terms_reg" href="#"> Σύνδεση</a>
          </span>
        </div>
        {{ csrf_field() }}
      </form>
    </div>
@endsection
