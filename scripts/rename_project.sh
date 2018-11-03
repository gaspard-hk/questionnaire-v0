#!/usr/bin/sh
source_directory=$1
working_directory=$2
company_name=$3
cd "$working_directory"
cp "$source_directory/company/www/company" "$working_directory/company/www/$company_name"
cp "$source_directory/company/laravel-company "company/laravel-$company_name"
cp "$source_directory/company" $company_name
