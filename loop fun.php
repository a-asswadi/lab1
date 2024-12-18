<?php
$x=2;
$y=7;
$s=$x+$y;
echo $s;
echo '<br><br>';
###################
echo ' if else coundtion exersice';
echo '<br>';

if($x>3)
echo "x bigger than 3";

else
echo 'x is smaller than 3';

echo '<br><br>';

#############################
echo ' for loop exersice';
echo '<br>';

for($i=0 ; $i<10 ; $i++)
{echo $i;
echo '<br>';}


#######################
$m=0;
do{
echo $m;
$m++;}
while($m<$y);

#######################
echo '<br><br>';
echo ' while loop exersice';
echo '<br>';
$w=0;
while($w < $y)
{echo $w;
$w++;
echo '<br>';}

################

echo '<br><br>';
echo ' switch exersice';
echo '<br>';

$r=2;

switch($r){
case 1:echo 'the num is one';
       break;
case 2:echo 'the num is tow';
       break;
case 3:echo 'the num is three';
       break;
default :echo 'please write just a numbers';
      }