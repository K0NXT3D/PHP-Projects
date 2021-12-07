#!/usr/bin/env bash
# There's nothing complicated going on here.
sudo nmap -sT -O localhost >> ports.txt
nano ports.txt
