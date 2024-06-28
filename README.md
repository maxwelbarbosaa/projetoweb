
# Projeto Web

Este projeto configura um ambiente de desenvolvimento utilizando Docker para criar um servidor web com Nginx e PHP-FPM. Ele permite a construção de uma aplicação PHP simples, utilizando contêineres Docker para garantir um ambiente isolado e consistente. O Nginx serve os arquivos estáticos e encaminha as requisições PHP para o servidor PHP-FPM. A configuração também inclui boas práticas de segurança, como cabeçalhos de segurança e a limitação de métodos HTTP.

## Estrutura do Projeto

O projeto está organizado da seguinte forma:


```bash
.github
  - workflows
      - deploy.yml
nginx
  - Dockerfile
  - nginx.conf
php-fpm
  -  Dockerfile
  -  index.php
.env
.gitignore
docker-compose.yml
```

## Configurações dos Arquivos

Utilizado para definir um workflow de integração e entrega contínua (CI/CD) no GitHub Actions

```bash
.github/workflows/deploy.yml
```

Define a imagem base e as etapas para configurar o servidor Nginx.

```bash
nginx/Dockerfile
```
Contém a configuração personalizada do Nginx.

```bash
nginx/nginx.conf
```
Define a imagem base e as etapas para configurar o serviço PHP-FPM.

```bash
php-fpm/Dockerfile
```
É um simples script PHP para teste.

```bash
php-fpm/index.php
```
Utilizado para armazenar variáveis de ambiente em um formato simples e legível.

```bash
.env
```

Usado para especificar quais arquivos e diretórios devem ser ignorados pelo sistema de controle de versão.

```bash
.gitignore
```

Define e configura os serviços necessários para o ambiente Dockerizado

```bash
docker-compose.yml
```

## Passos para executar o Projeto

1 - Clone o repositório.

```bash
  git clone https://github.com/maxwelbarbosaa/projetoweb.git
```

2 - Navegue até o diretório do projeto.

```bash
  cd projetoweb
```

3 - Execute o comando docker compose up --build para construir e iniciar os containers.

```bash
  docker compose up --build 
```

4 - Abra um navegador e acesse http://localhost para ver a aplicação em funcionamento.

## Medidas de Segurança Implementadas

Dockerfile do PHP-FPM

Definição do Proprietário dos Arquivos (chown):

Usei chown -R www-data:www-data /var/www/html para definir www-data como proprietário dos arquivos em /var/www/html, garantindo que o servidor web tenha acesso seguro aos arquivos.

Usuário de Execução (USER):

USER www-data para executar comandos subsequentes no Dockerfile como o usuário www-data, reforçando a segurança ao limitar as permissões dentro do container.

Arquivo de configuração do Nginx:

Cabeçalhos de segurança: Protegem contra ataques comuns como XSS e clickjacking.

Limitação de métodos HTTP: Apenas métodos GET, POST e HEAD são permitidos.

Limitação do tamanho do corpo da solicitação:  Evita ataques de negação de serviço (DoS) limitando o tamanho do corpo da solicitação a 1MB.

## Recursos

Nginx: Um servidor web de alto desempenho.

PHP-FPM: Um gerenciador de processos FastCGI para PHP.

Docker: Uma plataforma para desenvolver, enviar e executar aplicações dentro de containers.


