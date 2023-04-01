# Konecta reto tecnico

## Instalación

`composer install`

## Instalación base de datos

```sh
mysql -u root –p
mysql> CREATE DATABASE db_konecta;
mysql> exit
```

```sh
mysql -u nombre_usuario -p db_konecta < db_konecta.sql
```

## Iniciar codeigniter

`composer create-project codeigniter4/appstarter`