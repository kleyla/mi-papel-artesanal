$(document).ready(function () {
  console.log("Ready");

  // getPapel();
});

$("#start").click(function () {
  $("#content-start").addClass("animate__animated animate__backOutLeft");
  setTimeout(function () {
    $("#content-start").remove();
    $("#content-papel").removeClass("hidden");
    $("#content-papel").addClass(
      "container animate__animated animate__backInRight"
    );
  }, 1000);
});

$("#startBuilder").click(function () {
  $("#content-start").addClass("animate__animated animate__backOutLeft");
  setTimeout(function () {
    $("#content-start").remove();
    $("#content-buider").removeClass("hidden");
    $("#content-buider").addClass(
      "container animate__animated animate__backInRight"
    );
  }, 1000);
});

$("#papelBond").click(function () {
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "home/papelBond";

  var strData = "dato=" + "papelBond";

  request.open("POST", ajaxUrl, true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(strData);
  // console.log(request);
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var objData = JSON.parse(request.responseText);
      if (objData.status) {
        console.log(objData["data"]);
        instrucciones = `<div class="card bg-white"> 
                          <div class="card-content"><h2>Con papel Bond los pasos son:</h2><br>
                            <div style="text-align: left;">`;
        for (i = 0; i < objData["data"].length; i++) {
          instrucciones =
            instrucciones +
            "<p>" +
            (i + 1) +
            ". " +
            objData["data"][i] +
            "</p>";
        }
        instrucciones =
          instrucciones +
          `</div><br><img src="${base_url}assets/imgs/papelBond.jpg" alt='Papel'>
          <br><button class="btn btn-primary" id="backPaper">Atras</button>
                                        </div></div>`;

        $("#content-instrucciones").append(instrucciones);

        hideCardPaper();
        back();
      }
    }
  };
});

$("#papelPeriodico").click(function () {
  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "home/papelPeriodico";

  var strData = "dato=" + "papelPeriodico";

  request.open("POST", ajaxUrl, true);
  request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  request.send(strData);
  // console.log(request);
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var objData = JSON.parse(request.responseText);
      if (objData.status) {
        console.log(objData["data"]);
        instrucciones = `<div class="card bg-white"> 
                          <div class="card-content"><h2>Con papel Periodico los pasos son:</h2><br>
                            <div style="text-align: left;">`;
        for (i = 0; i < objData["data"].length; i++) {
          instrucciones =
            instrucciones +
            "<p>" +
            (i + 1) +
            ". " +
            objData["data"][i] +
            "</p>";
        }
        instrucciones =
          instrucciones +
          `</div><br><br><img src="${base_url}assets/imgs/periodico.jpg" alt='Papel'>
          <br><button class="btn btn-primary" id="backPaper">Atras</button>
                                        </div></div>`;

        $("#content-instrucciones").append(instrucciones);

        hideCardPaper();
        back();
      }
    }
  };
});

function hideCardPaper() {
  $("#content-papel").addClass("animate__animated animate__backOutLeft");
  setTimeout(function () {
    $("#content-papel").removeClass(
      "container animate__animated animate__backInRight animate__backOutLeft"
    );
    $("#content-papel").addClass("hidden");
    $("#content-instrucciones").removeClass("hidden");
    $("#content-instrucciones").addClass(
      "container animate__animated animate__backInRight"
    );
  }, 1000);
}
function back() {
  $("#backPaper").click(function () {
    $("#content-instrucciones").addClass(
      "animate__animated animate__backOutLeft"
    );
    setTimeout(function () {
      $("#content-instrucciones").removeClass(
        "container animate__animated animate__backInRight animate__backOutLeft"
      );
      $("#content-instrucciones").addClass("hidden");
      $("#content-instrucciones").empty();

      $("#content-papel").removeClass("hidden animate__backOutLeft");
      $("#content-papel").addClass(
        "container animate__animated animate__backInRight"
      );
    }, 1000);
  });
}
$("#papelPeriodico").click(function () {});

$("#formAgenda").submit(function (event) {
  console.log("Submited");
  event.preventDefault();
  if (
    !$("input[name=tipoCubierta]").is(":checked") ||
    !$("input[name=colorCubierta]").is(":checked") ||
    !$("input[name=colorAnillos]").is(":checked")
  ) {
    alert("Seleccione los datos!");
    return false;
  }
  var formAgenda = document.querySelector("#formAgenda");

  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "home/getAgenda";
  var formData = new FormData(formAgenda);
  request.open("POST", ajaxUrl, true);
  request.send(formData);
  // console.log(request);
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      // console.log(request.responseText);
      var objData = JSON.parse(request.responseText);
      if (objData.status) {
        $("#resultadoAgenda").empty();
        contenido = "";
        last = objData["data"].length - 1;

        for (i = 0; i < objData["data"].length - 1; i++) {
          contenido = contenido + objData["data"][i];
        }
        bookCover = objData["data"][last];
        bookBack = '<div class="book-back">' + contenido + "</div></div>";
        book = bookCover + bookBack;
        $("#resultadoAgenda").append(`<div>${book}</div>`);
      }
    }
  };
});

$("#formAlbum").submit(function (event) {
  console.log("Submiteddd");
  event.preventDefault();
  if (
    !$("input[name=colorCubiertaAlbum]").is(":checked") ||
    !$("input[name=tipoPegamento]").is(":checked")
  ) {
    alert("Seleccione los datos!");
    
    return false;
  }
  var formAlbum = document.querySelector("#formAlbum");

  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "home/getAlbum";
  var formData = new FormData(formAlbum);
  request.open("POST", ajaxUrl, true);
  request.send(formData);
  // console.log(request);
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      // console.log(request.responseText);
      var objData = JSON.parse(request.responseText);
      if (objData.status) {
        $("#resultadoAlbum").empty();
        contenido = "";
        last = objData["data"].length - 1;

        for (i = 0; i < objData["data"].length - 1; i++) {
          contenido = contenido + objData["data"][i];
        }
        bookCover = objData["data"][last];
        bookBack = '<div class="book-back">' + contenido + "</div></div>";
        book = bookCover + bookBack;
        $("#resultadoAlbum").append(`<div>${book}</div>`);
      }
    }
  };
});
