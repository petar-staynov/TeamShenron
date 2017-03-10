<link rel="stylesheet" type="text/css" href="events.css">

<?php
//include_once "../profile/head.php";
//include_once "../profile/sidebar.php";
//include_once "../profile/header.php";
?>

<?php
$event = ['id' => 0, 'title' => 'test title', 'content' => 'test long text', 'date' => '09.03.2017']
?>

<title><? $event['title'] ?></title>
<article>
    <h2><? $event['title'] ?></h2>
    <p><? $event['content'] ?></p>;
</article>