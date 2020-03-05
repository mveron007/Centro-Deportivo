function TogglePass() { 
    var temp = document.getElementById("pass"); 
    if (temp.type === "password") { 
        temp.type = "text"; 
    } 
    else { 
        temp.type = "password"; 
    } 
}


var theForm = document.querySelector(".myRegister");
var elementsInArray = Array.from(theForm.elements);
    
elementsInArray.pop();

var errorsObj = {};

console.log(elementsInArray);
    
var regexEmail = /^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$/;

    elementsInArray.forEach(function(element) {
        element.addEventListener("blur", function(){
            if (element.value.trim() === "") {
                element.classList.add("validate");
                element.nextElementSibling.innerHTML = 'El campo <b>' + element.getAttribute('data-name') + '</b> es obligatorio';
                // alert('El campo <b>' + element.getAttribute('data-name') + '</b> es obligatorio');
                errorsObj[element.name] = true;
                console.log("Error");   
            }else{
                element.classList.remove("validate");
    
                // element.classList.add("is-valid");
    
                element.nextElementSibling.innerHTML = '';
    
                delete errorsObj[element.name];
            }

            if (element.name === 'email') {
                if (!regexEmail.test(element.value.trim())) {
                    element.classList.add('validate');
                    element.nextElementSibling.innerHTML = 'Este campo no tiene un formato válido';
                    // Si un campo tiene error, creamos una key con el nombre del campo y valor true
                    errorsObj[element.name] = true;
                }
            }

            if (element.name === 'pass') {
                // Validamos que el texto insertado NO supere las 15 letras
                if (element.value.length <= 7) {
                    element.classList.add("validate");
                    element.nextElementSibling.innerHTML = 'La longitud de la contraseña debe ser mayor o igual a 8';
                    // Si un campo tiene error, creamos una key con el nombre del campo y valor true
                    errorsObj[element.name] = true;
                }
            }

        })
        

        
        
    });

    theForm.addEventListener("submit", function(event) {
        if (Object.keys(errorsObj).length > 0) {
            alert("No se ha llenado el formulario correctamente");
            event.preventDefault();
        }
    })

