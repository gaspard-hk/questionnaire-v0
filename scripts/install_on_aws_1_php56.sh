#!/usr/bin/sh
ssh -i $1 $2 'bash -s' < './aws_1_a_php56.sh'
ssh -i $1 $2 'bash -s' < './aws_1_b.sh'
ssh -i $1 $2 'bash -s' < './aws_1_c_php56.sh'
ssh -i $1 $2 'bash -s' < './aws_1_b.sh'
scp -i $1 './aws_1_secure_mysql.sh' $2:~/
