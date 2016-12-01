<?php
// mysqliクラスのオブジェクトを作成
$mysqli = new mysqli('localhost', 'root', 'root', 'test');
if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    $mysqli->set_charset("utf8");
}

// ここにDB処理いろいろ書く（後述）

$query = sprintf( "insert into new_table (test_key,test_value) values ('%s' , '%s');",$_GET["test_key"],$_GET["test_value"] );
echo $query;
echo "<br>";


$mysqli->query(sprintf( "insert into new_table (test_key,test_value) values ('%s' , '%s');",$_POST["test_key"],$_POST["test_value"] ));

echo "here";
echo $_GET["test_key"];
echo $_GET["test_value"];

$mysqli->close();
?>
