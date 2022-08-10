// SESION DE USUARIO 

const { parse } = require("path");

//BOTONES DE COLORES

/* document.getElementById("ColorPrimary").addEventListener("click", Primary);
document.getElementById("ColorBlue").addEventListener("click", Blue);
document.getElementById("ColorGreen").addEventListener("click", Green);


function Primary() {
    sessionStorage.setItem("ColorPrimary");
}
function Blue() {
    sessionStorage.setItem("ColorBlue");
}
function Green() {
    sessionStorage.setItem("ColorGreen");
} */

// REPORTES 

const $btnExportar = document.querySelector("#btnExportar"),
    $tabla = document.querySelector("#tabla");

$btnExportar.addEventListener("click", function () {
    let tableExport = new TableExport($tabla, {
        exportButtons: false, // Exporta sin botones
        filename: "Reporte_De_Cliente", //Nombre del archivo de Excel
        sheetname: "Reporte", //Título de la hoja
    });
    let datos = tableExport.getExportData();
    let preferenciasDocumento = datos.tabla.xlsx;
    tableExport.export2file(preferenciasDocumento.data, preferenciasDocumento.mimeType, preferenciasDocumento.filename, preferenciasDocumento.fileExtension, preferenciasDocumento.merges, preferenciasDocumento.RTL, preferenciasDocumento.sheetname);
});

//TAREAS EN DASHBOARD

//Crea una nueva Tarea
//Si el usuario agrega una tarea, se salva en el localStorage
let addBtn = document.getElementById("addBtn");
addBtn.addEventListener("click", function (e) {

    let addTxt = document.getElementById("addTxt");
    let notes = localStorage.getItem("notes");

    if (notes == null) {
        notes0bj = [];
    } else {
        notesObj = JSON.parse(notes);
    }
    notesObj.push(addTxt.value);
    localStorage.setItem("notes", JSON.stringify(notesObj));
    addTxt.value = "";
    showNotes();
});

//Muestra las tareas

function showNotes() {
    let notes = localStorage.getItem("notes");
    if (notes == null) {
        notesObj = [];
    } else {
        notesObj = JSON.parse(notes);
    }
    let html = "";
    notesObj.foreach(function (element, index) {
        html += `
        <div class=noteCard my-2 mx-2 card" style="width: 18rem;">
            <div class=card-body">
                <h5 class="card-title">Note ${index + 1} </h5>
                    <p class="card-text"> ${element}</p>
                    <button id="${index}"onClick="deleteNote(this.id)"
                    class="btn btn-danger">Eliminar Nota</button>
            </div>
        </div>`;

    });
    let notesElm = document.getElementById("notes");
    if (notesObj.length != 0) {
        notesElm.innerHTML = html;
    } else {
        notesElm.innerHTML = '¡Nada para mostrar! Crea tu primera Tarea'
    }
}

// Borra las Tareas 
function deleteNote(index) {
    let notes = localStorage.getItem("notes");
    if(notes == null ) {
        notesObj = [];
    } else {
        notes0bj = JSON.parse(notes);
    }

    notesObj.splice(index, 1);
    localStorage.setItem("notes", JSON.stringify(notesObj));
    showNotes();
}
