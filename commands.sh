#!/usr/bin/env bash
# ============================================
# Nome: commands.sh
# Descrição: Reinicia containers Docker e roda o ambiente de desenvolvimento PHP
# Autor: Willian
# Versão: 1.0
# ============================================

set -e  # encerra o script se ocorrer algum erro

# === FUNÇÕES AUXILIARES ===

info() {
  echo -e "\e[34m[INFO]\e[0m $1"
}

success() {
  echo -e "\e[32m[SUCCESS]\e[0m $1"
}

error() {
  echo -e "\e[31m[ERROR]\e[0m $1"
  exit 1
}

# === LÓGICA PRINCIPAL ===

main() {
  info "Parando containers Docker em execução..."
  if docker ps -q | grep -q .; then
    docker stop $(docker ps -q)
    success "Todos os containers foram parados."
  else
    info "Nenhum container em execução."
  fi

  info "Subindo containers com Docker Compose..."
  docker compose up -d
  success "Containers iniciados em modo detached (-d)."

  info "Executando 'composer run dev'..."
  composer run dev
  success "Comando 'composer run dev' executado com sucesso."

  success "🚀 Ambiente de desenvolvimento iniciado!"
}

# === EXECUÇÃO ===

main "$@"
