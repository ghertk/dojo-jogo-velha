# Dojo Jogo da velha em PHP

Projeto desenvolvido durante um DOJO com os colegas @jremerich, @murilofernandesbr e @paulocesarml da GAM Distribuidora.
A proposta foi resolver o problema Jogo da velha utilizando as técnicas do TDD (Test Driven Development).

## Regras:

- [x] tabuleiro de 3x3
- [x] 2 jogadores 'X' e 'O'
- [x] o jogador 'X' inicia o jogo
- [x] os jogadores alternam a cada rodada
- [X] os jogadores não podem preencher uma célula que já esteja ocupada
- [X] o jogador que completar uma linha, coluna ou diagonal vence o jogo
- [X] se completar o tabuleiro e não houver um vencedor o jogo será considerado empate

## 🔨 Instalação:

```sh
$ docker-compose up -d
$ docker exec -it dojo-jogo-velha sh
$ composer install
```

## ☑️ Rodar testes
```bash
$ docker-compose up -d
$ docker exec -it dojo-jogo-velha sh
$ composer run test
```