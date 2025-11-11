 <!-- Información del hotel -->
        <div class="hotel">
            <h2>Información del Hotel</h2>
            <p class="total-usuarios"><strong>Nombre del hotel:</strong> <?php echo $hotel->getNombre(); ?></p>
            <p class="total-usuarios"><strong>Total de usuarios:</strong> <?php echo count($hotel->getUsuarios()); ?></p>

            <?php foreach($hotel->getUsuarios() as $usuario): ?>
                <div class="usuario">
                    <h3>Usuario: <?php echo $usuario->getNameUser(); ?></h3>
                    <p><strong>Email:</strong> <?php echo $usuario->getEmail(); ?></p>
                    <p class="total-mascotas"><strong>Total de mascotas:</strong> <?php echo count($usuario->getMascotas()); ?></p>

                    <?php if (!empty($usuario->getMascotas())): ?>
                        <?php foreach($usuario->getMascotas() as $mascota): ?>
                            <div class="mascota">
                                <h4>Nombre: <?php echo $mascota->getName(); ?></h4>
                                <pre><?php echo $mascota; ?></pre>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <p class="alert alert-warning">Este usuario no tiene mascotas.</p>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>

            <p class="ingresos"><strong>Ingresos totales del hotel:</strong> <?php echo $hotel->calcularIngresosTotales(); ?>€</p>
        </div>

        <!-- Servicios disponibles -->
        <div class="servicio">
            <h2>Servicios disponibles</h2>
            <pre><?php Servicio::mostrarServiciosDisponibles(); ?></pre>
        </div>

        <!-- Ejemplo de eliminar un servicio de una mascota -->
        <div class="usuario">
            <h2>Ejemplo: Eliminar servicio "Paseo" de Rex</h2>
            <?php 
                $perro1->eliminarServicio("Paseo"); 
                $usuario1->mostrarInfo();
            ?>
        </div>

        <!-- Ejemplo de eliminar mascota de un usuario -->
        <div class="usuario">
            <h2>Ejemplo: Eliminar mascota "Kiwi" de Juan</h2>
            <?php 
                $usuario1->eliminarMascota($ave1); 
                $usuario1->mostrarInfo(); 
            ?>
        </div>

        <!-- Ejemplo de eliminar usuario del hotel -->
        <div class="hotel">
            <h2>Ejemplo: Eliminar usuario Ana López del hotel</h2>
            <?php 
                $hotel->eliminarUsuario($usuario2); 
                $hotel->mostrarInfoHotel(); 
            ?>
        </div>
    </div>