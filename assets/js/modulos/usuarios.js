const nuevo = document.querySelector("#nuevo_registro");
const frm = document.querySelector("#frmRegistro");
const titleModal = document.querySelector("#titleModal");
const btnaccion = document.querySelector("#btnaccion");

const myModal = new bootstrap.Modal(document.getElementById("nuevoModal"));
let tblUsuarios;

document.addEventListener("DOMContentLoaded", function () {
  tblUsuarios = $("#tblUsuarios").DataTable({
    // Corregido: cierre de comillas en el selector
    ajax: {
      url: base_url + "usuarios/listar",  
      dataSrc: "",
    },
    columns: [
      { data: "id" },
      { data: "nombres" },
      { data: "apellidos" },
      { data: "correo" },
      { data: "perfil" },
      { data: "accion" }
    ],
    language,
    dom,
    buttons,
  });

  //levantar modal
  nuevo.addEventListener("click", function() {
    document.querySelector('#id').value = '';
    titleModal.textContent = "nuevo usuario";
    btnaccion.textContent = 'Registrar';
    frm.reset();
    document.querySelector('#clave').removeAttribute('readonly');
    myModal.show();
  });

  //submimt usuarios
  frm.addEventListener("submit", function (e) {
    e.preventDefault();
    let data = new FormData(this);
    const url = base_url + "usuarios/registrar";
    const http = new XMLHttpRequest();
    http.open("POST", url, true);
    http.send(data);
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        if (res.icono == "success") {
          myModal.hide();
          tblUsuarios.ajax.reload();
        }
        Swal.fire("aviso?", res.msg.toUpperCase(), res.icono);
      }
    }
  });
});

   function eliminarUser(idUser) {
    Swal.fire({
      title: "Aviso?",
      text: "Deseas realmente eliminar el registro",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "SI, ELIMINAR!",
    }).then((result) => {
      if (result.isConfirmed) {
        const url = base_url + "usuarios/delete/" + idUser ;
        const http = new XMLHttpRequest();
        http.open("GET", url, true);
        http.send();
        http.onreadystatechange = function () {
          if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            const res = JSON.parse(this.responseText);
            if (res.icono == "success") {  
              tblUsuarios.ajax.reload();
            }
  
            Swal.fire("aviso?", res.msg.toUpperCase(), res.icono);
          }
        }
      }
    });
  }

  function editUser(idUser)
   {
    const url = base_url + "usuarios/edit/"+idUser;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function () {
      if (this.readyState == 4 && this.status == 200) {
        console.log(this.responseText);
        const res = JSON.parse(this.responseText);
        document.querySelector('#id').value = res.id;
        document.querySelector('#nombre').value = res.nombres;
        document.querySelector('#apellido').value = res.apellidos;
        document.querySelector('#correo').value = res.correo;
        document.querySelector('#clave').setAttribute('readonly','readonly');
        btnaccion.textContent = 'actualizar';
        titleModal.textContent = 'actualizar usuario';  
        myModal.show();
      }
    }
  }
  
