<?php
require('pdflibs/fpdf.php');

class PDF_Code39 extends FPDF {




    var $extgstates = array();

    // alpha: real value from 0 (transparent) to 1 (opaque)
    // bm:    blend mode, one of the following:
    //          Normal, Multiply, Screen, Overlay, Darken, Lighten, ColorDodge, ColorBurn,
    //          HardLight, SoftLight, Difference, Exclusion, Hue, Saturation, Color, Luminosity
    function SetAlpha($alpha, $bm='Normal')
    {
        // set alpha for stroking (CA) and non-stroking (ca) operations
        $gs = $this->AddExtGState(array('ca'=>$alpha, 'CA'=>$alpha, 'BM'=>'/'.$bm));
        $this->SetExtGState($gs);
    }

    function AddExtGState($parms)
    {
        $n = count($this->extgstates)+1;
        $this->extgstates[$n]['parms'] = $parms;
        return $n;
    }

    function SetExtGState($gs)
    {
        $this->_out(sprintf('/GS%d gs', $gs));
    }

    function _enddoc()
    {
        if(!empty($this->extgstates) && $this->PDFVersion<'1.4')
            $this->PDFVersion='1.4';
        parent::_enddoc();
    }

    function _putextgstates()
    {
        for ($i = 1; $i <= count($this->extgstates); $i++)
        {
            $this->_newobj();
            $this->extgstates[$i]['n'] = $this->n;
            $this->_out('<</Type /ExtGState');
            $parms = $this->extgstates[$i]['parms'];
            $this->_out(sprintf('/ca %.3F', $parms['ca']));
            $this->_out(sprintf('/CA %.3F', $parms['CA']));
            $this->_out('/BM '.$parms['BM']);
            $this->_out('>>');
            $this->_out('endobj');
        }
    }

    function _putresourcedict()
    {
        parent::_putresourcedict();
        $this->_out('/ExtGState <<');
        foreach($this->extgstates as $k=>$extgstate)
            $this->_out('/GS'.$k.' '.$extgstate['n'].' 0 R');
        $this->_out('>>');
    }

