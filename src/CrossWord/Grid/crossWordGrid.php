<?php

namespace Operation\CrossWord\Grid;

class CrosswordGrid {
    private $grid;
    private $gridSize;

    public function __construct($size) {
        $this->gridSize = $size;
        $this->grid = array_fill(0, $size, array_fill(0, $size, ' '));
    }

    public function display() {
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
        $wordLength = strlen($word);
        $isHorizontal = (bool)rand(0, 1);

        if ($isHorizontal) {
            return $this->placeHorizontal($word, $wordLength);
        } else {
            return $this->placeVertical($word, $wordLength);
        }
    }

    public function canPlaceConnectedWord($word, $startX, $startY, $startChar) {
        $wordLength = strlen($word);

        if ($startX + $wordLength > $this->gridSize) {
            return false;
        }

        if ($this->grid[$startY][$startX] !== ' ' && $this->grid[$startY][$startX] !== $startChar) {
            return false;
        }

        for ($i = 0; $i < $wordLength; $i++) {
            $currentChar = $word[$i];
            if ($this->grid[$startY][$startX + $i] !== ' ' && $this->grid[$startY][$startX + $i] !== $currentChar) {
                return false;
            }
        }

        return true;
    }

    public function placeConnectedWord($word, $startX, $startY, $startChar) {
        $wordLength = strlen($word);

        for ($i = 0; $i < $wordLength; $i++) {
            $currentChar = $word[$i];
            $this->grid[$startY][$startX + $i] = $currentChar;
        }
    }

    private function placeHorizontal($word, $length) {
        $maxX = $this->gridSize - $length;
        $x = rand(0, $maxX);
        $y = rand(0, $this->gridSize - 1);
        
        $leftCell = ($x > 0) ? $this->grid[$y][$x - 1] : ' ';
        $rightCell = ($x + $length < $this->gridSize) ? $this->grid[$y][$x + $length] : ' ';
        
        if ($leftCell !== ' ' && $rightCell !== ' ') {
            return false; // Her iki tarafta da kelime var, çapraz bağlantı yok
        }
    
        for ($i = 0; $i < $length; $i++) {
            $currentChar = $word[$i];
            if ($this->grid[$y][$x + $i] !== ' ' && $this->grid[$y][$x + $i] !== $currentChar) {
                return false; // Çakışma tespit edildi, kelime eklenmiyor
            }
        }
    
        // Çapraz bağlantı yoksa ve çakışma yoksa kelime ekleniyor
        for ($i = 0; $i < $length; $i++) {
            $currentChar = $word[$i];
            if ($i == 0 && $leftCell !== ' ' && $leftCell !== $currentChar) {
                return false; // İlk harf başına eklemeye çalışıyor
            }
            if ($i == $length - 1 && $rightCell !== ' ' && $rightCell !== $currentChar) {
                return false; // Son harf sonuna eklemeye çalışıyor
            }
            $this->grid[$y][$x + $i] = $currentChar;
        }
        return true;
    }
    
    

    private function placeVertical($word, $length) {
        $maxY = $this->gridSize - $length;
        $x = rand(0, $this->gridSize - 1);
        $y = rand(0, $maxY);
        
        $topCell = ($y > 0) ? $this->grid[$y - 1][$x] : ' ';
        $bottomCell = ($y + $length < $this->gridSize) ? $this->grid[$y + $length][$x] : ' ';
        
        if ($topCell !== ' ' && $bottomCell !== ' ') {
            return false; // Her iki tarafta da kelime var, çapraz bağlantı yok
        }
    
        for ($i = 0; $i < $length; $i++) {
            $currentChar = $word[$i];
            if ($this->grid[$y + $i][$x] !== ' ' && $this->grid[$y + $i][$x] !== $currentChar) {
                return false; // Çakışma tespit edildi, kelime eklenmiyor
            }
        }
    
        // Çapraz bağlantı yoksa ve çakışma yoksa kelime ekleniyor
        for ($i = 0; $i < $length; $i++) {
            $currentChar = $word[$i];
            if ($i == 0 && $topCell !== ' ' && $topCell !== $currentChar) {
                return false; // İlk harf başına eklemeye çalışıyor
            }
            if ($i == $length - 1 && $bottomCell !== ' ' && $bottomCell !== $currentChar) {
                return false; // Son harf sonuna eklemeye çalışıyor
            }
            $this->grid[$y + $i][$x] = $currentChar;
        }
        return true;
    }

    public function fillEmptyCells() {
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
