<?php
/**
 * Created by PhpStorm.
 * User: ant0n
 * Date: 07.10.16
 * Time: 18:15
 */

// Initialisiere SQLite3 mit Datenbank-Datei
$db = new SQLite3('/Users/ant0n/Desktop/SQL.db');
// Definiere Abfragen in separaten Variablen
$query_projektion = $db->query('SELECT * FROM Projektion');
$query_selektion = $db->query('SELECT * FROM Selektion');
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>SQL</title>
    <!-- Verlinke Bootstrap-Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <main class="container">
        <h1>SQL</h1>
        <hr>

        <h2>Projektion</h2>
        <table class="table">
            <thead>
            <tr><?php
            // Lese Attributnamen aus
            for($c = 0; $c < $query_projektion->numColumns(); $c++) {
                echo "<th>" . $query_projektion->columnName($c) . "</th>";
            }
            ?></tr>
            </thead>
            <tbody>
            <?php
            // Lese Datensätze aus
            while ($row = $query_projektion->fetchArray(SQLITE3_NUM)) {
                echo "<tr>";
                for ($c = 0; $c < $query_projektion->numColumns(); $c++) {
                    echo "<td>" . $row[$c] . "</td>";
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
        <br>
        <h2>Selektion</h2>
        <table class="table">
            <thead>
            <tr><?php
            // Lese Attributnamen aus
            for($c = 0; $c < $query_selektion->numColumns(); $c++) {
                echo "<th>" . $query_selektion->columnName($c) . "</th>";
            }
            ?></tr>
            </thead>
            <tbody>
            <?php
            // Lese Datensätze aus
            while ($row = $query_selektion->fetchArray(SQLITE3_NUM)) {
                echo "<tr>";
                for ($c = 0; $c < $query_selektion->numColumns(); $c++) {
                    echo "<td>" . $row[$c] . "</td>";
                }
                echo "</tr>";
            }
            ?>
            </tbody>
        </table>
    </main>
    <footer class="footer">
        <div class="container">
            <p class="text-muted">
                &copy; 2016 Anton Curanz
            </p>
        </div>
    </footer>
</body>
</html>