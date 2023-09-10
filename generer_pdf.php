<?php 
    #ETAPE 1: Commencez par télécharger la bibliothèque TCPDF à partir de son site officiel (https://tcpdf.org/) et extrayez le fichier dans votre projet PHP.
 
    #ETAPE NB: Regler les problemes d'autorisations 
        #chmod 644 /opt/lampp/htdocs/PROJET_PDF_PHP/TCPDF-main/tcpdf.php
        #chmod 755 /opt/lampp/htdocs/PROJET_PDF_PHP/TCPDF-main/
        #chmod 755 /opt/lampp/htdocs/PROJET_PDF_PHP/TCPDF-main
        #chmod 644 /opt/lampp/htdocs/PROJET_PDF_PHP/TCPDF-main/include/tcpdf_font_data.php
        #chmod 755 /opt/lampp/htdocs/PROJET_PDF_PHP/TCPDF-main/fonts/
        #chmod 755 /opt/lampp/htdocs/PROJET_PDF_PHP/
        #chmod 777 /opt/lampp/htdocs/PROJET_PDF_PHP
        #chmod 666 /opt/lampp/htdocs/PROJET_PDF_PHP/releve.pdf

        //Pour dossier parent || lecture et execution
            #chmod 755 /chemin/vers/le/dossier/parent
        //Pour fichier || lecture seul
            #chmod 644 /chemin/vers/le/fichier
        //chmod 755 /opt/lampp/htdocs/PROJET_PDF_PHP/TCPDF-main/fonts/

    #ETAPE 2: Inclure le fichier tcpdf.php dans mon fichier

    require_once("TCPDF-main/tcpdf.php");

    #ETAPE 3: Creer l'objet TCPDF et  definir
    $pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');
    $pdf->SetCreator('Romaric AKODJENOU');
    $pdf->SetAuthor('Romaric AKODJENOU');
    $pdf->SetTitle('Relevé');
    $pdf->SetSubject("Les relevés d'approvitionnement et de sortie de stock");
    $pdf->SetKeywords('STOCK');

    #ETAPE 4: Ajouter une page au document
    $pdf->AddPage();

    #ETAPE 5: Ajouter du contenu
    $pdf->SetFont('helvetica', '', 12);
    $pdf->Cell(0, 10, "RELEVE D'ENTREE, DE SORTIE DE STOCKS", 0, 1, "C"); //positionnemment de la prochaine cellule 

    #ETAPE 6:  Definir les proprietes couleur , police, 
    $pdf->SetFillColor(255, 255, 255);  // Couleur de remplissage des cellules (blanc ici)
    $pdf->SetTextColor(0, 0, 0);  // Couleur du texte (noir ici)
    $pdf->SetFont('helvetica', 'B', 12);  // Police et taille du texte (helvetica, gras, 12 points)

    #ETAPE 7:  Creer les cellules
    $pdf->SetXY(5,20); //Definir la position des cellules | ordonee | abscise |
    $pdf->Cell(40, 10, "DATE", 1, 1, "C"); //positionnemment de la prochaine cellule | longueur | largeur | Valeur | Border |       | Centrer |
    
    $pdf->SetXY(45,20);
    $pdf->Cell(40, 10, "REFERENCE", 1, 1, "C"); //positionnemment de la prochaine cellule 

    $pdf->SetXY(85,20);
    $pdf->Cell(40, 10, "PRODUIT", 1, 1, "C"); //positionnemment de la prochaine cellule                            

    $pdf->SetXY(125,20);
    $pdf->Cell(40, 10, "ENTREE", 1, 1, "C"); //positionnemment de la prochaine cellule 

    $pdf->SetXY(165,20);
    $pdf->Cell(40, 10, "SORTIE", 1, 1, "C"); //positionnemment de la prochaine cellule 

    
    #ETAPE CLEF: Aller a la ligne
    $pdf->Ln();

    #ETAPE 7:  Creer les cellules
    $decaler  = 30;
    for ($i=0; $i < 20; $i++) { 
   
        $pdf->SetXY(5,$decaler); //Definir la position des cellules
        $pdf->Cell(40, 10, "2023-05-25", 1, 1, "C"); //positionnemment de la prochaine cellule 
        
        $pdf->SetXY(45,$decaler);
        $pdf->Cell(40, 10, "AB-RIZ-002", 1, 1, "C"); //positionnemment de la prochaine cellule 

        $pdf->SetXY(85,$decaler);
        $pdf->Cell(40, 10, "RIZ", 1, 1, "C"); //positionnemment de la prochaine cellule 

        $pdf->SetXY(125,$decaler);
        $pdf->Cell(40, 10, "200 Kg", 1, 1, "C"); //positionnemment de la prochaine cellule 

        $pdf->SetXY(165,$decaler);
        $pdf->Cell(40, 10, "10 Kg", 1, 1, "C"); //positionnemment de la prochaine cellule 

        $pdf->Ln();

        $decaler+=10;

    }
    
    #ETAPE CLEF: Aller a la ligne
    $pdf->Ln();

    


    #*************************************************************************************************************************#
                                                        #GENERER DES GRAPHES#

    
    /*                                                    #ETAPE 4: Ajouter une page au document
    $pdf->AddPage();

    #ETAPE 5: Creation du graphe
    // Définir les données du graphique
    $data = array(10, 20, 15, 25, 30, 35);

    // Définir les dimensions du graphique
    $width = 100;  // Largeur du graphique
    $height = 50;  // Hauteur du graphique

    // Calculer l'échelle pour les valeurs en Y
    $maxValue = max($data);
    $scale = $height / $maxValue;

    // Dessiner l'axe des ordonnées
    $pdf->Line(50, 30, 50, 80);  // Ligne verticale
    $pdf->Line(45, 30, 50, 30);  // Marque de l'axe des ordonnées
    $pdf->Line(45, 80, 50, 80);  // Marque de l'axe des ordonnées

    // Dessiner les barres du graphique
    $barWidth = $width / count($data);
    $x = 60;  // Position X initiale des barres
    foreach ($data as $value) {
        $barHeight = $value * $scale;
        $pdf->Rect($x, 80 - $barHeight, $barWidth, $barHeight, 'F');
        $x += $barWidth;
    }

    */

    #ETAPE 8: Generer le PDF
    // $pdf->Output('releve.pdf', 'F');
    $pdfPath = '/opt/lampp/htdocs/PROJET_PDF_PHP/releve.pdf';
    $pdf->Output($pdfPath, 'F');



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Relevé </title>
    <style>
        body{
            margin: 0;
        }
        iframe{
            width: 100%;
            height: 1000px;
        }
    </style>
</head>
<body>

    <iframe src="releve.pdf"></iframe>

</body>
</html>