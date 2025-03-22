<?php
$nilai =110 ;
if(($nilai>=85) && ($nilai<=100)){
    $index =  'A';
}
else if($nilai>=70){
    $index =  'b';
}
else if($nilai>=50){
    $index =  'c';
}
else if($nilai>=30){
    $index =  'd';
}
else{
    $index =  'e';
}
echo "nilai= ".$nilai;
echo "index= " .$index;
?>