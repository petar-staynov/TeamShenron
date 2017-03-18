<?php
function getRole($db, $role_id)
{
    $sql = 'SELECT * FROM roles WHERE id = "' . $role_id . '"';
    $query = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($query);
}

function getRegistrations($db, $role_id, $class_id = null)
{
    $rows = array();
    switch ($role_id) {
        case 4:
            $sql = 'SELECT * FROM users WHERE role_id = 3  AND approved = 0';
            $query = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                $rows[] = $row;
            }
            return $rows;
            break;
        case 3:
            $sql = 'SELECT * FROM users WHERE role_id = 2 AND approved = 0';
            $query = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                $rows[] = $row;
            }
            return $rows;
            break;
        case 2:
            $sql = 'SELECT * FROM users WHERE role_id = 1 AND approved = 0 AND class_id = "'.$class_id.'"';
            $query = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                $rows[] = $row;
            }
            return $rows;
            break;
    }
}

function getSchool($db, $school_id)
{
    $sql = 'SELECT * FROM schools WHERE id = "' . $school_id . '"';
    $query = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($query);
}

function getClass($db, $class_id)
{
    $sql = 'SELECT * FROM classes WHERE id = "' . $class_id . '"';
    $query = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($query);
}

function getClasses($db, $school_id)
{
    $rows = [];
    $sql = 'SELECT * FROM classes WHERE approved = 1';
    $query = mysqli_query($db, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $rows[] = $row;
    }
    return $rows;
}

function getTeacher($db, $teacher_id)
{
    $sql = 'SELECT * FROM users WHERE id= "' . $teacher_id . '"';
    $query = mysqli_query($db, $sql);
    return mysqli_fetch_assoc($query);
}


//SCHEDULE FUNCTIONS
function getSchoolName($db, $schoolId) //returns string = schoolname
{
    $stmt = $db->prepare("SELECT name FROM schools WHERE schools.id = ?");
    $stmt->bind_param('i', $schoolId);
    $stmt->execute();
    $stmt->bind_result($schoolName);
    $stmt->fetch();
    $stmt->close();
    return $schoolName;
}

function getClassInfo($db, $classId) //returns array['class_num], array['class_letter']
{
    $stmt = $db->prepare("SELECT class_letter, class_num FROM classes WHERE classes.id =  ?");
    $stmt->bind_param('i', $classId);
    $stmt->execute();
    $stmt->bind_result($classLetter, $classNum);
    $classInfo = [];
    while($stmt->fetch()){
        $classInfo['class_num'] = $classNum;
        $classInfo['class_letter'] = $classLetter;
    }
    $stmt->close();
    return $classInfo;
}

function getSchedule($db, $classId) //returns schedule array
{
    $stmt = $db->prepare("SELECT schedule FROM schedules WHERE class_id = ?");
    $stmt->bind_param('i', $classId);
    $stmt->execute();
    $stmt->bind_result($schedule);
    $stmt->fetch();
    if ($schedule == NULL) {
        $stmt = $db->prepare("INSERT INTO schedules (class_id, schedule) VALUES (?, ?)");

        $schedule = ", , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , , ,";
        $stmt->bind_param('is', $classId, $schedule);
        $stmt->execute();
    }
    $schedule = explode(',', $schedule);
    $stmt->close();
    return $schedule;
}