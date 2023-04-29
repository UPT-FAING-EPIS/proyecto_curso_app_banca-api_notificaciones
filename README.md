DESCARGAR LO SIGUIENTE
- Descargar Thunder Client como ayuda para el GET y POST (visual studio code)
- flightphp https://flightphp.com/
Otra recomendacion es crear el archivo .htaccess donde pondremos lo siguiente:
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]
