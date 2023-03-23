sudo update-alternatives --config php
sudo chown -R yusuf:sudo /home/yusuf/laravel10/ldap
chown -R www-data:www-data /var/www/html
sudo chown -R www-data:www-data /home/yusuf/laravel10/ldap
docker build -t registry.danova.id/new-pmb-development/pmb-ummat/apppmb:0.0.2-ldap -f docker/php/prod.Dockerfile .
docker build -t registry.danova.id/new-pmb-development/pmb-ummat/nginxpmb:0.0.1-ldap -f docker/nginx/prod.nginx.Dockerfile .
