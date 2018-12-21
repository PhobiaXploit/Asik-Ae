<?php 


error_reporting(0);
function upload($data,$filename)
{
	$gettoken = file_get_contents("https://pastebin.com/index");

	preg_match("<input type=\"hidden\" name=\"csrf_token_post\" value=\"(.*?)\">", $gettoken, $token);


	$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"https://pastebin.com/post.php");
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_PROXY, "159.65.133.43:8080");
curl_setopt($ch, CURLOPT_HEADER, TRUE);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("content-type: application/x-www-form-urlencoded"));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS,
            "csrf_token_post=".$token[1]."&submit_hidden=submit_hidden&paste_code=".$filename."&paste_format=1&paste_expire_date=N&paste_private=0&paste_name=".$data."");

$x = curl_exec($ch);

if(!curl_errno($ch))
{
	preg_match_all('/^Location:(.*)$/mi', $x, $matches);
	$output = !empty($matches[1]) ? trim($matches[1][0]) : 'No redirect found';

	if($output == "/warning.php?p=1")
	{
		print $bold. $red. "\n[-] Akun anda telah mencapai batas maksimal (max: 10x)\n";
	} else
	{
		$output1 = "https://pastebin.com".$output."\n\n";
		$file= fopen('links.txt','a');
		fputs($file,$output1);
		fclose($file);
		print $bold.$cyan. "\n[+] Upload succes => $output1\n";
	}

}

curl_close($ch);

}


echo "\033[97m";
echo "[?] Nama Paste(Bebas) : ";
$nama = trim(fgets(STDIN, 1024));

echo "[?] Your File Char Code : ";
$sc = trim(fgets(STDIN, 1024));

if(!$file = file_get_contents($sc))
{
	echo "[-] Gagal membuka file\n";
	exit();
}
else
{
    echo "[+] Uploading.....";
	$isi = $file;
	upload($nama,$isi);
}


 ?>
