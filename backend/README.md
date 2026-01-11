# BillingCore

Backend API for billing and invoicing system.

## Tech stack
- PHP 8.4
- Laravel 12
- PostgreSQL
- Redis
- Docker / Docker Compose

## Setup

```bash
docker compose up -d --build
docker compose exec app php artisan migrate
