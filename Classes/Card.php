<?php

class Card {
    private $state = "";
    private $name = "";
    private $type = "";
    private $game = null;

    //This just maps constants from the base Event.php class to
    //constants from the base Effect.php class.
    //Both of those classes can go from their own constants to specific classes which effect game state
    private $rules = array(array()); //[Event::SOME_CONSTANT][Effect::SOME_CONSTANT]

    function __construct($state, $name, $type, $game) {
        $this->state = $state;
        $this->name = $name;
        $this->type = $type;
        $this->game = $game;
    }

    public function handleEvent($game_event) {
        foreach($this->rules as $cause => $effect) {
            if ($game_event->cause == $cause) {
                //The game will turn the constant into an object and execute it
                $this->game->occurs($effect);
            }
        }
    }

    /*
     * gets the text that a human would read if this were a real card
     *
     * takes no arguments, but depends on the $rules array
     * to map Event objects to Effect objects
     */
    public function getCardRulesText() {
        $rules_text = "";
        foreach($this->rules as $cause => $effect) {
            $this_rule = $cause . ' ' . $effect;
        }
    }

    public function addCauseAndEffect($cause, $effect) {
    }
}
