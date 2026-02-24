<?php
//5 jarres, un serpent, le joueur choisis une jarre, random pour l'attribution du serpent et la clé

$prompt = "";

function initializeGame(): int
{
    return rand(1, 5.0);
}

initializeGame();

// -----Game area-----
while ($prompt != 'exit') {
    $prompt = readline("Welcome to Jar Game ! Please select an option on the menu (play, exit) : ");
    switch ($prompt) {
        default:
        case 'play':
            $randomNumber = initializeGame();
            echo "Let's started ! There are five jars here : [] [] [] [] []\n";
            echo "All jar contains a key to go to the next level execpt one. One of them have a really venomous snake.\n";
            $prompt = (int)readline("To select a jar, please enter a number between 1 or 5 :");
            if ($prompt == $randomNumber) {
                echo "Oh no ! There is a snake in jar $randomNumber !\n";
                echo "Game Over.\n\n";
            } else {
                echo "Congratulation ! You win !\n\n";
            }
            break;
        case 'exit':
            return;
    }
}
