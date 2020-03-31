<html>
    <body>
    <Marquee>Ecrire un programme qui permet de Créer un tableau Contenant les noms et les numéros des 12 mois de l'année en Français et en Anglais. Ensuite demander à l’utilisateur de choisir une langue puis vous affichez les mois sous forme de tableau HTML.
             Voir l’image si dessous si l’utilisateur choisit français
    </marquee>
        <fieldset>
            <form method="post" action="exercice2.php">
                <label for ="langue">choisis une langue</label>
                <select id="langue" name="langue">
                    <option value="">select</option>
                    <option value="1" name="fr">francais</option>
                    <option value="2" name="en">anglais</option>
                </select>
                <input type="submit" name="submit" value="choisir">
            </form>
        </fieldset>
<?php
if (isset($_POST["submit"]))
{
    session_start();    
    if (isset($_POST['langue']))
    {
        $a=$_POST['langue'];
        $tab[]=array ($francais=array(1=>'janvier',2=>'fevrier',3=>'mars',4=>'avril',5=>'mai',6=>'juin',7=>'juillet',8=>'aout',9=>'septembre',10=>'octobre',11=>'novembre',12=>'decembre'),
        $anglais=array(1=>'january',2=>'february',3=>'march',4=>'april',5=>'may',6=>'jun',7=>'julley',8=>'august',9=>'september',10=>'october',11=>'november',12=>'december'));
        if($a==1) 
        {
            echo "<table border='1'>";
            echo "<tr>";
            for($i=1; $i<=4; $i++)
             { 
                echo "<td>";
                    echo $i.' '.$francais[$i]." ";
                echo "</td>";
            }
            echo "</tr>";
            echo "<tr>";
            for($i=5; $i<=8; $i++)
             { 
                echo "<td>";
                    echo $i.' '.$francais[$i]." ";
                echo "</td>";
            }
            echo "</tr>";
            echo "<tr>";
            for($i=9; $i<=12; $i++)
             { 
                echo "<td>";
                    echo $i.' '.$francais[$i]." ";
                echo "</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
            }
        
        if($a==2)             
        {
            echo "<table border='1'>";
            echo "<tr>";
            for($i=1; $i<=4; $i++)
             { 
                echo "<td>";
                    echo $i.' '.$anglais[$i]." ";
                echo "</td>";
            }
            echo "</tr>";
            echo "<tr>";
            for($i=5; $i<=8; $i++)
             { 
                echo "<td>";
                    echo $i.' '.$anglais[$i]." ";
                echo "</td>";
            }
            echo "</tr>";
            echo "<tr>";
            for($i=9; $i<=12; $i++)
             { 
                echo "<td>";
                    echo $i.' '.$anglais[$i]." ";
                echo "</td>";
            }
            echo "</tr>";
        }
    echo "</table>";
        }
       
    else
    {
        echo "choisissez une langue";
    }

?>
    </body>
</html>