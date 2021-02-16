# sistema-revendas

<h4>Um simples sistema de revendas feito em laravel.  A revenda recebe insumos (papel picotado) de gráficas e revende para indústrias de reciclagem.<h4>

<h2>Baixando o projeto</h2>
<p> git clone https://github.com/filgueirasjulio/sistema-revendas.git </p>

<h2>Levantando o container</h2>
<h4> acesse o diretório:</h4>
<p>  <strong><i>cd sistema-revendas</i></strong> </p>
<h4> suba o container: </h4>
<p> <strong><i>docker-compose up -d</i></strong> </p>
<p> obs: verifique se todos os containers foram levantados: phpmyadmin, webserver, mysql, php-fpm, redis 
<p> caso algum não tenha sido levantado execute:  <strong><i>docker-compose restart</i></strong> </p>

<h3>Executando o container</h3>
<p> <strong><i>docker exec -it revendas-php-fpm bash</i></strong> </p>

<h2>Configurando o projeto</h2>
<h4>Dependências via composer</h4>
<p> <strong><i>composer install</i></strong> </p>
<h4>Alterando permissões</h4>
<p> <strong><i>chmod -R 777 storage/ bootstrap/</i></strong> </p>
<h4>Copiar o .env.example para .env</h4>
<p> <strong><i> cp .env.example .env </i></strong> </p>
<h4>Definir a key da aplicação</h4>
<p> <strong><i> php artisan key:generate </i></strong> </p>
<h4>Gere as migrations com as seeds</h4>
<p> <strong><i> php artisan migrate --seed </i></strong> </p>

<h2>Acessando o sistema</h2>
<h4>Usuário e senha</h4>
<p>admin@admin.com</p>
<p>12341234</p>
