filtrar.addEventListener("click", () => {

    fetch("php/lista_cotizaciones.php", {
        method: "POST",
        body: new FormData(frm)
    }).then(response => response.text()).then(response => {
        
        let parte = response.split(`Array\n(\n`)
        let res = parte.map((e)=>{
            let fin = e.replace(/ /g,'').split('\n').map((g)=>g.split('=>')[1])
            return fin
        })

        let tabla = document.getElementById("tbody");
        tabla.innerHTML="";

        res = res.filter(e=>e[0])
        res.forEach(elem => {
            if(elem){

                tabla.innerHTML+=`
                <tr>
                <td>${elem[0]}</td>
                <td>${elem[2]}</td>
                <td>${elem[4]}</td>
                <td>${elem[5]}</td>
                <td>${elem[8]}</td>
                </tr>` 
            }
        })
    })
});