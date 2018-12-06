<?php
/**
 * Created by PhpStorm.
 * User: jonatan
 * Date: 04/12/2018
 * Time: 18:35
 */

namespace App\Test\Model;

use App\Model\Grid;
use PHPUnit\Framework\TestCase;

class GetNeighboursTest extends TestCase
{
    public function testMatrixWithOnlyOneCell()
    {
        $originalCellsState = file_get_contents(__DIR__ . '/../../Data/Input/1x1Cells.txt');
        $grid = Grid::readFromString($originalCellsState);
        $this->assertEquals(1,$grid->getNumber());
        $cell = $grid->getCell(0,0);
        $neighbours = $grid->getNeighbours($cell);

        $this->assertEquals(0,$neighbours->count());


    }


}
