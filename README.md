# API PROCESSO SELETIVO UNYLEYA

Olá, Olá,Sejam bem-vindos. Aqui se encontram as instruções da API do processo seletivo para a vaga de desenvolvedor pleno da Faculdade Unyleya. 
 

## Banco de dados 

O Banco de dados foi desenvolvido com a tecnologia MySQL. Dentro da basta databaseModel,encontra-se o script
necessário para criar as tabelas e realizar os primeiros inserts para teste, e também um PDF e um PNG com o
modelo de dados.

Instalação:

No terminal, entre como root e digite os comandos:

1 - mysql

2 - CREATE DATABASE db_unyleya;

3 - GRANT ALL PRIVILEGES ON db_unyleya.* to <nome_do_usuario>

4 - USE db_unyleya

5 - SOURCE db_unyleya_script_V2.sql


Pronto. Nosso banco de dados já está funcionando.

## Instalando a aplicação 

Inicia-se baixando o .zip disponível no github. Após isso,basta extrair para a pasta de preferência e rodar o comando

 php -S localhost:8080 -t public public/index.php
 
 Lembre-se,para rodar o comando é necessário estar na pasta raiz do projeto.
 
 
 
Para testar as rotas e apis,foi criado um documento no swagger que auxiliará todo o processo.
 

