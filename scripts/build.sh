#!/usr/bin/sh
working_dir=$1
cd ..
mkdir $working_dir
echo "cp -r `ls -A | grep -v "$working_dir"` $working_dir/""
. ./rename_project.sh ../ $1 "mmbc"
cd $working_dir
