#!/usr/bin/sh
src_dir="$1"
working_dir="$2"
company_name="$3"
echo "$working_dir"
mkdir "$working_dir"
cp -r "$src_dir/company" "$working_dir"
mv "$working_dir/company" $working_dir/$company_name
mv "$working_dir/$company_name/laravel-company/" "$working_dir/$company_name/laravel-$company_name"
mv "$working_dir/$company_name/www/company" "$working_dir/$company_name/www/$company_name"
