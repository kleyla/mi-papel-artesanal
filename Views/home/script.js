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

$("#comprarAgenda").click(function () {
  hideContentBuilder();
  $("#item").val("agenda");
  $("#detalleItem").text("Agenda de 20bs");
});
$("#comprarAlbum").click(function () {
  hideContentBuilder();
  $("#item").val("album");
  $("#detalleItem").text("Album de 15bs");
});

function hideContentBuilder() {
  $("#content-buider").addClass("animate__animated animate__backOutLeft");
  setTimeout(function () {
    $("#content-buider").removeClass(
      "container animate__animated animate__backInRight animate__backOutLeft"
    );
    $("#content-buider").addClass("hidden");
    $("#content-payment").removeClass("hidden");
    $("#content-payment").addClass(
      "container animate__animated animate__backInRight"
    );
  }, 1000);
}

$("input[type=radio][name=payment]").change(function () {
  // console.log("payment");
  if (this.value == "pagoTarjeta") {
    $("#formPagoCampos").empty();
    formTarjeta();
  }
  if (this.value == "pagoPaypal") {
    $("#formPagoCampos").empty();

    formPaypal();
  }
  if (this.value == "pagoBitcoin") {
    $("#formPagoCampos").empty();
    formPaypal();
  }
  calcularTotal();
});
$("#cantidadPedido").change(function () {
  cantidad = this.value;
  $("#detalleCantidad").text(cantidad);

  $("#detalleEnvio").text(parseFloat(cantidad) * 10 + " bs");
  calcularTotal();
});
$("#cupon").change(function () {
  $("#detalleCupon").text(this.value);
  calcularTotal();
});

