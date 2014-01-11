#!/bash/sh

if [ ! -f index.php ]; then
    echo 'should run this script in the save directory as index.php'
else
    chmod 777 uploads/tmp uploads/attachment uploads/avatar application/cache application/logs
    echo 'okay, done!'
fi
