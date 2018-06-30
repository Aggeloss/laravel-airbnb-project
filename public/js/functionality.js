
var timesClicked = 0;

function change_position() {
  if (timesClicked === 0) {
    document.getElementById("arrow-flex").style.background = "url('/airbnb/public/imgs/arrow-18-up.png') no-repeat right white";
    document.getElementById("arrow-flex").style.backgroundSize = "15px";
    document.getElementById("arrow-flex").style.backgroundPosition = "380px";
    timesClicked++;
  } else {
    document.getElementById("arrow-flex").style.background = "url('/airbnb/public/imgs/arrow-18-down.png') no-repeat right white";
    document.getElementById("arrow-flex").style.backgroundSize = "15px";
    document.getElementById("arrow-flex").style.backgroundPosition = "380px";
    timesClicked = 0;
  }
}

var specifiedElement = document.getElementById('arrow-flex');

document.addEventListener('click', function(event) {
  var isClickInside = specifiedElement.contains(event.target);

  if (!isClickInside) {
    document.getElementById("arrow-flex").style.background = "url('/airbnb/public/imgs/arrow-18-down.png') no-repeat right white";
    document.getElementById("arrow-flex").style.backgroundSize = "15px";
    document.getElementById("arrow-flex").style.backgroundPosition = "380px";
    timesClicked = 0;
  }
});

var body = document.body;

var modal = {
  first:document.getElementById('id01'),
  second:document.getElementById('id02')
};

window.onclick = function(event) {
    if (event.target == modal.first) {
        modal.first.style.display = "none";
        body.style.overflow = "auto";
    } else if (event.target == modal.second) {
        modal.second.style.display = "none";
        body.style.overflow = "auto";
    }
}

function displayOverflow() {
  body.style.overflow = "auto";
}

function hideOverflow() {
  body.style.overflow = "hidden";
}

var slideIndex = [];
var slides = document.getElementsByClassName("mySlides");

if(slides.length != 0) {
  var count = parseInt(slides.length / 3);
  for (i = 1; i <= count; i++) {
    slideIndex[i] = 1;
  }
  showSlides(slideIndex);

  function plusSlides(n, noe) {
    showSlides(slideIndex[noe] += n, noe);
  }

  function currentSlide(n, noe) {
    showSlides(slideIndex[noe] = n, noe);
  }

  function showSlides(n, numberOfElement) {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    var count = parseInt(slides.length / 3);
    var new_slides = [];
    var new_dots = [];
    for (i = 1; i <= count; i++) {
      new_slides[i] = document.querySelectorAll("div#slides" + i);
      new_dots[i] = document.querySelectorAll("span#dot" + i);
    }
    if (numberOfElement != null) {
      console.log(n);
      if (n > new_slides[numberOfElement].length) {slideIndex[numberOfElement] = 1}
      if (n < 1) {slideIndex[numberOfElement] = new_slides[numberOfElement].length}
      for (i = 0; i < new_slides[numberOfElement].length; i++) {
          new_slides[numberOfElement][i].style.display = "none";
      }
      for (i = 0; i < new_dots[numberOfElement].length; i++) {
          new_dots[numberOfElement][i].className = new_dots[numberOfElement][i].className.replace(" active", "");
      }
      new_slides[numberOfElement][slideIndex[numberOfElement]-1].style.display = "block";
      new_dots[numberOfElement][slideIndex[numberOfElement]-1].className += " active";
    } else {
      for (i = 1; i <= count; i++) {
        new_slides[i][0].style.display = "block";
        new_dots[i][0].className += " active";
      }
    }
  }
} else {

  function openModal() {
  		document.getElementById('myModal').style.display = "block";
  }

  function closeModal() {
    document.getElementById('myModal').style.display = "none";
  }

  var slideIndex = 1;
  showSlides(slideIndex);

  function plusSlides(n) {
    showSlides(slideIndex += n);
  }

  function currentSlide(n) {
    showSlides(slideIndex = n);
  }

  function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("mySlides_2");
    var dots = document.getElementsByClassName("demo");
    var numbertext = document.getElementsByClassName("numbertext");
    var captionText = document.getElementById("caption");
    if (n > slides.length) {slideIndex = 1}
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";
    dots[slideIndex-1].className += " active";
    captionText.innerHTML = slideIndex+"/"+slides.length+" : "+dots[slideIndex-1].alt;
  }
}

function setYears(){
	var el = document.getElementsByClassName("register register_dropbox_year");
	var x;
	for(x=0; x<el.length;x++){
		for(y = 2018; y >= 1898; y--){

			var optn = new Option();
			optn.value = y;
			optn.text = y;
			el[x].options.add(optn);
		}
	}
}

