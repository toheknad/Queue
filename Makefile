generate-lead:
	docker-compose exec process-php-cli php public/index.php producer casco_test
	docker-compose exec process-php-cli php public/index.php producer credit_test
	docker-compose exec process-php-cli php public/index.php producer osago_test
	docker-compose exec process-php-cli php public/index.php producer refinance_test

consumer-start-all: consumer-start-casco consumer-start-credit consumer-start-osago consumer-start-refinance

consumer-start-casco:
	docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test | docker-compose exec process-php-cli php public/index.php consumer casco casco_test
consumer-start-credit:
	docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test | docker-compose exec process-php-cli php public/index.php consumer credit credit_test
consumer-start-osago:
	docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test | docker-compose exec process-php-cli php public/index.php consumer osago osago_test
consumer-start-refinance:
	docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test | docker-compose exec process-php-cli php public/index.php consumer refinance refinance_test
