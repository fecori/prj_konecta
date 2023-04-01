# Konecta reto tecnico

## Instalación

`composer install`

## Instalación base de datos
# Creacion base de datos
```sh
mysql -u root –p
mysql> CREATE DATABASE db_konecta;
mysql> exit
```
# Importar sql
```sh
mysql -u nombre_usuario -p db_konecta < db_konecta.sql
```

## Configurar conexion base de datos

```sh
database.default.hostname = localhost
database.default.database = db_konecta
database.default.username = root
database.default.password = PASSWORD
database.default.DBDriver = MySQLi
database.default.DBPrefix =
database.default.port = 3306
```

## Iniciar codeigniter

```sh
php spark serve
```