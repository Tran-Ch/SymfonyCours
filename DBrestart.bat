@echo off
echo Ce script efface la DB, la reinitialise et la remplit avec des donnees de test (fixtures)

symfony console doctrine:database:drop --force
symfony console doctrine:database:create
del migrations\Ve*
symfony console make:migration --no-interaction
symfony console doctrine:migration:migrate --no-interaction
symfony console doctrine:fixtures:load --no-interaction

php bin/console doctrine:fixtures:load --append : nếu bạn chỉ muốn thêm thêm dữ liệu mẫu mà không xoá cái cũ.