function setMonths(){
	var el = document.getElementsByClassName("register_dropbox_month");
	var optionsArray = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
	var i = 1;
	var x;
	for(x=0; x<el.length;x++){
		for(y = 0; y < optionsArray.length; y++){

			var optn = new Option();
			optn.value = i;
			optn.text = optionsArray[y];
			el[x].options.add(optn);
			i++;
		}
	}

}

function setDays(){

	var el = document.getElementsByClassName("register register_dropbox_day");
	var optionsArray = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23", "24", "25", "26", "27", "28", "29", "30", "31"];
	for(x=0; x<el.length;x++){
		for(y = 0; y < optionsArray.length; y++){

			var optn = new Option();
			optn.value = optionsArray[y];
			optn.text = optionsArray[y];
			el[x].options.add(optn);

		}
	}
}

/*var guide = {
  star1:false,
  star2:false,
  star3:false,
  star4:false,
  star5:false,
  check: function() {
    if (this.star5 === true) {
      document.getElementById("star1").style.color = "#55aaa8";
      document.getElementById("star2").style.color = "#55aaa8";
      document.getElementById("star3").style.color = "#55aaa8";
      document.getElementById("star4").style.color = "#55aaa8";
      document.getElementById("star5").style.color = "#55aaa8";
    } else if (this.star4 === true){
      document.getElementById("star1").style.color = "#55aaa8";
      document.getElementById("star2").style.color = "#55aaa8";
      document.getElementById("star3").style.color = "#55aaa8";
      document.getElementById("star4").style.color = "#55aaa8";
    } else if (this.star3 === true){
      document.getElementById("star1").style.color = "#55aaa8";
      document.getElementById("star2").style.color = "#55aaa8";
      document.getElementById("star3").style.color = "#55aaa8";
    } else if (this.star2 === true){
      document.getElementById("star1").style.color = "#55aaa8";
      document.getElementById("star2").style.color = "#55aaa8";
    } else if (this.star1 === true){
      document.getElementById("star1").style.color = "#55aaa8";
    }
  }
}

function change_star1() {
  guide.star1 = true;
  guide.check();
}
function change_star2() {
  guide.star2 = true;
  guide.check();
}
function change_star3() {
  guide.star3 = true;
  guide.check();
}
function change_star5() {
  guide.star5 = true;
  guide.check();
}
function change_star4() {
  guide.star4 = true;
  guide.check();
}

function recovery() {
  document.getElementById("star1").style.color = "#d8d8d8";
  document.getElementById("star2").style.color = "#d8d8d8";
  document.getElementById("star3").style.color = "#d8d8d8";
  document.getElementById("star4").style.color = "#d8d8d8";
  document.getElementById("star5").style.color = "#d8d8d8";
  guide.star1 = false;
  guide.star2 = false;
  guide.star3 = false;
  guide.star4 = false;
  guide.star5 = false;

}*/


// Converts a date into '12-Oct-1984' format
function getDateString(dt) {
  return dt.getDate() + '-' +
    ['Ιαν','Φεβ','Μαρ','Απρ','Μάιος','Ιουν','Ιουλ','Αυγ','Σεπ','Οκτ','Νοεμ','Δεκ'][dt.getMonth()] +
    '-' + dt.getFullYear();
}

// Converts a date into '12/10/1984' format
function getDateString2(dt) {
  var m=parseInt(dt.getMonth())+1;
  var m = m < 10 ? '0' + m : m;
  var day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
  return dt.getFullYear()+'/' +m+'/' + day;
}

// Converts a date into 'July 2010' format
function getMonthYearString(dt) {
  return ['Ιανουάριος','Φεβρουάριος','Μάρτιος','Απρίλιος','Μάιος','Ιούνιος','Ιούλιος',
          'Αύγουστος','Σεπτέμβριος','Οκτώβριος','Νοέμβριος','Δεκέμβριος'][dt.getMonth()] +
         ' ' + dt.getFullYear();
}

// This is the function called when the user clicks any button
function chooseDate(e) {
	var targ;
	if (!e) var e = window.event;
	if (e.target) targ = e.target;
	else if (e.srcElement) targ = e.srcElement;
	if (targ.nodeType == 3) targ = targ.parentNode;

  var div = targ.parentNode.parentNode.parentNode.parentNode.parentNode; // Find the div
  var idOfTextbox = div.getAttribute('checkintextbox'); // Get the textbox id which was saved in the div
  var textbox = document.getElementById(idOfTextbox); // Find the textbox now
  if (targ.value=='<-' || targ.value=='->') { // Do they want the change the month?
    createCalendar(div, new Date(targ.getAttribute('date')));
    return;
  }
  textbox.value = targ.getAttribute('date'); // Set the selected date
  document.getElementById('up').style.display='none';
  div.parentNode.removeChild(div); // Remove the dropdown box now
  document.getElementById('up2').style.display='block';
  return showDatePickerOut('checkout');

}


