permitions.sh
cd ../orm
./propel-reverse-dev.sh
./propel.sh
cd ..
composer dump-autoload

