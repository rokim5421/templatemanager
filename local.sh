#!/bin/sh

DATE_WITH_TIME=`date "+%Y%m%d-%H%M%S"` #add %3N as we want millisecond too

mysqldump -u root -psukses123 elementor > elementor.sql
sed -i '' 's/utf8mb4_0900_ai_ci/utf8mb4_unicode_ci/g' elementor.sql
git add .
git commit -m $DATE_WITH_TIME
git push origin master