// Parse a date in d-MMM-yyyy format
function parseMyDate2(d) {
  if (d=="") return new Date('NotADate'); // For Safari
  var a = d.split('/');
  if (a.length!=3) return new Date(d); // Missing 2 dashes
  var m = -1; // Now find the month
  m= a[1]-1;
  if (m<0) return new Date(d); // Couldn't find the month
  return new Date(a[2],m,a[0],0,0,0,0);
}

// Parse a date in d-MMM-yyyy format
function parseMyDate(d) {
  if (d=="") return new Date('NotADate'); // For Safari
  var a = d.split('-');
  if (a.length!=3) return new Date(d); // Missing 2 dashes
  var m = -1; // Now find the month
  if (a[1]=='Ιαν') m=0;
  if (a[1]=='Φεβ') m=1;
  if (a[1]=='Μαρ') m=2;
  if (a[1]=='Απρ') m=3;
  if (a[1]=='Μάιος') m=4;
  if (a[1]=='Ιουν') m=5;
  if (a[1]=='Ιουλ') m=6;
  if (a[1]=='Αυγ') m=7;
  if (a[1]=='Σεπ') m=8;
  if (a[1]=='Οκτ') m=9;
  if (a[1]=='Νοεμ') m=10;
  if (a[1]=='Δεκ') m=11;
  if (m<0) return new Date(d); // Couldn't find the month
  return new Date(a[2],m,a[0],0,0,0,0);
}

// This creates the calendar for a given month
function createCalendar(div, month) {
  var idOfTextbox = div.getAttribute('checkintextbox'); // Get the textbox id which was saved in the div
  var textbox = document.getElementById(idOfTextbox); // Find the textbox now
  var tbl = document.createElement('table');
  var topRow = tbl.insertRow(-1);
  var td = topRow.insertCell(-1);
  var lastMonthBn = document.createElement('input');
  lastMonthBn.type='button'; // Have to immediately set the type due to IE
  lastMonthBn.className='pBtn1';
  td.appendChild(lastMonthBn);
  lastMonthBn.value='<-';
  lastMonthBn.onclick=chooseDate;
  lastMonthBn.setAttribute('date',new Date(month.getFullYear(),month.getMonth()-1,1,0,0,0,0).toString());
  var td = topRow.insertCell(-1);
  td.colSpan=5;
  var mon = document.createElement('input');
  mon.className = 'inpDP';
  mon.type='text';
  td.appendChild(mon);
  mon.value = getMonthYearString(month);
  mon.size=15;
  mon.disabled='disabled';
  var td = topRow.insertCell(-1);
  var nextMonthBn = document.createElement('input');
  nextMonthBn.type='button';
  nextMonthBn.className = 'nextB1';
  td.appendChild(nextMonthBn);
  nextMonthBn.value = '->';
  nextMonthBn.onclick=chooseDate;
  nextMonthBn.setAttribute('date',new Date(month.getFullYear(),month.getMonth()+1,1,0,0,0,0).toString());
  var daysRow = tbl.insertRow(-1);
  daysRow.insertCell(-1).innerHTML="Δε";
  daysRow.insertCell(-1).innerHTML="Τρ";
  daysRow.insertCell(-1).innerHTML="Τε";
  daysRow.insertCell(-1).innerHTML="Πε";
  daysRow.insertCell(-1).innerHTML="Πα";
  daysRow.insertCell(-1).innerHTML="Σα";
  daysRow.insertCell(-1).innerHTML="Κυ";

  // Make the calendar
  var selected = parseMyDate2(textbox.value); // Try parsing the date
  var today = new Date();
  date = new Date(month.getFullYear(),month.getMonth(),1,0,0,0,0); // Starting at the 1st of the month
  var extras = (date.getDay() + 6) % 7; // How many days of the last month do we need to include?
  date.setDate(date.getDate()-extras); // Skip back to the previous monday
  while (1) { // Loop for each week
    var tr = tbl.insertRow(-1);
    for (i=0;i<7;i++) { // Loop each day of this week
      var td = tr.insertCell(-1);
      var inp = document.createElement('input');
      inp.type = 'button';
	  inp.className = 'daysBtn';
      td.appendChild(inp);
      inp.value = date.getDate();
      inp.onclick = chooseDate;
      inp.setAttribute('date',getDateString2(date));
      if (date.getMonth() != month.getMonth()) {
        if (inp.className) inp.className += ' ';
        inp.className+='othermonth';
      }
      if (date.getDate()==today.getDate() && date.getMonth()==today.getMonth() && date.getFullYear()==today.getFullYear()) {
        if (inp.className) inp.className += ' ';
        inp.className+='today';
      }
      if (!isNaN(selected) && date.getDate()==selected.getDate() && date.getMonth()==selected.getMonth() && date.getFullYear()==selected.getFullYear()) {
        if (inp.className) inp.className += ' ';
        inp.className+='selected';
      }
      date.setDate(date.getDate()+1); // Increment a day
    }
    // We are done if we've moved on to the next month
    if (date.getMonth() != month.getMonth()) {
      break;
    }
  }

  // At the end, we do a quick insert of the newly made table, hopefully to remove any chance of screen flicker
  if (div.hasChildNodes()) { // For flicking between months
    div.replaceChild(tbl, div.childNodes[0]);
  } else { // For creating the calendar when they first click the icon
    div.appendChild(tbl);
  }
}

