<!DOCTYPE html>
<html>

<head>
<title>Transfert</title>
</head>

<body>


<h1>Faire un transfert</h1>


<?php if(session()->getFlashdata('error')): ?>

<p style="color:red">
<?= session()->getFlashdata('error') ?>
</p>

<?php endif; ?>



<form method="post" action="<?= base_url('/transfert/effectuer') ?>">


<label>
Numéro receveur :
</label>

<input 
type="text"
name="numero_receveur"
placeholder="0371234567"
>



<br><br>


<label>
Montant :
</label>


<input
type="number"
name="montant"
min="1"
>



<br><br>


<button>
Transférer
</button>


</form>


<br>

<a href="<?= base_url('/dashboard') ?>">
Retour
</a>


</body>

</html>