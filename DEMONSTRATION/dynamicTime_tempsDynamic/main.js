function reset_city() {
  document.getElementById("city").innerHTML = "";
}


function CityList() {
  //Method to shows the result using the DOM
  function showResults() {
    //if (this.readyState == 4 && this.status == 200) {
    //status of a request: 0=Uninitialized, 1=Loading, 2=Loaded, 3=Interactive, or 4=Completed
    if (this.readyState == 4) {
      //HTTP status code returned by the server. 200 means call succeeded.
      if (this.status == 200) {
        //Data returned by the server in text format.
        if (this.responseText != null) {
          //Remove the comma and create an array with the occurences received from the server
          responseArray = this.responseText.split(",");
          var correspondingCity = "";
          //store option in variables
          for (var i = 0; i < responseArray.length; i++) {
              //correspondingCity += '<option value="' + responseArray[i] + '"/>';
              correspondingCity +='<option>'+responseArray[i]+'</option>';
          }
          
          document.getElementById("city").innerHTML = correspondingCity; 
        } else alert("Communication error: No data received");
      } else alert("Communication error: " + this.statusText);
    }
  }

  //Assign the continent to be sent in the request 
  var continentName=document.getElementById("continent").value;

  //If the continent is not selected yet
  if (continentName === "") {
    document.getElementById("city").innerHTML = "";
    return;
  }
  //If the continent is already selected
  else {
    //Create the AJAX request: an object of XMLHttpRequest()
    var xmlhttp = new AsyncRequest();
    //Call the function when the event occurs
    xmlhttp.onreadystatechange = showResults; 
    //1-HTTP method (GET or POST) 2-Target URL 3-Request handled asynchronously (true or false)
    xmlhttp.open("GET", "get_zone.php?rqdata="+continentName, true);
    //Send data to the target server
    xmlhttp.send();
  }
}




function DynamicTime() {
  var httpxml = new AsyncRequest();

  function showResults() {
    if (httpxml.readyState == 4) {
      document.getElementById("msg").innerHTML = httpxml.responseText;
    }
  }

  //var url = "get-time.php";
  //url = url + "?sid=" + Math.random();
  httpxml.onreadystatechange = showResults;

  //Assign the continent and city to be sent in the request 
  var continentName=document.getElementById("continent").value;
  var cityName=document.getElementById("city").value;
  var timezone=continentName+'/'+cityName;
  //1-HTTP method (GET or POST) 2-Target URL 3-Request handled asynchronously (true or false)
  httpxml.open("GET", "get_time.php?rqdata="+timezone, true);
  
  //httpxml.open("GET", url, true);
  httpxml.send(null);
  timer_function();
}

function timer_function() {
  var refresh = 1000; // Refresh rate in milli seconds
  mytime = setTimeout("DynamicTime();", refresh);
}



function AsyncRequest() {
  //Class to create compatible Ajax Request with the most popular browsers
  try {
    // Non Internet Explorer Browser? like Safari, Chrome, Opera
    // Successful request
    var request = new XMLHttpRequest();
  } catch (e1) {
    //Failed request
    try {
      // Internet Explorer 6+?
      // Successful request
      request = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e2) {
      //Failed request
      try {
        // Internet Explorer 5?
        // Successful request
        request = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e3) {
        // There is no asynchronous support
        alert("Your browser does not support AJAX!");
        request = false;
      }
    }
  }
  return request;
}
