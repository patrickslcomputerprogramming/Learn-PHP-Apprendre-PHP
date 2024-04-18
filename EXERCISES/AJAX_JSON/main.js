//main.js
function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
            return;
    } else {
        //Create the object of XMLHttpRequest()
        var xmlhttp = compatibleXMLHttpRequest();
        xmlhttp.responseType = "json";
        //Send the request to the server (the information to the PHP file)
        var data="rqst="+str;
        xmlhttp.open("GET", "get_regions.php?"+data, true);
        xmlhttp.send();
        //Receive the response from the server (the information from the PHP file)
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                if (this.response != null){
                    // read the message received from the server
                    var responseJSON = xmlhttp.response;
                    var dataReceived = "";
                    var size = responseJSON.length;
                    if (size==0){
                        dataReceived = "There are no corresponding names";
                    }else{
                      var i;
                      for (i=0; i<size; i++){
                          if (dataReceived=="")
                              dataReceived = responseJSON[i];
                          else
                              dataReceived += ", " + responseJSON[i] ;
                      }
                    }
                    document.getElementById("txtHint").innerHTML = dataReceived;
                }else
                  alert("No data received from the PHP file")
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
