# 🐳 Como subir a aplicação SIC-PE com Docker

## ✅ Arquivos preparados
Ja criei/modifiquei:
- ✓ `.env` - com credenciais para ambiente local
- ✓ `docker-compose.yml` - configurado para local com MySQL embutido
- ✓ `sic/.htaccess` - para rewrite de URLs no Apache

## 🚀 Pré-requisitos
- **Docker** instalado
- **Docker Compose** instalado

### Verificar instalação:
```bash
docker --version
docker-compose --version
```

## 📋 Passos para subir

### 1. Ir para a pasta do projeto
```bash
cd /home/batugade/Projetos/SIC-PE
```

### 2. Subir os containers (app + MySQL)
```bash
docker-compose up -d
```

**Primeira vez levará uns 2-3 minutos** (downloading/building imagens)

### 3. Acompanhar o build
```bash
docker-compose logs -f sic-app
```
Aguarde até ver: `[apache2:notice] Apache/2.4.* running`

### 4. Importar o banco de dados (se necessário)
O arquivo `sic.sql` será importado automaticamente ao iniciar o MySQL.

Se precisar reimportar manualmente:
```bash
docker-compose exec sic-mysql mysql -u sic_user -psic_pass_123 sic < sic.sql
```

## 🌐 Acessar a aplicação

- **URL:** http://localhost:8000
- **Credenciais:** Verifique a tabela `usuarios` no banco de dados após import

## 📊 Verificar status
```bash
docker-compose ps
```

## 🛑 Parar containers
```bash
docker-compose down
```

## 🧹 Limpar tudo (remover volumes)
```bash
docker-compose down -v
```

## 🔗 Conectar ao MySQL via terminal
```bash
docker-compose exec sic-mysql mysql -u sic_user -psic_pass_123 sic
```

## 📱 Acessar container da aplicação
```bash
docker-compose exec sic-app bash
```

## 🐛 Verificar logs
```bash
docker-compose logs sic-app
docker-compose logs sic-mysql
```

## ⚙️ Variáveis de ambiente

Editáveis em `.env`:
```env
APP_PORT=8000                    # Porta da aplicação
DB_HOST=sic-mysql              # Host do banco (não mude)
DB_DATABASE=sic                # Nome do banco
DB_USERNAME=sic_user           # Usuário BD
DB_PASSWORD=sic_pass_123       # Senha BD
TZ=America/Recife              # Timezone
```

---

## ✨ Configurações aplicadas

- **PHP:** 8.3 com Apache
- **MySQL:** 8.0
- **Permissões:** www-data têm permissão em doc_veiculos/ e imagens_notificacoes/
- **Composer:** Dependencies já instaladas no build
- **Rewrite:** Apache mod_rewrite ativado
- **Upload:** Max 20MB

---

Após subir, a aplicação estará disponível em **http://localhost:8000**
