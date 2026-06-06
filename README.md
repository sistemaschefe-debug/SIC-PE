# Relatório da aplicação SIC-PE

Data: 27/05/2026

## Visão geral
- Nome: SIC-PE (Sistema de Cadastro de Veículos)
- Linguagem: PHP (código procedural + classes/Entidades)
- Estrutura: aplicação monolítica em PHP com frontend server-rendered em Views PHP e uma pequena API em `api_sic/`.

## Dependências e autoload
- `composer.json` (em `sic/`) requer:
  - `doctrine/orm` (2.*)
  - `symfony/yaml` (2.*)
- Autoload configurado via `psr-0` apontando para `Model/` (entidades Doctrine armazenadas em `Model/`).

## Arquivos e entrypoints importantes
- Entrada web principal: `index.php` (inclui `config.php`, controla sessão e inclui views em `View/`).
- API pública/REST-like: `api_sic/veiculos-api.php` (opera por ação recebida em JSON via `php://input`).
- Configuração Doctrine / EntityManager: `config.php` (cria `$entityManager`).
- Arquivo de configuração da API: `api_sic/config.php` (cria conexão PDO usada pela API).

## Estrutura de pastas (resumida)
- `Model/` — Entidades/Modelos: Arma.php, Corpo.php, Notificacoes.php, Pessoas.php, Posto.php, Setor.php, TiposBrasao.php, Usuarios.php, VeiculosIdentificados.php
- `Controller/` — Scripts de controle: controllerArma.php, controllerCorpo.php, controllerNotificacao.php, controllerPessoa.php, controllerSetor.php, controllerTiposBrasao.php, controllerUsuario.php, controllerVeiculo.php, Redimensiona.php
- `View/` — Views e formulários: form*/ listar*; assets JS/CSS em `View/js` e `View/css`
- `Libs/` — Libs de terceiros (Bootstrap, DataTables, FancyZoom, jQuery)
- `vendor/` — Dependências instaladas via Composer (Doctrine, Symfony, etc.)

## Banco de dados
- Banco principal: MySQL (driver `pdo_mysql` usado em `config.php`).
- Observações: existem credenciais hardcoded em `config.php` e em `api_sic/config.php` (ex.: `user_banco` / `Pr@t@col@01#` e `root` / `A$$1MAd3tud0`).

## Autenticação e sessão
- `index.php` depende de `$_SESSION['idUsuario']` e `$_SESSION['nivel']` para controle de acesso e renderização de menus.
- API tem ação `login` que usa `md5()` sobre a senha e execução de query concatenada (ver `api_sic/veiculos-api.php`).

## Observações de segurança e pontos de atenção
- Credenciais em repositório: credenciais de BD estão expostas em arquivos de configuração — remover do código e usar variáveis de ambiente ou arquivo `.env` não versionado.
- Hash de senha fraco: uso de `md5()` para senha (inseguro). Recomenda-se `password_hash()`/`password_verify()` (bcrypt/argon2).
- SQL injection e queries não parametrizadas:
  - Em `api_sic/veiculos-api.php` há concatenação direta de variáveis em queries (`LIMIT $postjson[start],$postjson[limit]`, `WHERE id_veiculo_identificado = $id`, `WHERE usuario='$postjson[usuario]' AND senha='$senha'`) — preferir prepared statements ou usar Doctrine ORM.
- Validação/escape de entrada: embora haja `filter_var()` em alguns pontos, muitos trechos ainda concatenam strings; reforçar validação e parametrização.
- Controle de sessão: `index.php` destrói e redireciona quando sessão inválida — revisar se cookies de sessão e flags `httponly`, `secure` estão configuradas no ambiente.
- Armazenamento de uploads/imagens: `View/img` e caminhos de imagens são usados; garantir validação/sanitização de nomes e proteção contra upload de arquivos maliciosos.

## Observações funcionais
- Módulos principais: usuários, armas, tipos de brasão, corpos, setores, pessoas, veículos, notificações.
- Interface front-end baseada em Bootstrap + DataTables; versões antigas de jQuery/Bootstrap (ver em `Libs/`) — considerar atualização para correções de segurança e compatibilidade.
- Uso de Doctrine: existe integração com Doctrine ORM para as `Model/` entitites (via `$entityManager` em `config.php`), mas a API usa PDO direto — há mistura de abordagens.

## Recomendações rápidas
1. Remover credenciais do repositório e usar `.env` + `vlucas/phpdotenv` ou variáveis de ambiente no servidor.
2. Migrar autenticação para `password_hash()`/`password_verify()` e rever rotinas de login para prepared statements.
3. Parametrizar todas as queries (ou migrar a API para usar Doctrine) para evitar SQL injection.
4. Atualizar dependências e bibliotecas front-end (jQuery, Bootstrap, DataTables) e testar compatibilidade.
5. Avaliar adicionar controles de sessão mais robustos (regeneração de ID, flags `httponly`/`secure`).

## Localização dos itens relevantes (resumido)
- Entrada web: [sic/index.php](sic/index.php)
- Config Doctrine: [sic/config.php](sic/config.php)
- API: [sic/api_sic/veiculos-api.php](sic/api_sic/veiculos-api.php)
- API config: [sic/api_sic/config.php](sic/api_sic/config.php)
- Models: [sic/Model](sic/Model)
- Controllers: [sic/Controller](sic/Controller)
- Views principais: [sic/View](sic/View)

---

Relatório gerado automaticamente por análise estática dos arquivos presentes na árvore do projeto.
