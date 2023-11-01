<?php
namespace Palindrome;
class PalindromeFinder {
    private $paragraph;
    private $palindromes = [];

    public function __construct($paragraph) {
        $this->paragraph = $paragraph;
    }

    public function findPalindromes() {
        $words = preg_split('/\s+/', $this->paragraph);

        foreach ($words as $word) {
            if ($this->isPalindrome($word)) {
                $this->palindromes[] = $word;
            }
        }

        return $this->palindromes;
    }

    private function isPalindrome($word) {
        $word = preg_replace('/[.,!? ]/', '', $word);
        $word = mb_strtolower($word);
        $reversedWord = strrev($word);
        return $word === $reversedWord;
    }
}

?>
