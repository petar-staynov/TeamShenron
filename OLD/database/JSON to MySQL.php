<?php
    /*set var_dump maximum lenght to 8192 for debugging purposes*/
    ini_set('xdebug.var_display_max_depth', 5);
    ini_set('xdebug.var_display_max_children', 8192);
    ini_set('xdebug.var_display_max_data', 1024);


    //connect to mysql server
    $con = mysqli_connect("localhost","root","") or die('Error: ' . mysqli_error());

    //set encoding to unicode
    mysqli_set_charset($con, 'utf8');

    //select database from server
    mysqli_select_db($con, "schoolsdb");

    //read the json file contents
    $jsondata = file_get_contents('schools.json');

    //convert json object to php associative array
    $data = json_decode($jsondata, true);

    //get the object details
    $success = false;
    for ($i = 0; $i < count($data); $i++){
        $id = $i;
        $name = $data[$i]['schName'];
        $type = $data[$i]['schType'];
        $city= $data[$i]['ekatte'];
        $region = $data[$i]['obl'];
        $finance = $data[$i]['znp'];

//      insert into mysql table
        $sql = "INSERT INTO schools(id, name, type, city, region, finance)
    VALUES('$id', '$name', '$type', '$city', '$region', '$finance')";

        if(!mysqli_query($con, $sql))
        {
            $success = false;
            die('Error : ' . mysqli_error($con));
        } else {
            $success = true;
        }
    }

    if ($success){
        echo "SUCCESS\n";
    } elseif (!$success){
        echo "ERROR\n";
    }
?>