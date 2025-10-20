//main.js
/*
document.addEventListener("DOMContentLoaded", function () {
  var name = document.getElementById("form-masked-name");
  var input = document.getElementById("form-user-letter");
  input.addEventListener("keyup", function () {
    if (input.value.length !== 0){
      //Concatenante the masked name and user letter 
      var text = name.value + "," + input.value;
      validateName(text);
    } 
  });
});
*/

function checkName(letter) {
  if (letter.length !== 0){
    var name = document.getElementById("form-masked-name").value;
    //Concatenante the masked name and user letter 
    var text = name + "," + letter;
    //Call the function to validate
    validateName(text);
    //document.getElementById("game-result-last-puzzle").innerHTML = text;
  }
}

function validateName(maskedNameAndUserLetter) {
      //Create an object of the XMLHTTPRequest() class to communicate with the php server
      var xmlhttp = compatibleXMLHttpRequest();
      //Send the data received from the form to PHP (request)
      xmlhttp.open("POST", "validate-quiz-answers.php", true);
      xmlhttp.setRequestHeader(
        "Content-type",
        "application/x-www-form-urlencoded"
      );
      var data = "form_data=" + encodeURIComponent(maskedNameAndUserLetter);
      xmlhttp.send(data);
      //Receive the data from PHP (response)
      xmlhttp.onreadystatechange = function () {
        // If the request statut is completed  : readyState = 4
        // If the connection succeed : HTTP statut Code received = 200
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          if (xmlhttp.responseText.length != 0) {
            //Display the data received
            resultat = xmlhttp.responseText.split(",");
            $nextMaskedName = resultat[0];
            $newMaskedName = resultat[1];
            $resultMsg = resultat[2];
          }
          else {
              errorMsg = "Incorrect data received from the server! Try again";
          }
        } else {
          //this.readyState != 4 && this.status != 200
          errorMsg = "Communication Problem with the server! Try again";
        }
        //Display the s using the DOM
        //Display the data submitted and the result of their analysis
        var nameAndLetter = maskedNameAndUserLetter.split(",")
        document.getElementById("game-result-last-puzzle").innerHTML = nameAndLetter[0];
        document.getElementById("game-result-last-letter").innerHTML = nameAndLetter[1];
        document.getElementById("game-result-next-puzzle").innerHTML = $nextMaskedName;
        document.getElementById("game-result").innerHTML = $resultMsg;
        //Display the new masked name 
        document.getElementById("form-masked-name").value = $newMaskedName;
        //Clear the input field to read a new letter
        document.getElementById("form-user-letter").value = "";
      };
}

  
  //Fonction pour créer un objet de la classe XMLHTTPRequest compatible avec les navigateurs Web populaires
  function compatibleXMLHttpRequest() {
    try {
      // Pour Safari, Chrome, Opera... mais pas Internet explorer
      var request = new XMLHttpRequest();
      // Création d'objet réussie
    } catch (
      e1 //Création d'objet échoué
    ) {
      try {
        // Internet Explorer 6+
        // Création d'objet réussie
        request = new ActiveXObject("Msxml2.XMLHTTP");
      } catch (
        e2 //Création d'objet échoué
      ) {
        try {
          // Internet Explorer 5
          // Création d'objet réussie
          request = new ActiveXObject("Microsoft.XMLHTTP");
        } catch (
          e3 // //Création d'objet échoué. Le navigateur ne supporte pas la communication asynchronne
        ) {
          request = false;
        }
      }
    }
    return request;
  }
  