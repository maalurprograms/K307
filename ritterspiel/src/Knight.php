<?php

/**
 * Created by PhpStorm.
 * User: bmahaj
 * Date: 07.03.2016
 * Time: 10:30
 */
class Knight
{

    private $name;
    private $strentgh;
    private $live;

    /**
     * Knight constructor.
     */
    public function __construct($name, $strentgh)
    {
        $this->name = $name;
        $this->strentgh = $strentgh;
    }

    public function attack($defendingKnight){
        $defendingKnight->setLive($defendingKnight->getLive() - $this->strentgh);
    }

    public function isAlive(){
        if($this->live > 0){
            return true;
        }else{
            return false;
        }
    }

    public function __toString()
    {
        return "Name: ".$this->name." Stärke: ".$this->strentgh." ";
    }

    public function getLive()
    {
        return $this->live;
    }

    public function setLive($live)
    {
        $this->live = $live;
    }


}