## Palindrome

A palindrome is a word, phrase, or number that reads the same backward as forward. In other words, a palindrome is a string that remains unchanged when its character sequence is reversed. Examples include words like "radar," "level," "deified," sentences like "A man, a plan, a canal, Panama!" and numbers like "12321." Palindromes can be fascinating and enjoyable in various fields, from mathematics to linguistics.

## Requirements

Installing PHP on Your Computer:

Download PHP: Visit the official PHP website (https://www.php.net/downloads.php) and download the PHP version that suits your needs. Choose the version compatible with your operating system.

Install PHP:

For Windows: Run the installer you downloaded and follow the installation wizard's instructions.
For macOS: PHP is pre-installed on macOS. You can enable it in your Terminal.
For Linux: You can install PHP using your package manager. For example, on Ubuntu, you can use apt:
Terminal
```
  sudo apt update
  sudo apt install php
```
Verify Installation: Open your terminal or command prompt and run php -v to confirm that PHP is installed and see the installed version.

Start Writing PHP: You can now start writing PHP code in a text editor or integrated development environment (IDE). Save your PHP files with a .php extension and run them using a web server or the command line.

Running PHP with Docker:

Install Docker: If you don't have Docker installed, download and install it from the official Docker website (https://www.docker.com/get-started).

Create a PHP Dockerfile: Create a Dockerfile that specifies the PHP version and any additional configurations you need for your PHP environment. Here's an example Dockerfile for PHP 8:

Dockerfile
```
# Use an official PHP runtime as a parent image
FROM php:8.0-cli

# Set the working directory
WORKDIR /app

# Copy your PHP application into the container
COPY . /app

# Start your PHP application
CMD [ "php", "your-php-script.php" ]
```
Build the Docker Image: In the same directory as your Dockerfile, run the following command to build a Docker image:

```
    docker build -t my-php-app .
```
Run the Docker Container: Once the image is built, you can run a Docker container with PHP using the following command:

```
    docker run -it --rm my-php-app
```
This command will execute your PHP script inside the Docker container.

By following these steps, you can either install PHP directly on your computer or use Docker to create a PHP environment for your applications.

## installation

download the project to the folder you want
```
https://github.com/CerenTurker/palindrome.git
```

## 12X12 Kare Bulmaca Algoritma

1.  Initializing the Grid:

    Start by creating a 12x12 grid and mark all cells as empty (' ').

2.  Placing Black Squares (Blocks):

    Decide on the number of black squares you want on the grid (e.g., 20).
    Randomly select 20 cells on the grid and mark them as black squares. These cells represent the blocked or unavailable positions in the crossword.

3.  Placing Words on the Grid:

    - Create a list of words that you want to place on the grid. These words can be in Turkish or English and can vary in length.
    Iterate through the list of words to be placed on the grid.
    For each word:
    - Randomly select a starting cell on the grid.
    - Choose a direction for the word, either horizontal or vertical.
    - Ensure that the word can fit within the selected direction without overlapping or conflicting with existing words. Check that each letter of the word can be placed in its target cell without conflicts.
    - If there are no conflicts, successfully place the word on the grid by marking the respective cells with the word's letters.
    - Move on to the next word and repeat the process.
4.  Filling Empty Cells:
    - After placing all the words, some cells may remain empty (not part of any word). You can randomly fill these empty cells with letters or leave them as spaces. This step ensures that the crossword puzzle is solvable for users.
5.  Displaying the Crossword Grid:
    - Implement a function to display the generated crossword grid, allowing users to solve the puzzle.
The above steps describe the process of creating a 12x12 crossword grid. It involves placing black squares and words, ensuring there are no conflicts, and filling any remaining empty cells. The final step is to display the crossword puzzle for users to enjoy.

 ![Alt text](https://github.com/CerenTurker/palindrome/blob/main/algorithm.png)

 [This article was used. ](https://www.researchgate.net/publication/334491580_Cevrimici_Dinamik_Bir_Capraz_Bulmaca_Uretme_Algoritmasi_ve_Performansi_An_Online_Dynamic_Cross-Puzzle_Generation_Algorithm_and_Its_Performance)