function calcularTotal() {
  total = getTotal();

  $("#detalleTotal").text(total);
}
function getTotal() {
  if ($("#item").val() == "agenda") {
    monto = 20;
  } else {
    monto = 15;
  }
  cantidad = $("#cantidadPedido").val();
  // console.log("Cantidad " + cantidad);
  descuentoCupon = getDescuentoCupon();
  // console.log("descuentoCupon " + descuentoCupon);
  descuentoMetodo = getDescuentoMetodo();
  // console.log("descuentoMetodo " + descuentoMetodo);
  costoEnvio = parseFloat(cantidad) * 10;
  // console.log("costoEnvio " + costoEnvio);

  total =
    monto *
      parseFloat(cantidad) *
      (1 - descuentoCupon) *
      (1 - descuentoMetodo) +
    costoEnvio;
  return Math.round(total * 100) / 100;
}
function cuponExiste() {
  return $("#cupon").val() === "MARCH2021";
}
function getDescuentoCupon() {
  if ($("#cupon").val() === "MARCH2021") {
    return 0.2;
  } else {
    return 0;
  }
}
function getDescuentoMetodo() {
  // console.log("Descuento metodo");
  // console.log($("input[type=radio][name=payment]:checked").val());
  if ($("input[type=radio][name=payment]:checked").val() == "pagoTarjeta") {
    return 0.08;
  }
  if ($("input[type=radio][name=payment]:checked").val() == "pagoPaypal") {
    return 0;
  }
  if ($("input[type=radio][name=payment]:checked").val() == "pagoBitcoin") {
    return 0.15;
  }
  return 0;
}
function formTarjeta() {
  campos = `<label for="nroTarjeta">Nro tarjeta:</label>
    <input type="number" id="nroTarjeta" name="nroTarjeta">

    <label for="mesAnhoTarjeta">MM/AA:</label>
    <input type="text" step="1" id="mesAnhoTarjeta" name="mesAnhoTarjeta">

    <label for="cvvTarjeta">CVV:</label>
    <input type="number" id="cvvTarjeta" name="cvvTarjeta">`;
  $("#formPagoCampos").append(campos);
}
function formPaypal() {
  campos = `<label for="emailPaypal">Email:</label>
    <input type="email" id="emailPaypal" name="emailPaypal">

    <label for="passPaypal">Contraseña:</label>
    <input type="password" id="passPaypal" name="passPaypal">`;
  $("#formPagoCampos").append(campos);
}

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
$("#formPago").submit(function (event) {
  event.preventDefault();

  var formPago = document.querySelector("#formPago");

  var request = window.XMLHttpRequest
    ? new XMLHttpRequest()
    : new ActiveXObject("Microsoft.XMLHTTP");
  var ajaxUrl = base_url + "home/pagar";
  var formData = new FormData(formPago);
  request.open("POST", ajaxUrl, true);
  request.send(formData);
  // console.log(request);
  request.onreadystatechange = function () {
    if (request.readyState == 4 && request.status == 200) {
      var objData = JSON.parse(request.responseText);
      console.log(objData);
      if (objData.status) {
        // $("#resultadoAgenda").empty();
        // contenido = "";
        // last = objData["data"].length - 1;
        monto = getTotal();

        let timerInterval;
        Swal.fire({
          title: "Empezando transaccion!",
          html: "Inicializando pago en <b></b> millisegundos.",
          timer: 2000,
          timerProgressBar: true,
          didOpen: () => {
            Swal.showLoading();
            timerInterval = setInterval(() => {
              const content = Swal.getContent();
              if (content) {
                const b = content.querySelector("b");
                if (b) {
                  b.textContent = Swal.getTimerLeft();
                }
              }
            }, 100);
          },
          willClose: () => {
            clearInterval(timerInterval);
          },
        }).then((result) => {
          /* Read more about handling dismissals below */
          if (result.dismiss === Swal.DismissReason.timer) {
            let timerInterval;
            Swal.fire({
              title: "Verificacion de Transaccion!",
              html:
                objData["data"]["verificacion"] + "<br><b></b> millisegundos.",
              timer: 3000,
              timerProgressBar: true,
              didOpen: () => {
                Swal.showLoading();
                timerInterval = setInterval(() => {
                  const content = Swal.getContent();
                  if (content) {
                    const b = content.querySelector("b");
                    if (b) {
                      b.textContent = Swal.getTimerLeft();
                    }
                  }
                }, 100);
              },
              willClose: () => {
                clearInterval(timerInterval);
              },
            }).then((result) => {
              /* Read more about handling dismissals below */
              if (result.dismiss === Swal.DismissReason.timer) {
                let timerInterval;
                Swal.fire({
                  title: "Realizando transaccion!",
                  html:
                    objData["data"]["transaccion"] +
                    "<br> <b></b> milliseconds.",
                  timer: 3000,
                  timerProgressBar: true,
                  didOpen: () => {
                    Swal.showLoading();
                    timerInterval = setInterval(() => {
                      const content = Swal.getContent();
                      if (content) {
                        const b = content.querySelector("b");
                        if (b) {
                          b.textContent = Swal.getTimerLeft();
                        }
                      }
                    }, 100);
                  },
                  willClose: () => {
                    clearInterval(timerInterval);
                  },
                }).then((result) => {
                  /* Read more about handling dismissals below */
                  if (result.dismiss === Swal.DismissReason.timer) {
                    Swal.fire({
                      icon: "success",
                      title: "Transaccion exitosa",
                      text:
                        "La transaccion de " +
                        monto +
                        " bs fue realizada exitosamente!",
                    });
                    document.getElementById("formPago").reset();
                  }
                });
              }
            });
          }
        });
      }
    }
  };
});

$("#formAgenda").submit(function (event) {
  // console.log("Submited");
  event.preventDefault();
  if (
    !$("input[name=tipoCubierta]").is(":checked") ||
    !$("input[name=colorCubierta]").is(":checked") ||
    !$("input[name=colorAnillos]").is(":checked")
  ) {
    // alert("Seleccione los datos!");
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Debes seleccionar los campos!",
    });
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
  // console.log("Submiteddd");
  event.preventDefault();
  if (
    !$("input[name=colorCubiertaAlbum]").is(":checked") ||
    !$("input[name=tipoPegamento]").is(":checked")
  ) {
    // alert("Seleccione los datos!");
    Swal.fire({
      icon: "error",
      title: "Oops...",
      text: "Debes seleccionar los campos!",
    });
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
