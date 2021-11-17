<?php
/*
 * https://simsimi.info/api/?text=chao&lc=vn
*/

require('Chatfuel.php');
use juno_okyo\Chatfuel;
$chatfuel = new Chatfuel(TRUE);
if(isset($_GET['text']))
{
	$hoi = $_GET['text'];
        $response =  file_get_contents("https://simsimi.info/api/?lc=vn&text=".urlencode($hoi));
$dap = isset($response)?$response:null;
if($dap != null)
{

$replace = array(
        'simsi' => 'susu',
        'Simsi' => 'susu',
        'Simsi' => 'susu',
        'simsimi' => 'susumi',
        'sim' => 'susumi',
        'Talk with random person: https://play.google.com/store/apps/details?id=www.speak.com' => 'Chat with simsimi : http://sim.s2vn.top',

	);
    $text = str_replace(array_keys($replace),array_values($replace),$dap);

if(preg_match("/play.google.com/i",$text))
$text = 'Chat with simsimi : http://sim.s2vn.top';

$chatfuel->sendText($text);
}
else {
$chatfuel->sendText('Tạm thời bảo trì😭.');
}}

function auto($url){
$data = curl_init();
curl_setopt($data, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($data, CURLOPT_URL, $url);
$hasil = curl_exec($data);
curl_close($data);
return $hasil;
}
?>
 