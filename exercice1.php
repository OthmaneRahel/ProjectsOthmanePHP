<?php
    // 1 et 2 :
        $etudiant = [
            "nom"=>"RAHEL","prenom"=>"othmane","matricule"=>153445 , "note" => 16.5
        ];
        foreach($etudiant as $k =>$v){
            echo $k.": ".$v." "."<br/>";
        }
    echo "<br/>";
    // 3 :
        $produits = [
            "nom"=>"produit1","prix1"=>249,
            "nom2"=>"produit2","prix2"=>349,
            "nom3"=>"produit3","prix3"=>449
        ];
        foreach($produits as $k =>$v){
            echo $k.": ".$v." "."<br/>";
        }
    echo "<br/>";
    // 4 :
        $scores = [
            "score1"=>500,
            "score2"=>1500,
            "score3"=>2500,
            "score4"=>3500,
            "score5"=>4500,
        ];
        $somme = 0;
        foreach($scores as $k => $v){
            $somme += $v; 
        }
        $moyenne = $somme / 5;
        echo "La moyenne des scores = ".$moyenne;
        echo "<br/>";
    // 5 :
        $pays = [
            "maroc"=> 38081173,
            "espagne"=> 46264011,
            "algerie"=> 47056366,
        ];
        echo "<br/>";
        rsort($pays);
        foreach($pays as $k => $v){
            echo $k.": ".$v." "."<br/>";
        }
        echo "<br/>";
    // 6 et 7 :
        $nom =$_POST["nom"];
        $age = $_POST["age"];
        if (is_int($age) && $age > 0) {
            echo "Bienvenue , $nom , Vous avez $age ans !";
        }else{
            echo "Erreur de votre Age est n'est pas de type entier";
        }
    // 8 :
        $couleur = $_POST["couleur"];
        echo "Votre couleur preferee est : $couleur .";
        echo "<br/>";
    //  9 :
        $nombre1 = $_GET["nombre1"];
        $nombre2 = $_GET["nombre2"];
        echo "La somme des nombre saisie = ".$nombre1+$nombre2;
        echo "<br/>";
    // 10 :
        $type_compte = $_POST["type_compte"];
        if ($type_compte == "Administrateur") {
            echo "Bienvenue , $type_compte !";
        }else{
            echo "Bienvenue , $type_compte !";
        }
?>