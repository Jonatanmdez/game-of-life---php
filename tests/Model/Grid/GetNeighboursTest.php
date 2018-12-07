<?php
/**
 * Created by PhpStorm.
 * User: jonatan
 * Date: 04/12/2018
 * Time: 18:35
 */

namespace App\Test\Model;

use App\Model\Grid;
use App\Test\Model\Grid\GridHelper;
use PHPUnit\Framework\TestCase;

class GetNeighboursTest extends GridHelper
{
    public function testMatrixWithOnlyOneCell()
    {
        $originalCellsState = file_get_contents(__DIR__ . '/../../Data/Input/1x1Cells.txt');
        $grid = Grid::readFromString($originalCellsState);
        $this->assertEquals(1,$grid->count());
        $cell = $grid->getCell(0,0);
        $neighbours = $grid->getNeighbours($cell);

        $this->assertEquals(0,$neighbours->count());
    }


}
