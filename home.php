<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EmployeePulse</title>
    <style>
        /* Stilizeaza antetul cu un gradient de culoare */
        header {
            background: linear-gradient(to bottom, #0078d4, #005ea6);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2); /* Adauga o umbra sub antet */
            padding: 20px;
            color: #fff;
            text-align: center;
        }

        /* Importa fonta personalizata de la Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap');

        /* Aplica fonta personalizata la elementele dorite */
        body {
            font-family: 'Montserrat', sans-serif;
        }

        /* Stilizeaza sec?iunea de con?inut */
        #content {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }

        /* Ajusteaza layout-ul pentru dispozitive mobile */
        @media (max-width: 768px) {
            #content {
                flex-direction: column;
            }
        }

        /* Stilizeaza butonul cu o culoare de fundal ?i efect de trecere */
        button {
            background-color: #0078d4;
            color: #fff;
            padding: 10px 20px;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        /* Efect de hover pentru buton */
        button:hover {
            background-color: #005ea6;
        }

        /* Stilizare pentru sec?iunea "Flutura? Salariu Interactiv" */
        #salary {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        /* Stilizare pentru sec?iunea "Calendar de Concedii" */
        #calendar {
            background-color: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }
    </style>
    <style>
        /* ... (stilizari CSS existente) ... */

        /* Stilizare pentru butonul de cont ?i login */
        .user-actions {
            position: absolute;
            top: 20px;
            right: 20px;
        }

        .user-actions button {
            background-color: #0078d4;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .user-actions button:hover {
            background-color: #005ea6;
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
                <li><a href="statistici.html">Statistici și Rapoarte</a></li>
                <li><a href="contact.html">Contact</a></li>
            </ul>
        </nav>
    </header>
    <div class="user-actions">
            <a href="cont.php"><button>Cont</button></a>
            <a href="logout.php"><button>Log out</button></a>
        </div>
        
    </div>
    <style>
    /* Stilizare pentru bara de navigație */
    header {
        background-color: #0078d4;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
        padding: 20px 0;
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
        font-size: 18px;
        transition: color 0.3s ease;
    }

    nav a:hover {
        color: #005ea6;
    }
</style>


    <section id="content">
        <h2>Bine ați venit în portalul EmployeePulse!</h2>
        <p>Acesta este locul unde puteți accesa informații despre fluturașul salarial, gestiona concediile și multe altele.</p>

        <div class="access-buttons">
            <!-- Buton pentru Calendar de Concedii -->
            <a href="calendar.html">
                <button>Accesați Calendarul de Concedii</button>
            </a>
        
            <!-- Buton pentru Flutura? Salariu Interactiv -->
            <a href="fluturas.html">
                <button>Accesați Fluturașul Salariu</button>
            </a>
        </div>
        <style>
            /* ... (stilizari CSS existente) ... */
        
            /* Stilizare pentru butoanele de accesare a paginilor */
            .access-buttons {
                display: flex;
                justify-content: space-between;
                margin-top: 20px;
            }
        
            /* Stilizare pentru fiecare buton */
            .access-buttons button {
                flex: 1;
                margin: 0 10px;
                padding: 10px 20px;
                background-color: #0078d4;
                color: #fff;
                border: none;
                cursor: pointer;
                transition: background-color 0.3s ease;
            }
        
            /* Efect de hover pentru butoane */
            .access-buttons button:hover {
                background-color: #005ea6;
            }
        </style>
        <!-- ... Alte con?inuturi existente ... -->

<section id="news-announcements">
    <h2>Știri și Anunțuri</h2>

    <div class="news-item">
        <h3>Zi de Naștere Fericita!</h3>
        <p>Azi sarbatorim ziua de naștere a colegului nostru, Patru Mircea. Sa îi urăm o zi minunată!</p>
        <p><em>Publicat la: 26.01.2024</em></p>
    </div>

    <div class="news-item">
        <h3>Concediu de Maternitate</h3>
        <p>Informam echipa ca Vasiloiu Ioana va intra în concediu de maternitate în curând. Sa îi urăm cele mai bune urari și sa ne bucuram alaturi de ea în aceasta perioada speciala!</p>
        <p><em>Publicat la: 20.01.2024</em></p>
    </div>

    <!-- Pute?i adauga mai multe ?tiri ?i anun?uri aici -->
</section>
<style>
/* Stilizare pentru Sec?iunea de ?tiri ?i Anun?uri */
#news-announcements {
    background-color: #f9f9f9;
    padding: 20px;
    margin-top: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

.news-item {
    background-color: #fff;
    padding: 10px;
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.news-item h3 {
    font-size: 18px;
    margin-top: 0;
}

.news-item p {
    font-size: 16px;
    margin: 10px 0;
}

.news-item em {
    font-style: italic;
}


<!-- ... Alte con?inuturi existente ... -->
</style>

                
    </section>

<section id="holidays">
    <h2>Zile de Concediu Legal de la Stat</h2>
    <ul>
        <li>1 ianuarie - Anul Nou</li>
        <li>24 ianuarie - Ziua Unirii Principatelor Române</li>
        <li>1 și 2 mai - Ziua Muncii</li>
        <li>15 august - Adormirea Maicii Domnului</li>
        <li>30 noiembrie - Sfântul Andrei</li>
        <li>1 decembrie - Ziua Naționala a României</li>
        <li>25 și 26 decembrie - Craciunul</li>
        <!-- Pute?i adauga ?i alte zile legale aici -->
    </ul>
</section>

<!-- ... Alte con?inuturi existente ... -->
<style>/* Stilizare pentru sec?iunea cu zilele de concediu legal */
#holidays {
    background-color: #f9f9f9;
    padding: 20px;
    margin-top: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}

#holidays h2 {
    font-size: 24px;
    margin-top: 0;
}

#holidays ul {
    list-style: none;
    padding: 0;
}

#holidays li {
    font-size: 18px;
    margin-bottom: 10px;
    padding-left: 20px;
    position: relative;
}

/* Icon pentru marcajele de lista (folosind FontAwesome, dar pute?i alege alta biblioteca sau crea propriile icon-uri) */
#holidays li::before {
    content: "\f058"; /* Codul pentru un icon de stea (exemplu FontAwesome) */
    font-family: FontAwesome;
    position: absolute;
    left: 0;
    color: #0078d4;
}
</style>

    <footer>
        <p>&copy; 2024 EmployeePulse. Toate drepturile rezervate.</p>
    </footer>
</body>
</html>