<?php 
$pattern ='/[a-z]/';
$text = 'This is a Sample Text.';
if (preg_match($pattern, $text)) {
    echo 'Huruf kecil ditemukan!';
} else {
    echo 'Tidak ada huruf kecil!';
}
?>

<br>

<?php
$pattern = '/[0-9]+/';
$text = 'There are 123 apples.';
if(preg_match($pattern, $text, $matches)){
    echo 'Cocokkan: ' .$matches[0];
} else {
    echo 'Tidak ada yang cocok!';   
}
?>

<br>

<?php
$pattern = '/apple/';
$replacement = 'banana';
$text = 'I like apple pie.';
$new_text = preg_replace($pattern, $replacement, $text);
echo $new_text;
?>

<br>

<?php
$pattern ='/go*d/';
$text = 'god is good';
if (preg_match($pattern, $text, $matches)) {
    echo 'Cocokkan: ' .$matches[0];
} else {
    echo 'Tidak ada yang cocok!';
}
?>

<br>

<?php
$pattern ='/go?d/';
$text = 'gd is good';
if (preg_match($pattern, $text, $matches)) {
    echo 'Cocokkan: ' .$matches[0];
} else {
    echo 'Tidak ada yang cocok!';
}
?>

<br>

<?php
$pattern ='/n{1,3}/';
$text = 'nanimo';
if (preg_match($pattern, $text, $matches)) {
    echo 'Cocokkan: ' .$matches[0];
} else {
    echo 'Tidak ada yang cocok!';
}
?>

<br>

<?php
$pattern ='/g{4,6}/';
$text = 'ggg is gggg';
if (preg_match($pattern, $text, $matches)) {
    echo 'Cocokkan: ' .$matches[0];
} else {
    echo 'Tidak ada yang cocok!';
}
?>