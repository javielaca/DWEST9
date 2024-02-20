<?php
// Genero un número aleatorio para el ID de la imagen de Lorem Picsum (entre 1 y 1000)
$imagen_id = rand(1, 1000);

// Devuelvo el ID como respuesta JSON
echo json_encode(['download_url' => "https://picsum.photos/id/{$imagen_id}"]);
?>
