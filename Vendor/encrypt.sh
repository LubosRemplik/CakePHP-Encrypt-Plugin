#!/bin/bash
clear
echo $3 | gpg --encrypt --armor --always-trust --no-secmem-warning --homedir $1 -r $2
