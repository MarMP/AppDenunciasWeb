<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="csrf-token" content="{{ csrf_token() }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Inicio</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="/css/app.css" rel="stylesheet">
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>
        <!-- Estilos -->
        <style>
            html, body {
                /*background: url("../images/fondoAdmin.jpg") no-repeat center center; */

                /* Ubicación de la imagen */
                background-image: url("../images/fondoAdmin.jpg");

                /* Para dejar la imagen de fondo centrada, vertical y

                horizontalmente */

                background-position: center center;

                /* Para que la imagen de fondo no se repita */

                background-repeat: no-repeat;

                /* La imagen se fija en la ventana de visualización para que la altura de la imagen no supere a la del contenido */

                background-attachment: fixed;

                /* La imagen de fondo se reescala automáticamente con el cambio del ancho de ventana del navegador */

                background-size: cover;

                /* Se muestra un color de fondo mientras se está cargando la imagen

                de fondo o si hay problemas para cargarla */

                background-color: #66999;
            }
        </style>
    </head>

    <body>
        <div id="app"></div>
         <!-- Scripts -->
         <script src="{{ asset('js/app.js') }}" ></script>
    </body>

    <!--<script src="/js/app.js"></script> -->
</html>
