//Fonction JavaScript et XML asynchrones (AJAX)
//Pour envoyer des données à et recevoir des données de PHP
function get_int_type() {
  //Stocker les données contenue dans le champ <input id="input-set-int"
  var user_int = document.getElementById("input-set-int").value;
  //Conditions
  if (user_int.length == 0) {
    //A-Si user_int est vide, sortir de la fonction
    return;
  } else {
    //B-Si user_int n'est pas vide effectuer une communication asynchrone
    //1-Créer un objet de la classe XMLHTTPRequest()
    var xmlhttp = new XMLHttpRequest();

    //2-Envoyer user_int au fichier "calculate_int_type.php" (requête)
    xmlhttp.open("POST", "calculate_int_type.php", true);
    xmlhttp.setRequestHeader(
      "Content-type",
      "application/x-www-form-urlencoded"
    );
    let data = "user_data=" + user_int;
    xmlhttp.send(data);

    //3-Recevoir des données du fichier "calculate_int_type.php" (réponse)
    xmlhttp.onreadystatechange = function () {
      //Conditions
      if (this.readyState == 4 && this.status == 200) {
        //Si statut de la requête est complété : readyState = 4
        //Et la connexion a réussi : Code de statut HTTP retourné = 200
        //Conditions
        if (this.responseText.length != 0) {
          //Si la réponse reçue n'est pas vide, afficher les données reçues
          document.getElementById("input-get-int-type").value =
            this.responseText;
        } else {
          //Si la réponse reçue est vide, afficher un message d'erreur
          var msg_err = "Un problème est survenu.Réessayez plus tard!";
          document.getElementById("input-get-int-type").value = msg_err;
        }
      }
    };
  }
}
