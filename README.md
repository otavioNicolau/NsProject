Projeto Laravel 12+
Este projeto é uma aplicação web desenvolvida com Laravel 12+ para gerenciar projetos e tarefas. Ele inclui funcionalidades como autenticação, CRUD de projetos e tarefas, e exibição de mensagens de erro e sucesso como toasts flutuantes.

Requisitos
PHP 8.1+

Composer 2.x

MySQL ou PostgreSQL (ou outro banco de dados de sua escolha)

Instalação
1. Clonando o Repositório
Primeiro, clone o repositório para o seu ambiente local:

bash
Copiar
Editar
git clone https://github.com/usuario/repositorio.git
cd repositorio
2. Instalando Dependências
Após clonar o repositório, instale as dependências do Composer:

bash
Copiar
Editar
composer install
Isso instalará todas as dependências do Laravel, incluindo as bibliotecas e pacotes necessários para o funcionamento da aplicação.

3. Configuração do Ambiente
Crie um arquivo .env baseado no .env.example:

bash
Copiar
Editar
cp .env.example .env
Edite o arquivo .env para configurar seu banco de dados, chave da aplicação e outras variáveis de ambiente:

env
Copiar
Editar
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha

APP_KEY=base64:chaveGeradaAqui
4. Gerando a Chave da Aplicação
Execute o comando para gerar a chave da aplicação:

bash
Copiar
Editar
php artisan key:generate
5. Rodando as Migrations
Após configurar o ambiente, execute as migrations para criar as tabelas no banco de dados:

bash
Copiar
Editar
php artisan migrate
6. Rodando as Seeds (opcional)
Se você quiser popular seu banco de dados com dados iniciais (ex.: usuários e projetos), execute as seeds:

bash
Copiar
Editar
php artisan db:seed
7. Instalando Dependências Frontend (opcional)
Se o seu projeto utiliza o Laravel Mix para compilar assets, execute o comando para instalar as dependências do Node.js:

bash
Copiar
Editar
npm install
Para compilar os arquivos de frontend (CSS, JS), use o comando:

bash
Copiar
Editar
npm run dev
Ou para produção:

bash
Copiar
Editar
npm run production
Rodando a Aplicação
Com o ambiente configurado e as dependências instaladas, você pode rodar o servidor de desenvolvimento do Laravel:

bash
Copiar
Editar
php artisan serve
Isso iniciará o servidor em http://localhost:8000, onde você poderá acessar a aplicação.

Funcionalidades
Autenticação de Usuário: Cadastro e login de usuários.

Gestão de Projetos: CRUD de projetos, com possibilidade de criar, editar, visualizar e deletar.

Gestão de Tarefas: CRUD de tarefas dentro de projetos, com possibilidade de adicionar, editar e remover tarefas.

Toasts: Exibição de mensagens de sucesso ou erro como toasts flutuantes na tela.

Rotas
Aqui estão algumas das principais rotas e funcionalidades disponíveis:

Login: /login (POST)

Cadastro: /register (POST)

Logout: /logout (POST)

Perfil de Usuário: /profile/edit (GET), /profile/update (POST)

Projetos:

Listar Projetos: /projects (GET)

Criar Novo Projeto: /projects/create (GET, POST)

Editar Projeto: /projects/{project}/edit (GET, POST)

Excluir Projeto: /projects/{project} (DELETE)

Tarefas:

Criar Tarefa: /projects/{project}/tasks/create (GET, POST)

Editar Tarefa: /projects/{project}/tasks/{task}/edit (GET, POST)

Excluir Tarefa: /projects/{project}/tasks/{task} (DELETE)

Mensagens de Erro e Sucesso
As mensagens de erro e sucesso são exibidas na tela como toasts flutuantes, de forma discreta e não invasiva.

Contribuindo
Se você quiser contribuir com melhorias ou correções, fique à vontade para fazer um fork do projeto e enviar um pull request. Abaixo estão algumas etapas para contribuição:

Faça um fork deste repositório.

Crie uma nova branch (git checkout -b minha-nova-feature).

Faça suas alterações e comite (git commit -am 'Adiciona nova feature').

Envie sua branch para o repositório remoto (git push origin minha-nova-feature).

Envie um pull request.

Licença
Este projeto está licenciado sob a MIT License. Veja o arquivo LICENSE para mais detalhes.
