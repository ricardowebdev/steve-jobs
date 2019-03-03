<?php
$dados = file_get_contents('env.json');
$dados = json_decode($dados);
$token = $dados->news_token;
$url   = 'https://newsapi.org/v2/top-headlines?country=br&apiKey='.$token;
$dados = file_get_contents($url);
$dados = json_decode($dados);

$news = $dados->articles;
$msg  = "";

foreach ($news as $new) {
    $msg .= "Fonte ".$new->source->name."\n";
    $msg .= $new->title."\n\n";
}

$msg = urlencode($msg);
