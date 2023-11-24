<?php session_start();
date_default_timezone_set("America/Lima");
class Push {
	private $host  = 'localhost';
    private $user  = 'root';
    private $password   = "";
    private $database  = "metasrh";    
    private $notifTable = 'datos';
	private $dbConnect = false;
    public function __construct(){
        if(!$this->dbConnect){ 
            $conn = new mysqli($this->host, $this->user, $this->password, $this->database);
            if($conn->connect_error){
                die("Error failed to connect to MySQL: " . $conn->connect_error);
            }else{
                $this->dbConnect = $conn;
            }
        }
    }
	private function getData($sqlQuery) {
		$result = mysqli_query($this->dbConnect, $sqlQuery);
		if(!$result){
			die('Error in query: '. mysqli_error());
		}
		$data= array();
		while ($row = mysqli_fetch_assoc($result)) {
			$data[]=$row;            
		}
		return $data;
	}
		
	public function listNotificationUser($user){
		$sqlQuery = "SELECT * FROM ".$this->notifTable." WHERE notif_loop = 0";
		return  $this->getData($sqlQuery);
	}	
	
	
	public function updateNotification($id) {		
		$sqlUpdate = "UPDATE ".$this->notifTable." SET notif_loop = 1 WHERE id=$id";
		mysqli_query($this->dbConnect, $sqlUpdate);
	}	
}
?>