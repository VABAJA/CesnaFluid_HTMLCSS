//TAREAS EN DASHBOARD

showNotes();

// GUARDA LAS TAREAS EN localStorage
let addBtn = document.getElementById("addBtn");
addBtn.addEventListener("click", function (e) {
  let addTxt = document.getElementById("addTxt");
  let notes = localStorage.getItem("notes");
  if (notes == null) {
    notesObj = [];
  } else {
    notesObj = JSON.parse(notes);
  }
  notesObj.push(addTxt.value);
  localStorage.setItem("notes", JSON.stringify(notesObj));
  addTxt.value = "";
  showNotes();
});

// MUESTRA LAS TAREAS
function showNotes() {
  let notes = localStorage.getItem("notes");
  if (notes == null) {
    notesObj = [];
  } else {
    notesObj = JSON.parse(notes);
  }
  let html = "";
  notesObj.forEach(function (element, index) {
    html += `
    <div class="row">
      <div class="col-md-12">
      
      <tbody>
      <tr>
        <td class="text-center class="col-md-12">
          <p class="text-center"> ${element}</p>
        </td>
        <td class="text-center">
          <button class="btn btn-link" type="button" title="Editar Tarea" data-toggle="collapse" data-target="#editTask" aria-expanded="false" aria-controls="editTask">
            <i class="tim-icons icon-pencil"></i>
          </button>
        </td>
        <td class="text-center">
          <button id="${index}"onclick="deleteNote(this.id)" type="button" title="Eliminar Tarea" class="btn btn-link" data-toggle="" data-target="#" aria-expanded="false" aria-controls="">
            <i class="tim-icons icon-simple-remove"></i>
          </button>
        </td> 
        </div>
        </tr>
        </tbody>
    </div>
    </div>
`;
  });
  let notesElm = document.getElementById("notes");
  if (notesObj.length != 0) {
    notesElm.innerHTML = html;
  } else {
    notesElm.innerHTML = `¡Nada para mostrar! Crea una tarea aquí`;
  }
}

// BORRA LA TAREA
function deleteNote(index) {
  let notes = localStorage.getItem("notes");
  if (notes == null) {
    notesObj = [];
  } else {
    notesObj = JSON.parse(notes);
  }

  notesObj.splice(index, 1);
  localStorage.setItem("notes", JSON.stringify(notesObj));
  showNotes();
}



