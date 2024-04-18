//Fetch API asynchronous user-defined function Using POST 
//async function showHint(data, url) {
async function showHint(input) {
    const url = "get_regions.php?data_sent="+input;
    try {
        //Send the Fetch API request 
        const request = await fetch(url, {method: 'GET'});
        //Receive the Fetch API response
        const responseTEXT = await request.text();
        //Display the response received and formatted
        document.getElementById("txtHint").innerHTML = responseTEXT; 
    }
    catch (err) {
        console.error("The Error Is :",err.message);
    }    
}

