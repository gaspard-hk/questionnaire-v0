# questionnaire-v0
This is the original version of the questionnaire system of our company. All sensitive data are removed before making open source.

## Setup EC2 Instance - Amazon AMI
We install Amazon AMI instead of Amazon AMI 2 because version 2 doesn't support php 5.6.

## Installation on Amazon AMI 
Run the following command to install php 5.6 . We use php 5.6 because mcrypt module is deprecated in php 7. 
```
sudo yum update -y
sudo yum install -y httpd24 php56 mysql56-server php56-mysqlnd php56-mcrypt
sudo service httpd start
```

Please run the following command and then log out.
```
sudo usermod -a -G apache ec2-user
exit
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

Run the following command to create database user and also database in mysql.
```
mysql -u root -p
mysql> GRANT ALL PRIVILEGES ON *.* TO 'company_sa'@'localhost' IDENTIFIED BY 'Efgh56&*';
mysql> \q
mysql -u company_sa -p
mysql> CREATE DATABASE company;
mysql> \q
```

Run the following command to create schema and system user for questionnaire.
```
mysql -u company_sa -p company < questionnaire_sqldump.sql
mysql -u company_sa -p company < users.sql
```

Run the sql scripts on the shellscript or phpMyAdmin.
```
questionnaire_sqldump.sql
users.sql
```

Our repository doesn't require "composer install" as vendor folder is already included. It is because some of the library are outdated and cannot be downloaded from composer repo.

Create the following 3 empty folders
```
/laravel-company/uploadfiles/
/laravel-company/uploadfiles/member
/laravel-company/uploadfiles/staff

Copy the following 2 folders from local to your aws : /var/www/html
```
laravel-company
www
```


If the website doesn't work, please check the following things.
```
1. Database password is matched with the password in /laravel-company/config/app/database.php
2. Check whether the laravel-company/vendor exists
3. Information in log file 
   sudo -i
   cd /var/log/httpd
   cat access_log
   cat error_log

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
