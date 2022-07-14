<?php
	session_start();


	$username = "";
	$email    = "";
	$errors = array();
	$_SESSION['success'] = "";


	$db = mysqli_connect('localhost', 'root', '', 'registration');
 // Funcția mysqli_connect () stabilște o nouă conexiune la serverul MySQL.

	if (isset($_POST['reg_user'])) { // Verifică dacă există un câmp cu numele
		// "reg_user" (butonul cu numele "reg_user" in cazul nostru)
		// în formularul trimis la această pagină php.
		// daca se regasește atunci ceea ce este cuprins intre acolade va fi executat
		$username = mysqli_real_escape_string($db, $_POST['username']);
		 // toate variabilele următoare vor stoca datele intorduse de utilizator pentru a urma sa fie inserate in baza de date
		$email = mysqli_real_escape_string($db, $_POST['email']);
		$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
		$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

		//daca utilizatorul omite sa intorduca oricare din urmatoarele cămpuri pagina web ii va afișa un mesaj de avertizare
		if (empty($username)) { array_push($errors, "Username is required"); }
		if (empty($email)) { array_push($errors, "Email is required"); }
		if (empty($password_1)) { array_push($errors, "Password is required"); }
   // daca nu se regasesc aceleasi parole in ambele campuri va afisa un mesaj de eroare
		if ($password_1 != $password_2) {
			array_push($errors, "The two passwords do not match");
		}

//daca nu se regasec erori provocata de utilizator atunci datele intorduse vor fi stocate in baza de date
		if (count($errors) == 0) {
			$password = md5($password_1);
			$query = "INSERT INTO users (username, email, password)
					  VALUES('$username', '$email', '$password')";
			mysqli_query($db, $query);

			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are now logged in";
			header('location: login.php');
		}

	}

	// ...

	// Verifică dacă există un câmp cu numele
		// "login_user" (butonul cu numele "login_user" in cazul nostru)
		// în formularul trimis la această pagină php.
		// daca se regasește atunci ceea ce este cuprins intre acolade va fi executat
	if (isset($_POST['login_user'])) {
		$username = mysqli_real_escape_string($db, $_POST['username']); //campul inserat de utilizator va fi stocat in variabila $username pentru a fi apoi validată (se verifica dacă se regăsește in baza de date)
		$password = mysqli_real_escape_string($db, $_POST['password']); //campul inserat de utilizator va fi stocat in variabila $password pentru a fi apoi validată (se verifica dacă se regăsește in baza de date)

		if (empty($username)) { //daca utilizatorul omite de a intorduce numele de utilizator un mesaj de eroare va apărea
			array_push($errors, "Username is required");
		}
		if (empty($password)) { //daca utilizatorul omite de a intorduce parola un mesaj de eroare va apărea
			array_push($errors, "Password is required");
		}

		if (count($errors) == 0) {
			$password = md5($password);
			$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
			$results = mysqli_query($db, $query);
			// if credentials are good u gonna get redirected to the application
			if (mysqli_num_rows($results) == 1) {
				$_SESSION['username'] = $username;
				$_SESSION['success'] = "You are now logged in";
				header('location: map3.php');
			}else {
				array_push($errors, "Wrong username/password combination");
			}
		}
	}

?>
