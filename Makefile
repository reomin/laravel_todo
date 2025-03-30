.PHONY: build up down restart logs artisan migrate seed

PROJECT_NAME=laravel
# 作成するディレクトリ名
DIR_NAME=./$(PROJECT_NAME)

up:
	docker compose up -d --build

# # 新しいプロジェクトの作成
# create-project:
# 	# ディレクトリ作成
# 	mkdir -p $(DIR_NAME)
# 	cd $(DIR_NAME) && \
# 	composer create-project --prefer-dist laravel/laravel=8.* .
#   composer create-project --prefer-dist "laravel/laravel=8.*" .

# # その他の必要なコマンド
# # 例: artisanコマンド
# artisan:
# 	cd $(DIR_NAME) && php artisan $(command)