// This is called when we click  inputbox
function showDatePicker(idOfTextbox) {
  var textbox = document.getElementById(idOfTextbox);


  // See if the date picker is already there, if so, remove it
  x = textbox.parentNode.getElementsByTagName('div');
  for (i=0;i<x.length;i++) {
    if (x[i].getAttribute('class')=='datePicker') {
      return false;
    }
  }

  // Grab the date, or use the current date if not valid
  var date = parseMyDate2(textbox.value);
  if (isNaN(date)) date = new Date();

  // Create the box
  var div = document.createElement('div');
  div.className='datePicker';
  div.setAttribute('checkintextbox', idOfTextbox); // Remember the textbox id in the div
  createCalendar(div, date); // Create the calendar
  insertAfter(div, textbox); // Add the box to screen just after the textbox
  return false;
}

// Adds an item after an existing one
function insertAfter(newItem, existingItem) {
  if (existingItem.nextSibling) { // Find the next sibling, and add newItem before it
    existingItem.parentNode.insertBefore(newItem, existingItem.nextSibling);
  } else { // In case the existingItem has no sibling after itself, append it
    existingItem.parentNode.appendChild(newItem);
  }
}


function datePickerInit() {
  return showDatePicker('checkin');

}

document.getElementById('checkin').onclick = function(e) {
            // Make sure the event doesn't bubble from your element
        if (e) { e.stopPropagation(); }
        else { window.event.cancelBubble = true; }
			document.getElementById('up').style.display='block';
			document.getElementById('up2').style.display='none';
			  x = checkout.parentNode.getElementsByTagName('div');
			  for (i=0;i<x.length;i++) {
				if (x[i].getAttribute('class')=='datePickerOut') {
					checkout.parentNode.removeChild(x[i]);

				}
			}
			datePickerInit();
};





//Same for checkOut


// Converts a date into '12-Oct-1984' format
function getDateStringOut(dt) {
  return dt.getDate() + '-' +
    ['Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sep','Oct','Nov','Dec'][dt.getMonth()] +
    '-' + dt.getFullYear();
}

// Converts a date into '12/10/1984' format
function getDateStringOut2(dt) {
  var m=parseInt(dt.getMonth())+1;
  var m = m < 10 ? '0' + m : m;
  var day = dt.getDate() < 10 ? '0' + dt.getDate() : dt.getDate();
  return dt.getFullYear()+'/' +m+'/' + day;
}

// Converts a date into 'July 2010' format
function getMonthYearStringOut(dt) {
  return ['January','February','March','April','May','June','July',
          'August','September','October','November','December'][dt.getMonth()] +
         ' ' + dt.getFullYear();
}

// This is the function called when the user clicks any button
function chooseDateOut(e) {
	var targ;
	if (!e) var e = window.event;
	if (e.target) targ = e.target;
	else if (e.srcElement) targ = e.srcElement;
	if (targ.nodeType == 3) targ = targ.parentNode;

  var div = targ.parentNode.parentNode.parentNode.parentNode.parentNode; // Find the div
  var idOfTextbox = div.getAttribute('checkintextboxOut'); // Get the textbox id which was saved in the div
  var textbox = document.getElementById(idOfTextbox); // Find the textbox now
  if (targ.value=='<-' || targ.value=='->') { // Do they want the change the month?
    createCalendarOut(div, new Date(targ.getAttribute('date')));
    return;
  }
  textbox.value = targ.getAttribute('date'); // Set the selected date
  document.getElementById('up2').style.display='none';
  div.parentNode.removeChild(div); // Remove the dropdown box now

}


