<?php
    class Deck {
        public function Shuffle(){
            $this->cards = range(1, 52);
            shuffle($this->cards);
        }
        public function Reset(){
            $this->cards = range(1, 52);
        }
        public function Deal(){
            $card = $this->cards[0];
            unset($this->cards[0]);
            $this->cards = array_values($this->cards);
            return "<img src='card (".$card.").png' alt='Card'>";
        }
    }
    
    class Player {
        public $hand = array();
        public function __construct($name){
            $this->name = $name;
        }
        public function TakeCard($deck){
            //deals a card and places it in the players hand
            array_push($this->hand, $deck1->Deal());
        }
    }
    
    
    $deck1 = new Deck();
    new Player("John");
    new Player("Todd");
    new Player("Paul");
    new Player("Dillon");
    
    //for($i=0; $i<=51; $i++){
    //    echo "<img class='card' src='card (".$this->cards[$i].").png' alt='Card'>";
    //}
?>