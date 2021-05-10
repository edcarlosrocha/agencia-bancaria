## Sobre o Projeto
Este projeto simula para fins de teste, como seria um sistema bancário contendo apenas as etapas de login, crud de usuários e suas transações bancárias.

## Dependências
- Docker
- Docker-compose
- Git

## Instalação:
Clone o repositório.
```sh
git clone https://github.com/edcarlosrocha/agencia-bancaria.git
```

Copie o arquivo .env.example com o nome .env na raiz do projeto.
```sh
cp .env.example .env
```

Altere as informações de conexão com o banco de dados no seu arquivo .env como no exemplo a seguir:
```sh
DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=agencia
DB_USERNAME=dev
DB_PASSWORD=suasenha
```

Faça o build das imagens e containers do docker
```sh
docker-compose up -d --build
```

Instale as dependências do composer, gere a key do laravel e suba o banco de dados com os seeds necessários
```sh
docker-compose exec app composer install
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

Verifique se tudo correu bem acessando o seu navegador no endereço http://localhost:8000, a tela inicial do Laravel deverá aparecer.

## Para utilizar a API
Importe a collection .docs/agencia-bancaria.postman_collection.json para seu postman, e em seguida dentro do Postman:
- Use a Request "Store - /api/v1/user" dentro da pasta Api/User para criar seu usuário, copie o 'api_token' gerado por ele.
- Nas configurações da collection adicione o valor copiado para a variável de ambiente "API_TOKEN".
- Pronto, você terá acesso a todas as rotas.

## Para ajustar seu código automaticamente a PSR-12:
```sh
docker-compose exec app chmod +x code-style.sh
docker-compose exec app ./code-style.sh
```

## Para rodar os testes: (Ainda não implementados)
```sh
docker-compose exec app php artisan test
```