// Parse a date in d-MMM-yyyy format
function parseMyDateOut2(d) {
  if (d=="") return new Date('NotADate'); // For Safari
  var a = d.split('/');
  if (a.length!=3) return new Date(d); // Missing 2 dashes
  var m = -1; // Now find the month
  m= a[1]-1;
  if (m<0) return new Date(d); // Couldn't find the month
  return new Date(a[2],m,a[0],0,0,0,0);
}

// Parse a date in d-MMM-yyyy format
function parseMyDateOut(d) {
  if (d=="") return new Date('NotADate'); // For Safari
  var a = d.split('-');
  if (a.length!=3) return new Date(d); // Missing 2 dashes
  var m = -1; // Now find the month
  if (a[1]=='Jan') m=0;
  if (a[1]=='Feb') m=1;
  if (a[1]=='Mar') m=2;
  if (a[1]=='Apr') m=3;
  if (a[1]=='May') m=4;
  if (a[1]=='Jun') m=5;
  if (a[1]=='Jul') m=6;
  if (a[1]=='Aug') m=7;
  if (a[1]=='Sep') m=8;
  if (a[1]=='Oct') m=9;
  if (a[1]=='Nov') m=10;
  if (a[1]=='Dec') m=11;
  if (m<0) return new Date(d); // Couldn't find the month
  return new Date(a[2],m,a[0],0,0,0,0);
}

// This creates the calendar for a given month
function createCalendarOut(div, month) {
  var idOfTextbox = div.getAttribute('checkintextboxOut'); // Get the textbox id which was saved in the div
  var textbox = document.getElementById(idOfTextbox); // Find the textbox now
  var tbl = document.createElement('table');
  var topRow = tbl.insertRow(-1);
  var td = topRow.insertCell(-1);
  var lastMonthBn = document.createElement('input');
  lastMonthBn.type='button'; // Have to immediately set the type due to IE
  lastMonthBn.className='pBtn1';
  td.appendChild(lastMonthBn);
  lastMonthBn.value='<-';
  lastMonthBn.onclick=chooseDateOut;
  lastMonthBn.setAttribute('date',new Date(month.getFullYear(),month.getMonth()-1,1,0,0,0,0).toString());
  var td = topRow.insertCell(-1);
  td.colSpan=5;
  var mon = document.createElement('input');
  mon.type='text';
  mon.className='inpDP';
  td.appendChild(mon);
  mon.value = getMonthYearStringOut(month);
  mon.size=15;
  mon.disabled='disabled';
  var td = topRow.insertCell(-1);
  var nextMonthBn = document.createElement('input');
  nextMonthBn.className='nextB1';
  nextMonthBn.type='button';
  td.appendChild(nextMonthBn);
  nextMonthBn.value = '->';
  nextMonthBn.onclick=chooseDateOut;
  nextMonthBn.setAttribute('date',new Date(month.getFullYear(),month.getMonth()+1,1,0,0,0,0).toString());
  var daysRow = tbl.insertRow(-1);
  daysRow.insertCell(-1).innerHTML="Mon";
  daysRow.insertCell(-1).innerHTML="Tue";
  daysRow.insertCell(-1).innerHTML="Wed";
  daysRow.insertCell(-1).innerHTML="Thu";
  daysRow.insertCell(-1).innerHTML="Fri";
  daysRow.insertCell(-1).innerHTML="Sat";
  daysRow.insertCell(-1).innerHTML="Sun";

  // Make the calendar
  var selected = parseMyDateOut2(textbox.value); // Try parsing the date
  var today = new Date();
  date = new Date(month.getFullYear(),month.getMonth(),1,0,0,0,0); // Starting at the 1st of the month
  var extras = (date.getDay() + 6) % 7; // How many days of the last month do we need to include?
  date.setDate(date.getDate()-extras); // Skip back to the previous monday
  while (1) { // Loop for each week
    var tr = tbl.insertRow(-1);
    for (i=0;i<7;i++) { // Loop each day of this week
      var td = tr.insertCell(-1);
      var inp = document.createElement('input');
      inp.type = 'button';
	  inp.className='daysBtn';
      td.appendChild(inp);
      inp.value = date.getDate();
      inp.onclick = chooseDateOut;
      inp.setAttribute('date',getDateStringOut2(date));
      if (date.getMonth() != month.getMonth()) {
        if (inp.className) inp.className += ' ';
        inp.className+='othermonth';
      }
      if (date.getDate()==today.getDate() && date.getMonth()==today.getMonth() && date.getFullYear()==today.getFullYear()) {
        if (inp.className) inp.className += ' ';
        inp.className+='today';
      }
      if (!isNaN(selected) && date.getDate()==selected.getDate() && date.getMonth()==selected.getMonth() && date.getFullYear()==selected.getFullYear()) {
        if (inp.className) inp.className += ' ';
        inp.className+='selected';
      }
      date.setDate(date.getDate()+1); // Increment a day
    }
    // We are done if we've moved on to the next month
    if (date.getMonth() != month.getMonth()) {
      break;
    }
  }

  // At the end, we do a quick insert of the newly made table, hopefully to remove any chance of screen flicker
  if (div.hasChildNodes()) { // For flicking between months
    div.replaceChild(tbl, div.childNodes[0]);
  } else { // For creating the calendar when they first click the icon
    div.appendChild(tbl);
  }
}

