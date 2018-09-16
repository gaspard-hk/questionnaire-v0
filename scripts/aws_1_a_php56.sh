sudo yum update -y
sudo yum install -y httpd24 php70 mysql56-server php70-mysqlnd php70-mcrypt
sudo service httpd start
sudo usermod -a -G apache ec2-user
