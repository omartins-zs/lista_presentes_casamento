#!/bin/bash
set -e

# Defaults caso não vindos via ENV
: "${DB_HOST:=db}"
: "${DB_PORT:=3306}"
: "${DB_DATABASE:=lista_presentes_casamento_db}"
: "${DB_USERNAME:=root}"
: "${DB_PASSWORD:=root}"

echo "⏳ Aguardando MySQL em $DB_HOST:$DB_PORT..."

until mysqladmin ping -h"$DB_HOST" -P"$DB_PORT" --silent; do
  printf "."
  sleep 2
done

echo
echo "✅ MySQL no ar — criando banco '$DB_DATABASE' (se não existir)..."

mysql -h"$DB_HOST" -P"$DB_PORT" -u"$DB_USERNAME" -p"$DB_PASSWORD" <<-EOSQL
  CREATE DATABASE IF NOT EXISTS \`$DB_DATABASE\`
    CHARACTER SET utf8mb4
    COLLATE utf8mb4_unicode_ci;
EOSQL

echo "🎉 Banco '$DB_DATABASE' pronto."

# Finalmente inicia o Apache
exec apache2-foreground
