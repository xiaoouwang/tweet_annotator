<?php
// définir quelques fonctions utilitaires

// somme -> calculer la somme

// display -> afficher une chaine de caracteres suivie de nouvelle ligne
function somme($an_array)
{
  $somme = 0;
  foreach ($an_array as $key => $value) {
    $somme += $value;
  }
  return $somme;
}

function display($element)
{
  echo $element . "<br />";
}


// question 1
// definir le tableau de prenoms
$prenoms = array("Xiaoou", "Chui", "Mariam", "Anna");
// afficher les prenoms
for ($numero = 0; $numero < count($prenoms); $numero++) {
  if ($numero % 2 == 0) {
    display($prenoms[$numero]);
  }
}
echo "<br /><br />";

// question 2

// affichage par ordre alphabetique
sort($prenoms);

foreach ($prenoms as $element) {
  display($element);
}

echo "<br /><br />";

// affichage par ordre d'indice decroissant

for ($numero = count($prenoms) - 1; $numero >= 0; $numero--) {
  display($prenoms[$numero]);
}

echo "<br /><br />";

// question 3

$prenom_age = array(
  "Xiaoou" => 26,
  "Xingyu" => 25,
  "Mariam" => 24,
  "Anna" => 23
);

$somme_age = somme($prenom_age);

echo "La somme des âges est " . $somme_age . "<br />";
echo 'La moyenne d\'âge est ' . $somme_age / count($prenom_age) . "<br />";

echo "<br /><br />";

// question 4

$noms = array("Wang", "Nakhle", "Liu", "Lei");
$n_etudiant = array("201354", "201355", "201523", "201677");
// creation du tableau id
for ($numero = 0; $numero < count($noms); $numero++) {
  $id[$noms[$numero]] = $n_etudiant[$numero];
}
// aﬃcher pour chaque eleve son nom, son prenom et son identiﬁant
for ($numero = 0; $numero < count($prenoms); $numero++) {
  echo $noms[$numero] . ", " . $prenoms[$numero] . ", " . $id[$noms[$numero]] . "<br />";
  $infos[$noms[$numero]] = array($prenoms[$numero], $id[$noms[$numero]]);
}

// question 1 Partie II tableaux html cote client

echo "<br /><br />";
echo "<h1>Tableau html côté client</h1>";

foreach ($id as $cle => $element) {
  echo "<strong>$cle</strong> " . "<i>$element</i>" . "<br />";
}
echo "<table border='2'>";
echo "<th>nom</th><th>id</th>";
foreach ($id as $cle => $element) {
  echo  "<tr><td><strong>$cle</strong></td><td><i>$element</i></td></tr>";
}
echo "</table>";
