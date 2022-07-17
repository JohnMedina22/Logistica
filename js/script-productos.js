codigo.addEventListener("click", () => {

    fetch("php/lista_productos.php", {
        method: "POST",
        body: new FormData(frm)
    }).then(response => response.text()).then(response => {
        document.getElementById("nombre_producto").value = response;
        console.log(response);
    })
});