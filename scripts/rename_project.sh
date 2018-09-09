#!/usr/bin/sh
working_directory=$1
company_name=$2
cd "$working_directory"
mv company/www/company "company/www/$company_name"
mv company/laravel-company "company/laravel-$company_name"
mv company $company_name
