@extends('layouts.master')

@section('content')
<div class= "list">

  <p> <h1>Καταχώρηση Καταλύματος</h1> </p>


  <form>
  <label>Τίτλος Καταλύματος</label><br>
  <select id="assign" name="type">
          <option value="dest1">Διαμερισμα</option>
          <option value="dest2">Συγκρότημα Κατοικιών</option>
          <option value="dest3">Σοφίτα</option>
      </select>

  <br><br>

  <label>Τόπος Καταλύματος</label><br>
  <input type="text" id="assign" name="place" required>
  <br><br>
  <label>Πέριγραφη Καταλύματος</label><br>
  <textarea name="comment" form="usrform" required></textarea>
  <br><br>
  <label>Ωρα Check in</label><br>
  <select id="assign" name = "Title">
    <option value = "12"> 12:00 pm</option>
    <option value = "2">14:00 pm</option>

  </select>
  <br><br>
  <label>Ωρα Check out</label><br>
  <select name = "Title">
    <option value = "12"> 12:00 pm</option>
    <option value = "2">14:00 pm</option>

  </select>
  <br><br>
  <label>Εικόνα Καταλύματος</label><br>
  <input type = "file" name = "file" id="file assign" class="inputfile" data-multiple-caption="{count} files selected" multiple/>
  <label for="file">Επιλέξτε φωτογραφίες</label>
  <br><br>
  <input id="assign" type="submit" value="Καταχώρηση">


  </form>

</div>
@endsection
