"use strict";

const nombre = document.querySelector("#nombre");
const apellido = document.querySelector("#apellidos");
const save = document.querySelector("#save");

window.onload = function () {
    init();
};

function init() {
    get_data();
}

function get_data() {
    let fila;
    let page = 1;
    page--;
    document.querySelector(".body").innerHTML = "";

    fetch("http://localhost/Proyect_laravel/public/get_user")
        .then((response) => response.json())
        .then((json) => {
            let start = 2 * page;
            let end = start + 2;
            let paginados = json.slice(start, end);
            console.log(paginados.length);
            console.log(end);

            for (let i = 0; i < paginados.length; i++) {
                fila = `<tr>
            <td>${paginados[i].id_usuario}</td>
            <td>${paginados[i].nombre}</td>
        </tr>`;

                document.querySelector(".body").innerHTML += fila;
            }


        });
}

var header = {
    "Content-Type": "application/json",
    "X-CSRF-TOKEN": document.querySelector("#tokenazo").getAttribute("content"),
};

save.addEventListener("click", () => {
    var data = {
        nombre: nombre.value,
        apellido: apellido.value,
    };

    fetch("http://localhost/Proyect_laravel/public/save", {
        method: "POST",
        body: JSON.stringify(data),
        headers: header,
        mode: "cors",
    })
        .then((response) => response.json())
        .then((json) => {
            console.log(json);
        });
});
