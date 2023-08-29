//app.js

const url = "https://api.quotable.io/random";
let button_quote=document.getElementById("button_quote");

button_quote.addEventListener('click',generateQuote);
function generateQuote(){
   fetch(url)
  .then(function(data) {
         return data.json();
    })
    .then(function(data){    
    document.getElementById("quote").innerHTML = data.content;
     document.getElementById("author").innerHTML = data.author;
   })
 .catch(function(err) {
    console.log(err); 
    });
 }
 