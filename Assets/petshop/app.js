//Variable que mantiene el estado visible del carrito
var carritoVisible = false;

//Espermos que todos los elementos de la pàgina cargen para ejecutar el script
if(document.readyState == 'loading'){
    document.addEventListener('DOMContentLoaded', ready)
}else{
    ready();
}

function ready(){
    loadCartFromDB();

        var closeBtn = document.querySelector('.cerrar-carrito');
    if(closeBtn){
        closeBtn.addEventListener('click', ocultarCarrito);
    }

    var openLink = document.getElementById('ver-carrito');
    if(openLink){
        openLink.addEventListener('click', function(e){
            e.preventDefault();
            hacerVisibleCarrito();
        });
    }
    //Agregremos funcionalidad a los botones eliminar del carrito
    var botonesEliminarItem = document.getElementsByClassName('btn-eliminar');
    for(var i=0;i<botonesEliminarItem.length; i++){
        var button = botonesEliminarItem[i];
        button.addEventListener('click',eliminarItemCarrito);
    }

    //Agrego funcionalidad al boton sumar cantidad
    var botonesSumarCantidad = document.getElementsByClassName('sumar-cantidad');
    for(var i=0;i<botonesSumarCantidad.length; i++){
        var button = botonesSumarCantidad[i];
        button.addEventListener('click',sumarCantidad);
    }

     //Agrego funcionalidad al buton restar cantidad
    var botonesRestarCantidad = document.getElementsByClassName('restar-cantidad');
    for(var i=0;i<botonesRestarCantidad.length; i++){
        var button = botonesRestarCantidad[i];
        button.addEventListener('click',restarCantidad);
    }

    //Agregamos funcionalidad al boton Agregar al carrito
    var botonesAgregarAlCarrito = document.getElementsByClassName('boton-item');
    for(var i=0; i<botonesAgregarAlCarrito.length;i++){
        var button = botonesAgregarAlCarrito[i];
        button.addEventListener('click', agregarAlCarritoClicked);
    }

    //Agregamos funcionalidad al botón comprar
    document.getElementsByClassName('btn-pagar')[0].addEventListener('click',pagarClicked)
}
//Eliminamos todos los elementos del carrito y lo ocultamos
function pagarClicked(){
    alert("Gracias por la compra");
    //Elimino todos los elmentos del carrito
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    while (carritoItems.hasChildNodes()){
        carritoItems.removeChild(carritoItems.firstChild)
    }
    actualizarTotalCarrito();
    syncStorageWithDOM();
    ocultarCarrito();
}
//Funciòn que controla el boton clickeado de agregar al carrito
function agregarAlCarritoClicked(event){
    var button = event.target;
    var item = button.parentElement;
    var id = button.dataset.id || item.dataset.id;
    fetch(BASE_URL+"Carrito/addItem", {
        method: "POST",
        headers: {"Content-Type":"application/x-www-form-urlencoded"},
        body: "id="+id
    })
    .then(r=>r.json())
    .then(function(cart){
        var carritoItems = document.getElementsByClassName("carrito-items")[0];
        if(!carritoItems){return;}
        carritoItems.innerHTML = "";
        cart.forEach(function(it){
            agregarItemAlCarritoDOM(it.id, it.nombre, "S/"+it.precio, it.imagen, it.cantidad);
        });
        hacerVisibleCarrito();
        actualizarTotalCarrito();
    });
}

//Funcion que hace visible el carrito
function hacerVisibleCarrito(){
    carritoVisible = true;
    var carrito = document.getElementsByClassName('carrito')[0];
    carrito.style.marginRight = '0';
    carrito.style.opacity = '1';

    var items =document.getElementsByClassName('contenedor-items')[0];
     if(items){
        items.style.width = '60%';
    }
}

