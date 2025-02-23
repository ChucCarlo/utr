<?php
// Iniciar la sesión para verificar si el usuario ha realizado una compra
session_start();

// Simulando que la compra fue realizada con éxito
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Aquí podrías validar el pago y confirmar que la compra fue exitosa.
    $_SESSION['compra_realizada'] = true;  // Marca que la compra se realizó
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago de Membresía</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <?php include 'menu.php'; ?>  <!-- Incluir el menú de navegación -->

    <div class="container mt-4">
        <h2 class="text-center">Pago de Membresía</h2>

        <!-- Formulario de Selección de Membresía -->
        <div class="mb-3">
            <label class="form-label">Selecciona una Membresía:</label>
            <select id="membresia" class="form-select">
                <option value="basica">Básica - $100 MXN</option>
                <option value="premium">Premium - $200 MXN</option>
                <option value="vip">VIP - $300 MXN</option>
            </select>
        </div>

        <!-- Formulario de Selección de Método de Pago -->
        <div class="mb-3">
            <label class="form-label">Selecciona un Método de Pago:</label>
            <select id="metodoPago" class="form-select" onchange="mostrarFormulario()">
                <option value="">Seleccione...</option>
                <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                <option value="transferencia">Transferencia Bancaria</option>
                <option value="pasarela">Pasarela de Pago</option>
                <option value="qr">Código QR / NFC</option>
                <option value="moneda_virtual">Moneda Virtual</option>
                <option value="creditos">Créditos Instantáneos</option>
            </select>
        </div>

        <!-- Formularios dinámicos según método de pago -->
        <div id="formularioPago"></div>

        <!-- Botón de Finalización de Pago -->
        <div class="text-center mt-3">
            <form method="POST" action="">
                <button class="btn btn-success" type="submit">Finalizar Pago</button>
            </form>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </div>

        <!-- Formulario de Reembolso (solo si la compra fue realizada) -->
        <?php if (isset($_SESSION['compra_realizada']) && $_SESSION['compra_realizada'] == true): ?>
            <div class="mt-4">
                <h4 class="text-center">Solicitar Reembolso</h4>
                <div class="mb-3">
                    <label class="form-label">Razón del Reembolso</label>
                    <textarea class="form-control" rows="4" placeholder="Describe tu razón para solicitar el reembolso..."></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Método de Pago Utilizado</label>
                    <select class="form-select">
                        <option value="tarjeta">Tarjeta de Crédito/Débito</option>
                        <option value="transferencia">Transferencia Bancaria</option>
                        <option value="pasarela">Pasarela de Pago</option>
                        <option value="qr">Código QR / NFC</option>
                        <option value="moneda_virtual">Moneda Virtual</option>
                        <option value="creditos">Créditos Instantáneos</option>
                    </select>
                </div>
                <div class="text-center">
                    <button class="btn btn-danger">Solicitar Reembolso</button>
                </div>
            </div>
        <?php endif; ?>

    </div>

    <script>
        function mostrarFormulario() {
            let metodo = document.getElementById("metodoPago").value;
            let formularioDiv = document.getElementById("formularioPago");
            formularioDiv.innerHTML = ""; // Limpiar contenido

            let html = "";

            if (metodo === "tarjeta") {
                html = 
                    <h4>Pago con Tarjeta</h4>
                    <div class="mb-3">
                        <label class="form-label">Número de Tarjeta</label>
                        <input type="text" class="form-control" placeholder="XXXX-XXXX-XXXX-XXXX">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha de Expiración</label>
                        <input type="month" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">CVV</label>
                        <input type="text" class="form-control" placeholder="XXX">
                    </div>
                ;
            } else if (metodo === "transferencia") {
                html = 
                    <h4>Pago por Transferencia</h4>
                    <p>Realiza la transferencia a la siguiente cuenta bancaria:</p>
                    <ul>
                        <li>Banco: BBVA</li>
                        <li>Número de Cuenta: 1234567890</li>
                        <li>CLABE: 012345678901234567</li>
                    </ul>
                    <div class="mb-3">
                        <label class="form-label">Subir Comprobante</label>
                        <input type="file" class="form-control">
                    </div>
                ;
            } else if (metodo === "pasarela") {
                html = 
                    <h4>Pago con Pasarela (PayPal/Stripe)</h4>
                    <p>Serás redirigido a la plataforma de pago.</p>
                    <a href="https://www.paypal.com/mx/home" class="btn btn-primary">Ir a PayPal</a>
                ;
            } else if (metodo === "qr") {
                html = 
                    <h4>Pago con Código QR / NFC</h4>
                    <p>Escanea el siguiente código QR para realizar el pago:</p>
                    <img src="qr_generado.png" width="200" alt="Código QR">
                ;
            } else if (metodo === "moneda_virtual") {
                html = 
                    <h4>Pago con Moneda Virtual</h4>
                    <label class="form-label">Seleccione una Criptomoneda:</label>
                    <select class="form-select">
                        <option>Bitcoin</option>
                        <option>Ethereum</option>
                        <option>USDT</option>
                    </select>
                    <p>Envia el pago a la siguiente dirección:</p>
                    <input type="text" class="form-control" value="1A2B3C4D5E6F..." readonly>
                ;
            } else if (metodo === "creditos") {
                html = 
                    <h4>Pago con Créditos Instantáneos</h4>
                    <p>Tienes <strong>500 créditos</strong> disponibles.</p>
                    <button class="btn btn-warning">Usar Créditos</button>
                ;
            }

            formularioDiv.innerHTML = html;
        }
    </script>
</body>
</html>