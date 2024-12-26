<?php

const API_URL="https://www.whenisthenextmcufilm.com/api";
#Inicializar una nueva sesión de cURL; ch=cURL handle
$ch = curl_init(API_URL);
//Indicar que queremos recibir el resultado de la peticion y no mostrarla en pantalla
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
/* Ejecutar la petición
y guardar el resultado */
$result = curl_exec($ch);

//Si solo se quiere hacer un Get de una Api, sería:
// $result = file_get_content(API_URL); Sí solo se quiere hacer un GET de una API


$data = json_decode($result, true);
curl_close($ch);

?>
<head>
    <title>La proxima gran película</title>
    <meta name="description" content="La proxima gran pelicula "/>
    <menu name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.classless.min.css"
    >

</head>
<main>

    <section style="display: flex; justify-content: center; align-items: center; margin-top: 50px;">
        <img src="<?= $data["poster_url"];?>" width= "300"; alt="Poster de: <?= $data["title"];?>">
    </section>

    <hgroup style="display: flex; flex-direction:column; align-items: center; text-align:center;">
        <h3>
            <?= $data["title"];?> se estrena en <?= $data["days_until"]?> días
        </h3>
        <p>Fecha de estreno: <?=$data["release_date"];?> días</p>
        <p>La siguiente es: <?=$data["following_production"]["title"];?>
    </hgroup>
</main>