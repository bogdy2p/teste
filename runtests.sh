#!/bin/bash

#Configurations
##########################
javaServerPath="/usr/local/bin/selenium-server-standalone-2.52.0.jar";
testsFolderPath="/var/www/html/teste";
phpunitFolderPath="vendor/bin/phpunit";

##########################

#Start server in new window.
gnome-terminal -x sh -c "java -jar $javaServerPath -browserSessionReuse|less"

#Wait for 3 seconds
sleep 3;

#Get into tests folder
cd $testsFolderPath;

echo "Executing settings testing using selenium2";
$phpunitFolderPath testSettings.php;

echo "Executin check paypal settings using selenium2";
$phpunitFolderPath checkPaypalSanbox.php;

echo "Executin check paypal settings using selenium2";
$phpunitFolderPath checkEmails.php;

echo "Executing order testing using selenium2";
$phpunitFolderPath randomOrder.php;

echo "Executed Tests";