# 🚀 API de Gestión de Tareas con Laravel y Docker

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)

API RESTful para gestión de tareas desarrollada con Laravel 10, Docker y arquitectura Repository-Service.

## 📋 Requisitos

-   Docker 20.10+
-   Docker Compose 2.0+
-   Git (opcional)

## 🛠️ Configuración con Docker

```bash
# 1. Clonar repositorio
git clone https://github.com/03jenry/task-test
cd tu-repositorio

# 2. Configurar entorno
cp .env.example .env

# 3. Construir e iniciar contenedores
docker-compose up -d --build

# 4. Instalar dependencias
docker-compose exec app composer install

# 5. Configurar aplicación
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan config:cache

# 6. Ejecutar migraciones
docker-compose exec app php artisan migrate

# 7. (Opcional) Poblar base de datos
docker-compose exec app php artisan db:seed
```
