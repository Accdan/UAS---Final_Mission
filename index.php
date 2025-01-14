<?php
session_start();
require_once './init.php';
// Including necessary controller files
// require_once 'controller/RoleCon.php';
// require_once 'controller/UserCon.php';
// require_once 'controller/EventCon.php';
// require_once 'controller/PartnerCon.php';
// require_once 'controller/NewsCon.php';
// require_once 'controller/AboutCon.php';
// require_once 'controller/ArchiveCon.php';
// require_once 'controller/LandingCon.php';


// Define default values for parameters
$modul = $_GET['modul'] ?? 'login';
$fitur = $_GET['fitur'] ?? 'list';
$show = $_GET['show'] ?? 'list';
// var_dump($show);
// var_dump($modul);
// var_dump($fitur);
// exit;


 if (!isset($_SESSION['uname']) && ($_GET['modul'] ?? '') !== 'login') {
     header('Location: index.php?modul=login');
     exit;
 }

switch ($modul) {
    case 'landing': 
        $controller = new LandingCon(); 
            
        switch ($show) {
            case 'ShowE': $controller->ListAllEvent() ; break;
            case 'Event-Detail': {
                $eid = $_GET['eid'];
                // $pid = $_GET['pid'];
                $controller->DetailEvent($eid);
            } break;    
            case 'ShowN': $controller->ListAllNews(); break;
            case 'News-Detail': {
                $nid = $_GET['nid'];
                $controller->DetailNews($nid);
            } break;
            case 'ShowP': $controller->ListAllPartners(); break;
            case 'Partners-Detail': $controller->DetailAllPartners(); break;
            case 'ShowA': include 'view/members/ShowAbout.php'; break;
            default: include 'view/landing.php'; break;
        }
        break;

    case 'dashboard':
        include 'view/admin/dashboard.php';
        break;

    case 'role':
        $controller = new RoleCon();
        switch ($fitur) {
            case 'list': $controller->listRole(); break;
            case 'input': $controller->addRole(); break;
            case 'delete': $controller->delete($_GET['id']); break;
            case 'edit': $controller->edit($_GET['id']); break;
            case 'update': $controller->update(); break;
            default: echo "Fitur tidak ditemukan!"; break;
        }
        break;

    case 'user':
        $controller = new UserCon();
        switch ($fitur) {
            case 'list': $controller->listUser(); break;
            case 'reqinput': $controller->getAllRoles(); break;
            case 'input': $controller->addUser(); break;
            case 'delete': $controller->delete($_GET['uid']); break;
            case 'edit': $controller->edit($_GET['uid']); break;
            case 'update': $controller->update(); break;
            default: echo "Fitur tidak ditemukan!"; break;
        }
        break;

    case 'event':
        $controller = new EventCon();
        switch ($fitur) {
            case 'list': $controller->listEvent(); break;
            case 'reqinput': $controller->getAllPartners(); break;
            case 'input': $controller->addEvent(); break;
            case 'delete': $controller->delete($_GET['eid']); break;
            case 'edit': $controller->edit($_GET['eid']); break;
            case 'update': $controller->update(); break;
            case 'detail': $controller->detail($_GET['eid']); break;
            default: echo "Fitur tidak ditemukan!"; break;
        }
        break;

    case 'partner':
        $controller = new PartnerCon();
        switch ($fitur) {
            case 'list': $controller->listPartner(); break;
            case 'input': $controller->addPartner(); break;
            case 'delete': $controller->deletePartner($_GET['pid']); break;
            case 'edit': $controller->editPartner($_GET['pid']); break;
            case 'update': $controller->update(); break;
            default: echo "Fitur tidak ditemukan!"; break;
        }
        break;

    case 'news':
        $controller = new NewsCon();
        switch ($fitur) {
            case 'list': $controller->listNews(); break;
            case 'input': $controller->addNews(); break;
            case 'delete': $controller->delete($_GET['nid']); break;
            case 'archive_delete': $controller->archive_delete($_GET['nid']); break;
            case 'edit': $controller->edit($_GET['nid']); break;
            case 'update': $controller->update(); break;
            case 'detail': $controller->detail($_GET['nid']); break;
            default: echo "Fitur tidak ditemukan!"; break;
        }
        break;

    case 'about':
        $controller = new About();
        switch ($fitur) {
            // case 'create': $controller->createProfile(); break;
            // case 'update': $controller->update($_GET['aid']); break;
            // case 'view': $controller->getProfile($_GET['aid']); break;
            default: echo "Fitur tidak ditemukan!"; break;
        }
        break;

    case 'archive':
        $controller = new ArchieveCon();
        switch ($fitur) {
            case 'list': $controller->listAll(); break;
            default: echo "Fitur tidak ditemukan!"; break;
        }
        break;

    
        case 'login':
            // Mengarahkan ke halaman login jika modul adalah login
            header('Location: login.php');
            break;
        
        }
    
?>
