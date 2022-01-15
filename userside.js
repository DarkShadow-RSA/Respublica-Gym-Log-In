
  function openNav() {
  document.getElementById("myNav").style.width = "100%";
}

function closeNav() {
  document.getElementById("myNav").style.width = "0%";
}
  //Get the button
var mybutton = document.getElementById("myBtn");

// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
  if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
    mybutton.style.display = "block";
  } else {
    mybutton.style.display = "none";
  }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
  document.body.scrollTop = 0;
  document.documentElement.scrollTop = 0;
}

//search bar
function myFunction() {

// Declare variables 
var input = document.getElementById("myInput");
var filter = input.value.toUpperCase();
var table = document.getElementById("myTable");
var trs = table.tBodies[0].getElementsByTagName("tr");

// Loop through first tbody's rows
for (var i = 0; i < trs.length; i++) {

  // define the row's cells
  var tds = trs[i].getElementsByTagName("td");

  // hide the row
  trs[i].style.display = "none";

  // loop through row cells
  for (var i2 = 0; i2 < tds.length; i2++) {

    // if there's a match
    if (tds[i2].innerHTML.toUpperCase().indexOf(filter) > -1) {

      // show the row
      trs[i].style.display = "";

      // skip to the next row
      continue;

    }
  }
}
}

  //Sign in and track user time
  let trackTimer = [];
  function clicked(user_act_btn, timer_btn) {
      if(document.getElementById(user_act_btn).value=="Sign In"){
          document.getElementById(user_act_btn).value="Sign Out";
          document.getElementById(user_act_btn).className = "btn-out actionBTN";

        //timer resume
        user_CountUp();

      }else{
        document.getElementById(user_act_btn).value="Sign In";
        document.getElementById(user_act_btn).className = "btn-in actionBTN";


        //timer pause
        for (var i = 0; i < trackTimer.length; i++) {
          if (trackTimer[i][0] == timer_btn) {
            clearInterval(trackTimer[i][1]);
            trackTimer.splice(i, 1);
            /*var send_time = (document.getElementById ( timer_btn ).textContent);
            document.getElementById('usersm_id').value= 1;
            document.getElementById('time').value=send_time;
            document.getElementById("time_submit_form").submit();*/
            console.log(send_time);
        
          }
        }
      }
    
      function user_CountUp(){
        intValue = setInterval(countTimer, 1000);
        trackTimer.push([timer_btn, intValue]);
          
        var totalSeconds = user_previous_time();

          function user_previous_time(){
            var total_time = (document.getElementById ( timer_btn ).textContent);
            var total_time_array = total_time.split(':');

            var total_sec = Number( total_time_array[2]) + Number(total_time_array[1]*60) + Number(total_time_array[0]*3600);
            return total_sec             
          }

          //Count in seconds and convert it to h:m:s format
          function countTimer() {
            ++totalSeconds;
            var hour = Math.floor(totalSeconds /3600);
            var minute = Math.floor((totalSeconds - hour*3600)/60);
            var seconds = totalSeconds - (hour*3600 + minute*60);
            if(hour < 10)
                hour = "0"+hour;
            if(minute < 10)
                minute = "0"+minute;
            if(seconds < 10)
                seconds = "0"+seconds;
            document.getElementById(timer_btn).innerHTML = hour + ":" + minute + ":" + seconds;
          }
      }
  }


// When the user scrolls the page, execute myFunction
window.onscroll = function() {myFunction()};

// Get the header
var header = document.getElementById("myHeader");

// Get the offset position of the navbar
var sticky = header.offsetTop;

// Add the sticky class to the header when you reach its scroll position. Remove "sticky" when you leave the scroll position
function myFunction() {
  if (window.pageYOffset > sticky) {
    header.classList.add("sticky");
  } else {
    header.classList.remove("sticky");
  }
}
