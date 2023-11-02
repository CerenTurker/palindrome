<?php
use Operation\Palindrome\PalindromeFinder as PW;
use Operation\CrossWord\CrossWordGenerator as CrosswordGenerator;

require_once __DIR__ ."/vendor/autoload.php";

$paragraph = "Racecar level radar gibi palindrom kelimeler hem baştan hem de sondan okunduğunda aynı şekilde okunur. Bu nedenle palindromları anlamak eğlencelidir. Bir cümlenin içinde palindrom kelimeler bulmak, dilimizin zenginliğini keşfetmek için harika bir yoldur. Madam kayak civic rotator ve reviver gibi kelimelerle dolu bir paragraf palindromları keşfetmek için mükemmel bir örnektir.";
$palindromeFinder = new PW($paragraph);
$palindromes = $palindromeFinder->findPalindromes();


if (empty($palindromes)) {
    echo "Paragraf içinde palindrom kelime bulunamadı.";
} else {
    echo "Paragraf içindeki palindrom kelimeler: " . implode(', ', $palindromes);
}

print_r(' <br/> <br/>Cross Word <br /> <br />');
$gridSize = 12;
$words = ["kelime", "bulmaca", "izgara", "php", "paragraf", "palindrom","ceren","program"];
$crosswordGenerator = new CrosswordGenerator($gridSize, $words);
$crosswordGenerator->generateCrossword();

?>