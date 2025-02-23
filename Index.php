<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Medios de Compra y Pago</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    
    <?php include 'menu.php'; ?> <!-- Menú separado -->

    <div class="container mt-4">
        <div class="legend-card bg-dark text-white p-3 rounded mb-3">
            <div class="legend-title fw-bold">La Xtabay</div>
            <p>Esta leyenda maya narra la historia de dos mujeres, Xtabay y Utz-Colel...</p>
            <a href="#" class="text-warning fw-bold" data-bs-toggle="modal" data-bs-target="#mensajeModal">Leer completo...></a>
        </div>

        <div class="legend-card bg-dark text-white p-3 rounded mb-3">
            <div class="legend-title fw-bold">El Aluxe</div>
            <p>La leyenda narra la presencia de los aluxes, seres traviesos...</p>
            <a href="#" class="text-warning fw-bold" data-bs-toggle="modal" data-bs-target="#mensajeModal">Leer completo...></a>
        </div>

        <div class="legend-card bg-dark text-white p-3 rounded mb-3">
            <div class="legend-title fw-bold">El Chom</div>
            <p>En Uxmal, un rey decidió organizar una gran fiesta...</p>
            <a href="#" class="text-warning fw-bold" data-bs-toggle="modal" data-bs-target="#mensajeModal">Leer completo...></a>
        </div>

        <div class="legend-card bg-dark text-white p-3 rounded mb-3">
            <div class="legend-title fw-bold">El Huay Chivo</div>
            <p>Esta leyenda narra la historia de un viejo hechicero...</p>
            <a href="#" class="text-warning fw-bold" data-bs-toggle="modal" data-bs-target="#mensajeModal">Leer completo...></a>
        </div>
    </div>

    <!-- MODAL PARA MENSAJE -->
    <!-- MODAL PARA MENSAJE -->
<div class="modal fade" id="mensajeModal" tabindex="-1" aria-labelledby="mensajeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mensajeModalLabel">Información</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body">
                Debes elegir un método de pago antes de leer más sobre la leyenda.
            </div>
            <div class="modal-footer">
                <!-- Botón que redirige a precios.php -->
                <a href="precios.php" class="btn btn-primary">Entendido</a>

            </div>
        </div>
    </div>
</div>

</body>
</html>
