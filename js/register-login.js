function TogglePass() { 
    var temp = document.getElementById("pass"); 
    if (temp.type === "password") { 
        temp.type = "text"; 
    } 
    else { 
        temp.type = "password"; 
    } 
}

function validar() {
    var theForm = document.querySelector(".myRegister");
    var elementsInArray = Array.from(theForm.elements);
    elementsInArray.pop();

    var regexEmail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

    elementsInArray.forEach(function(element) {
        if (element.value.trim() = "") {
            element.classList.add("error");
            console.log("Error");
            
        }
    })
}
