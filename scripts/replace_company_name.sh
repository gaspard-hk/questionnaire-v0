#!/usr/bin/sh
working_dir=$1
target=$2
replacement=$3
cd $working_dir
find "$working_dir" -type f -exec sed -i "s/$target/$replacement/g" {} +
cd -