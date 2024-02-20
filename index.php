<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DWES: Tarea 9 con GIT</title>
    <!-- Estilos CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            text-align: center;
            margin: 20px;
            background-color: #f8f8f8; 
            color: #333; 
        }

        h1 {
            color: #1a1a1a; 
            margin-bottom: 20px; 
        }

        p {
            font-style: italic;
            color: #666; 
        }

        img {
            max-width: 100%;
            height: auto;
            margin: 20px 0;
            border: 2px solid #ccc; 
            border-radius: 8px; 
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4CAF50; 
            color: white; 
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px; 
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            // Cargo la primera imagen al cargar la página
            cambiarImagen();

            // Cambio automáticamente la imagen cada 3 segundos
            setInterval(cambiarImagen, 3000);
        });
       
        function cambiarImagen() {
            // Realizo una solicitud AJAX para obtener un nuevo ID de imagen
            $.ajax({
                url: 'obtener_imagen.php', // URL del script PHP
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Modifico la fuente de la imagen con la nueva URL y un tamaño más pequeño
                    var nuevaURL = `${data.download_url}/400/200`;
                    $('#imagenAleatoria').attr('src', nuevaURL);
                },
                error: function(error) {
                    console.log('Error al obtener el JSON: ', error);
                }
            });
        }
    </script>
</head>
<body>
    <h1> Imágenes Aleatorias de Javier Fernández Bocanegra </h1>
    <img id="imagenAleatoria" src="" alt="Imagen Aleatoria">
    <!-- Botón para cambiar la imagen manualmente -->
    <p><button onclick="cambiarImagen()">Cambiar Imagen</button></p>
<?php
        // Contenido del archivo obtener_imagen.php
        $imagen_id = rand(1, 1000);
        $imagen = json_encode(['download_url' => "https://picsum.photos/id/{$imagen_id}"]);

        // Decodifico el JSON para extraer la URL
        $json_decodificado = json_decode($imagen, true);
        $url_imagen = $json_decodificado['download_url'];
    ?>
    
</body>
</html>

