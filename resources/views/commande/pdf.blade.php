<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }} - @yield('title')</title>

    <style>
        /* Estilos para el cuerpo del documento */
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
        }

        /* Estilos para la sección de la página */
        .page-panier {
            padding: 50px;
        }

        /* Estilos para la tabla */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        /* Estilos para las celdas de la tabla */
        th, td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        /* Estilos para la imagen del producto */
        .photo {
            width: 150px;
            height: 100px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <main class="page-panier">
        <div class="nom-page">
            <h3>Reservation</h3>
        </div>
        <table class="liste-panier">
            <tr>
                <td>
                    <img class="photo" src="data:image/jpeg;base64,{{ base64_encode(file_get_contents(public_path('assets/img/voitures/1713844923_1.jpg'))) }}" alt="">
                </td>
                <td>
                    <h3>BMW X5 2022</h3>
                </td>
                <td>
                    <h1>45900</h1>
                </td>
            </tr>
        </table>
    </main>
</body>
</html>