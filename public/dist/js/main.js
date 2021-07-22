"use strict";

const nombre = document.querySelector("#nombre");
const apellido = document.querySelector("#apellidos");
const id_user = document.querySelector("#id_usuario");
const save = document.querySelector("#save");

window.onload = function () {
    init();
};

function init() {
    get_data(1);
}

function get_data(pagina) {
    let fila;
    let page = pagina,
        rows_for_page = 3;
    page--;
    document.querySelector(".body").innerHTML = "";

    fetch("http://localhost/Proyect_laravel/public/get_user")
        .then((response) => response.json())
        .then((json) => {
            let start = rows_for_page * page;
            let end = start + rows_for_page;
            let paginados = json.slice(start, end);

            for (let i = 0; i < paginados.length; i++) {
                let tr = document.createElement("tr");
                let td1 = document.createElement("td");
                td1.innerText = paginados[i].id_usuario;
                let td2 = document.createElement("td");
                td2.innerText = paginados[i].nombre;
                let td3 = document.createElement("td");
                td3.innerText = paginados[i].apellidos;

                let td4 = document.createElement("td");
                //seccion para creacion de boton de edicion
                let btn_edit = document.createElement("button");
                btn_edit.classList.add("btn", "btn-success", "edit");
                btn_edit.innerText = "Editar";
                btn_edit.onclick = function (e) {
                    e.preventDefault();
                    get_user(paginados[i].id_usuario);
                };
                //Seccion para boton de eliminacion de usuario
                let btn_delete = document.createElement("button");
                btn_delete.classList.add("btn", "delete");
                btn_delete.innerText = "Eliminar";
                btn_delete.onclick = function (e) {
                    e.preventDefault();
                    delete_user(paginados[i].id_usuario);
                };
                td4.appendChild(btn_edit);
                td4.appendChild(btn_delete);

                tr.appendChild(td1);
                tr.appendChild(td2);
                tr.appendChild(td3);
                tr.appendChild(td4);

                document.querySelector(".body").appendChild(tr);
            }

            setup_paginacion(json, rows_for_page, page);
        });
}

//funcion para obtener el total de paginas que se van a crear
function setup_paginacion(paginados, rows_for_page, page) {
    let content = document.querySelector(".pagina_num");
    content.innerHTML = "";
    let page_count = Math.ceil(paginados.length / rows_for_page);

    let btn;

    for (let i = 1; i < page_count + 1; i++) {
        btn = generar_boton(i);
        content.appendChild(btn);
        if (i == page + 1) {
            btn.classList.add("active");
        }
    }
}

//Funcion que genera los botones de la paginacion de manera iterativa
function generar_boton(page) {
    let a = document.createElement("button");
    a.classList.add("page-link");
    a.innerText = page;

    let enlace2 = document.createElement("li");
    enlace2.classList.add("page-item");
    enlace2.appendChild(a);

    enlace2.addEventListener("click", function (e) {
        e.preventDefault();
        get_data(page);
    });

    return enlace2;
}

var header = {
    "Content-Type": "application/json",
    "X-CSRF-TOKEN": document.querySelector("#tokenazo").getAttribute("content"),
};

save.addEventListener("click", () => {
    let ulr;
    var data = {
        nombre: nombre.value,
        apellido: apellido.value,
    };

    if (id_user.value != "") {
        ulr = "http://localhost/Proyect_laravel/public/update";
        data.id_user = id_user.value;
    }else{
        ulr = "http://localhost/Proyect_laravel/public/save";
    }

     fetch(ulr, {
        method: "POST",
        body: JSON.stringify(data),
        headers: header,
        mode: "cors",
    })
        .then((response) => response.json())
        .then((json) => {
            console.log(json);
            get_data(1);
            clean_form();
        })
        .catch(() => {
            console.log("error");
        }); 
});

function get_user(id_usuario) {
    console.log(id_usuario);
    fetch("http://localhost/Proyect_laravel/public/get_user_edit/" + id_usuario)
        .then((response) => response.json())
        .then((json) => {
            console.log(json);

            nombre.value = json.nombre;
            apellido.value = json.apellidos;
            id_user.value = json.id_usuario;
        })
        .catch(() => {
            console.log("error");
        });
}

function clean_form() {
    nombre.value = "";
    apellido.value = "";
    id_user.value = "";
}


function delete_user(id) {
    console.log(id);
    fetch("http://localhost/Proyect_laravel/public/delete/"+id, {
        method: "POST",
        headers: header,
        mode: "cors",
    })
        .then((response) => response.json())
        .then((json) => {
            console.log(json);
            get_data(1);
            
        })
        .catch(() => {
            console.log("error");
        }); 

}