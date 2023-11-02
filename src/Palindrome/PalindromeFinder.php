<?php
namespace Operation\Palindrome;
class PalindromeFinder {
    private $paragraph;
    private $palindromes = [];

    public function __construct($paragraph) {
        $this->paragraph = $paragraph;
    }

    public function findPalindromes() {
        // Split the paragraph into words
        $words = preg_split('/\s+/', $this->paragraph);

        // Iterate through each word
        foreach ($words as $word) {
            if ($this->isPalindrome($word)) {
                // If the word is a palindrome, add it to the list of palindromes
                $this->palindromes[] = $word;
            }
        }
        // Return the found palindromes
        return $this->palindromes;
    }

    private function isPalindrome($word) {
        // Clean the word: Remove punctuation and spaces
        $word = preg_replace('/[.,!? ]/', '', $word);
        // Convert the word to lowercase
        $word = mb_strtolower($word);
        // Get the reverse of the word
        $reversedWord = strrev($word);
        // Check if the reversed word is the same as the original word
        return $word === $reversedWord;
    }
}

?>
