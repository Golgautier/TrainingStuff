#!/bin/bash

echo "Hello, i will probably ramble a bit..."
while [ 1 ]
do
	echo "Hello $MYNAMEIS !"
	echo "Content of your /data/MyData.txt file is"
	cat /data/MyData.txt
	sleep 10
done
