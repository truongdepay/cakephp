<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Crawler Controller
 *
 *
 * @method \App\Model\Entity\Crawler[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CrawlerController extends AppController
{
    /**
     * @var $url
     */
    protected $url;
    
    /**
     * @var $urlGenK
     */
    protected $urlGenK;

    /**
     * @param array $config
     */
    public function initialize()
    {
        parent::initialize();
        $this->url = 'http://bongdaplus.vn';
        $this->urlGenK = 'http://genk.vn';
        $this->urlVnexpress = 'https://vnexpress.net';
    }

    public function getContentbongdaplus()
    {
        $url = $this->url . '/chuyen-nhuong.html';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $page = curl_exec($curl);
        $page = str_replace("\n", "", $page);
        $page = str_replace("\t", "", $page);
        $page = htmlentities($page, 1);
        //echo $page;
    
        $regexGetNews = htmlentities("/<div class=\"nwslst gr6\"><ul class=\"lst\">(.*?)<\/ul><\/div>/", 1);
        
        $data = [];
        $dataTitle = [];
        $dataImg = [];
        $dataLink = [];
        $listNew = '';
        if (preg_match_all($regexGetNews, $page, $match)) {
            $listNew = $match[1][0];
        }
        
        //$listNew = '<li><a href="/dai-gia-chau-au-choang-vang-vi-muc-gia-cua-felix-2513531905.html"><h4>Benfica đòi cái giá khó tin cho \'Ronaldo đệ nhị\'<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/25/8/felix_m.jpg" alt="Benfica đòi cái giá khó tin cho &quot;Ronaldo đệ nhị&quot;"></a> Giám đốc Domingos Soares de Oliveira của Benfica mới đây đã khiến cho M.U, Man City hay Bayern Munich phải giật mình khi hét giá bán tiền đạo trẻ Joao Felix. </li><li><a href="/m-u-lien-he-voi-griezmann-2513201905.html"><h4>M.U liên hệ với Griezmann<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/25/67/griezmann_m.jpg" alt="M.U liên hệ với Griezmann"></a> Trong khi Barcelona vẫn đang lưỡng lự, Manchester Untied đã tiến hành liên hệ với Antoine Griezmann. </li><li><a href="/man-city-phai-pha-ky-luc-chuyen-nhuong-trung-ve-neu-muon-co-maguire-2512911905.html"><h4>Man City phải phá kỷ lục chuyển nhượng trung vệ nếu muốn có Maguire<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/24/8/van_dijk_maugire_m.jpg" alt="Man City phải phá kỷ lục chuyển nhượng trung vệ nếu muốn có Maguire"></a> Báo chí Anh đưa tin, Man City sẽ phải trả số tiền lên tới 90 triệu bảng nếu muốn chiêu mộ trung vệ Harry Maguire của Leicester. Đây cũng là mục tiêu săn đuổi của M.U nhưng vẫn chưa thành công. </li><li><a href="/chuyen-nhuong-24-5-messi-muon-barca-mua-sane-thay-vi-griezmann-2512801905.html"><h4>Chuyển nhượng 24/5: Messi muốn Barca mua Sane thay vì Griezmann<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/24/62/messi-muon-sane-hon-griezmann_m.jpg" alt="Chuyển nhượng 24/5: Messi muốn Barca mua Sane thay vì Griezmann"></a> Messi thích Sane hơn Griezmann; Solskjaer muốn mua 7 cầu thủ; Tottenham bất ngờ quan tâm Asensio... là những tin tức chuyển nhượng nổi bật trong 24h qua. </li><li><a href="/m-u-dụ-dõ-de-ligt-bàng-múc-luong-tren-troi-2512641905.html"><h4>M.U dụ dỗ De Ligt bằng mức lương trên trời<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/24/41/de-ligt1_m.jpg" alt="M.U dụ dỗ De Ligt bằng mức lương trên trời"></a> BLĐ Man United dự tính sẽ mời gọi trung vệ Matthijs De Ligt bằng mức lương 236.000 bảng/tuần, cao thứ 3 trong đội, chỉ sau Alexis Sanchez và Paul Pogba. </li><li><a href="/m-u-thanh-lý-10-càu-thủ-trẻ-hè-này-2512611905.html"><h4>M.U thanh lý 10 cầu thủ trẻ Hè này<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/24/41/mu_m.jpg" alt="M.U thanh lý 10 cầu thủ trẻ Hè này"></a> James Wilson cùng 10 cầu thủ trẻ của lò đào tạo Man United nhiều khả năng sẽ bị BLĐ đội bóng thanh lý trong kỳ chuyển nhượng mùa Hè này. </li><li><a href="/m-u-dam-phan-voi-bo-doi-nguoi-thua-cua-psg-2512371905.html"><h4>M.U đàm phán với bộ đôi \'người thừa\' của PSG<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/24/70/psg_m.jpg" alt="M.U đàm phán với bộ đôi &quot;người thừa&quot; của PSG"></a> Để tránh đi vào bước xe đổ của những lần chuyển nhượng trước, Man United không còn quá mặn mà tạo "bom tấn" mà chuyển hướng sang những mục tiêu như Thomas Meunier và Adrien Rabiot. </li><li><a href="/james-rodriguez-quyet-roi-bayern-2512421905.html"><h4>James Rodriguez quyết rời Bayern<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/24/26/james1_m.jpg" alt="James Rodriguez quyết rời Bayern"></a> James Rodriguez không còn khát khao cống hiến cho Bayern Munich. Tuyển thủ Colombia muốn rời xứ Bavaria để tìm kiếm cơ hội mới trong sự nghiệp. Và tất nhiên, tiền vệ này cũng không hy vọng được Zidane trọng dụng khi trở về Real Madrid. </li><li><a href="/chu-tich-bayern-xac-nhan-dang-dam-phan-mua-sane-2512231905.html"><h4>Chủ tịch Bayern xác nhận đang đàm phán mua Sane<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/24/7/sane_m.jpg" alt="Chủ tịch Bayern xác nhận đang đàm phán mua Sane"></a> Tương lai của Leroy Sane đang hướng về Bayern Munich khi mà chủ tịch Uli Hoeness khẳng định đôi bên đã tiến đến đàm phán những điều khoản cá nhân. </li><li><a href="/leicester-tinh-dua-robben-tro-lai-ngoai-hang-anh-2512201905.html"><h4>Robben rộng đường trở lại Ngoại hạng Anh<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/24/8/robben1_m.jpg" alt="Robben rộng đường trở lại Ngoại hạng Anh"></a> Theo báo chí Anh, Leicester đang là bến đỗ hàng đầu trong suy nghĩ của cầu thủ chạy cánh Arjen Robben sau khi anh chia tay Bayern Munich vào cuối mùa giải 2018/19. </li><li><a href="/m-u-chua-nghi-toi-bale-cho-den-khi-duoi-co-duoc-sanchez-2511891905.html"><h4>M.U chỉ nghĩ đến Bale nếu tống khứ được Sanchez<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/23/66/bale_m.jpg" alt="M.U chỉ nghĩ đến Bale nếu tống khứ được Sanchez"></a> Man United sẽ chưa hỏi mua Gareth Bale của Real Madrid chừng nào thanh lý thành công "bom xịt" Alexis Sanchez. </li><li><a href="/chuyen-nhuong-23-5-ronaldo-muon-real-cho-muon-vinicius-2511851905.html"><h4>Chuyển nhượng 23/5: Ronaldo muốn Real cho mượn Vinicius<span class="nwsicm"></span></h4><img src="http://img.f8.bdpcdn.net/Assets/Media/2019/05/24/62/chuyen-nhuong-235-copy_m.jpg" alt="Chuyển nhượng 23/5: Ronaldo muốn Real cho mượn Vinicius"></a> Ronaldo muốn Real cho mượn Vinicius; Conte sắp dẫn dắt Inter; James trở về Real... là những tin chuyển nhượng đáng chú ý nhất 24h qua. </li>';
        $regexGetLink = htmlentities('/<a href="(.*?)">/', 1);
        $regexGetImage = htmlentities("/<h4>(.*?)<span class=\"nwsicm\"><\/span><\/h4><img src=\"(.*?)\" alt=\"(.*?)\">/", 1);
        if (preg_match_all($regexGetLink, $listNew, $match)) {
            $dataLink = $match[1];
        } else {
            echo "Error get Link!";
        }
    
        if (preg_match_all($regexGetImage, $listNew, $match)) {
            $dataImg = $match[2];
            $dataTitle = $match[1];
        } else {
            echo "Error get Image!";
        }
    
        foreach ($dataTitle as $value) {
            $data[]['title'] = $value;
        }
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['img'] = $dataImg[$i];
            $data[$i]['link'] = $dataLink[$i];
        }
        //var_dump($data);
        return $data;
        exit;
    }

    public function getContentgenk()
    {
        $data = [];
        $url = $this->urlGenK . '';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $page = curl_exec($curl);
        $page = str_replace("\n", "", $page);
        $page = str_replace("\t", "", $page);

        $regexGetNews = "/<div class=\"knswli-left fl\"><a title=\"(.*?)\" href=\"(.*?)\" class=\"kscliw-ava\"><img src=\"(.*?)\" title=\"(.*?)\" alt=\"(.*?)\" (.*?)><\/a><\/div>/";
        $data = [];
        $dataTitle = [];
        $dataImg = [];
        $dataLink = [];
        if (preg_match_all($regexGetNews, $page, $match)) {
            $dataTitle = $match[1];
            $dataImg = $match[3];
            $dataLink = $match[2];
        }
        
        foreach ($dataTitle as $value) {
            $data[]['title'] = $value;
        }
        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['img'] = $dataImg[$i];
            $data[$i]['link'] = $dataLink[$i];
        }
        return $data;
    }

}
