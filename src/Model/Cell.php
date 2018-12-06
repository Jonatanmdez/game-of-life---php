<?php
/**
 * Created by PhpStorm.
 * User: jonatan
 * Date: 04/12/2018
 * Time: 17:01
 */

namespace App\Model;


class Cell
{

    private $isAlive;

    public function __construct($isAlive = false)
    {
        $this->isAlive = $isAlive;
    }

    /**
     * @return Boolean
     */
    public function isAlive()
    {
        return $this->isAlive;
    }


    public function nextGeneration(Neighbours $neighbours)
    {

    }





}