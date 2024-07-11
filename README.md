### Sobre o projeto

CRUD de Empresas e Contatos com Integração Bitrix24

#### Visão Geral

O projeto consiste em uma aplicação de gerenciamento de empresas e contatos, integrada com a API Bitrix24 para sincronização de dados. Utiliza-se Laravel como framework backend para manipulação do banco de dados da aplicação e integração com a API Bitrix24, e React com Inertia.js no frontend para renderização dinâmica das views.

#### Funcionalidades

- **CRUD de Empresas**: Permite criar, visualizar, atualizar e excluir empresas.
- **CRUD de Contatos**: Permite criar, visualizar, atualizar e excluir contatos associados a empresas.
- **Integração com API Bitrix24**: Sincroniza empresas e contatos com o Bitrix24 para atualizações em tempo real.

#### Requisitos de Instalação

1. **Ambiente de Desenvolvimento**:
   - PHP (v10.48)
   - Node.js (v21.7.1)
   - Banco de dados PostgreSQL (ou outro suportado pelo Laravel)

2. **Configuração do Projeto**:
   - Instale as dependências do Laravel: `composer install`
   - Instale as dependências do frontend React: `npm install`

3. **Configuração do Ambiente**:
   - Configure o arquivo `.env` com as variáveis de ambiente necessárias para o Laravel (incluindo acesso ao banco de dados e configurações da API Bitrix24).
   - Gere a chave de aplicação do Laravel: `php artisan key:generate`
   - Execute as migrações do banco de dados para criar as tabelas: `php artisan migrate`
   - Inicie o servidor de desenvolvimento: `php artisan serve`

4. **Executando o Frontend**:
   - O frontend React com Inertia.js é servido automaticamente pelo Laravel. Acesse `http://localhost:8000` (ou a URL configurada) para visualizar a aplicação.


