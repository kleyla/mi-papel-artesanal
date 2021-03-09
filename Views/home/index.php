<?php headerPublic($data); ?>
<div class="bg-img-start">
    <div class="container">
        <div id="content-start" class="row row-center">
            <div class="col-6">
                <div class="card bg-white w-600 animate__animated animate__bounceInRight animate__slow">
                    <h3 class="card-title">Bienvenid@!</h3>
                    <div class="card-content">
                        <p>Aprende a reciclar papel y hacer tus propios cuadernos</p>
                    </div><br>
                    <!-- <a href="<?= base_url(); ?>papel" class="btn btn-primary">Hacer papel artesanal</a> -->
                    <div class="row row-center">
                        <button class="btn btn-primary" id="start">Guia para reciclar</button>
                        <button class="btn btn-primary" id="startBuilder">Hacer mi Agenda o Album</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="content-instrucciones" class="hidden">

        </div>
        <div id="content-papel" class="hidden">
            <div class="card bg-white min-w-1000 animate__animated animate__bounceInRight animate__slow">

                <div class="card-content">
                    <div class="row ">
                        <div class="col-6">
                            <h2>De papel bond</h2>
                            <div class="txt-inst">
                                <p>1. Limpiamos el papel, es decir lo separamos de tapas, anillos de encuadernacion, cintas adhesiva...</p>
                                <p>2. Picamos el papel en pequeños pedacitos...</p>
                                <p>3. Dejamos remojando el papel en abundante agua por todo un dia...</p>
                                <p>4. Si notamos que el papel aun no esta como pulpa, lo podemos licuar...</p>
                                <p>5. Agregar decorativos a bond: Se puede agregar colores acrilicos como hojitas de flores secas...</p>
                                <p>6. Formamos el papel con ayuda de los marcos de madera... </p>
                                <p>7. Dejamos secar por 24 horas mejor si lo exponemos al sol...</p>
                                <br>
                                <img class="papel-img" src="<?= base_url(); ?>assets/imgs/papelBond.jpg" alt='Papel'>
                            </div>
                        </div>
                        <div class="col-6">
                            <h2>De papel periodico</h2>
                            <div class="txt-inst">
                                <p>1. Limpiamos el papel, de cintas adhesiva u otros...</p>
                                <p>2. Picamos el papel en pequeños pedacitos...</p>
                                <p>3. Dejamos remojando el papel en abundante agua por todo un dia...</p>
                                <p>4. Si notamos que el papel aun no esta como pulpa, lo podemos licuar...</p>
                                <p>5. Agregar decorativos al periodico: Se podria agregar hojitas de flores secas...</p>
                                <p>6. Formamos el papel con ayuda de los marcos de madera... </p>
                                <p>7. Dejamos secar por 12 horas al aire libre...</p>
                                <br>
                                <img class="papel-img" src="<?= base_url(); ?>assets/imgs/periodico.jpg" alt='periodico'>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div id="content-buider" class="hidden">
            <div class="card bg-white w-1000">
                <div class="card-content">
                    <div class="row">
                        <div class="col-6">
                            <h2>Crea tu Agenda (20 bs)</h2>
                            <form id="formAgenda">
                                <p class="subtitle">Tipo de Cubierta:</p>
                                <input type="radio" name="tipoCubierta" value="cuerina" id="cuerina">
                                <label for="cuerina">Cuerina</label>

                                <input type="radio" name="tipoCubierta" value="carton" id="carton">
                                <label for="carton">Carton</label>
                                <br><br>
                                <p class="subtitle">Colores:</p>
                                <input type="radio" name="colorCubierta" value="naranja" id="naranja">
                                <label for="naranja">Naranja</label>

                                <input type="radio" name="colorCubierta" value="verde" id="verde">
                                <label for="verde">Verde</label>

                                <input type="radio" name="colorCubierta" value="amarillo" id="amarillo">
                                <label for="amarillo">Amarillo</label>
                                <br><br>
                                <p class="subtitle">Color del anillos:</p>
                                <input type="radio" name="colorAnillos" value="dorado" id="dorado">
                                <label for="dorado">Dorado</label>

                                <input type="radio" name="colorAnillos" value="plateado" id="plateado">
                                <label for="plateado">Plateado</label>
                                <br><br>
                                <button class="btn btn-primary" type="submit">Confirmar</button>
                            </form><br>
                            <div id="resultadoAgenda">

                            </div>
                            <br>
                            <button class="btn btn-primary" id="comprarAgenda">Comprar</button>

                        </div>
                        <div class="col-6">
                            <h2>Crea tu Album (15 bs)</h2>
                            <form id="formAlbum">
                                <p class="subtitle">Colores:</p>
                                <input type="radio" name="colorCubiertaAlbum" value="naranja" id="naranjaAlbum">
                                <label for="naranjaAlbum">Naranja</label>

                                <input type="radio" name="colorCubiertaAlbum" value="verde" id="verdeAlbum">
                                <label for="verdeAlbum">Verde</label>

                                <input type="radio" name="colorCubiertaAlbum" value="amarillo" id="amarilloAlbum">
                                <label for="amarilloAlbum">Amarillo</label>
                                <br><br>
                                <p class="subtitle">Tipo de Pegamento:</p>
                                <input type="radio" name="tipoPegamento" value="silicona" id="silicona">
                                <label for="silicona">Silicona</label>

                                <input type="radio" name="tipoPegamento" value="blanco" id="blanco">
                                <label for="blanco">Blanco</label>
                                <br><br>

                                <button class="btn btn-primary" type="submit">Confirmar</button>
                            </form><br>
                            <div id="resultadoAlbum">

                            </div>
                            <br>
                            <button class="btn btn-primary" id="comprarAlbum">Comprar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div id="content-payment" class="hidden">
            <div class="card bg-white">
                <div class="card-content">
                    <h2>Pago</h2>
                    <div id="detallesPago">
                        <p><b>Item: </b><span id="detalleItem"></span></p>
                        <p><b>Cantidad: </b><span id="detalleCantidad"></span></p>
                        <p><b>Cupon: </b><span id="detalleCupon"></span></p>
                        <p><b>Envio (10bs c/u): </b><span id="detalleEnvio"></span></p>
                        <p><b>Total: </b><span id="detalleTotal"></span></p>
                    </div>
                    <form id="formPago">
                        <input type="text" name="item" id="item" value="" hidden>

                        <div class="row row-center">
                            <h4>Metodo de pago</h4>
                            <div>
                                <input type="radio" id="pagoPaypal" name="payment" value="pagoPaypal">
                                <label for="pagoPaypal">
                                    <img src="<?= media(); ?>imgs/paypal.svg" alt="paypal" class="w-100">
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="pagoTarjeta" name="payment" value="pagoTarjeta">
                                <label for="pagoTarjeta">
                                    <img class="w-100" src="<?= media(); ?>imgs/tarjeta-de-credito.svg" alt="tarjeta">
                                </label>
                            </div>
                            <div>
                                <input type="radio" id="pagoBitcoin" name="payment" value="pagoBitcoin">
                                <label for="pagoBitcoin">
                                    <img src="<?= media(); ?>imgs/bitcoin.svg" alt="bitcoin" class="w-100">
                                </label>
                            </div>

                        </div>

                        <label for="cantidadPedido">Cantidad:</label>
                        <input type="number" step="1" id="cantidadPedido" name="cantidadPedido" value="0">
                        <br>
                        <label for="cupon">Cupon:</label>
                        <input type="text" step="1" id="cupon" name="cupon">
                        <br>
                        <div id="formPagoCampos">

                        </div>

                        <button class="btn btn-primary" type="submit">Confirmar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php footerPublic($data); ?>