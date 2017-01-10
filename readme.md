# Magesec

This is the app & site content for www.magesec.net

# Dev Install 

```
# ubuntu 16.04:
git clone https://github.com/magesec/magesec.git
sudo apt install -qy php-7.0-cli php-mbstring php-xml composer

cd magesec
composer install

php artisan serve -vvv
```

# Content editing 

All static content is stored under [resources/views/*.blade.php](resources/views). 