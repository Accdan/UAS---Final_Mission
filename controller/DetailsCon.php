<!-- <?php
require_once './model/event.php';
require_once './model/partner.php';
require_once './model/news.php';
 // Pastikan nama file model benar

class DetailsCon {
    private $eventcons;
    private $newscons;
    private $partnercons;

    public function __construct() {
        $this->eventcons = new Eventd(); // Pastikan nama kelas sesuai dengan file model
        $this->partnercons = new Partners(); // Pastikan nama kelas model sesuai
    }

    public function detail($eid) {
        $evend = $this->eventcons->getEventById($eid);
        $partnerd = $this->partnercons->getAllPartner(); // Memanggil metode getUserById dari model
        include 'view/admin/addevent/detail.php'; // Pastikan path file view benar
    }

    public function detailNews($nid) {
        $newd = $this->newscons->getNewsById($nid);
        include 'view/admin/addnews/detail.php'; // Pastikan path file view benar
    }

    public function detailPartner($pid) {
        $partnerd = $this->partnercons->getPartnerById($pid);
        include 'view/admin/addpartner/detail.php'; // Pastikan path file view benar
    }
    
}
?> -->
