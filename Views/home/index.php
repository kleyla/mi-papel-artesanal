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
                        <button class="btn btn-primary" id="start">Guia papel artesanal</button>
                        <button class="btn btn-primary" id="startBuilder">Hacer Agenda o Album</button>
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


    </div>
</div>
<?php footerPublic($data); ?>