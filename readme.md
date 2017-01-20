# Magesec

This is the app & site content for www.magesec.net

# Dev Install 

```
# ubuntu 16.04:
git clone https://github.com/magesec/magesec.git
sudo apt install -qy php-cli php-mbstring php-xml composer

cd magesec
composer install

cp .env.sample .env
php artisan key:create

php artisan serve -vvv
```

# Content editing 

All static content is stored under [resources/views/*.blade.php](resources/views). 