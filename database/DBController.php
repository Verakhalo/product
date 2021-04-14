<?php

class DBController
{
    //Database Connection Properties
    protected $host ='sql310.epizy.com';
    protected $user ='epiz_28392239';
    protected $password ='0jhLHzldwt';
    protected $database ='epiz_28392239_database';

    //connection property
    public $con = null;

    //call constructor
    public function __construct()
    {
        $this->con = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($this->con->connect_error){
            echo "Fail".$this->con->connect_error;
        }
        
    }
    public function __destruct()
    {
        $this->closeConnection();
    }
//for mysqli closing connection
protected function closeConnection(){
    if ($this->con != null ){
        $this->con->close();
        $this->con = null;
    }
}
}
