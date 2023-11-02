<?php
namespace Operation\CrossWord;

use Operation\CrossWord\Grid\CrosswordGrid as CG;

require_once  $_SERVER['DOCUMENT_ROOT'] . "/vendor/autoload.php";

class CrossWordGenerator {
    private $grid;
    private $words;

    public function __construct($size, $words) {
        // Create a new CrosswordGrid with the specified size.
        $this->grid = new CG($size);
        // Store the list of words that will be placed on the crossword grid.
        $this->words = $words;
    }

    public function generateCrossword() {
        // Iterate through the list of words to place them on the crossword grid.
        foreach ($this->words as $word) {
            $placed = false;
            // Continue trying to place the word until it is successfully placed without conflicts.
            while (!$placed) {
                $placed = $this->grid->placeWord($word);
            }
        }
        // Fill any remaining empty cells in the crossword grid.
        $this->grid->fillEmptyCells();
        // Display the generated crossword grid.
        $this->grid->display();
    }
}

?>