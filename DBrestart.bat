@echo off
echo Ce script efface la DB, la reinitialise et la remplit avec des donnees de test (fixtures)

symfony console doctrine:database:drop --force
symfony console doctrine:database:create
del migrations\Ve*
symfony console make:migration --no-interaction
symfony console doctrine:migration:migrate --no-interaction
symfony console doctrine:fixtures:load --no-interaction

php bin/console doctrine:fixtures:load --append : nếu bạn chỉ muốn thêm thêm dữ liệu mẫu mà không xoá cái cũ.

Tạo migration
php bin/console make:migration

Chạy migration để tạo bảng mới trong DB
php bin/console doctrine:migrations:migrate
Nhấn yes khi được hỏi.

Tạo file Fixtures bằng lệnh
php bin/console make:fixtures ExperienceSpotFixtures

Nạp fixtures mà không xoá dữ liệu cũ
Vì bạn đã có dữ liệu thật trong DB, nên dùng --append:
php bin/console doctrine:fixtures:load --append
Không có --append → Doctrine sẽ hỏi “database will be purged” và xoá sạch bảng.
Có --append → Chỉ thêm các dòng ExperienceSpot mới, dữ liệu cũ vẫn giữ nguyên.
Nếu nó vẫn hỏi (trong một số cấu hình):
Gõ yes → để cho phép chạy.