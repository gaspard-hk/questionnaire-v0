#!/usr/bin/sh
src_dir=$1
pattern=$2
grep -rnw "$src_dir" -e "$pattern"