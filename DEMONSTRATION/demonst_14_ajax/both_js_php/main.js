function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
            return;
    } else {
        //Create the object of XMLHttpRequest()
        var xmlhttp = compatibleXMLHttpRequest();
        //Send the request to the server (the information to the PHP file)
        var data="rqst="+str;
        xmlhttp.open("POST", "get_regions.php", true);
        xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
        xmlhttp.setRequestHeader("Content-length", data.length);
        xmlhttp.setRequestHeader("Connection", "close");
        xmlhttp.send(data);
        //Receive the response from the server (the information from the PHP file)
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.responseText != null)
                    document.getElementById("txtHint").innerHTML = this.responseText;
                else
                    document.getElementById("txtHint").innerHTML ="No data received from the PHP file"
            }
        };

    }
}

function compatibleXMLHttpRequest() {
    try {
      var request = new XMLHttpRequest();
    } catch (e1) {
      try {
        request = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (e2) {
        try {
          request = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (e3) {
          request = false;
        }
      }
    }
    if (!request)
        alert("The XMLHttpRequest object cannot be created.");
    else
        return request;
}
  