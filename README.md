<h1 align="center">iBlood - Aplicativo para Doação de Sangue</h1>
<p align="center">
  <img src="https://github.com/tardisblink/iBloodV1/blob/main/src/Img/Logo.png?raw=true" alt="iBloodV2 Logo" width="300px">
</p>

## Sobre o Projeto

O iBloodV2 é um aplicativo Brasileiro de código aberto para agendamento de doação de sangue, inicialmente desenvolvido como projeto de TCC/PI pelos estudantes de Gestão de Tecnologia da Informação [Alberto Francisco](https://github.com/tardisblink), [Celso Antonio](https://github.com/florence-dawn/), Everton Emanuel e Geovana Pinheiro.

A primeira versão do aplicativo foi desenvolvida usando React Native (framework javascript). Contudo, a versão atual foi reescrita em PHP para facilitar o acesso do usuário final, melhorar a performance e a escalabilidade do sistema.

Você pode acessar o primeiro projeto em [iBloodV1](https://github.com/tardisblink/iBloodV1) e ler o artigo científico relacionado ao projeto em [iBlood - Editora Científica](https://www.editoracientifica.com.br/books/chapter/230613381).

## Sobre o Aplicativo

O iBloodV2 é destinado a facilitar a doação de sangue. Nosso objetivo é conectar doadores a bancos de sangue e hospitais, tornando o processo mais eficiente e acessível para todos.

Além de auxiliar doadores, o aplicativo fornece informações sobre estoque de sangue, a importância da doação, entre outras. Nosso objetivo é democratizar essa informação e tecnologia, permitindo que secretarias de saúde, hospitais e hemocentros possam baixar e utilizar o aplicativo gratuitamente.

## Status do Projeto

Este projeto está atualmente em construção. Estamos trabalhando ativamente para desenvolver e implementar novas funcionalidades que ajudarão a melhorar a experiência de doação de sangue para usuários em todo o Brasil.

## Tecnologias Utilizadas

- PHP 8.3.9
- Framework CodeIgniter 4.5.4
- Banco de dados MYSQL

## Como Instalar

1. **Baixar o Composer**

   Se você ainda não tem o Composer instalado, siga as instruções [aqui](https://getcomposer.org/download/) para fazer o download e instalação.

2. **Clonar o Repositório**

   Clone este repositório para a sua máquina local e depois acesse-o usando o seguinte comando:

   ```bash
   git clone https://github.com/florence-dawn/iBloodV2.git

   cd iBloodV2
   ```

3. **Instalar as Dependências**

   Execute o comando abaixo para instalar todas as dependências utilizando o Composer:

   ```bash
    composer install
   ```

4. **Criar o banco de dados**

   Nessa etapa você deve criar um banco de dados mysql, com o charset UTF-8.
   Anote os dados de conexão do banco, esses dados serão necessários na próxima etapa

5. **Preencher o arquivo .env**

   Renomear e Preencher o Arquivo de Configuração:

   - Renomeie o arquivo `env` para `.env`, que está localizado na pasta raiz do projeto
   - Abra o arquivo `.env` e preencha as informações necessárias conforme esperado, como url, dados para conexão com banco de dados, e-mail e etc.

6. **Executar as migrações**

   Execute o código abaixo para criar as tabelas e colunas necessárias no banco de dados:

   ```bash
    php spark migrate --all
   ```

7. **Iniciar o Servidor Web**

   Para testar o aplicativo localmente, você pode utilizar o servidor que vem instalado junto com o framework do projeto executando o código abaixo:

   ```bash
    php spark serve
   ```

   - Após isso, abra o navegador e acesse localhost:8080.
