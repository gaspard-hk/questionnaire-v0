#!/usr/bin/sh
#to remove illegal byte sequence
export LANG=C
working_dir=$1
target=$2
replacement=$3
cd $working_dir
echo MAC
find "$working_dir" -type f -exec sed -i '' -e "s/$target/$replacement/g" {} +
echo Linux
echo find "$working_dir" -type f -exec sed -i "s/$target/$replacement/g" {} +
cd -