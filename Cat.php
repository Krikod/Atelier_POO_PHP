<?php

namespace Animals;

class Cat
{
    const FATIGUE_MAX = 100;
    const FATIGUE_INCR = 10;

    /**
     * Le nom du chat (variable de classe, ou attribut)
     * @var String
     */
    private $name;

    /**
     * Le collier du chat
     * @var Collar
     */
    private $collar;

    /**
     * La couleur du chat
     * @var String
     */
    private $color;

    /**
     * Niveau de fatigue du chat (de 0 à 100).
     * @var Integer
     */
    private $fatigue = 0;

    /**
    * Image du chat.
    * @var String
    */
    private $image;

    /**
     * @return String
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param String
     * @return Cat
     */
    public function setImage($image) : Cat // Sur PHP 7, c'est du typage. setImage ne retourne qu'un élément de type Cat. On peut typer String, Integer, etc.
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return String
     */
    public function getName(): String
    {
        return $this->name;
    }

    /**
     * @param String $name
     * @return Cat
     */
    public function setName(String $name): Cat // Typé 2 fois, pas les mêmes éléments. Un setter est un "mutateur".
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return Collar
     */
    public function getCollar(): Collar
    {
        return $this->collar;
    }

    /**
     * @param Collar $collar
     * @return Cat
     */
    public function setCollar(Collar $collar): Cat
    {
        $this->collar = $collar;
        return $this;
    }

    /**
     * @return String
     */
    public function getColor(): String
    {
        return $this->color;
    }

    /**
     * @param String $color
     * @return Cat
     */
    public function setColor(String $color): Cat
    {
        $this->color = $color;
        return $this;
    }

    /**
     * @return int
     */
    public function getFatigue(): int
    {
        return $this->fatigue;
    }

    /**
     * @param int $fatigue
     * @return Cat
     */
    public function setFatigue(int $fatigue): Cat
    {
        if ($fatigue < self::FATIGUE_MAX){ // self:: const déclarée DANS cette classe. Si dans classe Collar, collar::NOM_CONSTANTE
            $this->fatigue = $fatigue;
            return $this;
        }
        else{
            echo "error";
        }
    } // VOIR A PARTIR D'ICI !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!


    

    /**
     * Indique si le chat est fatigué
     * @return bool
     */
    public function isTired() : bool
    {
        $result = false;
        if ($this->fatigue >= self::FATIGUE_MAX) {
            $result = true;
        }
        return $result;
    }

    /**
     * Pour que note chat soit en pleine forme !
     */
    public function rest()
    {
        $this->fatigue = 0;
    }

    /**
     * Le chat marche et surtout se dépense.
     */
    public function walk()
    {
        if ($this->getFatigue() < self::FATIGUE_MAX) {
            $this->setFatigue($this->getFatigue() + self::FATIGUE_INCR);
        }
    }

    /**
     * Cat constructor.
     * @param $color
     * @param Collar|null $collar
     */
    public function __construct($name, $color, Collar $collar = null)
    {
        $this->name = $name;
        $this->color = $color;
        if ($collar !== null) {
            $this->collar = $collar;
        }
    }

    /**
     * @return string
     */
    public function __toString()
    {
        $str = '<img src="'.$this->getImage().'" height="100px" /> : Je suis un "'.get_class($this).'", je m\'appelle <strong>'.$this->getName().'</strong>, suis de couleur '.$this->getColor().' et mon niveau de fatigue est à '.$this->getFatigue();
        if ($this->collar !== null) {
            $str .= '<br />'.$this->collar;
        } else {
            $str .= '<br />Je n\'ai pas de collier.';
        }
        $str .= '<br />';
        return $str;
    }
}
