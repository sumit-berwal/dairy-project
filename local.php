<?php

// $a = [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];


// foreach($a as $b){
//     if($b ==$b%2){
//         echo "sumit<br>";
//     }
// }

// $a = 3;
// $b = 5;
// $c = $a + $b;
// $a = $c - $a;
// $b = $c - $b;

// echo $a;
// echo "<br>";
// echo $b;

// $a = ["sumit", "Manoj", "Kanishka", "Sohan", "Kawaljit", "Somvir"];

// $b = count($a);
// echo $b;
// var_dump($a); exit;
// echo $a[1]; exit;
// $x=0;
// while($x<$b){
//     echo $a[$x];
//     echo"<br>";
//     $x++;
// }

// for($a=0;$a<=5;$a++){
    
//     for($b=0;$b<=$a;$b++){
//     echo " &nbsp;&nbsp;";
// }
// for($c=5;$c>=$a; $c--){
//     echo " * ";
// }
// for($d=5;$d>=$a;$d--)
// echo " * ";
// echo"<br>";
// }
// for($a=5;$a>=0;$a--){
    
//     for($b=0;$b<=$a;$b++){
//     echo " &nbsp;&nbsp;";
// }
// for($c=5;$c>=$a; $c--){
//     echo " * ";
// }
// for($d=5;$d>=$a;$d--)
// echo " * ";
// echo"<br>";
// }

// $inputstring = 'he::ll:)os:)umi:::(tho::)wa:(re::(you';

// $b = preg_match('$inputstring', ':)');
 
// echo "$b";

$result = array("Name" =>"sumit", "lName" => "Berwal", "Location" => "Hisar");


$var = fetch_array($result);


echo $var;
?>