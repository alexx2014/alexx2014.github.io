<?php
global $vars;
$adminmail = '2kld@mail.ru'; 

$vars[name]=$_POST['name'];
$vars[email]=$_POST['email'];
$vars[subject]=$_POST['subject'];
$vars[messagepost]=$_POST['messagepost'];

$error = '';
  if ( empty( $vars[name] ) ) $error = $error.'<li>�� ��������� ���� "���"</li>';
  if ( empty( $vars[email] ) ) $error = $error.'<li>�� ��������� ���� "E-mail"</li>';
  if ( empty( $vars[subject] ) ) $error = $error.'<li>�� ��������� ���� "����"</li>';
  if ( empty( $vars[messagepost] ) ) $error = $error.'<li>�� ��������� ���� "���������"</li>';
  if ( !empty( $vars[email] ) and !preg_match( "#^[0-9a-z_\-\.]+@[0-9a-z\-\.]+\.[a-z]{2,6}$#i", $vars[email] ) )
  $error = $error.'<li>���� "E-mail" ������ ��������������� ������� name@site.ru</li>';

if ( !empty( $error ) ) {$vars[note]  = '<p>��� ���������� ����� ���� �������� ������:</p><ul>'.$error.'</ul>';}
else
{
$send_charset = "Windows-1251"; 
$headers = "From: ".$vars[email]."\r\n";
$type = ($html) ? 'html' : 'plain';
$headers .= "Content-type: text/$type; charset=$send_charset\r\n";
$headers .= "Mime-Version: 1.0\r\n";
$messagepost = "�����:\r\n".$vars[name]."\r\n\r\n";
$messagepost .= "E-MAIL:\r\n".$vars[email]."\r\n\r\n";
$messagepost .= "����:\r\n".$vars[subject]."\r\n\r\n";
$messagepost .= "���������:\r\n".$vars[messagepost];
$subject= "��������� � ����� ".strtoupper($_SERVER['SERVER_NAME']);



if ($reply_to) {$headers .= "Reply-To: $reply_to";}
if (mail($adminmail, $subject, $messagepost, $headers)) 
{$vars[note]  = '<script type="text/javascript">alert("��������� ���������� !");</script>';
$vars[name]='';
$vars[email]='';
$vars[subject]='';
$vars[messagepost]='';
}
}



$zagolovok=file('contents/headline.dat');
$vars[num]=$_POST['num'];
$vars[zagolovok]=$zagolovok[$vars[num]-1];
$template =file_get_contents('contents/content'.$_POST['num'].'.htm');
$vars[contents]=parse_tpl($template, $vars);
?>