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
            <div class="card bg-white animate__animated animate__bounceInRight animate__slow">
                <h3 class="card-title">Comencemos a hacer papel artesanal</h3>
                <div class="card-content">
                    <p>Da click segun el papel que tengas</p>
                </div><br>
                <div class="row row-center">
                    <button class="btn btn-primary" id="papelBond">De papel bond</button>
                    <button class="btn btn-primary" id="papelPeriodico">De papel periodico</button>
                </div>

            </div>
        </div>

        <div id="content-buider" class="hidden">
            <div class="card bg-white w-1000">
                <div class="card-content">
                    <div class="row">
                        <div class="col-6">
                            <h2>Crea tu Agenda</h2>
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
                        </div>
                        <div class="col-6">
                            <h2>Crea tu Album</h2>
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
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<?php footerPublic($data); ?>