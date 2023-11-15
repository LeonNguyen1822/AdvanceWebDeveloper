<?php
    class Monster {                     // start the Monster class
    protected $num_of_eyes;             // properties
    protected $colour;
    
    function __construct($num, $col){   // constructor
    $this->num_of_eyes = $num;          // initialise number of eyes
    $this->colour = $col;               // initialise colour
    }
    
    function describe () {
        $ans = "The " . $this->colour . " monster has <b style=\"color:orange\">" . $this->num_of_eyes . "</b> eyes."; 
        return $ans;
        }
    }
?>