# Template Fansite Habbolicious (Laravel 8)

## INSTALACIÓN
- Añadir el archivo .env a la carpeta principal
- Modificar en .env APP_DEBUG=true a APP_DEBUG=false
- Modificar en .env, tu base de datos, usuario y contraseña según tu servidor/hosting/vps
- Subir archivos a la carpeta de /public_html del hosting
- Reedireccionar la carga de la página en la carpeta /public
- Asegurarte que en el hosting este activado el PHP 8.0

## INSTALACIÓN DE SSL
- Activa el certificado SSL en tu subdominio o dominio que usará el template
- Modifica el htaccess de la carpeta /public para activar el SSL
```plain
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews -Indexes
    </IfModule>

    # SSL
    RewriteEngine On
    RewriteCond %{HTTPS} !=on
    RewriteRule ^(.*)$ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301,NE]
    Header always set Content-Security-Policy "upgrade-insecure-requests;"
    
    # RewriteEngine On

    # Handle Authorization Header
    # RewriteCond %{HTTP:Authorization} .
    # RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes If Not A Folder...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```

## ACTUALIZACIÓN DE VERSIÓN
- Actualizar la versión del Composer en https://getcomposer.org/
- En la carpeta principal usar el comando:
```plain
composer update
```

## DEMO
https://habbo.fernandacruz.com/

## CREDITOS
@AcquaWh
