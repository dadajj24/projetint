<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project Management Board</title>
    <link rel="stylesheet" href="design.css">
    <script src="page.js" defer></script>
</head>
<body>
    <div class="page">
        <div class="sidebar">
            <div class="logo">Asiafricains</div>
            <ul>
                <li>Backlog</li>
                <li class="active">Tableau de bord</li>
                <li onclick="window.location.href='//localhost:8000/calendrier.html';">Calendrier</li>
                <li onclick="window.location.href='//localhost:8000/principale.html';">Mes projets</li>
                <li>Deconnexion</li>
            </ul>
        </div>
        <div class="main-content">
            <header>
                <h1>Tableau de bord</h1>
            </header>
            <div class="board">
                <div class="column">
                    <h2>A faire</h2>
                    <div class="card" draggable="true" onclick="window.location.href='//localhost:8000/carte.php';">
                        <p>Faire la page d'acceuil</p>
                        <span class="tag">Dawin Jean Jacques</span>
                        <div class="card-footer">
                            <span class="status">5</span>
                            <span class="status">2</span>
                        </div>
                    </div>
                    <div class="card" draggable="true" onclick="window.location.href='//localhost:8000/carte.php';">
                        <p>Faire la base de données</p>
                        <span class="tag">Dawin Jean Jacques</span>
                        <div class="card-footer">
                            <span class="status">1</span>
                            <span class="status">2</span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h2>En progression</h2>
                    <div class="card" draggable="true">
                        <p>Le API REST</p>
                        <span class="tag">Dawin Jean Jacques</span>
                        <div class="card-footer">
                            <span class="status">3</span>
                            <span class="status">1</span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h2>En revision</h2>
                    <div class="card" draggable="true">
                        <p>Rapport d'analyse</p>
                        <span class="tag">Faire le rapport d'analyse</span>
                        <div class="card-footer">
                            <span class="status">3</span>
                            <span class="status">1</span>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <h2>Done</h2>
                    <div class="card" draggable="true">
                        <p>Page Login </p>
                        <span class="tag">Connexion page login</span>
                        <div class="card-footer">
                            <span class="status">8</span>
                            <span class="status">2</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
