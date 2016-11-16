"use strict";

window.onload = function()
{
  var button = document.getElementById("lookup");
  var result = document.getElementById("result");
  var term = document.getElementById("term");
  var all = document.getElementById("all");
  
  button.addEventListener("click", success)
  function success (){
    var url;
    var country = document.getElementById("country");
    var query = country.value;
    var requestxml = new XMLHttpRequest;
    requestxml.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200){
            var response = this.responseText;
            result.innerHTML = response;
            console.log(response);
            alert (stripTags(response)).text();
        }
    };
    
    if (all.value == true){
        
        url = "world.php?all=true";
    }
    else{
        url = "world.php?country="+query;
        
    }
    
    requestxml.open("GET",url,true);
    requestxml.send("");
}
}

function stripTags(string){
  var txt = string; 
    //var txt = document.getElementById('myString').value;
    var rex = /(<([^>]+)>)/ig;
    //alert(txt.replace(rex , ""));
    return(txt.replace(rex , ""));

}
