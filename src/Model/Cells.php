<?php
/**
 * Created by PhpStorm.
 * User: jonatan
 * Date: 04/12/2018
 * Time: 18:19
 */

namespace App\Model;


class Cells
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
     * Cells constructor.
     */
    public function __construct()
    {
        $this->matrix = [];
        $this->rows = 0;
        $this->columns = 0;
    }

    /**
     * @param String $file
     * @return Cells
     */
    public static function readFromString($string): Cells
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
                $matrix[$i][$number] = new Cell($cellState === '*');
            }
        }


        $cells = new Cells();

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


}