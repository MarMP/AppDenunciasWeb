<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
        <title>  @yield('titulo','plantilla')  </title>
            <meta name="viewport" content="width=device-width, initial-scale=1">

        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <style type="text/css">

           /* body {
                background-color: #D8D3D2;
                font-family: 'Open Sans', sans-serif;
            } */

            html, body {
                height: 100vh;
                margin: 0;
                background-color:  #949190;
                font-family: 'Copperplate', 'Copperplate Gothic Light';

            }

            .container-fluid {
                width: 90% !important;
                height: 350px !important;
            }

            header.masthead {
                position: relative;
                background-color: #343a40;
                background: url("../images/fondo.jpg") no-repeat center center;
                background-size: cover;
                padding-top: 14rem;
                padding-bottom: 8rem;
                font-family: 'Copperplate', 'Copperplate Gothic Light';
            }

            .footer-top {
                padding-left: 80px;
            }

            .footer-bottom {
                padding: 20px 10px 10px 15px;
                background-color: #949190;
                /*background-color: #D8D3D2; */
                text-align: left;
                color: #000000;
            }

            i {
                display: inline-block;
                margin-right: 1em;
            }

            /* Logo redonde de pie de página */
            .logo-footer {
                /* Define el tamaño del círculo */
                height: 150px;
                width: 150px;
                /* Los siguientes valores son independientes del tamaño del círculo */
                background-repeat: no-repeat;
                background-position: 50%;
                border-radius: 50%;
                background-size: 100% auto;
            }

            .features-icons {
                padding-top: 7rem;
                padding-bottom: 7rem;
                background-color: #949190;
            }

            .features-icons .features-icons-item {
                max-width: 20rem;
            }

            .features-icons .features-icons-item .features-icons-icon {
                height: 7rem;
            }

            .features-icons .features-icons-item .features-icons-icon i {
                font-size: 4.5rem;
            }

            .features-icons .features-icons-item:hover .features-icons-icon i {
                font-size: 5rem;
            }


            #link {
                color: #fcfcfc;
            }

            /*Apariencia login */

            header.mastheadlogin {
                position: relative;
                background-color: #343a40;
                background: url("../images/fondo.jpg") no-repeat center center;
                background-size: cover;
                padding-top: 16rem;
                padding-bottom: 22rem;
                font-family: 'Copperplate', 'Copperplate Gothic Light';
                font-size: 18px;
            }

            .box {
                width: 480px;
                height: 500px;
                padding: 40px 80px 0px 80px;
                margin: 20px 0 auto;
                top: 50%;
                left: 50%;
                position: absolute;
                transform: translate(-50%, -50%);
                background: #343a40;
                text-align: center;

            }
            .box h2 {
                margin: 0;
                padding: 10px 20px 20px 20px ;
                text-align: center;
                font-size: 27px;
                font-family: 'Copperplate', 'Copperplate Gothic Light';
                color: white;
                text-transform: uppercase;
                font-weight: 500;
            }
            .box input[type="email"],
            .box input[type="password"] {
                border: 0;
                background: none;
                display: block;
                margin: 20px auto;
                text-align: center;
                border: 2px solid #3498db;
                padding: 10px 10px;
                width: 250px;
                outline: none;
                color: white;
                border-radius: 24px;
                transition: 0.25s;
            }

            .box input[type="email"]:focus,
            .box input[type="password"]:focus {
                width: 300px;
                border-color: #949190;
            }

            .box button[type="submit"] {
                border: 0;
                /*background: none;*/
                display: block;
                margin: 20px auto;
                text-align: center;
                border: 2px solid #2ecc71;
                padding: 14px 40px;
                outline: none;
                color: white;
                border-radius: 24px;
                transition: 0.25s;
                cursor: pointer;
                background-color: #518353;
                text-transform: uppercase;
                font-size: 12px;
            }

            .box input[type="submit"]:hover {
                background: #2ecc71;
            }

            .form-group {
                color: white;
                text-align: left;
            }
            .form-check {
                color: white;
                font-weight: 50;
            }

            .wrapper {
                min-height: calc(100% - 4rem);
            }

            /*Recuperar contraseña */

            #forgot {
                width: 480px;
                height: 480px;
                padding: 40px 80px 0px 80px;
                margin: 20px 0 auto;
                top: 50%;
                left: 50%;
                position: absolute;
                transform: translate(-50%, -50%);
                background: #343a40;
                text-align: center;
            }

            #forgot-button {
                margin-top: 10px;
            }

            .box h6 {
                margin: 0;
                padding: 0px 20px 20px 20px ;
                /*text-align: center; */
                font-size: 17px;
                font-family: 'Copperplate', 'Copperplate Gothic Light';
                color: white;
                font-weight: 500;
            }

            header.mastheadforgot {
                position: relative;
                background-color: #949190;;
                background-size: cover;
                padding-top: 16rem;
                padding-bottom: 22rem;
                font-family: 'Copperplate', 'Copperplate Gothic Light';
                font-size: 18px;
            }

            /*Mi perfil*/

            header.mastheadperfil {
                position: relative;
                background-color: #343a40;
                background-image: url("../images/fondoAdmin.jpg");
                background-position: center center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: cover;
                padding-top: 16rem;
                padding-bottom: 22rem;
                font-family: 'Copperplate', 'Copperplate Gothic Light';
                font-size: 18px;
            }

        </style>
        <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="contenido">
            @yield('contenido')
        </div>
    </body>
</html>
