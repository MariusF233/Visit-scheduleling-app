
let button_quote=document.getElementById("button_quote");

button_quote.addEventListener('click',fetchQuote);

function fetchQuote(){

    fetch("https://api.chucknorris.io/jokes/random",{
        method:"GET",
        headers:new Headers({
            "Accept":"application/json"
        }),

    }).then(resp=>{
        console.log(resp);
        return resp.json();
    }).then(jsonResp=>{
        console.log(jsonResp)
    });

    console.log("from 'fetchQuote'");

}
function appendQuote(quote)
{
    let p=document.createElement("p");
    p.innerText=quote;
    
    document.body.appendChild(p);
}
