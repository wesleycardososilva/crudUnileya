# crudUnyleya
Projeto Backend, em PHP, utilizando framework Laravel(https://laravel.com/) e banco de dados MySql. 
Para instalação do Laravel é necessário que instale o gerenciador de pacotes composer, https://getcomposer.org/ neste site é possível baixá-lo e obter todas as informções de uso.
O ambiente de desenvolvimento PHP, Xampp, foi utilizado; auxiliando com um servidor apache e o phpMyAdmin.
Para executar o backend, é preciso iniciar o Xampp, em seguida, no botão "start" iniciar o Apache e phpMyAdmin.
Iniciado Apache e phpMyAdmin,dentro da pasta backend, digite no terminal o comando php artisan serve.
O arquivo .env, na pasta raiz do backend, fornece as configurções relacionadas à conexão, senha, host etc.

Projeto frontend utilizando React js e para estilização foi utilizado a biblioteca antd(https://ant.design/).
Para genrenciar as dependências é necessário a instalação do gerenciador de pacotes do node js, yarn. 
O gerenciador está disponível em https://classic.yarnpkg.com/pt-BR/docs/cli/add/, neste site são fornecidas todas as intruções de instalação. 
Depois de instalado o yarn é preciso somente digitar "yarn start", no terminal, para que a aplicação seja executada no frontend.
Por padrão a aplicação abrirá em http://localhost:3000.

Na aplicação é possível, listar, cadastrar, editar e excluir todos os autores, editoras, e gêneros. Está pendente o cadastro dos livros no banco de dados, pois o mesmo possui uma relação de muitos para muitos no banco de dados, o que torna essa implementação diferente das demais.
A tela para exibição, edição e exclusão dos livros foi criada e somente não realiza a adição de um novo item ao banco de dados.
