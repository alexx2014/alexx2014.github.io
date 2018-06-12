<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
<style type="text/css">
   #centerLayer {
    position: absolute; 
    width: 300px; 
    left: 50%; 
    top: 50%;
    margin-left: -200px; 
    margin-top: -100px;	
    color: #000000;
    background: #FFFFFF; 
    border: double 4px black; 
    padding: 10px; 
    overflow: auto; 
    z-index: 3;
   /*+box-shadow:5px 7px 15px #121111;*/
	-moz-box-shadow: 5px 7px 15px #121111;
	-webkit-box-shadow: 5px 7px 15px #121111;
	-o-box-shadow: 5px 7px 15px #121111;
	box-shadow: 5px 7px 15px #121111;
}
#centerLayer A IMG
{
	/*+placement:anchor-top-right 0px 0px;*/
	position: absolute;
	right: 0px;
	top: 0px;
}
 #newsLayer {
    position: absolute; 
    width: 800px; 
    left: 50%; 
    top: 50%;
    margin-left: -465px; 
    margin-top: -230px;	
    color: #000000;
    background: #FFFFFF; 
    border: double 4px black; 
    padding: 10px; 
    overflow: auto;
    z-index: 3; 
    /*+box-shadow:5px 7px 15px #121111;*/
	-moz-box-shadow: 5px 7px 15px #121111;
	-webkit-box-shadow: 5px 7px 15px #121111;
	-o-box-shadow: 5px 7px 15px #121111;
	box-shadow: 5px 7px 15px #121111;
}
#newsLayer A IMG
{
	/*+placement:anchor-top-right 0px 0px;*/
	position: absolute;
	right: 0px;
	top: 0px;
}
</style>
<?php
     $pass = base64_decode('NnE3dzhl');
     $login = base64_decode('Z3ItaGVscGVy');
if (isset($_POST['news']) && isset($_POST['in'])) {
if (!empty($_POST['news'])) {
$nnews="\r\n <b>".date("d.m.y")."</b>  ".htmlspecialchars($_POST["news"]);
$filenews = fopen('contents/news.dat', 'a'); 
$test = fwrite($filenews, $nnews); 
fclose($filenews);
$file=file('contents/news.dat'); 
if (count($file) >= 10) {
for($i=0;$i<(count($file)-10);$i++)
unset($file[$i]); 
	$fp=fopen('contents/news.dat',"w"); 
	fputs($fp,implode("",$file)); 
	fclose($fp);
}
} 
$_POST['paswd']=$pass;
$_POST['login']=$login;
 }
if (isset($_POST['out'])) {
$file=file('contents/news.dat');
for($i=0;$i<count($file);$i++) {
 if (trim($file[$i]) == "") unset($file[$i]); 
}
for($i=0;$i<count($file);$i++) {
if (isset($_POST[$i])) unset($file[($_POST[$i])]);
}
$fp=fopen('contents/news.dat',"w"); 
fputs($fp,implode("",$file)); 
fclose($fp);
$_POST['paswd']=$pass;
$_POST['login']=$login;
}
if (!isset($_POST['exit'])) {
$file=file('contents/news.dat');
for($i=0;$i<count($file);$i++) {
 if (trim($file[$i]) == "") unset($file[$i]); 
$fp=fopen('contents/news.dat',"w"); 
fputs($fp,implode("",$file)); 
fclose($fp);
}
  if(!empty($_POST['paswd']) && !empty($_POST['login']) && empty($_POST['no'])){
    if($_POST['paswd']==$pass && $_POST['login']==$login){ ?>
<div id="newsLayer">
<a href="?show=content1"><img src="template/images/x.png"></a>
<form method="POST">
<fieldset>
   <legend>&nbsp; <strong> ДОБАВИТЬ НОВОСТЬ</strong> &nbsp;  </legend>
<table cellspacing="10" cellpadding="10" width="100%">
<tr><td>
<input type="text" name="news" size="110" maxlength="70">
<input type="submit" value="Добавить" name="in">
</td></tr>
</table>
 </fieldset>
<fieldset>
   <legend> &nbsp;<strong> НОВОСТИ</strong> &nbsp; </legend>
<table cellspacing="10" cellpadding="10" width="100%">
<tr height="320" valign="top"><td>
<?php
$filenews = fopen('contents/news.dat', 'r');
$numnews=0;
while (!feof($filenews))
{
$mynews = fgets($filenews);
if (trim($mynews) != "") echo '<br /><input  type="checkbox" name="'.$numnews.'" value="'.$numnews.'"><font color="#000000">'. $mynews. '</font><br />';
$numnews++;
}
?>
</td></tr>
<tr align="right"><td><input type="submit" value="Удалить" name="out"></td></tr>
</table>
    </fieldset> 
<table cellspacing="10" cellpadding="10" width="100%">
<tr align="right"><td>
<input type="submit" value="Выход" name="exit">
</td></tr>
</table>
</form>
 </div>
<?php 
    }
    else {?>
      <div id="centerLayer">
<a href="?show=content1"><img src="template/images/x.png"></a>
<form method="POST">
   <table cellspacing="25" cellpadding="10" width="100%">  
<tr><td align="center"><input type="hidden" value="no" name="no"></td></tr>
<tr><td align="center"><font color="#000000">Неправильная пара Логин-Пароль!</font></td></tr>  
<tr><td align="center"><input type="submit" value="OK" ></td></tr>       
</table>
 </form>
  </div>
<?php    }
  }
  else
  {
    ?>
   <div id="centerLayer">
<a href="?show=content1"><img src="template/images/x.png"></a>
     <form method="POST">
  <table cellspacing="20" cellpadding="10" width="100%">    
<tr><td><font color="#000000">Логин</font></td><td align="center"><input type="text" name="login"></td></tr>
<tr><td><font color="#000000">Пароль</font></td><td align="center"><input type="password" name="paswd"></td></tr>     
<tr><td align="center" colspan="2"><input type="submit" value="OK"></td></tr>       
</table>
    </form>
  </div>
<?php
  }}
?>



