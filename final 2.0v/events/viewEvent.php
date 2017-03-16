<link rel="stylesheet" type="text/css" href="events.css">

<?php
//include_once "../profile/head.php";
//include_once "../profile/sidebar.php";
//include_once "../profile/header.php";
?>

<?php
//TODO get event with $id form DB

$event = ['id' => 0, 'title' => 'test title', 'content' => 'test long text', 'date' => '09.03.2017'];

if(isset($_GET['id'])){
    $id = $_GET['id'];
} else {
    throw new Exception("No such event found");
}
?>

<title><? $event['title'] ?></title>
<article>
    <h2><? $event['title'] ?></h2>
    <p><? $event['content'] ?></p>
</article>