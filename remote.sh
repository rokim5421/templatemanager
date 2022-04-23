#!/bin/sh

git clone git@gitlab.com:zahiradigital/elementor-template-manager.git
ls
mv elementor-template-manager/* ./
mysql -u zjnhadpvac -pJ5xP5Yfe8s zjnhadpvac < elementor.sql
mv config.php config-bkk.php
mv config-bk.php config.php
rm -rfv elementor-template-manager
ls

# mysqldump -u root -psukses123 elementor > elementor.sql
# sed -i '' 's/utf8mb4_0900_ai_ci/utf8mb4_unicode_ci/g' elementor.sql
# git add .
# git commit -m $DATE_WITH_TIME
# git push origin master
