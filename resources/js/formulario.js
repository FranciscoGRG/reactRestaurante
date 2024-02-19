const inputName = document.querySelector('#nombre');
const inputEmail = document.querySelector('#email');
const inputEmailConfirmacion = document.querySelector('#confirmarEmail');
const inputMensaje = document.querySelector('#mensaje');
const inputSubmit = document.querySelector('#boton');
const formulario = document.querySelector('#formulario');
const spinner = document.querySelector('#spinner');
let nombre = 0;
let email = 0;
let emailConfirmacion = 0;
let mensaje = 0;

//Compruebo Nombre
inputName.addEventListener('blur', (evento) => {
    if (!evento.target.value.length <= 0) {
        nombre = 1;
        document.querySelector('#nombreError').style.display="none";
        console.log(nombre);
        if (nombre == 1 && mensaje == 1) { //Compruebo que todos los campos esten rellenos y habilito el boton
            inputSubmit.disabled = false;
        } else { inputSubmit.disabled = true; }
    } else {
        nombre = 0;
        console.log("El campo nombre es obligatorio");
        document.querySelector('#nombreError').innerHTML="El campo nombre es obligatorio";
        document.querySelector('#nombreError').style.display="block";
        console.log(nombre);
    }
})


//Compruebo que el mensaje tenga 5 caracteres
inputMensaje.addEventListener('blur', (evento) => {
    if (evento.target.value.length < 5) {
        console.log("Tu mensaje debe contener 5 caracteres como minimo");
        document.querySelector('#mensajeError').innerHTML="El campo mensaje tiene que tener como minimo 5 caracteres";
        document.querySelector('#mensajeError').style.display="block";
        mensaje = 0;
    } else {
        mensaje = 1;
        document.querySelector('#mensajeError').style.display="none";
        if (nombre == 1 && mensaje == 1) { //Compruebo que todos los campos esten rellenos y habilito el boton
            inputSubmit.disabled = false;
        } else { inputSubmit.disabled = true; }
    }
})


//Muestro el spinner mientras carga 5 segundos
formulario.addEventListener('submit', (event) =>{
    event.preventDefault(); //Detengo el envio

    spinner.style.display="block"; //Muestro el spinner

    setTimeout(() => {
        event.target.submit(); //Envio el formulario a los 5 segundos
    }, 5000);


});








