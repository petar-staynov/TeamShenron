<title>Events</title>
<link rel="stylesheet" type="text/css" href="events.css">

<?php
//include_once "../profile/head.php";
//include_once "../profile/sidebar.php";
//include_once "../profile/header.php";
?>

<?php
//TODO get events from DB. They will be ordered by date
//TODO make event clickable using id and send them to viewEvent.php
$events = [
    ['title' => 'Класна работа по БЕЛ', 'date' => '15-03-2017'],
    ['title' => "Събрание на Ученическия съвет", 'date' => '10-03-2017'],
    ['title' => "Изложение на клубовете", 'date' => '10-04-2017']
];
?>

<div id="events-wrapper">
    <table>
        <th colspan="2">Събития/Известия</th>
        <tr><th>Заглавие</th><th>Дата</th></tr>
            <?php foreach ($events as $event) {
                echo "<tr>";
                $id = null;
                $title = $event['title'];
                $date = $event['date'];
                echo "<td>$title</td><td>$date</td>";
                echo "</tr>";
            } ?>
    </table>
</div>