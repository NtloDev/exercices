<html>
    <head>
        <meta charset="utf-8" >
        <title>exercice 3</title>
    </head>
    <body>
        <?php 
            function verif($val , $m , $M)
            {
                for ($i=0 ; $i<= taille_chaine($val) ; $i++)
                {
                    if (isset($val[$i]))
                    {
                        if ($val[$i]==$M || $val[$i]==$m)
                        {
                            return true;
                        }
                    }
                }
            }
            function is_lower($carac)
                {  // fonction pour voire si c un lettre minucule
                    return ($carac >='a' && $carac<='z');
                }
            function is_upper($carac)
                { // fonction pour voire si c un lettre majuscule
                    return ($carac >='A' && $carac<='Z');
                }
            function taille_chaine($chaine)
            {  // fonction qui donne la taile d'une chaine
                $taill=0;
                for ($i=0;isset($chaine[$i]); $i++) 
                { 
                    $taill ++;
                }
                return $taill;
            }

            function is_Valide($chaine)
            {  //  founction pour la valider u mots s'il contien que des lattre alphabetic
                for ($i=0; $i < taille_chaine($chaine); $i++) 
                { 
                    if ( (!is_lower($chaine[$i])) && (!is_upper($chaine[$i])) ) 
                    {
                        return false;
                    }
                }
                return true;
            }
    ?>
            <fieldset>
                <form method="post" action="">
                    <label for="n">Entrer le nombre de mots a saisir </label>
                    <input type="number" name="number" id="number" /><br />
                    <input type="submit" name="valider" value="Valider" />
                </form>
            </fieldset>
            <?php 
            if (isset($_POST['valider']))
            {
                for ($i=1 ;$i<=$_POST['number'] ; $i++)
                {
                    $tabinput[]= '<input type="text" name="mot'.$i.'">';           
                }
            }
            ?>
            <?php 
                if (!empty($tabinput))
                { ?>
                    <fieldset>
                        <form action="" method="post">
                        <?php
                            foreach ($tabinput as $key => $input)
                            {
                                $key= $key+1;
                                $val= $input;
                                ?>
                                    <p>
                                        <label for="">
                                            Mot n : <?php echo $key ?>
                                        </label><br>
                                        <?php echo $val ?>
                                    </p><br>
                                <?php                        
                            }
                        ?>
                    <input type="submit" value="resultat">
                    </form>
                </fieldset>
            <?php
        }
    ?>
            <?php           
                if (!empty($_POST['mot1']))
                {
                    $i=1;
                    while (isset($_POST['mot'.$i]))
                    {
                        $val= $_POST['mot'.$i];
                        if(strlen($val)<=20)
                        {
                            if (!(is_valide($val)))
                            {
                                $err= '<span>(le mot ne doit pas avoir de chiffre)</span><br>';
                                $tabinput[]= $err.'<input value="'.$val.'" type="text" name= "mot'.$i.'">';
                            }
                            else
                            {              
                                if (empty($err))
                                { 
                                    $tabinput[]= '<input value="'.$val.'" type="text" name= "mot'.$i.'">';
                                    foreach($tabinput as $w)
                                    {       
                                        if (verif($val, "m" , "M"))
                                        {
                                            echo $val;
                                            echo " ";
                                            break;
                                        }
                                    }
                                }
                                
                            }
                            
                        }
                        else
                        {
                            $err= '<span>(le mot doit pas depasser 20 caracteres)</span><br>';
                            $tabinput[]= $err.'<input value="'.$val.'" type="text" name= "mot'.$i.'">';
                        }
                        $i++; 
                    }
                    
                ?>
                    <p> <?php echo "Les mots ci dessus contiennent la lettre m " ?></p>
                <fieldset>
                        <form action="" method="post">
                        <?php
                            foreach ($tabinput as $key => $input)
                            {
                                $key= $key+1;
                                $val= $input;
                                ?>
                                    <p>
                                        <label for="">
                                            Mot n : <?php echo $key ?>
                                        </label><br>
                                        <?php echo $val ?>
                                    </p><br>
                                <?php
                                    
                            }
                    ?>
                    <input type="submit" value="resultat" name="resultat">
                    </form>
                </fieldset>
                <?php 
                    
                ?>
                 <?php
                }
              ?>
    </body>
</html>