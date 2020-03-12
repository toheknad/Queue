# Queue
-- Установка
  1) sudo docker-compose up --build -d
  2) sudo docker-compose exec process-php-cli composer install
  3) Добавление слушателей ( никогда не инициализовал такое большое количество сразу, поэтому сделано криво. после каждой команды ctrl+c)
     1) sudo make consumer-start-casco
     2) sudo make consumer-start-credit
     3) sudo make consumer-start-refinance
     4) sudo make consumer-start-osago
  4) sudo make generate-lead ( добавляет 10к записей в rabbitmq )
  5) Файл для логов logs.txt в папке process/
