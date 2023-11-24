<?php session_start(); 
include ('Push.php');  
$push = new Push(); 
$array=array(); 
$rows=array(); 
$notifList = $push->listNotificationUser($_SESSION['usuarioAdminRh']); 
$record = 0;
foreach ($notifList as $key) {
 $data['title'] = $key['nombreempleado'].' A cargado un: '.$key['tipocapacitacion'].' llamado: ';
 $data['msg'] = $key['nombrecurso'];
 $data['icon'] = 'images/avatar.png';
 $rows[] = $data;
 //$nextime = date('Y-m-d H:i:s',strtotime(date('Y-m-d H:i:s'))+($key['notif_repeat']*60));
 $push->updateNotification($key['id']);
 $record++;
}
$array['notif'] = $rows;
$array['count'] = $record;
$array['result'] = true;
echo json_encode($array);
?>