<?php
namespace Operation\CrossWord\Grid;

class CrosswordGrid {
    private $grid;
    private $gridSize;

    public function __construct($size) {
        // Constructor: Initializes the crossword grid with the specified size.
        $this->gridSize = $size;
        $this->grid = array_fill(0, $size, array_fill(0, $size, ' '));
    }

    public function display() {
        // Display the crossword grid as an HTML table.
        echo "<table>";
        for ($i = 0; $i < $this->gridSize; $i++) {
            echo "<tr style='border: 1px solid black; width: 20px;'>";
            for ($j = 0; $j < $this->gridSize; $j++) {
                echo "<td style='border: 1px solid black; width: 20px;'>" . $this->grid[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    }

    public function placeWord($word) {
        // Place a word on the crossword grid, either horizontally or vertically.
        $wordLength = strlen($word);
        $isHorizontal = (bool)rand(0, 1);

        if ($isHorizontal) {
            return $this->placeHorizontal($word, $wordLength);
        } else {
            return $this->placeVertical($word, $wordLength);
        }
    }

    private function placeHorizontal($word, $length) {
        // Place a word horizontally on the grid.
        $maxX = $this->gridSize - $length;
        $x = rand(0, $maxX);
        $y = rand(0, $this->gridSize - 1);
        
        // Check the cells to the left and right for word connectivity.
        $leftCell = ($x > 0) ? $this->grid[$y][$x - 1] : ' ';
        $rightCell = ($x + $length < $this->gridSize) ? $this->grid[$y][$x + $length] : ' ';
        
        // Ensure there's no word on both sides, meaning no cross-connection.
        if ($leftCell !== ' ' && $rightCell !== ' ') {
            return false; // No connection on both sides
        }

        // Check for collisions and add the word if no issues are found.
        for ($i = 0; $i < $length; $i++) {
            $currentChar = $word[$i];
            if ($this->grid[$y][$x + $i] !== ' ' && $this->grid[$y][$x + $i] !== $currentChar) {
                return false; // Collision detected, don't add the word
            }
        }

        // If no cross-connection and no collisions, add the word.
        for ($i = 0; $i < $length; $i++) {
            $currentChar = $word[$i];
            if ($i == 0 && $leftCell !== ' ' && $leftCell !== $currentChar) {
                return false; // Trying to add at the beginning
            }
            if ($i == $length - 1 && $rightCell !== ' ' && $rightCell !== $currentChar) {
                return false; // Trying to add at the end
            }
            $this->grid[$y][$x + $i] = $currentChar;
        }
        return true;
    }

    private function placeVertical($word, $length) {
        // Place a word vertically on the grid.
        $maxY = $this->gridSize - $length;
        $x = rand(0, $this->gridSize - 1);
        $y = rand(0, $maxY);
        
        // Check the cells above and below for word connectivity.
        $topCell = ($y > 0) ? $this->grid[$y - 1][$x] : ' ';
        $bottomCell = ($y + $length < $this->gridSize) ? $this->grid[$y + $length][$x] : ' ';
        
        // Ensure there's no word on both sides, meaning no cross-connection.
        if ($topCell !== ' ' && $bottomCell !== ' ') {
            return false; // No connection on both sides
        }

        // Check for collisions and add the word if no issues are found.
        for ($i = 0; $i < $length; $i++) {
            $currentChar = $word[$i];
            if ($this->grid[$y + $i][$x] !== ' ' && $this->grid[$y + $i][$x] !== $currentChar) {
                return false; // Collision detected, don't add the word
            }
        }

        // If no cross-connection and no collisions, add the word.
        for ($i = 0; $i < $length; $i++) {
            $currentChar = $word[$i];
            if ($i == 0 && $topCell !== ' ' && $topCell !== $currentChar) {
                return false; // Trying to add at the beginning
            }
            if ($i == $length - 1 && $bottomCell !== ' ' && $bottomCell !== $currentChar) {
                return false; // Trying to add at the end
            }
            $this->grid[$y + $i][$x] = $currentChar;
        }
        return true;
    }

    public function fillEmptyCells() {
        // Fill empty cells with HTML div elements displaying black squares.
        for ($i = 0; $i < $this->gridSize; $i++) {
            for ($j = 0; $j < $this->gridSize; $j++) {
                if ($this->grid[$i][$j] === ' ') {
                    $this->grid[$i][$j] = " <div style='background-color:black; width: 20px; height:20px'></div>";
                }
            }
        }
    }
}
?>