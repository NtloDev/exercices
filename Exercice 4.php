<?php
function correcteur_espace(string $texte)
{
    $correction_espace = preg_replace('#[ ]+#',' ' , $texte );
    $correction_apostrophe = preg_replace('#([ ]+\' |\'[ ]+)#' , '\'', $correction_espace);
    $correction_virgule = preg_replace('#([ ]+,)#',',' , $correction_apostrophe);
    $correction_point_virgule = preg_replace('#([ ]+;)#',';' , $correction_virgule);
    $correction_point = preg_replace('#([ ]+\.)#','.' , $correction_point_virgule);
    return $correction_point;
}
function bonPhrase($texte){
    if(preg_match('/^[A-Z]{1}.+[.!?]$/',$texte))
    {
        return true;
    }
    else
    {
        return false;
    }

}
function decoupe_texte_en_phrase($texte)
{
    $tabphrse= preg_split("#[.|!|?]{1,}#" ,$texte);
    foreach($tabphrse as $value)
    {
        if(preg_match('/[A-Z]/',$value))
        {
            $tab[]=$value;
        }
    }
    return ($tab);
    
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exercice 4</title>
</head>
<body>
    <form method="POST" action="">
    
    <textarea name="texte" placeholder="saisir un text"></textarea><br></br>
    <input type="submit" name="valider" value= "valider">
    </form>
    <?php

  if(isset($_POST['valider']))
  {
    if (isset($_POST['texte'])) 
    {
        if (!empty($_POST['texte']))
        {
            $texte=$_POST['texte'];
            
                decoupe_texte_en_phrase($texte);
                correcteur_espace($texte);
                if (bonPhrase($texte))
                {
                   echo $texte;
                }  
        }
        else
        {
            echo "saissie please";
        }
    }
}
          
?>
    
</body>
</html>