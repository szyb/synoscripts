echo -n "Checking gd.so..."
if [ -f "/usr/lib/php/modules/gd.so" ]
then
    echo "found"
else
    echo -n "missing. Copying file gd.so..."
    cp "/volume1/@appstore/PHP7.4/usr/local/lib/php74/modules/gd.so" "/usr/lib/php/modules"
    echo "Ok"
fi
