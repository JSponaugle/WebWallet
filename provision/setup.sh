#!/bin/bash

echo "Provisioning virtual machine..."
apt-get update > /dev/null
apt-get install ntpdate -y > /dev/null
# Git
echo "Installing Git"
apt-get install git -y > /dev/null

# Nginx
echo "Installing Nginx"
apt-get install nginx -y > /dev/null

# PHP
echo "Updating PHP repository"

echo "Installing PHP"
apt-get install php-common php-dev php-cli php-fpm -y > /dev/null

echo "Installing PHP extensions"
apt-get install curl php-curl php-gd php-mcrypt php-mbstring php-zip php7.0-sqlite php- -y > /dev/null

#DBHOST=localhost
#DBNAME=sql
#DBUSER=sql
#DBPASSWD=1234

# MySQL 
#echo "Preparing MySQL"
#apt-get install debconf-utils -y > /dev/null
#debconf-set-selections <<< "mysql-server mysql-server/root_password password $DBPASSWD"
#debconf-set-selections <<< "mysql-server mysql-server/root_password_again password $DBPASSWD"
#debconf-set-selections <<< "phpmyadmin phpmyadmin/dbconfig-install boolean true"
#debconf-set-selections <<< "phpmyadmin phpmyadmin/app-password-confirm password $DBPASSWD"
#debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/admin-pass password $DBPASSWD"
#debconf-set-selections <<< "phpmyadmin phpmyadmin/mysql/app-pass password $DBPASSWD"
#debconf-set-selections <<< "phpmyadmin phpmyadmin/reconfigure-webserver multiselect none"

#echo "Installing MySQL"
#apt-get install mysql-server phpmyadmin -y > /dev/null


#echo "Creating MySQL DataBase"
#mysql -uroot -p$DBPASSWD -e "CREATE DATABASE $DBNAME" >> /vagrant/vm_build.log 2>&1
#mysql -uroot -p$DBPASSWD -e "grant all privileges on $DBNAME.* to '$DBUSER'@'localhost' identified by '$DBPASSWD'" > /vagrant/vm_build.log 2>&1

# Nginx Configuration
echo "Configuring Nginx"
cp /var/www/provision/config/nginx_vhost /etc/nginx/sites-available/nginx_vhost > /dev/null
ln -s /etc/nginx/sites-available/nginx_vhost /etc/nginx/sites-enabled/

rm -rf /etc/nginx/sites-available/default

# Restart Nginx for the config to take effect
service nginx restart > /dev/null

echo "Installing Composer"
curl -Ss https://getcomposer.org/installer | php > /dev/null
sudo mv composer.phar /usr/bin/composer

cd /var/www/wallet/

touch /var/www/wallet/database/database.sqlite

echo "Running Composer Update"
if [[ -s /var/www/composer.json ]] ;then
  composer update >> /vagrant/vm_build.log 2>&1
fi

echo -e "\n--- Creating a symlink for future phpunit use ---\n"

if [[ -x /var/www/wallet/vendor/bin/phpunit ]] ;then
  ln -fs /var/www/wallet/vendor/bin/phpunit /usr/local/bin/phpunit
fi

rm -fr /var/www/html

(crontab -l ; echo "#### Frontend CronJob Pack")| crontab -
(crontab -l ; echo "* * * * * ntpdate ntp.ubuntu.com")| crontab -
(crontab -l ; echo "* * * * * php /var/www/wallet/ schedule:run >> /dev/null 2>&1")| crontab -

echo "Creating .evn"
php -r "file_exists('.env') || copy('.env.example', '.env');"
php artisan key:generate

echo "Processing DB Data"
php artisan migrate
php artisan db:seed

echo "Finished provisioning."