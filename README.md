DESCARGAR LO SIGUIENTE
- Descargar Thunder Client como ayuda para el GET y POST (visual studio code)
- flightphp https://flightphp.com/
Otra recomendacion es crear el archivo .htaccess donde pondremos lo siguiente: <br />
RewriteEngine On <br />
RewriteCond %{REQUEST_FILENAME} !-f <br />
RewriteCond %{REQUEST_FILENAME} !-d <br />
RewriteRule ^(.*)$ index.php [QSA,L] <br />
