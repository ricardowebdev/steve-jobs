<?php

$dados = file_get_contents('../env.json');
$dados = json_decode($dados);
$token = $dados->news_token;
$url   = "https://api.hgbrasil.com/finance/quotations?format=json&key=".$token;

$dados = file_get_contents($url);
$dados = json_decode($dados);

$currencies = $dados->results->currencies;

$msg  = "Dolar ".$currencies->USD->buy." - Variação ".$currencies->USD->variation."\n";
$msg .= "Euro  ".$currencies->EUR->buy." - Variação ".$currencies->EUR->variation."\n";
$msg .= "BitCoin ".$currencies->BTC->buy." - Variação ".$currencies->BTC->variation."\n";
$msg  = urlencode($msg);
