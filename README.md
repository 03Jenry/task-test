# 🚀 API de Gestión de Tareas con Laravel y Docker

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![Docker](https://img.shields.io/badge/Docker-2496ED?style=for-the-badge&logo=docker&logoColor=white)

API RESTful para gestión de tareas desarrollada con Laravel 10, Docker y arquitectura Repository-Service.

## 📋 Requisitos

- Docker 20.10+
- Docker Compose 2.0+
- Git (opcional)

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

## 📚 Documentación de la API

### Estructura de Respuestas

Todas las respuestas siguen el formato:

```json
{
  "data": {},
  "message": "",
  "status": 200
}

- GET /api/tasks

{
  "data": [
    {
      "id": 1,
      "title": "Tarea ejemplo",
      "description": "Descripción de ejemplo",
      "is_completed": false,
      "date_limit": "2024-12-31",
      "created_at": "2024-01-01T00:00:00.000000Z"
    }
  ],
  "message": "Tareas obtenidas exitosamente",
  "status": 200
}

- Crear nueva tarea

POST /api/tasks
Content-Type: application/json

{
  "title": "tarea 1",
  "description": "descriptio 1",
  "date_limit": "2025-06-22"
}

Validaciones:

Campo	Reglas
title	required|string|max:255
description	required|string
date_limit	required|date_format:Y-m-d|after:today
Respuesta exitosa (201)

json
{
   "data": {
        "title": "tarea 1",
        "description": "descriptio 1",
        "date_limit": "2025-06-22",
        "updated_at": "2025-06-20T20:38:43.000000Z",
        "created_at": "2025-06-20T20:38:43.000000Z",
        "id": 11
    }
}
Obtener tarea específica

http
GET /api/tasks/{id}
Respuesta exitosa (200)

json
{
  "data": {
    "id": 1,
    "title": "Tarea ejemplo",
    "description": "Descripción de ejemplo",
    "is_completed": false,
    "date_limit": "2024-12-31",
    "created_at": "2024-01-01T00:00:00.000000Z"
  },
  "message": "Tarea obtenida exitosamente",
  "status": 200
}
Actualizar tarea

http
PUT /api/tasks/{id}
Content-Type: application/json

{
   "title": "tarea 1 update",
    "description": "description 1 update",
    "is_completed": 1,
    "date_limit": "2025-06-22"
}
Respuesta exitosa (200)

json
{
  "data": {
        "id": 1,
        "title": "tarea 1 update",
        "description": "description 1 update",
        "is_completed": 1,
        "date_limit": "2025-06-22",
        "created_at": "2025-06-20T20:24:13.000000Z",
        "updated_at": "2025-06-20T20:41:16.000000Z"
    }
}
Eliminar tarea

http
DELETE /api/tasks/{id}
Respuesta exitosa (204)

json
{}

```
