<?php

$html = file_get_contents('https://www.kabum.com.br');

libxml_use_internal_errors(true);

$document = new DOMDocument();

$document -> loadHTML($html);

$tags = $document -> getElementsByTagName("h2");

$linkList = '';

foreach ($tags as $link) {
    
    if (strpos($link -> getAttribute('class'), 'H-titulo') === 0) {
        
        $linkList .= $link -> textContent . "\n";

    }
}

file_put_contents("Lista de itens.txt", $linkList);
?>
