<?php
/**
 * trim, permet de retirer les espaces
 */
    $selection=trim($_POST["selection"]);
    $numeros=explode(" ", $selection);
    $tirage=array();
        for($i=0;$i<6;$i++){
            do{
                $tr=mt_rand(1,49);
            }
            while(in_array($tr,$tirage));
            $tirage[]=$tr;
        }
        $bon=0;
        for($i=0;$i<6;$i++){
            if (in_array($tirage[$i],$numeros));
            $bon++;
        }

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Jeu de loterie</title>
    <meta charset="UTF-8">
    <!--
     bien mettre cette ligne pour css
     --->
    <link rel="stylesheet" href="style.css?t=<?php echo time()?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
<h1>Tirage</h1>
<h2>Numéro joués</h2>
<?php for ($i=0;$i<6;$i++){ ?>
<div class="numeros"><?php echo $numeros[$i]?></div>

<?php
}
?>

<h2>Résultat du tirage</h2>
<?php for ($i=0;$i<6;$i++){ ?>
    <div class="numeros" id="<?php echo $i?>"><?php echo $tirage[$i]?></div>

    <?php
}
?>
<h2 id="resultat">Vous avez eu <span><?php echo $bon?></span>  bon(s) numéro (s)</h2>

<script>
    document.body.onload=function (){
        num="<?php echo $selection?>".split();
        res="<?php echo implode(" ",$tirage) ?>".split(" ");
        i=0;
        j=0;
        tirer();
    }
    function tirer(){
        t=setTimeout("tirer()",40);
        if (j<res[i]){
            j++;
            document.getElementById(i).innerHTML=j;
        }   /***** si on a atteint le nombre de la case tirer, on passe à la case suivante****/
        else {
            if (num.indexOf(res[i])!=-1){
                document.getElementById(i).style.borderBlockEndColor="#EA2";
                document.getElementById(i).style.backgroundColor="#EA2";
                document.getElementById(i).style.color="#000";
            }
            j=0;
            if (i<5)
                i++;
            else { /**** c'est qu'on a fini le tour des cases, donc on arrete le temporisateur **/
                clearTimeout(t);
                /***** pour afficher le résultat ******/
                document.getElementById("resultat").style.visibility="visible";
            }
        }
    }
</script>


</body>
</html>
