# Queue
-- Установка
  1) docker-compose up --build -d
  2) docker-compose exec process-php-cli composer install
  3) Добавление слушателей ( никогда не инициализовал такое большое количество сразу, поэтому сделано криво. после каждой команды ctrl+c)
     1) make consumer-add-casco
     2) make consumer-add-credit
     3) make consumer-add-refinance
     4) make consumer-add-osago
  4) make generate-lead ( добавляет 10к записей в rabbitmq )
  5) Файл для логов logs.txt в папке process/
