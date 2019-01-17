# questionnaire-v0
This is the original version of the questionnaire system of our company. All sensitive data are removed before making open source.

## Installation on Amazon AMI 2
Run the following command to install php 5.6 . We use php 5.6 because mcrypt module is deprecated in php 7. 
```
sudo yum update -y
sudo yum install -y httpd24 php56 mysql56-server php56-mysqlnd php56-mcrypt
sudo service httpd start
```

Please run the following command and then log out.
```
sudo usermod -a -G apache ec2-user
```

Please run the following command and then log out.
```
sudo chown -R ec2-user:apache /var/www
sudo chmod 2775 /var/www
find /var/www -type d -exec sudo chmod 2775 {} \;
find /var/www -type f -exec sudo chmod 0664 {} \;
```

Setup the mysql password and remove remote root login
```
sudo service mysqld start
sudo mysql_secure_installation
```

Install phpMyAdmin
```
sudo yum install php56-mbstring.x86_64 php56-zip.x86_64 -y
sudo service httpd restart
cd /var/www/html
wget https://www.phpmyadmin.net/downloads/phpMyAdmin-latest-all-languages.tar.gz
mkdir phpMyAdmin && tar -xvzf phpMyAdmin-latest-all-languages.tar.gz -C phpMyAdmin --strip-components 1
rm phpMyAdmin-latest-all-languages.tar.gz
sudo service mysqld start
```

Run the sql scripts on the phpMyAdmin
```
questionnaire_sqldump.sql
users.sql
```

Copy the following 2 folders from local to your aws : /var/www/html
```
laravel-company
www
```


## Version
### release-v1
As it does not have any build script, the folder structure is equal to the production environment. The laravel-company and company folder are not the traditional structure because it accomodates the old CPanel structure.

### release-v2 is under development
- Generalize q2.blade for even any number of the staff. (q2 is combined into one)
- Question set is changed.
- Questionnaire description is changed.
- Backend function

### master
- adding script for installing in different environment (Amazon or CPanel)
- adding build script
