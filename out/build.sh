#!/usr/bin/sh
cd ..
mkdir out
cp -r `ls -A | grep -v "out"` out/
