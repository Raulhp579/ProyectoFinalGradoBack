import './bootstrap';         
import '../css/Suscripcion.css';

document.querySelector("#btn-verInfo").addEventListener("click",()=>{
    let id = document.querySelector("#btn-verInfo").value

    fetch('http://127.0.0.1:8000/api/');
})
         