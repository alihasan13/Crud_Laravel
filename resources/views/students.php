<!DOCTYPE html>
<html>
<head>
    <title>Students View</title>
</head>
<body>
<?php
foreach ($students as $student) {
    echo $student->name,"<br>";
}

?>
</body>
</html>