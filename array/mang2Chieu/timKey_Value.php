<?php
$superheroes = array(
    "spider-man" => array(
    "name" => "Peter␣Parker",
    "email" => "peterparker@mail.com"),
    "super-man" => array(
    "name" => "Clark␣Kent",
    "email" => "clarkkent@mail.com"),
    "iron-man" => array(
    "name" => "Tony␣Stark",
    "email" => "tonystark@mail.com")
    );

    foreach ($superheroes as $heroKey => $heroData) {
    echo "<b>Khóa nhân vật:</b> " . $heroKey . "<br>";

    foreach ($heroData as $key => $value) {
        echo "- " . $key . ": " . $value . "<br>";
    }
    echo "<br>";
    }
?>