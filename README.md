
# SCBST - Sistema de Controle de Banco de Sangue e Transfusões

Este projeto é um sistema web desenvolvido em **PHP** com banco de dados **MySQL**, voltado para o gerenciamento de doações de sangue, usuários e controle de estoque sanguíneo. Ideal para uso em hemocentros ou unidades de saúde.

## 🧩 Funcionalidades Principais

### 🔐 Autenticação
- Login de usuários com controle de sessão.
- Controle de acesso por **nível de permissão** (`admin` e `usuário comum`).

### 👥 Gestão de Usuários
- Cadastro de novos usuários (apenas administradores).
- Edição de dados dos usuários (exceto nível de acesso).
- Sistema de segurança com confirmação de senha.

### 💉 Cadastro de Doadores
- Registro de doadores com dados completos (nome, tipo sanguíneo, data de nascimento, etc).
- Controle de última doação com regras de periodicidade por gênero:
  - Homens: mínimo de 3 meses.
  - Mulheres: mínimo de 2 meses.
- Ícone de alerta exibido ao lado de doadores que já podem doar novamente.

### 📦 Controle de Estoque de Sangue
- Dashboard com **gráfico em pizza (Chart.js)** mostrando a quantidade de bolsas de sangue por tipo.
- Interface para adicionar, editar e visualizar a quantidade de bolsas em estoque.

### 🔎 Visualização Detalhada
- Página dedicada para **visualizar os detalhes de um doador** a partir de seu ID.
- Link de “Visualizar” na listagem geral para acesso rápido às informações completas.

### 📱 Interface Responsiva
- Menus tipo **hambúrguer** com animação e efeito fullscreen para boa usabilidade em dispositivos móveis.
- Estilo personalizado com HTML5, CSS3 e design agradável.

---

## 🛠 Tecnologias Utilizadas

- PHP 7+
- MySQL
- HTML5 / CSS3
- JavaScript
- Chart.js
- Ionicons

---

## 📦 Estrutura do Projeto

```
/
├── index.php                # Página inicial / login
├── dashboard.php            # Painel com gráficos e dados
├── cadastrousers.php        # Cadastro de novos usuários (admin)
├── editfun.php              # Edição de cadastro pessoal
├── processa_cadastro.php    # Processamento do formulário de cadastro
├── processa_edicao.php      # Processamento da edição
├── list_doadores.php        # Listagem geral dos doadores
├── visualizar.php           # Página com os detalhes de um doador
├── css/
├── js/
├── auth.php                 # Arquivo de autenticação e sessão
└── db_connect.php           # Conexão com o banco de dados
```

---

## 🚀 Como Usar

1. Clone este repositório:
   ```bash
   git clone https://github.com/AdryanTroiano/SCBST.git
   ```
2. Importe o banco de dados SQL (`banco.sql` ou estrutura similar).
3. Configure a conexão no `db_connect.php` com suas credenciais:
   ```php
   $pdo = new PDO("mysql:host=localhost;dbname=cadastro", "root", "");
   ```
4. Execute localmente com um servidor PHP (ex: XAMPP, WAMP, Laragon).

---

## 📌 Observações

- Para acessar funcionalidades administrativas, crie um usuário com nível `admin` diretamente no banco ou via painel se já estiver logado como admin.
- As senhas são armazenadas em formato seguro com `password_hash`.

---

## 📧 Contato

Desenvolvido por **Adryan Troiano**  
📞 WhatsApp: (16) 99308-9219  
🔗 GitHub: [AdryanTroiano](https://github.com/AdryanTroiano)

Sinta-se à vontade para contribuir ou abrir *issues*! Pull requests são bem-vindos!

---
