//Fetch API asynchronous user-defined function Using POST 
//async function showHint(data, url) {
async function showHint(input) {
    let field_data = new FormData();
    field_data.append('data_sent',input)
    const url = "get_regions.php";
    try {
        //Send the Fetch API request 
        const request = await fetch(url, {method: 'POST', body: field_data});
        //Receive the Fetch API response
        const responseTEXT = await request.text();
        //Display the response received and formatted
        document.getElementById("txtHint").innerHTML = responseTEXT; 
    }
    catch (err) {
        console.error("The Error Is :",err.message);
    }
    
}