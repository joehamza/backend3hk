<?php
session_start();
if($_SESSION["auto"]!="oui"){
header("location:index2.php");
exit();	
}
?>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<div id="message">
<?php
$entree = json_decode(file_get_contents("essai/api/sortot.txt"));
$entot = json_decode(file_get_contents("essai/api/sortie.txt"));
$entreshif = json_decode(file_get_contents("essai/api/entit.txt"));
$sortie = json_decode(file_get_contents("essai/api/entree.txt"));
$sortietot = json_decode(file_get_contents("essai/api/entot.txt"));
$stock = json_decode(file_get_contents("essai/api/sortit.txt"));
$gbmode = json_decode(file_get_contents("essai/api/gbmode.txt"));
 
date_default_timezone_set('Africa/Algiers');
    $heure =date('H:i:s');
?>
<center>
	<br><br>
	<?php foreach ($entot as $ett) : ?>
	<?php endforeach; ?>
	<?php if($ett->Date!=''){ ?>

    <table border="1"  style="border-collapse:collapse;font-size:25px">
    <?php foreach ($entot as $et) : ?>
     
    <tr><td colspan="6" align="center"><div style="font-size:30px;background-color:#333;color:#eee;">*Les entrÃ©es le <?=$et->Date ?> ( <?=$heure?> )</div></td></tr>
    <?php endforeach; ?>
       
    <tr>
        <th>Navire</th>
        <th>NBR</th>
        <th>Fosse</th>
        <th>DÃ©barquÃ©</th>
        <th>T/DÃ©barquÃ©</th>
        <th>R/Ã  bord</th>
        
    </tr>
    <?php foreach ($entree as $ent) : ?>    
     <tr>
            <td align="center"><?= $ent->client ?></td>
            <td align="center"><?= $ent->nbr ?></td>
            <td align="center"><?= $ent->fos ?></td>
            <td align="center"><?= $ent->quantite ?></td>
            <td align="center"><?= $ent->deb ?></td>
         <td align="center"><?= $ent->rest ?></td></tr>
    <?php endforeach; ?>
       <?php foreach ($entot as $ent) : ?>
       <?php $qe4=number_format($ent->ooo4,2,',','');
        $fos4=number_format($ent->fos4,2,',','');?>
        <tr><th>Total gÃ©nÃ©ral</th><th><?= $ent->c4?></th><th><?= $fos4 ?></th><th><?= $qe4 ?></th><th>/</th><th>/</th></tr>
        <?php endforeach; ?>
        <?php foreach ($entreshif as $es) : ?>
        <tr><th colspan="6" align="center"><div style="color:blue;"><em>Shift <?= $es->navire ?> / dÃ©but : <?= $es->jour ?> <?= $es->shift ?> le <?= $es->date ?></div> <br><div style="color:green;"><?= $es->produit ?></em></div></th></tr>
        <tr><th colspan='2'>Matin</th><th colspan='2'>Soir</th><th colspan='2'>Nuit</th></tr>
        <tr><th>QuantitÃ©</th><th>Camions</th><th>QuantitÃ©</th><th>Camions</th><th>QuantitÃ©</th><th>Camions</th></tr>
<tr><td align='center'><?= $es->qm ?></td><td align='center'><?= $es->nm ?></td><td align='center'><?= $es->qs ?></td><td align='center'><?= $es->ns ?></td><td align='center'><?= $es->qn ?></td><td align='center'><?= $es->nn ?></td></tr>
        <tr><td colspan='6' align='center'>Nombre de sÃ©jour aprÃ¨s le dÃ©but de dÃ©barquement : <?= $es->apre ?><br>Nombre de jours de dÃ©barquement : <?= $es->njour ?><br>Nombre de jours neant : <?= $es->neant ?></td></tr>
        <?php endforeach; ?>
</table>
  <br><br>
	<?php } ?>
	<?php foreach ($sortietot as $sortot) : ?>
	<?php endforeach; ?>
	<?php if($sortot->Date!=''){ ?>
<table border="1"  style="border-collapse:collapse;font-size:25px">
    <?php foreach ($sortietot as $sortot) : ?>
	
    <tr><td colspan="7" align="center"><div style="font-size:30px;background-color:#333;color:#eee"">*EnlÃ¨vements du silo portuaire le <?=$sortot->Date ?> ( <?=$heure?> )</div></td></tr>
    <?php endforeach; ?>
    <tr>
	    <th>Organisme</th>
        <th>Camion</th>
        <th>QuantitÃ©</th>
        <th>Wagon</th>
        <th>QuantitÃ©</th>
        <th>Total</th>
	    <th>Produit</th>
    </tr>
    <?php foreach ($sortie as $sort) : ?>
    <?php 
    $qf=number_format($sort->q,2,',','');
    $wf=number_format($sort->wag,2,',','');
    $tot=number_format($sort->ooo,2,',','');?>
    
        <tr>
            <td align="center"><?= $sort->client ?></td>
            <td align="center"><?= $sort->c ?></td>
            <td align="center"><?= $qf ?></td>
            <td align="center"><?= $sort->wa ?></td>
            <td align="center"><?= $wf ?></td>
            <td align="center"><?= $tot ?></td>
	    <td align="center"><?= $sort->mode ?></td></tr>
    <?php endforeach; ?>
    <?php foreach ($sortietot as $sortot) : ?>
    <?php 
    $qf2=number_format($sortot->q2,2,',','');
    $wf2=number_format($sortot->wag2,2,',','');
    $tot2=number_format($sortot->ooo2,2,',','');?>
    <th>Total gÃ©nÃ©ral</th><th><?= $sortot->c2 ?></th><th><?= $qf2 ?></th><th><?= $sortot->wa2 ?></th><th><?= $wf2 ?></th><th><?= $tot2 ?></th><th>/</th></tr>
    <?php endforeach; ?>
    </table>
    <table border="1" width="80%" style="border-collapse:collapse;font-size:25px">
        <tr><td colspan="5" align="center"><div style="font-size:30px;background-color:#333;color:#eee"">*Total sortie par produit</div></td></tr>
    <tr><th>Produit</th><th>Camion</th><th>QuantitÃ©</th><th>Wagon</th><th>QuantitÃ©</th><th>Total</th></tr>
    
    <?php foreach ($gbmode as $gbm) : ?>
  <?php  $gbcq2=number_format($gbm->gbcq,2,',','');
     $gbwq2=number_format($gbm->gbwq,2,',','');
	 $qqqt2=number_format($gbm->qqqt,2,',','');?>
    <div style="font-size:16px;">
        <tr><td align="center"> <?= $gbm->mode ?></td><td align="center"><?= $gbm->gbc ?></td><td align="center"> <?= $gbcq2 ?></td><td align="center"><?= $gbm->gbw ?></td><td align="center"><?= $gbwq2 ?></td></tr>
        <?php endforeach; ?>

        </table>
    <br><br>
	<?php } ?>
	<?php foreach ($stock as $st) : ?>
	<?php endforeach; ?>
	<?php if($st->stock!=''){ ?>
    <table border="1" width="60%" style="border-collapse:collapse;font-size:25px">
    <tr><td colspan="7" align="center"><div style="font-size:30px;background-color:#333;color:#eee"">*Stock comptable</div></td></tr>
    <tr>
        <th>Produit</th>
        <th>Stock</th>
    </tr>
    <?php foreach ($stock as $st) : ?>

        <tr>
            <td align="center"><?= $st->produit ?></td>
            <td align="center"><?= $st->stock ?></td>
    <?php endforeach; ?>
    </table>
	    <br><br>
	    <?php } ?>
	   </div>
    </center>
	    
   
