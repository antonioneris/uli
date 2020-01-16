# Uli Teste 

Aplicação de Teste para Uli

## Criando ambiente de Teste

* 1 Clonar Repositorio git clone https://github.com/antonioneris/uli.git
* 2 acessar pasta uli cd uli
* 3 renomear arquivo .env.example para .env
* 4 executar composer install
* 5 Execurar php artisan key:generate
* 6 editar o arquivo .env alterando DB_HOST=127.0.0.1, DB_PORT=3306, DB_DATABASE=seuDB, DB_USERNAME=DBuser e DB_PASSWORD=suasenha com os dados do seu banco de dados mysql.
* 7 Executar php artisan migrate
* 8 Executar php artisan db:seed
* 9 Executar php artisan serve 
