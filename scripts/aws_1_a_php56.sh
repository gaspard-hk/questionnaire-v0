sudo yum update -y
sudo yum install -y httpd24 php56 mysql56-server php56-mysqlnd php56-mcrypt
sudo service httpd start
sudo usermod -a -G apache ec2-user
