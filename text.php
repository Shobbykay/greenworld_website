<?php
# object oriented
$from = new DateTime('1970-02-01');
$to   = new DateTime('today');
// echo $from->diff($to)->y;

# procedural
echo date_diff(date_create('1970-02-01'), date_create('today'))->y;