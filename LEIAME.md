# Crypto

## O seu dicionário pessoal para criptografia

O Crypto é uma aplicação web criada para fornecer a cada utilizador o seu
próprio dicionário para criptografia. Com ele, é possível criar sistemas de
criptografia rápidos e seguros, gerir várias configurações e utilizá-las nos
seus próprios projetos.

## Como funciona

O Crypto recebe uma informação e substitui cada caractere por um texto de nove
caracteres formado por letras, números e outros símbolos. Por exemplo:

```text
A = $3P0+71B4
```

Cada conta pode manter as suas próprias criptografias. A API altera os códigos
dos caracteres no sistema de criptografia, dificultando a criação de um
dicionário por pessoas mal-intencionadas e reforçando a segurança dos dados.

## Funcionalidades

- Criação de criptografias personalizadas.
- Dicionário de criptografia individual para cada utilizador.
- Gestão das criptografias através de uma conta Crypto.
- API para integrar a criptografia em websites e outras aplicações.
- Página de teste para experimentar a encriptação e a desencriptação.
- Interface disponível em português e inglês.

## Requisitos

O projeto utiliza PHP, MySQL e Nginx. Também é necessário ter Git, Docker e
Docker Compose instalados.

1. Clone o repositório:
	```sh
	git clone <repo_url> crypto
	cd crypto
	```
2. Crie e preencha o seu arquivo `.env` (opcional).
3. Adicione o domínio ao arquivo de hosts.

	No Linux ou macOS, execute:
	```sh
	echo "127.0.0.1 www.crypto.com" | sudo tee -a /etc/hosts
	```

	No Windows, abra o Bloco de Notas como administrador e edite:
	`C:\Windows\System32\drivers\etc\hosts`

	Adicione esta linha ao arquivo:
	```text
	127.0.0.1 www.crypto.com
	```

4. Construa e inicie todos os serviços:

```bash
docker compose up --build
```

5. Acesse a aplicação em http://www.crypto.com

## Estrutura

- `pt/`: páginas em português.
- `en/`: páginas em inglês.
- `api/`: endpoints para gerir e utilizar criptografias.
- `css/` e `js/`: estilos e scripts da aplicação.
- `files/`: configurações e repositórios de criptografia.
- `db_backup/`: backup da base de dados.

## Licença

Copyright 2022 Domilson Gaspar. Todos os direitos reservados.