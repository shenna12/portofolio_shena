<?php

class PortofolioModel{
  private $host = DB_HOST;
  private $user = DB_USER;
  private $pass = DB_PASS;
  private $db_name=DB_NAME;

  private $dbh;
  private $stmt;
  function __construct()
  {

    $dsn ='mysql:host='.$this->host.'dbname='.$this->db_name;
    $option = [
      PDO::ATTR_PERSISTENT =>true,
      PDO::ATTR_ERRMODE =>PDO::ERRMODE_EXCEPTION
    ];
    try{
       $this->dbh = new PDO($dsn,$this->user,$this->pass,$option);
    }catch(PDOException $e){
       die($e->getMessage());
    }
  }
  public function index()
  {
    
    $data['profile'] = $this->model('PortofolioModel')->getProfile();

    $this->view('portofolio/index',$data);
  }
  public function getProfile()
  {
    $this->stmt->$this->dbh->prpare('SELECT*FROM user');
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function getAbout()
  {
    $this->stmt = $this->dbh->prepare('SELECT * FROM about');
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}