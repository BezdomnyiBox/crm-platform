# crm-platform

Каркас CRM-платформы с настраиваемой моделью данных: организация задаёт собственные **типы сущностей** и их **атрибуты**, не меняя код.

> Статус: в разработке. Сейчас готовы модель данных, первая миграция и управление типами сущностей.

## Стек

- PHP 8.2+, Symfony 7.3, Doctrine ORM 3, Twig
- PostgreSQL 16
- nginx + php-fpm, Docker Compose
- Kubernetes-манифесты (namespace, PostgreSQL, деплоймент бэкенда)

## Модель данных

- `Organization`: организация-владелец
- `EntityType`: пользовательский тип сущности (например, «Клиент» или «Сделка»)
- `Attribute`: поле типа сущности

## Запуск

```bash
docker compose up -d --build
docker compose exec backend php bin/console doctrine:migrations:migrate
```

Приложение откроется на http://localhost:8000.

Kubernetes:

```bash
kubectl apply -f k8s/
```
