<?php

declare(strict_types=1);
namespace App\Entity;

final class Tabuleiro {
    private $celulas;
    private bool $XProximo = true;

    function __construct() {
        for ($i=0; $i < 9; $i++) { 
            $this->celulas[$i] = '';
        }
    }

    function set($linha, $coluna) {
        if ($this->celulas[$linha * 3 + $coluna] === '') {
            $this->celulas[$linha * 3 + $coluna] = $this->XProximo ? 'X' : 'O';
            $this->XProximo = !$this->XProximo;
        }
    }

    function get($linha, $coluna)
    {
        return $this->celulas[$linha * 3 + $coluna];
    }

    function verificaVencedor() {
        // Verifica Linha
        for ($linha = 0; $linha < 3; $linha++) {
            $inicioLinha = $this->get($linha, 0);
            if (
                $inicioLinha !== '' 
                && $inicioLinha === $this->get($linha, 1)
                && $inicioLinha === $this->get($linha, 2)
            ) {
                    return $inicioLinha;
            }
        }
        // Verifica Coluna
        for ($coluna=0; $coluna < 3; $coluna++) { 
            $inicioColuna = $this->get(0, $coluna);
            if (
                $inicioColuna !== ''
                && $inicioColuna === $this->get(1, $coluna)
                && $inicioColuna === $this->get(2, $coluna)
            ) {
                return $inicioColuna;
            }
        }
        // Verifica diagonal
        $inicioDiagonal = $this->get(0, 0);
        if ($inicioDiagonal && $inicioDiagonal === $this->get(1, 1) && $inicioDiagonal === $this->get(2, 2)) {
            return $inicioDiagonal;
        }
        // Verifica inversa
        $inicioDiagonalInvertida = $this->get(0, 2);
        if ($inicioDiagonalInvertida && $inicioDiagonalInvertida === $this->get(1, 1) && $inicioDiagonalInvertida === $this->get(2, 0)) {
            return $inicioDiagonalInvertida;
        }
        for ($i=0; $i < 9; $i++) { 
            if ($this->celulas[$i] === '') {
                return '';
            }
        }
        return 'Empate';
    }
}