    function _putresources()
    {
        $this->_putextgstates();
        parent::_putresources();
    }











function Code39($x, $y, $code, $ext = true, $cks = false, $w = 0.4, $h = 10, $wide = true) {

    //suppression des accents
    $code = strtr($code, 'àâäéèêëìîïòôöùûü', 'aaaeeeeiiiooouuu');

    //affichage du code
    $this->SetFont('Arial', '', 10);
    //$this->Text($x, $y+$h+4, $code);

    if($ext) {
        //encodage étendu
        $code = $this->encode_code39_ext($code);
    }
    else {
        //passage en majuscules
        $code = strtoupper($code);
        //contrôle validité
        if(!preg_match('|^[0-9A-Z. $/+%-]*$|', $code))
            $this->Error('Invalid barcode value: '.$code);
    }

    //calcul du checksum
    if ($cks)
        $code .= $this->checksum_code39($code);

    //ajout des caractères début / fin
    $code = '*'.$code.'*';

    //tableaux de correspondance caractères / barres
    $narrow_encoding = array (
        '0' => '101001101101', '1' => '110100101011', '2' => '101100101011',
        '3' => '110110010101', '4' => '101001101011', '5' => '110100110101',
        '6' => '101100110101', '7' => '101001011011', '8' => '110100101101',
        '9' => '101100101101', 'A' => '110101001011', 'B' => '101101001011',
        'C' => '110110100101', 'D' => '101011001011', 'E' => '110101100101',
        'F' => '101101100101', 'G' => '101010011011', 'H' => '110101001101',
        'I' => '101101001101', 'J' => '101011001101', 'K' => '110101010011',
        'L' => '101101010011', 'M' => '110110101001', 'N' => '101011010011',
        'O' => '110101101001', 'P' => '101101101001', 'Q' => '101010110011',
        'R' => '110101011001', 'S' => '101101011001', 'T' => '101011011001',
        'U' => '110010101011', 'V' => '100110101011', 'W' => '110011010101',
        'X' => '100101101011', 'Y' => '110010110101', 'Z' => '100110110101',
        '-' => '100101011011', '.' => '110010101101', ' ' => '100110101101',
        '*' => '100101101101', '$' => '100100100101', '/' => '100100101001',
        '+' => '100101001001', '%' => '101001001001' );

    $wide_encoding = array (
        '0' => '101000111011101', '1' => '111010001010111', '2' => '101110001010111',
        '3' => '111011100010101', '4' => '101000111010111', '5' => '111010001110101',
        '6' => '101110001110101', '7' => '101000101110111', '8' => '111010001011101',
        '9' => '101110001011101', 'A' => '111010100010111', 'B' => '101110100010111',
        'C' => '111011101000101', 'D' => '101011100010111', 'E' => '111010111000101',
        'F' => '101110111000101', 'G' => '101010001110111', 'H' => '111010100011101',
        'I' => '101110100011101', 'J' => '101011100011101', 'K' => '111010101000111',
        'L' => '101110101000111', 'M' => '111011101010001', 'N' => '101011101000111',
        'O' => '111010111010001', 'P' => '101110111010001', 'Q' => '101010111000111',
        'R' => '111010101110001', 'S' => '101110101110001', 'T' => '101011101110001',
        'U' => '111000101010111', 'V' => '100011101010111', 'W' => '111000111010101',
        'X' => '100010111010111', 'Y' => '111000101110101', 'Z' => '100011101110101',
        '-' => '100010101110111', '.' => '111000101011101', ' ' => '100011101011101',
        '*' => '100010111011101', '$' => '100010001000101', '/' => '100010001010001',
        '+' => '100010100010001', '%' => '101000100010001');

    //le code barre est déterminé en version large ou étroite (meilleure lisibilité)
    //large observe un rapport 3:1 pour le rapport barre large / barre etroite
    //etroit                   2:1
    $encoding = $wide ? $wide_encoding : $narrow_encoding;

    //espace inter-caractère
    $gap = ($w > 0.29) ? '00' : '0';

    //encodage
    $encode = '';
    for ($i = 0; $i< strlen($code); $i++)
        $encode .= $encoding[$code[$i]].$gap;

    //dessin
    $this->draw_code39($encode, $x, $y, $w, $h);
}

function checksum_code39($code) {

    //somme des positions des caractères en démarrant de zéro
    //somme modulo 43
    //le caractère de contrôle est celui à la position du modulo
    //exemple : 115 % 43 = 29 -> 'T' est à la place 29 dans le tableau

    $chars = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
                            'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K',
                            'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V',
                            'W', 'X', 'Y', 'Z', '-', '.', ' ', '$', '/', '+', '%');
    $sum = 0;
    for ($i=0 ; $i<strlen($code); $i++) {
        $a = array_keys($chars, $code[$i]);
        $sum += $a[0];
    }
    $r = $sum % 43;
    return $chars[$r];
}