//Funciòn que agrega un item al carrito
function agregarItemAlCarritoDOM(id, titulo, precio, imagenSrc, cantidad=1){
    var item = document.createElement('div');
    item.classList.add('item');
    var itemsCarrito = document.getElementsByClassName('carrito-items')[0];
    if(!itemsCarrito){return;}
    //controlamos si el item ya existe para solo aumentar la cantidad
    var nombresItemsCarrito = itemsCarrito.getElementsByClassName('carrito-item-titulo');
    for(var i=0;i < nombresItemsCarrito.length;i++){
        if(nombresItemsCarrito[i].innerText==titulo){
             var selector = nombresItemsCarrito[i].parentElement.querySelector('.carrito-item-cantidad');
            selector.value = parseInt(selector.value) + cantidad;
            actualizarTotalCarrito();
            syncStorageWithDOM();
            return;
        }
    }

    var itemCarritoContenido = `
       <div class="carrito-item" data-id="${id}">
            <img src="${imagenSrc}" width="80px" alt="">
            <div class="carrito-item-detalles">
                <span class="carrito-item-titulo">${titulo}</span>
                <div class="selector-cantidad">
                    <i class="fa-solid fa-minus restar-cantidad"></i>
                    <input type="text" value="${cantidad}" class="carrito-item-cantidad" disabled>
                    <i class="fa-solid fa-plus sumar-cantidad"></i>
                </div>
                <span class="carrito-item-precio">${precio}</span>
            </div>
            <button class="btn-eliminar">
                <i class="fa-solid fa-trash"></i>
            </button>
        </div>
    `
    item.innerHTML = itemCarritoContenido;
    itemsCarrito.append(item);

    //Agregamos la funcionalidad eliminar al nuevo item
     item.getElementsByClassName('btn-eliminar')[0].addEventListener('click', eliminarItemCarrito);

    //Agregmos al funcionalidad restar cantidad del nuevo item
    var botonRestarCantidad = item.getElementsByClassName('restar-cantidad')[0];
    botonRestarCantidad.addEventListener('click',restarCantidad);

    //Agregamos la funcionalidad sumar cantidad del nuevo item
    var botonSumarCantidad = item.getElementsByClassName('sumar-cantidad')[0];
    botonSumarCantidad.addEventListener('click',sumarCantidad);

    //Actualizamos total
    actualizarTotalCarrito();
    syncStorageWithDOM();
}
//Aumento en uno la cantidad del elemento seleccionado
function sumarCantidad(event){
    var buttonClicked = event.target;
    var selector = buttonClicked.parentElement;
    console.log(selector.getElementsByClassName('carrito-item-cantidad')[0].value);
    var cantidadActual = selector.getElementsByClassName('carrito-item-cantidad')[0].value;
    cantidadActual++;
    selector.getElementsByClassName('carrito-item-cantidad')[0].value = cantidadActual;
    actualizarTotalCarrito();
    syncStorageWithDOM();
}
//Resto en uno la cantidad del elemento seleccionado
function restarCantidad(event){
    var buttonClicked = event.target;
 var item = buttonClicked.closest('.carrito-item');
    var id = item.dataset.id;
    fetch(BASE_URL+"Carrito/removeItem", {
        method: "POST",
        headers: {"Content-Type":"application/x-www-form-urlencoded"},
        body: "id="+id
    })
    .then(r=>r.json())
    .then(function(){
        item.remove();
        actualizarTotalCarrito();
        syncStorageWithDOM();
        ocultarCarrito();
    });
    }

