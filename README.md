# Laravel Teste

Este  projeto é um teste técnico como parte de um processo seletivo.

## Como Instalar?

### Clonando

Antes de mais nada precisa fazer o clone deste projeto .

```bash
    git clone https://github.com/eufelipemateus/laravel-teste.git
```

### Instalando

Agora você precisa instalar o projeto usando o [composer](https://getcomposer.org/download/)

```bash
    composer install     
```

### Configuração

 Depois de instalar o projeto  precisa criar o arquivo .env

```bash
    mv .env.exmple .env
```

Gere uma app key

```bash
    php artisan key:generate
```

Replace com seu bd no .env

```env
    DB_CONNECTION=mysql
    DB_HOST=´Your Host´
    DB_PORT=3306
    DB_DATABASE=´Your Database´
    DB_USERNAME=´Your Root´
    DB_PASSWORD=´Your Password´
```

Now você precisa migar o banco de dados

```bash
    php artisan migrate --seed
```

## Rotas

 Abaixo lista as rodas das paginas html do sistema onde é possível adicionar remover pagamentos e produtos.
  
### Produtos
  
- /product/new  - Novo produto
- /product/{id}    - Exibir produto
- /products        -  Lista de Produtos

### Configuração de Pagamentos

- /payment/new  - Novo Pagamento
- /payment/{id}    - Exibir Pagamento
- /payments        -  Lista de Pagamentos

### Exibir Produto e Preço

- /buy/{id}  -  pagina que exibe o preço do produto com a configuração de pagamento.

## Author

**[Felipe Mateus](https://eufelipemateus.com)** - [eufelipemateus](https://github.com/eufelipemateus)
