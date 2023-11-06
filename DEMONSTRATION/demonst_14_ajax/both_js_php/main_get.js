//Function to send the AJAX request and receive the response
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
            return;
    } else {
        //Create the object of XMLHttpRequest()
        var xmlhttp = compatibleXMLHttpRequest();
        //Send the request to the server (the information to the PHP file)
        xmlhttp.open("GET", "get_regions.php?rqst=" + str, true);
        xmlhttp.send();
        //Receive the response from the server (the information from the PHP file)
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != null)
                    document.getElementById("txtHint").innerHTML = this.responseText;
                else
                    alert("No data received from the PHP file")
            }
        };
    }
}

//Class to create compatible Ajax Request with the most popular browsers
function compatibleXMLHttpRequest() {
    try {
      // Non Internet Explorer Browser? like Safari, Chrome, Opera
      // Successful request
      var request = new XMLHttpRequest();
    } catch (
      e1 //Failed request
    ) {
      try {
        // Internet Explorer 6+?
        // Successful request
        request = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (
        e2 //Failed request
      ) {
        try {
          // Internet Explorer 5?
          // Successful request
          request = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (
          e3 // There is no asynchronous support
        ) {
          request = false;
        }
      }
    }
    return request;
  }
  