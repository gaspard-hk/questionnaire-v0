#!/usr/bin/sh
ssh -i $1 $2 'bash -s' < './aws_1_a.sh'
ssh -i $1 $2 'bash -s' < './aws_1_b.sh'
ssh -i $1 $2 'bash -s' < './aws_1_c.sh'
ssh -i $1 $2 'bash -s' < './aws_1_d.sh'
ssh -i $1 $2 'bash -s' < './aws_1_b.sh'
