
<br>

# Sistem de Gerenciamento de vagas de estacionamento

<br>

## 📌 Descrição

Um sistema de gerenciamento de vagas de estacionamento, que permite cadastrar usuários e veículos, visualizar os cadastros existentes e controlar o status das vagas — podendo marcá-las como "vaga" ou "ocupada", além de possibilitar a exclusão de registros.

<br>

## 📝 Funcionalidades 

<br>

✔️ Cadastro, edição e exclusão de usuários e veículos

✔️ Visualização dos dados diretamente do banco de dados

✔️ Controle de vagas (vaga/ocupada)

✔️ Interface simples e funcional

✔️ APIs organizadas por módulo (usuário, veículo, vaga, etc.)

<br>

## 📜 Tecnologias usadas 

<br>

➖ **VScode**

➖ **PHP**

➖ **PHPMyAdmin**

➖ **JavaScript**

➖ **HTML / CSS**

<br>

## 📁 Estrutura de pastas utilizada

<br>

```

📁 GESTOR-DE-ESTACIONAMENTO
│
│──📁 ── Api 
│       │
│       │── 📁 ocupacao
│       │         │
│       │         │── 📄 atualizar_ocupacao.php
│       │         │── 📄 excluir_ocupacao.php
│       │         └── 📄 exibir_ocupacao.php
│       │
│       │── 📁 usuario
│       │         │
│       │         │── 📄 criar_usuario.php
│       │         └── 📄 exibir_usuario.php
│       │
│       │── 📁 vagas
│       │         │
│       │         └─── 📄 exibir_vagas.php
│       │
│       └── 📁 veiculo
│                 │
│                 │── 📄 criar_veiculo.php
│                 │── 📄 excluir_veiculo.php
│                 └── 📄 exibir_veiculo.php
│
│── 📁 conexao
│       │
│       └── 📄 conexao.php
│
│
│
│── 📁 css
│       │
│       └── 📄 estilo.css
│
│── 📁 img ── Imagens em geral
│ 
│── 📁 js
│       │
│       └── 📄 script.js
│
│── 📁 public
│       │
│       │── 📄 cadastro_usuario.php
│       │── 📄 cadastro_veiculo.php
│       │── 📄 footer.php
│       │── 📄 header.php
│       │── 📄 inicial.php
│       └── 📄 login.php
│       
│── 💾 estacionamento_bd.sql
│       
│── 📄 index.php
│       
└── 📧 REAME.MD

```

<br>

## 🔨 Como utilizar

<br>

### 1. Clone o repositório:

```bash
git clone https://github.com/seu-usuario/gestor-de-estacionamento.git
```

### 2. Importe o arquivo no seu banco de dados MySQL:
```
estacionamento_bd.sql
```

### 3.Configure a conexão com o banco de dados no arquivo(caso precise):
```
/gestor-de-estacionamento/conexao/conexao.php
```

### 4.Coloque os arquivos em um servidor local (como XAMPP ou WAMP).

### 5.Acesse via navegador:
```
http://localhost/pasta-de-sua-escolha/gestor-de-estacionamento/index.php
```

<br>

## 👥 Colaboradoes do projeto

<br>

➖ **[Dian](https://github.com/DianLuca)**

➖ **[Leonardo](https://github.com/leobarbosadev)**

➖ **[Vinícius](https://github.com/viniciusestevamsilva)**
