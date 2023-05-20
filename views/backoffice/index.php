<?php require_once ROOT. 'app/login.php'; ?>
<?php foreach($backoffice as $image): ?>
	<form method="post" action="/backoffice/modifier/<?=$image["id"]?>">
		<input type="text" readonly name="id" value="<?=$image["id"]?>"/>
		<input type="text" name="chemin" value="<?=$image["chemin"]?>"/>
		<input type="submit" name="update" value="Mettre à jour"/>
	</form>
	<a href="/backoffice/effacer/<?=$image["id"]?>"><button type="button">Effacer</button></a>
<?php endforeach ?>
