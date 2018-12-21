<?php
function convert($filename,$hsl) {
$str2 = file_get_contents($filename);
$string = $str2;
    $decimalValues = array();
    for ($i = 0; $i < strlen($string); $i++) {
        $decimalValues[] = ord($string[$i]);
    }
    $res = implode(',', $decimalValues);
    // $open = fopen("charcode.txt", 'a');
    // fwrite($open, $res);
    // fclose($open);
    if (!file_exists($filename)) {
    	exit();
   	} else {
	    $res2 = "document.documentElement.innerHTML=String.fromCharCode(".$res.")";
	    $open = fopen($hsl, 'a');
	    fwrite($open, $res2);
	    fclose($open);
	}    
}
echo "Nama file : ";
$na = trim(fgets(STDIN, 1024));
echo "Result saved on : ";
$rs = trim(fgets(STDIN, 1024));
if (!file_exists($na)) {
	echo "File Tidak Ditemukan\n";
} else {	
echo "Please Wait.....\n";
sleep(2);
convert($na,$rs);    
echo "Sukses Convert -> \033[96m[\033[92m$rs\033[96m]\n";
}
?>
