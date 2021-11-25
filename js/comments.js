let url = "../api/comentarios";


if (document.getElementById("postComment")) {
  document.getElementById("postComment").addEventListener("click", postComment);
}

let idCancion = document.getElementById("id").value;



loadComments(idCancion);

async function loadComments(idCancion) {
  let data;

  let admin = document.getElementById("esAdmin").value;
  let c = await fetch(`${url}`);
  data = await c.json();

  for (let i = 0; i < data.length; i++) {
    if (data[i].fk_cancion == idCancion) {
      document.getElementById("comentarios").innerHTML +=

        `<div class="comentario" id="comentario${data[i].id_comentarios}">
        <h4 class="alert-success">Puntuación: ${data[i]["puntuacion"]}</h4>
            <h5>${data[i]["comentario"]}</h5>`;

      if (admin == 1) {
        document.getElementById(
          "comentarios"
        ).innerHTML += `
            <button class="btn btn-primary btn-login" onclick="deleteComment(${data[i].id_comentarios})">Borrar comentario</a>`
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
}

function deleteComment(idComentario) {
  let apiUrl = url + "/" + idComentario;
  console.log(idComentario);

  fetch(apiUrl, {
    method: "DELETE",
  })
    .then((response) => {
      console.log(response);
      if (!response.ok) {
        console.log("Error");
      }
      else {
        document.getElementById("comentarios").innerHTML = ""
        loadComments(idCancion);
      }
    })
    .catch((error) => console.log(error));
}
