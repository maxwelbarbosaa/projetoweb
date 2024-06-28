# Definindo a imagem base
FROM nginx:1.21.6-alpine

# Removendo o arquivo de configuração padrão do Nignx
RUN rm /etc/nginx/conf.d/default.conf

# Copiando o arquivo nginx.conf do diretório local para dentro do diretório /etc/nginx do container
COPY nginx.conf /etc/nginx/nginx.conf
