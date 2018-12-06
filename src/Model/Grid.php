<?php
/**
 * Created by PhpStorm.
 * User: jonatan
 * Date: 04/12/2018
 * Time: 18:19
 */

namespace App\Model;


class Grid
{
    /**
     * @var Cell[][]
     */
    private $matrix;
    /**
     * @var int
     */
    private $rows;
    /**
     * @var int
     */
    private $columns;

    /**
     * Grid constructor.
     */
    public function __construct()
    {
        $this->matrix = [];
        $this->rows = 0;
        $this->columns = 0;
    }

    /**
     * @param String $file
     *
     * @return Grid
     */
    public static function readFromString($string): Grid
    {
        $lines = explode("\n",$string);
        $dimensions = explode(" ",$lines[0]);
        $rows = intval($dimensions[0]);
        $columns = intval($dimensions[1]);

        if(count($lines) !== $rows +1 ){
            throw new \Exception("The number of rows is not correct");
        }

        $matrix= [];

        for($i=0;$i< $rows;$i++){
            $matrix[$i] = [];
            $cells = explode(" ",$lines[$i+1]);


            if(count($cells) !== $columns){
                throw new \Exception("The number of columns is not correct");
            }

            foreach($cells as $number=>$cellState){
                $matrix[$i][$number] = new Cell($cellState === '*',$i,$number);
            }
        }


        $cells = new Grid();

        $cells->matrix = $matrix;
        $cells->columns = $columns;
        $cells->rows = $rows;

        return $cells;

    }

    /**
     * @return float|int
     */
    public function getNumber()
    {

        return $this->columns * $this->rows;
    }


    /**
     *
     */
    public function toString()
    {

        $output = $this->rows. ' '. $this->columns;

        for($row=0; $row < $this->rows;$row++){
            $line = '';
            for($column =0;$column< $this->columns ; $column++){
                $line.= ($this->matrix[$row][$column]->isAlive() ? '*':'.') . ' ';
            }
            $output.= PHP_EOL . trim($line);
        }
        return $output;

    }

    public function getCell($x,$y):Cell
    {
        if(empty($this->matrix[$x][$y])){
            throw new \Exception("Cell not found");
        }

        return $this->matrix[$x][$y];
    }

    public function getNeighbours(Cell $cell):Neighbours
    {
        $neighbours = new Neighbours();

        return $neighbours;
    }


}