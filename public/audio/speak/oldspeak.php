<?php





$url = "https://acapela-box.com/AcaBox/dovaas.php";

$headers = array(
            "Host: acapela-box.com",
            "Accept: application/xml, text/xml, */*; q=0.01",
            "Accept-Encoding: gzip, deflate",
            "User-Agent: Mozilla/5.0 (Windows NT 6.3; WOW64; rv:34.0) Gecko/20100101 Firefox/34.0",
            "Referer: https://acapela-box.com/AcaBox/index.php"
); 

$data = array(
    'text'=>$_GET['text'],
    'voice'=>'willoldman22k',
    'listen'=>'1',
    'format'=>'MP3',
    'codecMP3'=>'1',
    'spd'=>'180',
    'vct'=>'100'
);



$fields_string = http_build_query($data);



$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt( $ch, CURLOPT_COOKIEJAR,  "cookies.txt" );
curl_setopt( $ch, CURLOPT_COOKIEFILE, "cookies.txt" );
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers); 
curl_setopt($ch, CURLOPT_POST, count($data));
curl_setopt($ch, CURLOPT_POSTFIELDS, stripcslashes(str_replace("%27", "'", $fields_string)));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$output = curl_exec($ch);

curl_close($ch);

$mp3 = explode('"snd_url":"', $output);
$mp3 = explode('","', $mp3[1]);
$mp3 = $mp3[0];

echo stripcslashes($mp3);

?>
