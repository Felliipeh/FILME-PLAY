<?php
// Código PHP para processamento
$apikey = "becce500";
$pesquisa = isset($_GET['PESQUISA']) ? urlencode($_GET['PESQUISA']) : '';

if ($pesquisa) {
    $url = "https://www.omdbapi.com/?apikey={$apikey}&s={$pesquisa}";
    $response = file_get_contents($url);
    $data = json_decode($response, true);
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>filme play</title>
    <link rel="stylesheet" href="index.css">
</head>
<body>
    <header>
        <div class="title">
            <a href="./index.php"> <h1><img src="./img/PLAY.png" alt="" width="30PX" height="30PX"> FILME PLAY</h1> </a>
        </div>

        <form id="form_busca" method="get" action="index.php">
            <input type="text" name="PESQUISA" id="busca" placeholder="DIGITE O NOME DO FILME">
            <button type="submit" id="btn_lupa">
                <img src="./img/lupa.png" alt="buscar" id="icon">
            </button>
        </form>
    </header>
    <main>
        <h2><img class="icon_fogo" src="./img/fogo.png" alt="" width="30px" height="30px">TOP 10 filmes de hoje no Brasil <img class="icon_fogo" src="./img/fogo.png" alt="" width="30px" height="30px"></h2>

        <div class="card">
            <?php
            if (isset($data['Search']) && $data['Response'] === "True") {
                foreach ($data['Search'] as $filme) {
                    echo '<div class="item">';
                    echo '<img src="' . htmlspecialchars($filme['Poster']) . '" alt="' . htmlspecialchars($filme['Title']) . '"/>';
                    echo '<h3>' . htmlspecialchars($filme['Title']) . '</h3>';
                    echo '</div>';
                }
            } else {
                echo '<p>Nenhum filme encontrado!</p>';
            }
            ?>
        </div>
        
    </main>
    <footer>
        &copy; FILME PLAY
    </footer>
</body>
</html>
