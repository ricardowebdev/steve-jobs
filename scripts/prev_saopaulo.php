<?php

$url       = "https://api.hgbrasil.com/weather?woeid=";
$sao_paulo = "26804369";

$dados = file_get_contents($url.$sao_paulo);
$dados = json_decode($dados);

$msg  = "Previsão do tempo em ".$dados->results->city."\n";
$msg .= "Temperatura: ".$dados->results->temp."C\n";
$msg .= "Data: ".$dados->results->date."\n";
$msg .= "Hora: ".$dados->results->time."\n";
$msg .= "Descrição: ".$dados->results->description."\n";
$msg .= "Umidade: ".$dados->results->humidity."\n";
$msg .= "Vel Vento: ".$dados->results->wind_speedy."\n";
$msg  = urlencode($msg);
