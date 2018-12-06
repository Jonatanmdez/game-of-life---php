<?php
/**
 * Created by PhpStorm.
 * User: jonatan
 * Date: 04/12/2018
 * Time: 17:12
 */

namespace App\Test\Model;

use App\Model\Cell;
use PHPUnit\Framework\TestCase;

class CellTest extends TestCase
{

    public function testCellExists()
    {
        $cell = new Cell();
        return $this->assertNotNull($cell);
    }

    public function testContructorAliveWorks()
    {
        $cell = new Cell(true);
        $this->assertTrue($cell->IsAlive());
    }

    public function testContructorDeadWorks()
    {
        $cell = $this->getADeadCell();
        $this->assertFalse($cell->IsAlive());
    }

    public function testDefaultConstructorIsDead()
    {
        $cell = new Cell();
        $this->assertFalse($cell->IsAlive());
    }

    public function testCellIsDieAndMustContinueDead()
    {
        $cell = $this->getADeadCell();



    }

    public function getADeadCell(): void
    {
        $cell = new Cell(false);
    }

}
