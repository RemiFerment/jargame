<?php

$prompt = "";
$winRate = 0;

function initializeGame(int $difficulty): array
{
    // difficulté 1..3 = nombre de serpents (jarres dangereuses)
    if ($difficulty < 1 || $difficulty > 3) {
        return [];
    }

    $snakes = [];
    while (count($snakes) < $difficulty) {
        $n = rand(1, 5);
        if (!in_array($n, $snakes, true)) {
            $snakes[] = $n;
        }
    }
    return $snakes;
}

while ($prompt !== 'exit') {
    $prompt = strtolower(trim(readline("Welcome to Jar Game 2! Please select an option (play, exit): ")));
    $winRate = 0;

    switch ($prompt) {
        case 'play':
            echo "Let's start! There are five jars in the next 3 rooms: [] [] [] [] []\n";
            echo "Some jars hide a snakes,others hide a key to enter to the next room.\n\n";

            $difficultyInput = trim(readline("Choose a difficulty (1 to 3): "));
            if ($difficultyInput === '' || !ctype_digit($difficultyInput)) {
                echo "Please enter a number (1 to 3).\n\n";
                break;
            }

            $difficulty = (int)$difficultyInput;
            if ($difficulty < 1 || $difficulty > 3) {
                echo "Difficulty must be between 1 and 3.\n\n";
                break;
            }

            while ($winRate < 3) {
                $snakeJars = initializeGame($difficulty);

                $choiceInput = trim(readline("Please select a jar between 1 and 5 : "));
                if ($choiceInput === '' || !ctype_digit($choiceInput)) {
                    echo "Invalid input! Please enter a number.\n\n";
                    continue;
                }

                $choice = (int)$choiceInput;
                if ($choice < 1 || $choice > 5) {
                    echo "Invalid input. Please enter a number between 1 and 5.\n\n";
                    continue;
                }

                if (in_array($choice, $snakeJars, true)) {
                    echo "Oh no! There is a snake in jar $choice!\n";
                    echo "Game Over.\n\n";
                    $winRate = 0;
                    continue;
                }

                $winRate++;
                $roomsLeft = 3 - $winRate;
                echo "Good job! You found a key. $roomsLeft room(s) left.\n\n";
            }

            echo "Congratulations! You won 3 times!\n\n";
            break;

        case 'exit':
            break;

        default:
            echo "Unknown option, please type play or exit.\n\n";
            break;
    }
}
