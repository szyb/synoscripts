if [ -z $1 ]; then
    echo "ERROR: username is missing"
    exit
fi

if [ -z $2 ]; then
    echo "ERROR: installation dir is missing"
    exit
fi

./setup.sh

php70 -d extension=gd.so -d extension=openssl.so /var/services/homes/$1/$2/start.php $1 $2 $3


