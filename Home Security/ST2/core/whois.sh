#! /bin/bash
list=traffic.txt
#mkdir -p whois
#cat traffic.txt | while read LINE; do
awk '{gsub(/\\n/,"\n")}1' $list | while read LINE; do
#whois -H \
#$LINE 2>&1 | tee -a whois/$LINE-whois.txt
host -W 1 $LINE;
done
