'use strict';



const nombre = document.querySelector('#nombre');
const apellido = document.querySelector('#apellidos');
const save = document.querySelector('#save');

window.onload = function () {
    init();    
}

function init() {
    get_data();    
}

function get_data(){
    let fila ;
    
    fetch("http://localhost/Proyect_laravel/public/get_user")
    .then(response => response.json())
    .then(json => {
        
        json.map(function(item){
            fila = `<tr>
                <td>${item.nombre}</td>
                <td>${item.id_usuario}</td>
            </tr>`;
            console.log(item.nombre);
            
            document.querySelector('.body').innerHTML += fila;

        });
        
    });
}

var header = {
    'Content-Type': 'application/json',
    'X-CSRF-TOKEN':document.querySelector('#tokenazo').getAttribute("content")
}




save.addEventListener('click', () => {
   

    var data = {
        nombre: nombre.value,
        apellido: apellido.value
        
    };

    fetch("http://localhost/Proyect_laravel/public/save",{
        method: 'POST',
        body: JSON.stringify(data),
        headers: header,
        mode: 'cors'
    })
    .then(response => response.json())
    .then(json => {
        console.log(json);
    });

    
});

