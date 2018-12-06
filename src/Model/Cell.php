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

    protected $posX;
    protected $posY;

    const DEAD = false;

    const ALIVE = true;

    public function __construct($isAlive = false,$posX=0,$posY=0)
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
        $count = $neighbours->count();

        $options =
            [
                0 => self::DEAD,
                1 => self::DEAD,
                2 => $this->isAlive(),
                3 => self::ALIVE,
                4 => self::DEAD,
                5 => self::DEAD,
                6 => self::DEAD,
                7 => self::DEAD,
                8 => self::DEAD
            ];


        $this->isAlive = $options[$count];

    }





}