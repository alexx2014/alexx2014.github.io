<?php
$login = 'Z3ItaGVscGVy';
$pass = 'NnE3dzhl';
if (file_exists("contents/guest.dat")){
$guestdel = file("contents/guest.dat");
for($delstr=0; $delstr<=count($guestdel); $delstr++){
if (!empty($_POST[$delstr])) unset ($guestdel[$delstr]);
file_put_contents ("contents/guest.dat",implode($guestdel));}}
if (!empty($_GET['num'])) {$vars[num]=$_GET['num'];} else {$vars[num]=$_POST['num'];}
if (!empty($_GET['secret1'])) {$vars[secret1]=$_GET['secret1'];} else {$vars[secret1]=$_POST['secret1'];}
if (!empty($_GET['secret2'])) {$vars[secret2]=$_GET['secret2'];} else {$vars[secret2]=$_POST['secret2'];}
if (!file_exists("contents/guest.dat")) {$baza = fopen("contents/guest.dat","w");} else {$baza = fopen("contents/guest.dat","a");}
if (!empty($_POST['name']) and !empty($_POST['usertext'])) {
if ($_POST['name']==base64_decode($login) and $_POST['usertext']== base64_decode($pass) and empty($vars[secret1]) and empty($vars[secret2])) {
$secret1='<tr><td align="right" ><input type="submit" name="';
$secret2='" value="�"></td></tr>';
$vars[secret1]=$login;
$vars[secret2]=$pass;
} 
else 
{
$usertext = nl2br($_POST['usertext']);
$usertext = str_replace("
","",$usertext);
$mat = "/\w{0,5}[�x]([�x\s\!@#\$%\^&*+-\|\/]{0,6})[�y]([�y\s\!@#\$%\^&*+-\|\/]{0,6})[�i�e�����]\w{0,7}|\w{0,6}[�p]([�p\s\!@#\$%\^&*+-\|\/]{0,6})[i��]([i��\s\!@#\$%\^&*+-\|\/]{0,6})[3��]([3��\s\!@#\$%\^&*+-\|\/]{0,6})[�d]\w{0,10}|[�cs][�y]([�y\!@#\$%\^&*+-\|\/]{0,6})[4�k�]\w{1,3}|\w{0,4}[b�]([b�\s\!@#\$%\^&*+-\|\/]{0,6})[l�]([l�\s\!@#\$%\^&*+-\|\/]{0,6})[y�]\w{0,10}|\w{0,8}[�][b�][����@e���a][���@���]\w{0,8}|\w{0,4}[�e]([�e\s\!@#\$%\^&*+-\|\/]{0,6})[�b]([�b\s\!@#\$%\^&*+-\|\/]{0,6})[u�]([u�\s\!@#\$%\^&*+-\|\/]{0,6})[�4�]\w{0,4}|\w{0,4}[�e�]([�e�\s\!@#\$%\^&*+-\|\/]{0,6})[�b]([�b\s\!@#\$%\^&*+-\|\/]{0,6})[�n]([�n\s\!@#\$%\^&*+-\|\/]{0,6})[�y]\w{0,4}|\w{0,4}[�e]([�e\s\!@#\$%\^&*+-\|\/]{0,6})[�b]([�b\s\!@#\$%\^&*+-\|\/]{0,6})[�o�a@]([�o�a@\s\!@#\$%\^&*+-\|\/]{0,6})[�n�t]\w{0,4}|\w{0,10}[�]([�\!@#\$%\^&*+-\|\/]{0,6})[�]\w{0,6}|\w{0,4}[p�]([p�\s\!@#\$%\^&*+-\|\/]{0,6})[�e�i]([�e�i\s\!@#\$%\^&*+-\|\/]{0,6})[�d]([�d\s\!@#\$%\^&*+-\|\/]{0,6})[o��a@�e�i]([o��a@�e�i\s\!@#\$%\^&*+-\|\/]{0,6})[�r]\w{0,12}/i"; 
$count3 = preg_match($mat,$usertext);
$usertext=str_replace("<a","", $usertext, $count1);
$usertext=str_replace("</a>","", $usertext, $count2);
$usertext=str_replace(".ru","", $usertext, $count4);
$usertext=str_replace("http://","", $usertext, $count5);
$usertext=str_replace(".com","", $usertext, $count6);
if ($count1 == 0 && $count2 == 0 && $count3 == 0 && $count4 == 0 && $count5 == 0 && $count6 == 0) {
$guest = date("d.m.y")."!&!".$_POST['name']."!&!".$usertext."\r\n";
fwrite($baza,$guest);}}
fclose($baza);}
$guestpost = file("contents/guest.dat");
$vars[str]='<li style="float:left; margin:5px; list-style: none;">��������: ';
for($str=1; $str<=(ceil(count($guestpost)/10)); $str++){
$vars[str]= $vars[str].'<li style="float:left; margin:5px; list-style: none;"><a href="./?show=guest&str='.$str.'&num='.$vars[num].'">'.$str.'</a>';
}
if (!empty($_GET['str'])) {$list=(($_GET['str']));} else {$list=1;}
if ($list==1) {$param1=count($guestpost); $param2=(count($guestpost)-10);}
if ($list>1){ $param1=(count($guestpost)-(($list-1)*10)); $param2=$param1-10;}
if ($param2<=0) $param2=0;
if (count($guestpost)!=0) $param1=$param1-1;
for($nw=$param1; $nw>=$param2; $nw--) {
$fields = explode("!&!", $guestpost[$nw]);
if (!empty($fields[0])){
if (!empty($vars[secret1]) and !empty($vars[secret2])) $hz=$nw;
if (!empty($vars[secret1]) and !empty($vars[secret2])){ $secret1='<tr><td align="right" ><input type="submit" name="';
$secret2='" value="�"></td></tr>';}
$vars[guestpost] = $vars[guestpost].'
<input id="raskrit" type="button" value = "�����: '.$fields[1].'  ����: '.$fields[0].'">
<div id="dobavit"><table>
'.$secret1.$hz.$secret2.' 
<tr><td align="left" >'.$fields[2].'</td></tr>
</table>
</div>&nbsp;';
}else {$vars[guestpost]='&nbsp;';}
}

$zagolovok=file('contents/headline.dat');
$vars[zagolovok]=$zagolovok[$vars[num]-1];
$template =file_get_contents('contents/content'.$vars[num].'.htm');
$vars[contents]=parse_tpl($template, $vars);
?>