// This is called when we click  inputbox
function showDatePickerOut(idOfTextbox) {
  var textbox = document.getElementById(idOfTextbox);
  // See if the date picker is already there, if so, remove it
  x = textbox.parentNode.getElementsByTagName('div');
  for (i=0;i<x.length;i++) {
    if (x[i].getAttribute('class')=='datePickerOut') {
      return false;
    }
  }
  // Grab the date, or use the current date if not valid
  var date = parseMyDateOut2(textbox.value);
  if (isNaN(date)) date = new Date();

  // Create the box
  var div = document.createElement('div');
  div.className='datePickerOut';
  div.setAttribute('checkintextboxOut', idOfTextbox); // Remember the textbox id in the div
  createCalendarOut(div, date); // Create the calendar
  insertAfterOut(div, textbox); // Add the box to screen just after the textbox
  return false;
}

// Adds an item after an existing one
function insertAfterOut(newItem, existingItem) {
  if (existingItem.nextSibling) { // Find the next sibling, and add newItem before it
    existingItem.parentNode.insertBefore(newItem, existingItem.nextSibling);
  } else { // In case the existingItem has no sibling after itself, append it
    existingItem.parentNode.appendChild(newItem);
  }
}


function datePickerInitOut() {
  return showDatePickerOut('checkout');

}

