# Projeto Laravel 12+

Este projeto é uma aplicação web desenvolvida com Laravel 12+ para gerenciar projetos e tarefas. Ele inclui funcionalidades como autenticação, CRUD de projetos e tarefas, e exibição de mensagens de erro e sucesso como *toasts* flutuantes.

---

## ✅ Requisitos

- PHP 8.1+
- Composer 2.x
- MySQL ou PostgreSQL (ou outro banco de dados de sua escolha)

---

## ⚙️ Instalação

### 1. Clonando o Repositório

```bash
git clone https://github.com/otavioNicolau/NsProject.git
cd NsProject
```

### 2. Instalando Dependências

```bash
composer install
```

### 3. Configuração do Ambiente

Copie o arquivo de exemplo `.env`:

```bash
cp .env.example .env
```

Edite o arquivo `.env` com suas configurações de banco de dados:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nome_do_banco
DB_USERNAME=usuario
DB_PASSWORD=senha
```

### 4. Gerando a Chave da Aplicação

```bash
php artisan key:generate
```

### 5. Rodando as Migrations

```bash
php artisan migrate
```

### 6. Rodando as Seeds (opcional)

```bash
php artisan db:seed
```

---

## ▶️ Rodando a Aplicação

```bash
php artisan serve
```

Acesse: [http://localhost:8000](http://localhost:8000)
