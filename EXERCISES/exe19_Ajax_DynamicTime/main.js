function timezone(str) {
  //If there is no character written in the field when the keyboard key is realeased
  if (str.length == 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    //If there is at least 1 character in the field when the keyboard key is realeased
    //Create the AJAX request: an object of XMLHttpRequest()
    var xmlhttp = new AsyncRequest();
    //var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
      //if (this.readyState == 4 && this.status == 200) {
      //status of a request: 0=Uninitialized, 1=Loading, 2=Loaded, 3=Interactive, or 4=Completed
      if (this.readyState == 4) {
        //HTTP status code returned by the server. 200 means call succeeded.
        if (this.status == 200) {
          //Data returned by the server in text format.
          if (this.responseText != null) {
            document.getElementById("txtHint").innerHTML = this.responseText;
            
          } else alert("Communication error: No data received");
        } else alert("Communication error: " + this.statusText);
      }
    };
    //1-HTTP method (GET or POST) 2-Target URL 3-Request handled asynchronously (true or false)
    xmlhttp.open("GET", "get-time.php?rqst=" + str, true);
    //Send data to the target server
    xmlhttp.send();
  }
}

function recall_current_date_time(str){
  // Refresh each 1000 milli seconds
  mytime=setTimeout('timezone()',1000)
}

function AsyncRequest() {
  //Class to create compatible Ajax Request with the most popular browsers
  try {
    // Non Internet Explorer Browser? like Safari, Chrome, Opera
    // Successful request
    var request = new XMLHttpRequest();
  } 
  //Failed request
  catch (e1) {
    try {
      // Internet Explorer 6+?
      // Successful request
      request = new ActiveXObject("Msxml2.XMLHTTP");
    }
    //Failed request 
    catch (e2) {
      try {
        // Internet Explorer 5?
        // Successful request
        request = new ActiveXObject("Microsoft.XMLHTTP");
      } 
      // There is no asynchronous support
      catch (e3) 
      {
        alert("Your browser does not support AJAX!");
        request = false;
      }
    }
  }
  return request;
}

function AjaxFunction() {
  var httpxml;
  try {
    // Firefox, Opera 8.0+, Safari
    httpxml = new XMLHttpRequest();
  } catch (e) {
    // Internet Explorer
    try {
      httpxml = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        httpxml = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {
        alert("Your browser does not support AJAX!");
        return false;
      }
    }
  }
  function stateck() {
    if (httpxml.readyState == 4) {
      document.getElementById("msg").innerHTML = httpxml.responseText;
    }
  }
  var url = "get-time.php";
  url = url + "?sid=" + Math.random();
  httpxml.onreadystatechange = stateck;
  httpxml.open("GET", url, true);
  httpxml.send(null);
  tt = timer_function();
}

function timer_function() {
  var refresh = 1000; // Refresh rate in milli seconds
  mytime = setTimeout("AjaxFunction();", refresh);
}
