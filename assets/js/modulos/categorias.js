const nuevo = document.querySelector("#nuevo_registro");
const frm = document.querySelector("#frmRegistro");
const titleModal = document.querySelector("#titleModal");
const btnaccion = document.querySelector("#btnaccion");
const myModal = new bootstrap.Modal(document.getElementById("nuevoModal"));
let tblCategorias;

document.addEventListener("DOMContentLoaded", function () {
  tblCategorias = $("#tblCategorias").DataTable({
    // Corregido: cierre de comillas en el selector
    ajax: {
      url: base_url + "categorias/listar",
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "categoria" },
      { data: "imagen" },
      { data: "accion" },
    ],
    language,
    dom,
    buttons,
  });

  //levantar modal
  nuevo.addEventListener("click", function () {
    document.querySelector("#id").value = "";
    document.querySelector("#imagen_actual").value = "";
    document.querySelector("#imagen").value = "";
    titleModal.textContent = "nuevo categoria";
    btnaccion.textContent = "registrar";
    frm.reset();
    myModal.show();
  });

  //submimt categorias
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "categorias/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if (res.icono == "success") {
          myModal.hide();
          tblCategorias.ajax.reload();
          document.querySelector("#imagen").value = "";
        }

        Swal.fire("aviso?", res.msg.toUpperCase(), res.icono);
      }
    };
  });
});

function eliminarCat(idCat) {
  Swal.fire({
    title: "Aviso?",
    text: "¿Deseas realmente eliminar el registro?",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "SI, ELIMINAR!",
  }).then((result) => {
    if (result.isConfirmed) {
      const url = base_url + "categorias/delete/" + idCat;
      const http = new XMLHttpRequest();
      http.open("GET", url, true);
      http.send();
      http.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
          const res = JSON.parse(this.responseText);
          if (res.icono == "success") {
            tblCategorias.ajax.reload(); // Recargar tabla de categorías
            actualizarCategorias(); // Actualizar las categorías en shop.php
          }
          Swal.fire("Aviso?", res.msg.toUpperCase(), res.icono);
        }
      };
    }
  });
}

function editCat(idCat) {
  const url = base_url + "categorias/edit/" + idCat;
  const http = new XMLHttpRequest();
  http.open("GET", url, true);
  http.send();
  http.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
      console.log(this.responseText);
      const res = JSON.parse(this.responseText);
      document.querySelector("#id").value = res.id;
      document.querySelector("#categoria").value = res.categoria;
      document.querySelector("#imagen_actual").value = res.imagen;
      btnaccion.textContent = "actualizar";
      titleModal.textContent = "editar categoria";
      myModal.show();
    }
  };
}

//agregado posible eliminacion
function actualizarCategorias() {
  const url = base_url + "categorias/listar"; // Cambia esto según tu ruta para listar categorías
  fetch(url)
    .then((response) => response.json())
    .then((data) => {
      const categoriaContainer = document.querySelector(
        ".col-12.col-md-3 .row"
      );
      categoriaContainer.innerHTML = ""; // Limpiar el contenido anterior

      data.forEach((categoria) => {
        const categoriaElement = `
                    <div class="col-12 mb-3">
                        <h5>
                            <a href="${base_url}principal/categorias/${categoria.id}"
                               style="text-decoration: none; color: black;">
                                ${categoria.categoria}
                            </a>
                        </h5>
                    </div>
                `;
        categoriaContainer.insertAdjacentHTML("beforeend", categoriaElement);
      });
    })
    .catch((error) => console.error("Error al cargar categorías:", error));
}
