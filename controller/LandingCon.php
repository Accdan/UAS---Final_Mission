<?php
require_once './model/news.php';
require_once './model/event.php';
require_once './model/partners.php';


class LandingCon{
private $newsController;
private $eventController;   
private $partnerController;

    public function __construct() {
        $this->newsController = new News();
        $this->eventController = new Eventd;
        $this->partnerController = new Partners();
  
    }
    
    public function ListAllEvent(){
        $evend = $this->eventController->getAllEvent();
        $partnerd = $this->partnerController->getAllPartner();
        // var_dump($evend);
        // var_dump($partnerd);
        include 'view/members/ShowEvent.php';
        
    }

    public function GetListAllEvent(){
        return $this->eventController->getAllEvent();
    
    }
    public function DetailEvent($eid){
        // var_dump($eid);
        // die(var_dump($eid));

        $evend = $this->eventController->getEventById($eid);
        $partnerd = $this->partnerController->getPartnerById($evend['pid']);
        // var_dump($partnerd);
        // die;
        include 'view/members/DetailEvent.php';
    }

    public function ListAllNews(){
        $newd = $this->newsController->getAllNews();
        include 'view/members/ShowNews.php';
    }

    public function GetListAllNews(){
        return $this->newsController->getAllNews();
    }
    public function DetailNews($nid){
        $newd = $this->newsController->getNewsById($nid);
        include 'view/members/DetailNews.php';
    }

    public function ListAllPartners(){
        $partnerd = $this->partnerController->getAllPartner();
        include 'view/members/ShowPartner.php';
    }

    public function DetailAllPartners(){
        $partnerd = $this->partnerController->getAllPartner();
        include 'view/members/DetailPartner.php';
    }
}
?>