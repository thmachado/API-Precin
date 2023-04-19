
# API Precin

Desenvolvimento de API para listagem de promoções que vão acontecendo ao redor do Brasil. Nesta fase inicial, temos a possibilidade de inserir, editar, remover e visualizar os produtos em promoção.


## Rodando localmente

Clone o projeto

```bash
  git clone https://github.com/thmachado/API-Precin
```

Entre no diretório do projeto

```bash
  cd my-project
```

Instale as dependências

```bash
  composer install
```

Migration

```bash
  php artisan migrate:fresh --seed
```


Inicie o servidor

```bash
  php artisan serve
```


## Documentação da API


#### Retorna o token que será utilizado para inserção/edição de produtos

```http
  GET /token
```

#### Retorna todos os produtos

```http
  GET /products
```

#### Retorna um item

```http
  GET /products/${id}
```

| Parâmetro   | Tipo       | Descrição                                   |
| :---------- | :--------- | :------------------------------------------ |
| `id`      | `string` | **Obrigatório**. O ID do produto que você quer |

#### Insere um produto

```http
  POST /products
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Obrigatório**. O token da API |

#### Edita um produto

```http
  PUT /products/${id}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Obrigatório**. O token da API |

#### Remove um produto

```http
  DELETE /products/${id}
```

| Parâmetro   | Tipo       | Descrição                           |
| :---------- | :--------- | :---------------------------------- |
| `X-CSRF-TOKEN` | `string` | **Obrigatório**. O token da API |

## Rodando os testes

Para rodar os testes, rode o seguinte comando

```bash
  php artisan test
```


## Autores

- [@thmachado](https://github.com/thmachado)


## Feedback

Se você tiver algum feedback, por favor nos deixe saber por meio de thiago.wimps@gmail.com

