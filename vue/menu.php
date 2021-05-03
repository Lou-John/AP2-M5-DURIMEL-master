<!-- Partie de la barre toujours affichée -->
<div class="navbar-header">
	<!-- Bouton d'accès affiché à droite si la zone d'affichage est trop petite -->
	<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-target">
		<span class="sr-only">Activer la navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
	</button>
	<a class="navbar-brand" href="index.php"><span class="glyphicon glyphicon-home"></span></a>
</div>
<!-- Partie de la barre masquée si la surface d'affichage est insuffisante -->
<?php
//session_start();
include_once('BDD/connectBdd.php');
?>
		<?php if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
	{?>

	
		<div class="collapse navbar-collapse" id="navbar-collapse-target">
		<ul class="nav navbar-nav">
		<?php if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
				{?>
					<li><a href="index.php?action=afficheBateau">Afficher les bateaux</a></li>
				<?php}

				if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
				{?>
					<li><a href="index.php?action=modifieBateau">Modifier les bateaux</a></li>

				<?php}

				 if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
				{?>
					<li><a href="index.php?action=afficheLieu">Afficher les lieux et ports</a></li>

				<?php}

				if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
				{?>
					<li><a href="index.php?action=modifieLieu">Modifier les lieux et ports</a></li>

				<?php}

				if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
				{?>
					<li><a href="index.php?action=afficheTarif">Afficher Trajets</a></li>		

				<?php}

				if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
				{?>
					<li><a href="index.php?action=modifieTrajet">Modifier Trajets</a></li>		

				<?php}

				if (isset($_SESSION['id']) && isset($_SESSION['pseudo']))
				{?>
					<li><a href="index.php?action=deconnexion">Deconnexion</a></li>

				<?php}?>
		</ul>
	</div> <?php	}}
	else {
		?>
		<div class="collapse navbar-collapse" id="navbar-collapse-target">
		<ul class="nav navbar-nav">
			<li><a href="index.php?action=afficheBateau">Afficher les bateaux</a></li>
			<li><a href="index.php?action=afficheLieu">Afficher les lieux et ports</a></li>
			<li><a href="index.php?action=afficheTarif">Afficher les Trajets</a></li>		
			<li><a href="index.php?action=inscription">Inscription</a></li>
			<li><a href="index.php?action=connexion">Connexion</a></li>
			</ul>
		
		</div> <?php
	}
	?>


