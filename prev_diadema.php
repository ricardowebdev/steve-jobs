<?php

$url       = "https://api.hgbrasil.com/weather?woeid=";
$diadema   = "455857";
$sao_paulo = "26804369";

$dados = file_get_contents($url.$diadema);
$dados = json_decode($dados);

$msg  = "Temperatura%20".$dados->results->temp."%0";
$msg .= "Data%20".$dados->results->temp."%0";
$msg .= "Hora%20".$dados->results->time."%0";
$msg .= "Descrição%20".$dados->results->description."%0";
$msg .= "Cidade%20".$dados->results->description."%0";
$msg .= "Umidade%20".$dados->results->humidity."%0";
$msg .= "Vel Vento%20".$dados->results->wind_speedy."%0";
