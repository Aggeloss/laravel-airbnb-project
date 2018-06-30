@extends('layouts.master')

@section('title')
    AirBnb
@endsection

@section('content')
<div class="container">
  @php
    $counter = 1;
    $i = 1;
  @endphp
  @foreach($accommondations->chunk(5) as $accommondationsChunk)
  <div class="row">
    @foreach($accommondationsChunk as $accommondation)
    <div class="position">
        <div style="max-width:260px; padding-bottom: 20px; padding-right: 20px;">
          @php
            $pictures = json_decode($accommondation->pic, true);
            $idSlideName = "slides".$counter;
            $idDotName= "dot".$counter;
          @endphp
          <div class="slideshow-container">
            @foreach($pictures['data'] as $pic)
              <div id="{{$idSlideName}}" class="mySlides fade">
                {{--<div class="numbertext">{{$pic['id']}} / 3</div>--}}
                <img src="{{$pic['path']}}" style="width:260px; height:170px; border-radius: 5px;">
              </div>
            @endforeach
            <div class="fixedOnImage" style="text-align:center">
              <span id="{{$idDotName}}" class="dot" onclick="currentSlide(1, {{$i}})"></span>
              <span id="{{$idDotName}}" class="dot" onclick="currentSlide(2, {{$i}})"></span>
              <span id="{{$idDotName}}" class="dot" onclick="currentSlide(3, {{$i}})"></span>
            </div>

            <a class="prev" onclick="plusSlides(-1, {{$i}})">&#10094;</a>
            <a class="next" onclick="plusSlides(1, {{$i}})">&#10095;</a>
          </div>

          <h2>{{$accommondation->title}}</h2>
          <p>{{$accommondation->description}}</p>

          {{--<a href="{{route('accommondation', ['id' => $accommondation->id])}}" role="button">Book</a>--}}
          <a href="{{route('booking', ['id' => $accommondation->id])}}" role="button">Book</a>

        </div>
        @php
        $total = 5;
        $blue_stars = $accommondation->rate/2;
        $intval_div = intval($blue_stars);
        $normal_stars = $total - $blue_stars;
        for($a = 0; $a < $intval_div; $a++) {
          echo '<i id="star1" class="fas fa-star" style="color: #4076ce; font-size: 10px;">';
          echo '</i>';
        }
        if($blue_stars > $intval_div) {
          $normal_stars = $normal_stars - 1;
          echo '<span class="fix-stars">';
          echo '<span class="gray-star"><i id="star1" class="fas fa-star" style="font-size: 10px;">';
          echo '</i></span>';
          echo '<span class="blue-star"><i id="star1" class="fas fa-star-half" style="font-size: 10px;">';
          echo '</i></span>';
          echo '</span>';
        }
        for($a = 0; $a < $normal_stars; $a++) {
          echo '<i id="star1" class="fas fa-star" style="color: #d8d8d8; font-size: 10px;">';
          echo '</i>';
        }
        echo '</span>';
        @endphp
    </div>
    @php
      $counter++;
      $i++;
    @endphp
    @endforeach
  </div>
  @endforeach
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

@section('scripts')
    @if(session()->has('message'))
        <script>
            window.alert('{{ session()->get('message') }}');
        </script>
    @endif
@endsection
