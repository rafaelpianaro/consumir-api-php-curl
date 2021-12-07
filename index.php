<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consumir API no PHP com cURL</title>
</head>
<body>
    <?php
        $url = "https://swapi.dev/api/people/?page=1";
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $results = json_decode(curl_exec($ch));
        // var_dump($results);
        foreach($results->results as $result){
            // var_dump($result);
            echo "Nome: ".$result->name."</br>";
            echo "Altura: ".$result->height."</br>";
            echo "Ano Nascimento: ".$result->birth_year."</br>";
            if(count($result->films) > 1){
                echo "Participou em ". count($result->films). " filmes </br>";
                foreach($result->films as $film){
                    echo "Listagem de filmes: ".$film."</br>";
                }
            }
            else{
                echo "Participou em ". count($result->films). " filme </br>";
                foreach($result->films as $film){
                    echo "Filme: ".$film."</br>";
                }
            }
            echo "<hr>";
        }
    ?>
</body>
</html>