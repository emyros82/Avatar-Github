<?php
if (!empty($_POST)) {
    $nbColors = ($_POST['color']);
    // print($nbColors);
    $size = ($_POST['size']);
    // print($size); 
} else {
    $nbColors = 2;
    $size = 4;
}


function createAvatar($taille, $n)
{
    $colors = [
        "white",
        "black",
        "orange",
        "pink",
        "red",
        "green",
        "purple",
        "yellow",
        "grey",
        "brown",
        "blue",
    ];
    // $randomValues = array_rand(array_flip($colors), $n);
    $avatars = [];
    $selectedColors = array_rand(array_flip($colors), $n);;

    for ($i = 0; $i <  $taille; $i++) {
        for ($j = 0; $j <= $taille; $j++) {
            $box = ($taille - 1) - $i;
            $color = $selectedColors[rand(0, count($selectedColors) - 1)];
            $avatars[$i][$j] = $color;
            $avatars[$box][$j] = $color;
        }
    }
    return $avatars;
}
// var_dump($avatars);


$avatar = createAvatar($size, $nbColors);
// var_dump($avatar);

function drowAvatar($avatars)
{
    $svg = '<svg width="300" height="300" viewBox="0 0 ' . count($avatars) . ' ' . count($avatars) . '">';
    for ($i = 0; $i < count($avatars); $i++) {
        for ($j = 0; $j < count($avatars); $j++) {
            $svg .= '<rect x="' . $i . '" y="' . $j . '" width="1" height="1" fill="' .  $avatars[$i][$j] . '"/>';

            //         return '<svg width="300" height="300" viewBox="0 0"' . $taille . ' ' . $taille . '">
            // <rect x="' . $i . '" y="' . $j . '" width="20" height="20" fill="' .  $avatars[$i][$j] . '"/>';
        }
    }
    $svg .= "</svg>";
    return $svg;
}

$svg = drowAvatar($avatar);

require('index.phtml');