function encode_code39_ext($code) {

    //encodage en code 39 étendu

    $encode = array(
        chr(0) => '%U', chr(1) => '$A', chr(2) => '$B', chr(3) => '$C',
        chr(4) => '$D', chr(5) => '$E', chr(6) => '$F', chr(7) => '$G',
        chr(8) => '$H', chr(9) => '$I', chr(10) => '$J', chr(11) => '£K',
        chr(12) => '$L', chr(13) => '$M', chr(14) => '$N', chr(15) => '$O',
        chr(16) => '$P', chr(17) => '$Q', chr(18) => '$R', chr(19) => '$S',
        chr(20) => '$T', chr(21) => '$U', chr(22) => '$V', chr(23) => '$W',
        chr(24) => '$X', chr(25) => '$Y', chr(26) => '$Z', chr(27) => '%A',
        chr(28) => '%B', chr(29) => '%C', chr(30) => '%D', chr(31) => '%E',
        chr(32) => ' ', chr(33) => '/A', chr(34) => '/B', chr(35) => '/C',
        chr(36) => '/D', chr(37) => '/E', chr(38) => '/F', chr(39) => '/G',
        chr(40) => '/H', chr(41) => '/I', chr(42) => '/J', chr(43) => '/K',
        chr(44) => '/L', chr(45) => '-', chr(46) => '.', chr(47) => '/O',
        chr(48) => '0', chr(49) => '1', chr(50) => '2', chr(51) => '3',
        chr(52) => '4', chr(53) => '5', chr(54) => '6', chr(55) => '7',
        chr(56) => '8', chr(57) => '9', chr(58) => '/Z', chr(59) => '%F',
        chr(60) => '%G', chr(61) => '%H', chr(62) => '%I', chr(63) => '%J',
        chr(64) => '%V', chr(65) => 'A', chr(66) => 'B', chr(67) => 'C',
        chr(68) => 'D', chr(69) => 'E', chr(70) => 'F', chr(71) => 'G',
        chr(72) => 'H', chr(73) => 'I', chr(74) => 'J', chr(75) => 'K',
        chr(76) => 'L', chr(77) => 'M', chr(78) => 'N', chr(79) => 'O',
        chr(80) => 'P', chr(81) => 'Q', chr(82) => 'R', chr(83) => 'S',
        chr(84) => 'T', chr(85) => 'U', chr(86) => 'V', chr(87) => 'W',
        chr(88) => 'X', chr(89) => 'Y', chr(90) => 'Z', chr(91) => '%K',
        chr(92) => '%L', chr(93) => '%M', chr(94) => '%N', chr(95) => '%O',
        chr(96) => '%W', chr(97) => '+A', chr(98) => '+B', chr(99) => '+C',
        chr(100) => '+D', chr(101) => '+E', chr(102) => '+F', chr(103) => '+G',
        chr(104) => '+H', chr(105) => '+I', chr(106) => '+J', chr(107) => '+K',
        chr(108) => '+L', chr(109) => '+M', chr(110) => '+N', chr(111) => '+O',
        chr(112) => '+P', chr(113) => '+Q', chr(114) => '+R', chr(115) => '+S',
        chr(116) => '+T', chr(117) => '+U', chr(118) => '+V', chr(119) => '+W',
        chr(120) => '+X', chr(121) => '+Y', chr(122) => '+Z', chr(123) => '%P',
        chr(124) => '%Q', chr(125) => '%R', chr(126) => '%S', chr(127) => '%T');

    $code_ext = '';
    for ($i = 0 ; $i<strlen($code); $i++) {
        if (ord($code[$i]) > 127)
            $this->Error('Invalid character: '.$code[$i]);
        $code_ext .= $encode[$code[$i]];
    }
    return $code_ext;
}

function draw_code39($code, $x, $y, $h, $w) {
    for($i=0; $i<strlen($code); $i++) {
        if($code[$i] == '1')
            $this->Rect($x,$y+$i*$h, $w, $h, 'F');
    }
}
}

$pdf = new PDF_Code39();
$pdf->AddPage();
$code =  floor($voiture['idProprietaire']/9999)+65;
$serial = chr($code);

$taille = 5-strlen($voiture['idProprietaire']);
for ($i=0; $i < $taille; $i++) {
	$serial = $serial.'0'; 
}
$serial = $serial.$voiture['idProprietaire'];


$pdf->SetAlpha(0.3);
// draw jpeg image
$pdf->Image('./assets/img/benin.png',50,18.5,42);
$pdf->SetAlpha(0.2);
$pdf->Image('./assets/img/cnsr.jpg',100.5,10.5,100);

$pdf->SetAlpha(0.3);
$pdf->Image('./assets/img/benin.png',50,88.5,42);
$pdf->SetAlpha(0.2);
$pdf->Image('./assets/img/cnsr.jpg',100.5,80.5,100);
// restore full opacity
$pdf->SetAlpha(1);




