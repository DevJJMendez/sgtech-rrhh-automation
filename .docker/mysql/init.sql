-- Crea la base de datos si no existe
CREATE DATABASE IF NOT EXISTS sgtech_rrhh_app CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

-- Crea un usuario con nombre claro (por ejemplo: sgtech_app_user)
CREATE USER IF NOT EXISTS 'sgtech_app_user'@'%' IDENTIFIED BY 'SgTechP@ss2025';

-- Otorga permisos a la base de datos
GRANT ALL PRIVILEGES ON sgtech_rrhh_app.* TO 'sgtech_app_user'@'%';

-- Asegura que los cambios se apliquen
FLUSH PRIVILEGES;
