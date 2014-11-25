<?php
//wget
	//wget -r -P /save/location -A jpeg,jpg,bmp,gif,png http://www.memegenerator.es/memes  

function save_images($url,$saveto){
    $ch = curl_init ($url);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_BINARYTRANSFER,1);
    $raw=curl_exec($ch);
    curl_close ($ch);
    if(file_exists($saveto)){
        unlink($saveto);
    }
    $fp = fopen($saveto,'x');
    fwrite($fp, $raw);
    fclose($fp);
}

for ($i=0; $i < 92; $i++) { 
	$url = 'http://www.memegenerator.es/imagenes/base/'.$i.'.jpg';
	$name = $i.'.jpg';
	save_images($url, $name);
}

?>