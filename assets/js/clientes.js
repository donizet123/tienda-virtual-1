const tableLista =document.querySelector('#tableListaProductos tbody');
const tblPendientes =document.querySelector('#tblPendientes');

 document.addEventListener('DOMContentLoaded', function(){
    if (tableLista) {
        getListaProductos();
    }   
    // cargar datos pendiente con datatables
    $('#tblPendientes').DataTable( {
        ajax: {
            url: base_url +'clientes/listarPendientes',
            dataSrc: ''
        },
        columns: [ 
            { data: 'id_transaccion'},
            { data: 'monto'},
            { data: 'fecha'}
        ],
        language,
        dom,
        buttons
    } );
});
function getListaProductos() {
    const url = base_url + 'principal/listaProductos';
    const http= new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify(listaCarrito));
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200) {
            console.log(this.responseText); // Ver qué está recibiendo

            const res =JSON.parse(this.responseText);
            let html ='';
            res.productos.forEach(producto => {
                html+= `<tr>
                <td>
                <img class="img-thumbnail " src="${producto.imagen}" alt="" width="100">
                </td>
                <td>${producto.nombre}</td>
                <td>
                <span class="badge bg-warning">${res.moneda + ' ' +producto.precio} </span>
                </td>
                <td>
                <span class="badge bg-primary">${producto.cantidad}</td></span>
                <td>${producto.subTotal}
                </td>
                
        
            </tr>`;
            });
            tableLista.innerHTML =html;
            document.querySelector('#totalProducto').textContent='Total a pagar: ' +res.moneda + ' ' + res.total;
            botonPaypal(res.totalPaypal);
           
        }
    }
}

function botonPaypal(total) {
    paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: total  
                    }
                }]
            });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
            return actions.order.capture().then(function(orderData) {
            registrarPedido(orderData)
                
            });
        }
    }).render('#paypal-button-container'); 
}

function registrarPedido(datos) {
    const url = base_url + 'clientes/registrarPedido';
    const http= new XMLHttpRequest();
    http.open('POST', url, true);
    http.send(JSON.stringify({
        pedidos: datos,
        productos: listaCarrito

    }));
  
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200) {
            console.log(this.responseText);
            const res =JSON.parse(this.responseText);
            Swal.fire(
                "aviso!",
                res.msg,
                res.icono
              );
            if (res.icono == 'success') {
                localStorage.removeItem('listaCarrito');
                setTimeout(() => {
                    window.location.reload();
                }, 2000);
            } 
        }
    }
}