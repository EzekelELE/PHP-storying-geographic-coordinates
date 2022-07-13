<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration system PHP and MySQL</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

	<div class="header">
		<h2>Login</h2>
	</div>

	<form method="post" action="login.php"> <!-- metoda post are rolul de a trimite
	                                           datele intorduse de utilizator serverului web
																					   si cu atributul action va fi apelat un script cu
																				     numele "server.php" care va avea rolul principal
																			       in prelucrarea si validarea datelor-->



		<div class="input-group">
			<label>Username</label>
			<input type="text" name="username" required="required"> <!--Eticheta <input> indică un câmp unde utilizatorul
				                                                         va putea intorducere numele de utilizator pentru a urma validarea acestuia.
																																 Atributul "type" are rolul de a specifica tipul cămpului ce va urma sa fie intordus.
																															 Atributul "required" are rolul de a garanta ca
																														  campul respectiv nu va fi liber inainte sa fie comunicat servereul web
																															acest lucru reduce numarul cereri http prin prevenirea greselilor făcute de utilizator
																														 -->
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required="required"> <!--Eticheta <input> indică un câmp  unde utilizatorul
				                                                         va putea intorducere parola de utilizator pentru a urma validarea acestuia.
																																 Atributul "type" are rolul de a specifica tipul cămpului ce va urma sa fie intordus.
																															 Atributul "required" are rolul de a garanta ca
																														  campul respectiv nu va fi liber inainte sa fie comunicat servereul web
																															acest lucru reduce numarul cereri http prin prevenirea greselilor făcute de utilizator
																														 -->
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="login_user">Login</button> <!--Tagul <button> definește un buton pe care se poate da clic odată apăsat pe el
			 																																			acesta va rula scriptul server.php	-->
		</div>
		<p>
		<a  href="register.php">Sign up</a>      <!--In caz că utilizatorul este nou pe platformă el
			                                            are posibilitatea de aș crea un cont
		                                           	-->
		</p>
	</form>


</body>
</html>
