#!/bin/sh
# System + MySQL backup script
# Copyright (c) 2008
# This script is licensed under GNU GPL version 2.0 or above
# ---------------------------------------------------------------------

#########################
######TO BE MODIFIED#####

### System Setup ###
BACKUP=/app/var/silk_dbbackup

### MySQL Setup ###
MUSER="user"
MPASS=""
MHOST="database.internal"


######DO NOT MAKE MODIFICATION BELOW#####
#########################################

### Binaries ###
TAR="$(which tar)"
GZIP="$(which gzip)"
FTP="$(which ftp)"
MYSQL="$(which mysql)"
MYSQLDUMP="$(which mysqldump)"

### Today + hour in 24h format ###
NOW=$(date +"%Y%m%d")

### Create hourly dir ###

mkdir $BACKUP/$NOW

### Get all databases name ###
DBS="$($MYSQL -u $MUSER -h $MHOST -p$MPASS -Bse 'show databases'|grep -v information_schema|grep -v innodb| grep -v mysql| grep -v performance_schema)"
for db in $DBS
do
    mkdir $BACKUP/$NOW/$db
    FILE=$BACKUP/$NOW/$db/$db.sql.gz
    $MYSQLDUMP -q --single-transaction -u $MUSER -h $MHOST -p$MPASS $db | $GZIP > $FILE
done

### Compress all tables in one nice file to upload ###
cd $BACKUP
ARCHIVE=$BACKUP/olight_server.mysql-$NOW.tar.gz
ARCHIVED=$NOW

$TAR -cvf $ARCHIVE $ARCHIVED

rm -rf $BACKUP/$NOW
find $BACKUP/*.tar.gz -mtime +3 -exec rm {} \;
exit
