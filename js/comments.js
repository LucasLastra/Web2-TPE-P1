let url = "../api/comentarios";


if(document.getElementById("postComment")){
  document.getElementById("postComment").addEventListener("click", postComment);
}

let idCancion = document.getElementById("id").value;

console.log(idCancion)


loadComments(idCancion);

async function loadComments(idCancion) {
    let data;
   
    let admin = document.getElementById("esAdmin").value;
    let c = await fetch(`${url}`);
    data = await c.json();
    console.log(data)
    // document.getElementById('commentsContainer').innerHTML = data;

    for (let i = 0; i < data.length; i++) {
      if(data[i].fk_cancion == idCancion){
        console.log('si')
        document.getElementById("comentarios").innerHTML += 
      
        `<div class="comment" id="comment${data[i].fk_cancion}">
            valoró: ${data[i]["puntuacion"]}
            <p>${data[i]["comentario"]}</p>`;
    
        if (admin == 1) {
          document.getElementById(
            "comentarios"
          ).innerHTML += `
            <button id="buttonDel/${data[i].fk_cancion}" onclick="deleteComment(${data[i].fk_cancion})">Borrar comentario</a>`
        }
    
        document.getElementById("comentarios").innerHTML += `</div>`;
      }
    }
  }



function postComment() {
    let comentario = document.getElementById("comentario").value;
    let puntuacion = parseInt(document.getElementById("puntuacion").value);


    let post = {
        "comentario": comentario,
        "puntuacion": puntuacion,
        "fk_cancion": idCancion
    };

    fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(post),
    })
        .then((response) => {
            console.log(response);
            if (!response.ok) {
                console.log("Error");
            }
            else {
                document.getElementById("comentarios").innerHTML = "";
                loadComments(idCancion);
                document.getElementById('comentario').value = "";
            }
            return response.json();
        })
        //.catch((error) => console.log(error));
}
