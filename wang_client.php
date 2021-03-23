<!-- question 2 Partie II Tableaux html : cote client -->
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PROJET TAL-IL</title>
    <style>
        :root {
            background-color: #2b2b2b;
        }

        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
            margin: 0;
            padding: 0;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            text-align: center;
            border: 1px solid white;

        }

        tr:hover {
            height: 50px;
            background-color: #4b4b4b;
        }
    </style>
</head>

<body>
    <?php
    echo "<center><h1>Traitement Automatique des Langues</h1></center><br/><br/>";
    echo "<section><div>La mention TAL concerne la recherche et le développement dans le domaine du TAL et des industries de la langue. L'ingénierie linguistique fait appel à des méthodes et des savoirs multiples. Il s'agit de :
    1. Disposer des pré-requis en linguistique : maîtriser les manipulations débouchant sur des descriptions détaillées de faits de langue, connaître les bases des grands domaines des sciences du langage (phonétique et phonologie, morphologie, syntaxe et sémantique) ;
    2. Connaître les bases de la recherche et extraction d'information, de la constitution et de la gestion de corpus (écrits ou oraux) et de ressources, y compris multilingues : les corpus sont des mines d'information pour une description réaliste d'emplois d'une langue, les techniques de la recherche et de l'extraction d'information permettent de rapatrier les documents ou les parties de documents jugés pertinents pour un besoin particulier ;
    3. Exprimer les règles et les régularités à l'œuvre, par le biais des grammaires formelles et des traitements quantitatifs pour savoir passer d'une description linguistique à une représentation plus précise permettant son utilisation par des logiciels.</div><br/>";
    echo "<div>Pour plus d'informations, consultez la <a href='https://www.parisnanterre.fr/master-sciences-humaines-et-sociales-br-mention-traitement-automatique-des-langues-br-parcours-ingenierie-linguistique-418292.kjsp'>formation TAL</a> à l'Université Paris Nanterre.</div></section><br/><br/><hr/>";
    $infos = array(
        "Liu" => array("Chui", "201355"),
        "Wang" => array("Xiaoou", "201677"),
        "Lei" => array("Anna", "201354"),
        "Nakhle" => array("Mariam", "201523")
    );
    echo "<section><table><th>nom</th><th>prénom</th><th>id</th>";
    ksort($infos);
    foreach ($infos as $cle => $element) {
        echo "<tr><td><strong>$cle</strong></td><td><i>$element[0]</i></td><td>$element[1]</td></tr>";
    }
    echo "</table></section>";
    ?>
</body>

</html>