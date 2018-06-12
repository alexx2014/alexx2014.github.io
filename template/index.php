<?php
require_once 'functions.php';	
switch($_REQUEST['show'])
{case $case: include 'gadgets/'.$case.'.php';break;
case 'content1':
show_content1();
break;
case 'content2':
show_content2();
break;
case 'content3':
show_content3();
break;
default:
show_content1();}
show_main();
function show_content1(){global $vars;$zagolovok=file('contents/headline.dat'); $vars['zagolovok']=$zagolovok[0];$vars['num'] =1;$template =file_get_contents('contents/content1.htm');$vars['contents']=parse_tpl($template, $vars);}
function show_content2(){global $vars;$zagolovok=file('contents/headline.dat'); $vars['zagolovok']=$zagolovok[1];$vars['num'] =2;$template =file_get_contents('contents/content2.htm');$vars['contents']=parse_tpl($template, $vars);}
function show_content3(){global $vars;$zagolovok=file('contents/headline.dat'); $vars['zagolovok']=$zagolovok[2];$vars['num'] =3;$template =file_get_contents('contents/content3.htm');$vars['contents']=parse_tpl($template, $vars);}
?>