$pdf->Code39(6.5, 7.5, $serial);
$pdf->setXY(4,4);
$pdf->Cell(15,60,'',1,0,'C');
$pdf->Cell(185,60,'',1,1,'C');
$pdf->setXY(19,4);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(185,9.5,utf8_decode('Propriétaire'),1,1,'C');

$pdf->setXY(20,$pdf->getY()+3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,9,utf8_decode('Nom : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,9,utf8_decode($voiture['nomProprietaire']),1,0,'L');

$pdf->setX($pdf->getX()+2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,9,utf8_decode('Prénom(s) : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,9,utf8_decode($voiture['prenomProprietaire']),1,1,'L');

$pdf->setXY(20,$pdf->getY()+3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,9,utf8_decode('Né le : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,9,utf8_decode($voiture['dateNaissance']),1,0,'L');

$pdf->setX($pdf->getX()+2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,9,utf8_decode('A : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,9,utf8_decode($voiture['lieuNaissance']),1,1,'L');

$pdf->setXY(20,$pdf->getY()+3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,9,utf8_decode('Profession : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,9,utf8_decode($voiture['profession']),1,0,'L');

$pdf->setX($pdf->getX()+2);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(90,21,"",1,0,'L');
$pdf->setXY($pdf->getX()-89,$pdf->getY()-5);
$pdf->Cell(90,21,utf8_decode($voiture['nomDepartement'].", ".$voiture['nomVille']." - ".$voiture['nomQuartier']),0,0,'L');
$pdf->setXY(113,$pdf->getY()+5);
$pdf->Cell(90,21,utf8_decode($voiture['adresse']),0,0,'L');

$pdf->setXY(20,$pdf->getY()+12);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,9,utf8_decode('Téléphone : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,9,utf8_decode($voiture['telephone']),1,0,'L');



/****** VEHICULE *****************/







$pdf->Code39(6.5, $pdf->getY()+20, $voiture['immatriculation']);
$pdf->setXY(4,$pdf->getY()+16);
$pdf->Cell(15,74,'',1,0,'C');
$pdf->Cell(185,74,'',1,1,'C');
$pdf->setXY(19,$pdf->getY()-74);
$pdf->SetFont('Arial', 'B', 15);
$pdf->Cell(185,9.5,utf8_decode($voiture['immatriculation']),1,1,'C');

$pdf->setXY(20,$pdf->getY()+3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Marque : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['marque']),1,0,'L');

$pdf->setX($pdf->getX()+2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Genre : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['genre']),1,1,'L');

$pdf->setXY(20,$pdf->getY()+3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Type : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['type']),1,0,'L');

$pdf->setX($pdf->getX()+2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Carosserie : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['libelleCarosserie']),1,1,'L');

$pdf->setXY(20,$pdf->getY()+3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('N° Chassis : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['numeroChassis']),1,0,'L');

$pdf->setX($pdf->getX()+2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('N° Moteur : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['numeroMoteur']),1,1,'L');

$pdf->setXY(20,$pdf->getY()+3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Energie : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['libelleEnergie']),1,0,'L');

$pdf->setX($pdf->getX()+2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Puissance: '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['puissance']).' Cv',1,1,'L');

$pdf->setXY(20,$pdf->getY()+3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Place assise : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['placeAssise'])."",1,0,'L');


$pdf->setX($pdf->getX()+2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Poid à vide: '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['poidVide']).' Kg',1,1,'L');

$pdf->setXY(20,$pdf->getY()+3);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Charge utile : '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['chargeUtile'])." Kg",1,0,'L');

$pdf->setX($pdf->getX()+2);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(25,7,utf8_decode('Poid total: '),1,0,'L');
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(65,7,utf8_decode($voiture['poidTotal']).' Kg',1,1,'L');









$pdf->Output();
?>