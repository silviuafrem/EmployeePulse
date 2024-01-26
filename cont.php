<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();


// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
$DATABASE_HOST = 'localhost';
$DATABASE_USER = 'root';
$DATABASE_PASS = '';
$DATABASE_NAME = 'phplogin';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}

if (isset($_SESSION['loggedin'])) {
    $currentUser = $_SESSION['name'];

    // Interogare pentru a obține datele utilizatorului curent
    $sql = "SELECT * FROM accounts WHERE username = '$currentUser'";
    $result = $con->query($sql);
	
	// Inițializare variabile
    $employeeName = 'N/A';
    $jobTitle = 'N/A';
    $department = 'N/A';
    $superior = 'N/A';
	
	 if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Obține primul rând

        // Actualizare variabile cu valorile din baza de date
        $employeeName = isset($row['Employee_Name']) ? $row['Employee_Name'] : 'N/A';
        $jobTitle = isset($row['Job_Title']) ? $row['Job_Title'] : 'N/A';
        $department = isset($row['Department']) ? $row['Department'] : 'N/A';
        $superior = isset($row['Superior']) ? $row['Superior'] : 'N/A';
    }
} else {
    // Dacă nu ești autentificat, poți redirecționa către pagina de autentificare sau să afișezi un mesaj
    echo "Nu ești autentificat.";
}

// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT password, email FROM accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('i', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($password, $email);
$stmt->fetch();
$stmt->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cont - EmployeePulse</title>
    <style>
        /* Stilizare pentru pagina de Cont */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        header {
            background-color: #0078d4;
            padding: 10px 0;
            color: #fff;
            text-align: center;
        }

        header h1 {
            font-size: 24px;
            margin: 0;
        }

        nav ul {
            list-style: none;
            padding: 0;
        }

        nav li {
            display: inline;
            margin: 0 15px;
        }

        nav a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #005ea6;
        }

        .employee-info {
            margin-top: 20px;
        }

        .employee-info h2 {
            font-size: 18px;
        }

        .employee-info p {
            font-size: 16px;
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <header>
        <h1>EmployeePulse</h1>
        <nav>
            <ul>
                <li><a href="home.php">Acasa</a></li>
                <li><a href="fluturas.html">Fluturaș Salariu</a></li>
                <li><a href="calendar.html">Calendar Concedii</a></li>
                <li><a href="#">Statistici și Rapoarte</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav>
    </header>

    <div class="container">
    <h1>Contul Meu</h1>
    <div class="employee-info">
        <?php
        // Interogare pentru a obține datele utilizatorului curent
        $sql = "SELECT * FROM accounts WHERE username = '$currentUser'";
        $result = $con->query($sql);

        // Inițializare variabile
        $employeeName = 'N/A';
        $jobTitle = 'N/A';
        $department = 'N/A';
        $superior = 'N/A';

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc(); // Obține primul rând

            // Actualizare variabile cu valorile din baza de date
            $employeeName = isset($row['Employee_Name']) ? $row['Employee_Name'] : 'N/A';
            $jobTitle = isset($row['Job_Title']) ? $row['Job_Title'] : 'N/A';
            $department = isset($row['Department']) ? $row['Department'] : 'N/A';
            $superior = isset($row['Superior']) ? $row['Superior'] : 'N/A';
        }
        ?>
        <div class="employee-info">
            <h2>Detalii Angajat</h2>
            <p>Nume Angajat: <?php echo $employeeName; ?></p>
            <p>Titlu Job: <?= isset($row['Job_Title']) ? $row['Job_Title'] : 'N/A' ?></p>
            <p>Departament: <?= isset($row['Department']) ? $row['Department'] : 'N/A' ?></p>
            <p>Superior: <?= isset($row['Superior']) ? $row['Superior'] : 'N/A' ?></p>
        </div>
    </div>
</div>
        <div class="employee-info">
            <h2>Detalii Cont</h2>
            <p>Nume de Utilizator: <?=$_SESSION['name']?></p>
            <p>Cod de Firmă: 232456]</p>
        </div>
    </div>
</body>
</html>
