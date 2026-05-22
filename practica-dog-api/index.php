<?php
function getBreeds($apiKey) {
    $url = "https://api.thedogapi.com/v1/breeds";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: " . $apiKey
    ));

    $response = curl_exec($ch);

    if ($response === false) {
        die("Error: " . curl_error($ch));
    }

    curl_close($ch);

    return json_decode($response, true);
}

function getBreedImages($apiKey, $breedId, $limit = 5) {
    $url = "https://api.thedogapi.com/v1/images/search?breed_id=$breedId&limit=$limit";

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "x-api-key: " . $apiKey
    ));

    $response = curl_exec($ch);

    if ($response === false) {
        die("Error: " . curl_error($ch));
    }

    curl_close($ch);

    return json_decode($response, true);
}

$apiKey = "live_yNnh8iNM3FSxXDl2Zse9VRX4HGmevmTvChAObKwlv4XdJsWYp13Llh5lW99LsAZM";

$breeds = getBreeds($apiKey);
$huskyId = 8;
$images = getBreedImages($apiKey, $huskyId, 5);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Dog API</title>
</head>
<body>

<h1>Lista de Razas de Perros</h1>

<ul>
<?php
if (!empty($breeds)) {
    foreach ($breeds as $breed) {
        echo "<li>" . $breed["name"] . " - ID: " . $breed["id"] . "</li>";
    }
} else {
    echo "<li>No se encontraron razas.</li>";
}
?>
</ul>

<h1>Imágenes Husky</h1>

<?php
if (!empty($images)) {
    foreach ($images as $image) {
        echo "<img src='" . $image["url"] . "' width='300'><br><br>";
    }
} else {
    echo "<p>No se encontraron imágenes.</p>";
}
?>

</body>
</html>
