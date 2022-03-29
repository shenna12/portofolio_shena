<?php

class Portofolio extends Controller
{
 
  public function index()
    {
       $data['profile'] = $this->model('PortofolioModel')->getProfile();

      $data['about'] = $this->model('PortofolioModel')->getAbout();

      $this->view('portofolio/index',$data);
    }
  
}