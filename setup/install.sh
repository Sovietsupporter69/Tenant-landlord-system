# setup apache
cp setup/apache2.conf /etc/apache2/apache2.conf
cp setup/000-default.conf /etc/apache2/sites-available/000-default.conf
cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/

# composer
composer update