<?php
/**
 * Created by PhpStorm.
 * User: jonatan
 * Date: 04/12/2018
 * Time: 18:35
 */

namespace App\Test\Model;

use App\Model\Cells;
use PHPUnit\Framework\TestCase;

class CellsTest extends TestCase
{

    public function testMatrixWithOnlyOneCell()
    {
        $originalCellsState = file_get_contents(__DIR__ . '/../Data/Input/1x1Cells.txt');
        $cells = Cells::readFromString($originalCellsState);
        $this->assertEquals(1,$cells->getNumber());
        $this->assertEquals($originalCellsState,$cells->toString());
    }

    public function testMatrixWithSquareFormat()
    {
        $originalCellsState = file_get_contents(__DIR__ . '/../Data/Input/2x2Cells.txt');
        $cells = Cells::readFromString($originalCellsState);
        $this->assertEquals(4,$cells->getNumber());
        $this->assertEquals($originalCellsState,$cells->toString());
    }

    public function testMatrixWithMoreRowsThanColumns()
    {
        $originalCellsState = file_get_contents(__DIR__ . '/../Data/Input/3x2Cells.txt');
        $cells = Cells::readFromString($originalCellsState);
        $this->assertEquals(6,$cells->getNumber());
        $this->assertEquals($originalCellsState,$cells->toString());
    }

    public function testMatrixWithLessRowsThanColumns()
    {
        $originalCellsState = file_get_contents(__DIR__ . '/../Data/Input/2x4Cells.txt');
        $cells = Cells::readFromString($originalCellsState);
        $this->assertEquals(8,$cells->getNumber());
        $this->assertEquals($originalCellsState,$cells->toString());
    }

    public function testMatrixWithInvalidRowsDimensionsInString()
    {
        $this->expectExceptionMessage("The number of rows is not correct");
        Cells::readFromString(file_get_contents(__DIR__ . '/../Data/Input/CellsInvalidRows.txt'));
    }

    public function testMatrixWithInvalidColumnsDimensionsInString()
    {
        $this->expectExceptionMessage("The number of columns is not correct");
        Cells::readFromString(file_get_contents(__DIR__ . '/../Data/Input/ColumnsInvalidRows.txt'));
    }
}