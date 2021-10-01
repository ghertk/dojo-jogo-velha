<?php

declare(strict_types=1);

use App\Entity\Tabuleiro;
use PHPUnit\Framework\TestCase;

final class TabuleiroTest extends TestCase {
    function testExecutaUmaRodada() {
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(0, 0);
        $this->assertEquals($tabuleiro->get(0,0), 'X');
    }

    function testExecuta2Rodadas() {
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(0, 0);
        $tabuleiro->set(1, 0);
        $this->assertEquals($tabuleiro->get(1, 0), 'O');
    }

    function testNaoAlteraCelulaPreenchida() {
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(0, 0);
        $tabuleiro->set(0, 0);
        $this->assertEquals($tabuleiro->get(0, 0), 'X');
    }

    function testNaoPerdeRodadaAoTentarPreencherCelulaPreechida() {
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(0, 0);
        $tabuleiro->set(0, 0);
        $tabuleiro->set(1, 0);
        $this->assertEquals($tabuleiro->get(1, 0), 'O');
    }

    function testNaoHaVencedor() {
        $tabuleiro = new Tabuleiro();
        $this->assertEquals($tabuleiro->verificaVencedor(), '');
    }

    function testXVenceNaLinha() {
        //   0 1 2
        // 0  | |
        // 1 O|O|
        // 2 X|X|X
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(2, 0);
        $tabuleiro->set(1, 0);
        $tabuleiro->set(2, 1);
        $tabuleiro->set(1, 1);
        $tabuleiro->set(2, 2);
        $this->assertEquals($tabuleiro->verificaVencedor(), 'X');
    }

    function testOVenceNaLinha() {
        //   0 1 2
        // 0  | |X
        // 1 O|O|O
        // 2 X|X|
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(2, 0);
        $tabuleiro->set(1, 0);
        $tabuleiro->set(2, 1);
        $tabuleiro->set(1, 1);
        $tabuleiro->set(0, 2);
        $tabuleiro->set(1, 2);
        $this->assertEquals($tabuleiro->verificaVencedor(), 'O');
    }

    function testXVenceNaColuna() {
        //   0 1 2
        // 0 X|O|
        // 1 X|O|
        // 2 X| |
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(0, 0);
        $tabuleiro->set(0, 1);
        $tabuleiro->set(1, 0);
        $tabuleiro->set(1, 1);
        $tabuleiro->set(2, 0);
        $this->assertEquals($tabuleiro->verificaVencedor(), 'X');
    }

    function testOVenceNaColuna() {
        //   0 1 2
        // 0 X|O|X
        // 1 X|O|
        // 2  |O|
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(0, 0);
        $tabuleiro->set(0, 1);
        $tabuleiro->set(1, 0);
        $tabuleiro->set(1, 1);
        $tabuleiro->set(0, 2);
        $tabuleiro->set(2, 1);
        $this->assertEquals($tabuleiro->verificaVencedor(), 'O');
    }

    function testXVenceNaDiagonal() {
        //   0 1 2
        // 0 X|O|
        // 1 O|X|
        // 2  | |X
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(0, 0);
        $tabuleiro->set(0, 1);
        $tabuleiro->set(1, 1);
        $tabuleiro->set(1, 0);
        $tabuleiro->set(2, 2);
        $this->assertEquals($tabuleiro->verificaVencedor(), 'X');
    }

    function testXVenceNaDiagonalInversa() {
        //   0 1 2
        // 0  |O|X
        // 1 O|X|
        // 2 X| |
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(0, 2);
        $tabuleiro->set(0, 1);
        $tabuleiro->set(1, 1);
        $tabuleiro->set(1, 0);
        $tabuleiro->set(2, 0);
        $this->assertEquals($tabuleiro->verificaVencedor(), 'X');
    }

    function testEmpate() {
        //   0 1 2
        // 0 X|O|X
        // 1 O|O|X
        // 2 X|X|O
        $tabuleiro = new Tabuleiro();
        $tabuleiro->set(0, 0);
        $tabuleiro->set(0, 1);
        $tabuleiro->set(0, 2);
        $tabuleiro->set(1, 0);
        $tabuleiro->set(2, 0);
        $tabuleiro->set(1, 1);
        $tabuleiro->set(2, 1);
        $tabuleiro->set(2, 2);
        $tabuleiro->set(1, 2);
        $this->assertEquals($tabuleiro->verificaVencedor(), 'Empate');
    }
}