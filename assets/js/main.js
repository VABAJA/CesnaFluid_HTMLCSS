// SESION DE USUARIO 

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