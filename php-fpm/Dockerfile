# Definindo a imagem base 
FROM php:7.4-fpm-alpine

# Definindo o diretório de trabalho dentro do container como /var/www/html
WORKDIR /var/www/html

# Copiando o arquivo index.php do diretório local para o diretório /var/www/html no container
COPY index.php /var/www/html

# Definindo o proprietário dos arquivos no diretório /var/www/html como www-data
RUN chown -R www-data:www-data /var/www/html

# Instalando a extensão pdo_mysql para o PHP e removendo todos os arquivos de cache temporários que foram baixados durante o processo de instalação.
RUN docker-php-ext-install pdo_mysql && \
    rm -rf /var/cache/apk/*

# Definindo o usuário como www-data para execução subsequente dos comandos
USER www-data

# Comando para iniciar o PHP-FPM ao iniciar o container
CMD [ "php-fpm" ]
