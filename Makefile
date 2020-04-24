.PHONY: ssh fix-permissions composer-install up build

ssh:
	@docker-compose exec products-service sh

fix-permissions:
	@chmod -R 777 cache

composer-install:
	composer install

up:
	@docker-compose up -d ;\
	app=$$(docker-compose port nginx 80|sed -E 's/[0-9\.]+(:[0-9]+)/\1/') ;\
	printf "\n-> Server is available at: http://localhost$${app}" ;\
	docker-compose logs -f || exit 0 ;

build: clean composer-install fix-permissions up

clean:
	docker-compose exec products-service rm -f /app/cache/container.php /app/cache/container.php.meta | \
	docker-compose run --rm products-service rm -f /app/cache/container.php /app/cache/container.php.meta
