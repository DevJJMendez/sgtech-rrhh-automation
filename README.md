Dependencias:
* composer 2.7.3
* Laravel 10
* PHP 8.2
* node v18.17.0

comandos necesarios:
```bash
composer install
```
```bash
php artisan key:generate
```
```bash
npm install
```

---

# Pasos para ejecutar en Docker
1. Clona el repositorio

2. **Debes tener instalado Git y Docker en tu maquina**

3. En la raiz del repositorio (local) ejecuta el siguiente comando:
```bash
docker-compose up
```
   * esperas a que te retorne algo como esto:
```bash
mysql  | 2025-07-09T12:29:49.654282Z 0 [System] [MY-010931] [Server] /usr/sbin/mysqld: ready for connections. Version: '8.0.42'  socket: '/var/run/mysqld/mysqld.sock'  port: 3306  MySQL Community Server - GPL.
```

4. Abres Docker Desktop y buscas los containers y entras en **`sgtech-rrhh-automation -> app -> exec`** allí ejecutas el siguiente comando:
```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

5. Abres las terminal de Docker Desktop vas a hacia el directorio del proyecto y ejecutas los siguientes comandos:
   * Abre un cliente de MYSQL
```bash
docker exec -it mysql mysql -u root -p
```
   * Crear usuario:
```mysql
CREATE USER 'sgtech_app_user'@'%' IDENTIFIED BY 'SgTechP@ss2025';
```
   * Otorgar permisos:
```mysql
GRANT ALL PRIVILEGES ON sgtech_rrhh_app.* TO 'sgtech_app_user'@'%';
```

   * Activar permisos:
```mysql
FLUSH PRIVILEGES;
```

   * Crear base de datos
```bash
CREATE DATABASE sgtech_rrhh_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

   * Salir del cliente:
```bash
exit
```

6. Ejecutar este comando (En la terminal de Docker ubicado en el directorio del proyecto):
```bash
docker exec -it app php artisan migrate
```
crear usuarios:
```bash
docker exec -it app php artisan db:seed
```