document.getElementById('checkout').onclick = function(e) {
            // Make sure the event doesn't bubble from your element
        if (e) { e.stopPropagation(); }
        else { window.event.cancelBubble = true; }
			document.getElementById('up2').style.display='block';
			document.getElementById('up').style.display='none';
			x = checkin.parentNode.getElementsByTagName('div');
			  for (i=0;i<x.length;i++) {
				if (x[i].getAttribute('class')=='datePicker') {
					checkin.parentNode.removeChild(x[i]);

				}
			}
			datePickerInitOut();
	};

 // For clicks elsewhere on the page
    document.onclick = function(event) {
		var except = '.pBtn1, .inpDP, .nextB1, .daysBtn, .othermonth, .today, .selected, .datePicker';
		if(!event.target.matches(except)){

			document.getElementById('up').style.display='none';
				x = checkin.parentNode.getElementsByTagName('div');
				for (i=0;i<x.length;i++) {
					if (x[i].getAttribute('class')=='datePicker') {
						checkin.parentNode.removeChild(x[i]);

					}
				}
		}
		var except2 = '.pBtn1, .inpDP, .nextB1, .daysBtn, .othermonth, .today, .selected, .datePickerOut';
		if(!event.target.matches(except)){
			document.getElementById('up2').style.display='none';
			y = checkout.parentNode.getElementsByTagName('div');
			 for (i=0;i<y.length;i++) {
				if (y[i].getAttribute('class')=='datePickerOut') {
					checkout.parentNode.removeChild(y[i]);

				}
			}
		}
	};

  /*VISITORS BUTTON*/




  	var numberOfClicks =0;
      // For clicks inside the element  vBtn
      document.getElementById('vBtn').onclick = function(e){
  		var vP = document.getElementById('visitorsPick').style.display;
  		numberOfClicks++;
              // Make sure the event doesn't bubble from your element
          if (e) { e.stopPropagation(); }
          else { window.event.cancelBubble = true; }
  		if(numberOfClicks==2){
  			document.getElementById('visitorsPick').style.display="none";
  			document.getElementById("vBtn").style.borderWidth="1px";
  			document.getElementById("vBtn").style.borderColor="lightgray";
  			document.getElementById("path1").style.display = "block";
  			document.getElementById("path2").style.display = "none";
  			document.getElementById("s1").style.backgroundColor= "white";
  			numberOfClicks=0;

  		}
  		else{

  				document.getElementById('visitorsPick').style.display = "block";
  				document.getElementById("s1").style.backgroundColor= "#4dffff";
  				document.getElementById("vBtn").style.borderWidth="2px";
  				document.getElementById("vBtn").style.borderColor="#99ccff";
  				document.getElementById("path1").style.display = "none";
  				document.getElementById("path2").style.display = "block";
  				document.getElementById("plus2").onclick = plusBtn2;
  				document.getElementById("plus1").onclick = plusBtn;
  				document.getElementById("minus1").onclick =  minusBtn;
  				document.getElementById("minus2").onclick =  minusBtn2;
  				document.getElementById("minus3").onclick =  minusBtn3;
  			    document.getElementById("plus3").onclick =  plusBtn3;
  		}
  	};

    function plusBtn(){
    		var inp = document.getElementById('p1').value;
    		var textInside = parseInt(inp);
    		var nValue  = textInside+1;
    		document.getElementById('p1').value = String(nValue);
    		var inp1 = document.getElementById('p2').value;
    		var numP1 = parseInt(inp1);
    		var inp2 = document.getElementById('p3').value;
    		var numP2 =parseInt(inp2);
    		var s = document.getElementById('s1');
    		if(nValue==1){

    			if(numP1>1){
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδιά, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδιά, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδιά";
    				}
    			}
    			else if(numP1==1){
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδί, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδί, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδί";
    				}
    			}
    			else{
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτης, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτης, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML = nValue+" Επισκέπτης";
    				}

    			}
    		}
    		else{
    			if(numP1>1){
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδιά, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδιά, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδιά";
    				}
    			}
    			else if(numP1==1){
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδί, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδί, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδί";
    				}
    			}
    			else{
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτες, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτες, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML = nValue+" Επισκέπτες";
    				}

    			}
    		}
    }

    function minusBtn(){
    	var inp = document.getElementById('p1').value;
    	var textInside = parseInt(inp);
    	if(textInside>1){
    		var nValue  = textInside-1;
    		document.getElementById('p1').value = String(nValue);
    		var inp1 = document.getElementById('p2').value;
    		var numP1 = parseInt(inp1);
    		var inp2 = document.getElementById('p3').value;
    		var numP2 =parseInt(inp2);
    		var s = document.getElementById('s1');
    		if(nValue==1){

    			if(numP1>1){
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδιά, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδιά, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδιά";
    				}
    			}
    			else if(numP1==1){
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδί, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδί, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML =nValue+" Επισκέπτης, "+ numP1+" Παιδί";
    				}
    			}
    			else{
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτης, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτης, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML = nValue+" Επισκέπτης";
    				}

    			}
    		}
    		else{
    			if(numP1>1){
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδιά, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδιά, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδιά";
    				}
    			}
    			else if(numP1==1){
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδί, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδί, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML =nValue+" Επισκέπτες, "+ numP1+" Παιδί";
    				}
    			}
    			else{
    				if(numP2>1){
    					s.innerHTML =nValue+" Επισκέπτες, "+numP2+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =nValue+" Επισκέπτες, "+numP2+" Βρέφος";
    				}
    				else{
    					s.innerHTML = nValue+" Επισκέπτες";
    				}

    			}
    		}

    	}
    	else{
    		return;
    	}
    }

    function plusBtn2(){
    		var inp = document.getElementById('p2').value;
    		var textInside = parseInt(inp);
    		var nValue  = textInside+1;
    		document.getElementById('p2').value = String(nValue);
    		var inp1 = document.getElementById('p1').value;
    		var numP1 = parseInt(inp1);
    		var inp3 = document.getElementById('p3').value;
    		var numP3 =parseInt(inp3);
    		var s = document.getElementById('s1');
    		if(nValue==1){

    			if(numP1>1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδί, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδί, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδί";
    				}
    			}
    			else if(numP1==1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδί, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδί, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδί";
    				}
    			}
    			else{
    				s.innerHTML = nValue+" Παιδί";
    			}
    		}
    		else{
    			if(numP1>1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδιά, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδιά, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδιά";
    				}
    			}
    			else if(numP1==1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδιά, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδιά, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδιά";
    				}
    			}
    			else{
    				s.innerHTML = nValue+" Παιδιά";
    			}
    		}
    	}

    function minusBtn2(){
    	var inp = document.getElementById('p2').value;
    	var textInside = parseInt(inp);
    	if(textInside>0){
    		var nValue  = textInside-1;
    		document.getElementById('p2').value = String(nValue);
    		var inp1 = document.getElementById('p1').value;
    		var numP1 = parseInt(inp1);
    		var inp3 = document.getElementById('p3').value;
    		var numP3 =parseInt(inp3);
    		var s = document.getElementById('s1');
    		if(nValue==1){

    			if(numP1>1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδί, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδί, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδί";
    				}
    			}
    			else if(numP1==1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδί, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδί, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδί";
    				}
    			}
    			else{
    				s.innerHTML = nValue+" Παιδί";
    			}
    		}
    		else if(nValue>1){
    			if(numP1>1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδιά, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδιά, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Παιδιά";
    				}
    			}
    			else if(numP1==1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδιά, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδιά, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Παιδιά";
    				}
    			}
    			else{
    				s.innerHTML = nValue+" Παιδιά";
    			}
    		}
    		else{
    			if(numP1>1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες";
    				}
    			}
    			else if(numP1==1){
    				if(numP3>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+numP3+" Βρέφη";
    				}
    				else if(numP3==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+numP3+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης";
    				}
    			}

    		}
    	}
    	else{
    		return;
    	}

    }

    function plusBtn3(){
    		var inp = document.getElementById('p3').value;
    		var textInside = parseInt(inp);
    		var nValue  = textInside+1;
    		document.getElementById('p3').value = String(nValue);
    		var inp1 = document.getElementById('p1').value;
    		var numP1 = parseInt(inp1);
    		var inp2 = document.getElementById('p2').value;
    		var numP2 =parseInt(inp2);
    		var s = document.getElementById('s1');
    		if(nValue==1){

    			if(numP1>1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδιά, "+nValue+" Βρέφος";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδί, "+nValue+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Βρέφος";
    				}
    			}
    			else if(numP1==1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδιά, "+nValue+" Βρέφος";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδί, "+nValue+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Βρέφος";
    				}
    			}
    			else{
    				s.innerHTML = nValue+" Βρέφος";
    			}
    		}
    		else{
    			if(numP1>1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδιά, "+nValue+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδί, "+nValue+" Βρέφη";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Βρέφη";
    				}
    			}
    			else if(numP1==1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδιά, "+nValue+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδί, "+nValue+" Βρέφη";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Βρέφη";
    				}
    			}
    			else{
    				s.innerHTML = nValue+" Βρέφη";
    			}
    		}
    	}

    function minusBtn3(){
    	var inp = document.getElementById('p3').value;
    	var textInside = parseInt(inp);
    	if(textInside>0){
    		var nValue  = textInside-1;
    		document.getElementById('p3').value = String(nValue);
    		var inp1 = document.getElementById('p1').value;
    		var numP1 = parseInt(inp1);
    		var inp2 = document.getElementById('p2').value;
    		var numP2 =parseInt(inp2);
    		var s = document.getElementById('s1');
    		if(nValue==1){

    			if(numP1>1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδιά, "+nValue+" Βρέφος";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδί, "+nValue+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Βρέφος";
    				}
    			}
    			else if(numP1==1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδιά, "+nValue+" Βρέφος";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδί, "+nValue+" Βρέφος";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Βρέφος";
    				}
    			}
    			else{
    				s.innerHTML = nValue+" Βρέφος";
    			}
    		}
    		else if(nValue>1){
    			if(numP1>1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδιά, "+nValue+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδί, "+nValue+" Βρέφη";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες, "+ nValue+" Βρέφη";
    				}
    			}
    			else if(numP1==1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδιά, "+nValue+" Βρέφη";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδί, "+nValue+" Βρέφη";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης, "+ nValue+" Βρέφη";
    				}
    			}
    			else{
    				s.innerHTML = nValue+" Βρέφη";
    			}
    		}
    		else{
    			if(numP1>1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδιά";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτες, "+ numP2+" Παιδί";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτες";
    				}
    			}
    			else if(numP1==1){
    				if(numP2>1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδιάη";
    				}
    				else if(numP2==1){
    					s.innerHTML =numP1+" Επισκέπτης, "+ numP2+" Παιδί";
    				}
    				else{
    					s.innerHTML =numP1+" Επισκέπτης";
    				}
    			}

    		}
    	}
    	else{
    		return;
    	}

    }
      // For clicks elsewhere on the page
      document.onclick = function(event){
  		var except = ' .minus, .plus, .inp, .par, .labl, .visitorsPicker';
  		if(!event.target.matches(except)){
  			document.getElementById('visitorsPick').style.display = "none";
  			document.getElementById("vBtn").style.borderWidth="1px";
  			document.getElementById("vBtn").style.borderColor="lightgray";
  			document.getElementById("path1").style.display = "block";
  			document.getElementById("path2").style.display = "none";
  			document.getElementById("s1").style.backgroundColor= "white";
  		}
  	};
