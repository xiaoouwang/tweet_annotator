<?php

$prenoms = array("Xiaoou", "Chui", "Mariam", "Anna");
sort($prenoms);

echo'<label for="cars">Choose a car:</label>

<select name="cars" id="cars">
  <option value="volvo">Volvo</option>
  <option value="saab">Saab</option>
  <option value="mercedes">Mercedes</option>
  <option value="audi">Audi</option>
</select>';

$template = '$who likes $what';

$vars = array(
  '$who' => 'tim',
  '$what' => 'kung pao',
);

$person = "wang";
// que des guillemets doubles
echo "Hello $person";

echo strtr($template, $vars);
$coordonnees = array (
    'prenom' => 'François',
    'nom' => 'Dupont',
    'adresse' => '3 Rue du Paradis',
    'ville' => 'Marseille');

echo '<pre>';
print_r($coordonnees);
echo '</pre>';
?>