//Elimino el item seleccionado del carrito
function eliminarItemCarrito(event){
    var buttonClicked = event.target;
    buttonClicked.parentElement.parentElement.remove();
    //Actualizamos el total del carrito
    actualizarTotalCarrito();
    syncStorageWithDOM();

    //la siguiente funciòn controla si hay elementos en el carrito
    //Si no hay elimino el carrito
    ocultarCarrito();
}
//Funciòn que controla si hay elementos en el carrito. Si no hay oculto el carrito.
function ocultarCarrito(){
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    if(carritoItems.childElementCount==0){
        var carrito = document.getElementsByClassName('carrito')[0];
        carrito.style.marginRight = '-100%';
        carrito.style.opacity = '0';
        carritoVisible = false;
    
        var items =document.getElementsByClassName('contenedor-items')[0];
         if(items){
            items.style.width = '100%';
        }
    }
}
//Actualizamos el total de Carrito
function actualizarTotalCarrito(){
    //seleccionamos el contenedor carrito
    var carritoContenedor = document.getElementsByClassName('carrito')[0];
    var carritoItems = carritoContenedor.getElementsByClassName('carrito-item');
    var total = 0;
    //recorremos cada elemento del carrito para actualizar el total
    for(var i=0; i< carritoItems.length;i++){
        var item = carritoItems[i];
        var precioElemento = item.getElementsByClassName('carrito-item-precio')[0];
        //quitamos el simobolo peso y el punto de milesimos.
         var precio = parseFloat(
            precioElemento.innerText
                .replace('$','')
                .replace('S/','')
                .replace(',','')
                .trim()
        );
        var cantidadItem = item.getElementsByClassName('carrito-item-cantidad')[0];
        console.log(precio);
        var cantidad = cantidadItem.value;
        total = total + (precio * cantidad);
    }
    total = Math.round(total * 100)/100;

    document.getElementsByClassName('carrito-precio-total')[0].innerText = 'S/'+total.toLocaleString("es") + ",00";

}








function addItemToStorage(titulo, precio, imagenSrc, cantidad){
    var cart = JSON.parse(localStorage.getItem('cart') || '[]');
    var item = cart.find(i => i.titulo === titulo);
    if(item){
        item.cantidad += cantidad;
    }else{
        cart.push({titulo:titulo, precio:precio, imagenSrc:imagenSrc, cantidad:cantidad});
    }
    localStorage.setItem('cart', JSON.stringify(cart));
}

function syncStorageWithDOM(){
    var carritoItems = document.getElementsByClassName('carrito-items')[0];
    if(!carritoItems){return;}
    var items = carritoItems.getElementsByClassName('carrito-item');
    var cart = [];
    for(var i=0;i<items.length;i++){
        var titulo = items[i].getElementsByClassName('carrito-item-titulo')[0].innerText;
        var precio = items[i].getElementsByClassName('carrito-item-precio')[0].innerText;
        var imagenSrc = items[i].getElementsByTagName('img')[0].src;
        var cantidad = parseInt(items[i].getElementsByClassName('carrito-item-cantidad')[0].value);
        cart.push({titulo:titulo, precio:precio, imagenSrc:imagenSrc, cantidad:cantidad});
    }
    localStorage.setItem('cart', JSON.stringify(cart));
}

function loadCartFromDB(){
    var carritoItems = document.getElementsByClassName("carrito-items")[0];
    if(!carritoItems){return;}
    fetch(BASE_URL+"Carrito/getItems")
        .then(r=>r.json())
        .then(function(cart){
            carritoItems.innerHTML = "";
            cart.forEach(function(it){
               agregarItemAlCarritoDOM(it.id, it.nombre, "S/"+it.precio, it.imagen, it.cantidad);
            });
            if(cart.length>0){
                hacerVisibleCarrito();
                actualizarTotalCarrito();
            }
        });
}

//Renderiza los productos almacenados en localStorage en el contenedor principal
function renderCartProducts(){
    var contenedor = document.querySelector('.contenedor-items');
    if(!contenedor){return;}
    contenedor.innerHTML = '';
    var cart = JSON.parse(localStorage.getItem('cart') || '[]');
    cart.forEach(function(it){
        var div = document.createElement('div');
        div.classList.add('item');
        div.innerHTML = `
            <img src="${it.imagenSrc}" class="img-item" />
            <span class="titulo-item">${it.titulo}</span>
            <span class="precio-item">${it.precio}</span>
            <button class="boton-item">Agregar al Carrito</button>
        `;
        div.querySelector('.boton-item').addEventListener('click', agregarAlCarritoClicked);
        contenedor.appendChild(div);
    });
}