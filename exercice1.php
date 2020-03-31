
<?php 
session_start();
if (!isset($_SESSION['nombrepremiers']))
{
    $nombrepremier = [
        'inf' => [],
        'sup' => []
    ];
    $_SESSION['nombrepremiers'] = $nombrepremier;
}
include_once('fonction.php');
if (isset($_POST['submit']))
{
    $valeur= htmlentities($_POST['valeur']);
    if(!empty($valeur))
    {
        if (is_numeric($valeur))
        {
            if ($valeur ==! 0 && $valeur > 0)
            {
                $tab = nbrspremiers($valeur);

                $som = array_sum($tab);
                $nbrlmntstab = count($tab);
                $moyenne = floor($som/$nbrlmntstab);
                $tab_t = [
                    'inf' => [],
                    'sup' => []
                ];
            
                for ($i=0 ; $i < $nbrlmntstab; $i++)
                {
                    if ($tab[$i] < $moyenne)
                    {
                        $tab_t['inf'][] = $tab[$i];
                        $_SESSION['nombrepremiers']['inf'] = $tab_t['inf'];
                    }
                    else
                    {
                        array_push($tab_t['sup'],$tab[$i]);
                        $_SESSION['nombrepremiers']['sup'] = $tab_t['sup'];
                        $valide= "voici le resultat";
                    }
                }
            }
            else
            {
                $erreurs = "le nombre saisi doit etre positif";
            }
        }
        else
        {
            $erreur= "le nombre saisi doit etre un entier";
        }
    }
    else
    {
        $erreurs= "veillez remplir un nombre";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width", initial-scale=1.0>
    <link rel= "stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <fieldset>
        <legend>Entrer une valeur superieur a 10 000</legende>
        <form action = "" method = "">
            <label for="">Entrer un nombre</label>
            <input type="text" name="valeur">
            <input type="submit" name="submit" value="afficher">
        </form>
    </fieldset>
    <?php
    if (isset($erreurs))
    {
        echo "<p class='erreurs'>".$erreurs."</p>";
    }
    ?>
    <?php 
    if (isset($valide))
    {
        echo "<p class='valide'>".$valide."</p>";
    }
    ?>
    <div class="main">
        <div class="inf">
            <h1>
                Tableau Inferieur
            </h1>
            <?php 
            if (!empty($_SESSION['nombrepremiers']['inf']))
            {
                $tab_inf = $_SESSION['nombrepremiers']['inf'];
                if (isset($_GET['page']) && $_GET['page']>0)
                {
                    $page= intval($_GET['page']);
                }
                else
                {
                    $page=1;
                }
                echo resparpage($tab_inf,$page);
            }
            ?>
        </div>
        <div class="sup">
        <h1>Tableau Superieurs</h1>
        <?php
            if (!empty($_SESSION['nombrepremiers']['sup']))
            {
                $tab_sup = $_SESSION['nombrepremiers']['sup'];
                if (isset($_GET['page']) && $_GET['page']>0)
                {
                    $page = intval($_GET['page']);
                }
                else
                {
                    $page=1;
                }
                echo resparpage($tab_sup,$page);
            }
            ?>
            </div>
    </div>
</body>
</html>