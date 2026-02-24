<?php
//5 jarres, un serpent, le joueur choisis une jarre, random pour l'attribution du serpent et la clé

$prompt = "";
$winRate = 0;

function initializeGame(): int
{
    return rand(1, 5);
}

initializeGame();

// -----Game area-----
while ($prompt != 'exit') {
    $prompt = readline("Welcome to Jar Game 2 ! Please select an option on the menu (play, exit) : ");

    $winRate = 0;

    switch (strtolower(trim($prompt))) {

        case 'play':
            echo "Let's started ! There are five jars here on the 3 next room : [] [] [] [] []\n";
            echo "All jars contains a key to go to the next room except one. One of them has a really venomous snake.\n";
            while ($winRate < 3) {
                $prompt = trim(readline("You are in front jars. To select a jar, please enter a number between 1 and 5 :"));
                $randomNumber = initializeGame();

                if ($prompt == "" || !ctype_digit($prompt)) {
                    echo "Invalid input ! Please enter a number.\n\n";
                    continue;
                }

                $choice = (int)$prompt;

                if ($choice < 1 || $choice > 5) {
                    echo "\nInvalid input. Please make sure to enter a number between 1 and 5.\n\n";
                    continue;
                }

                if ($choice == $randomNumber) {
                    echo "Oh no ! There is a snake in jar $randomNumber !\n";
                    echo "Game Over.\n\n";
                    $winRate = 0;
                    continue;
                }
                $winRate++;
                $roomLeft = 3 - $winRate;
                echo "Good Job ! You can enter to the new room ! $roomLeft room left.\n\n";
            }
            if ($winRate >= 3) {
                echo "Congratulation ! You won 3 times!\n\n";
            }
            break;

        case 'exit':
            break;
        default:
            echo "Unknown option, please enter play or exit.\n";
            break;
    }
}
