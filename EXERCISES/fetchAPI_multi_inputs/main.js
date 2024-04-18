//const user_input= document.getElementById("regionName");
const is_identity_form = document.getElementById("identity_form");

//Create the event to be controlled
is_identity_form.addEventListener('keyup', function (event) {
    //Prevent the event from submitting the form, no redirect or page reload 
    event.preventDefault();
    //Save the data already wrote in the input fields of the form        
    const user_form_data = new FormData (is_identity_form); 
    //Save the name of the php file to access 
    const url_server = "get_name.php"; 
    //Call the fetch API function to send data to php and receive a response 
    validateInput(user_form_data, url_server); 
});

//Fetch API asynchronous user-defined function Using POST 
async function validateInput(data, url) {
    try {
        //Send the Fetch API request 
        const request = await fetch(url, {method: 'POST', body: data});
        //Receive the Fetch API response
        const responseJSON = await request.json();
        //Format the response received
        var dataReceived = "";
        var size = responseJSON.length;
        var i;
        for (i=0; i<size; i++){
            if (dataReceived=="")
                dataReceived = responseJSON[i];
            else
                dataReceived += " " + responseJSON[i] ;
        }  
        //Display the response received and formatted
        document.getElementById("display_output").innerHTML = dataReceived; 
    }
    catch (err) {
        console.error("The Error Is :",err.message);
    }
    
}