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
     * @param array $config
     */
    public function initialize( )
    {
        parent::initialize();
        $this->url = 'http://bongdaplus.vn';
    }

    public function getContentTranfer()
    {
        $data = [];
        $url = $this->url . '/ngoai-hang-anh.html';
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $page = curl_exec($curl);
        $page = str_replace("\n", "", $page);
        $page = str_replace("\t", "", $page);

        //get hot new
        $regexHot = "/<div class=\"cattop\"><a class=\"tit\" .*?><h2>.*?<span class=\"nwsico\"><\/span><\/h2><span class=\"clr\"><\/span><img class=\"lft\" .*?><\/a><p>.*?<\/p>/";
        $hotNew = '';
        if (preg_match_all($regexHot, $page, $match)) {
            $hotNew = $match[0][0];
        }
        //var_dump($hotNew);

        // get link hot new
        $regexHotLink = "/href=\"(.*?)\"/";
        if (preg_match_all($regexHotLink, $hotNew, $match)) {
            $hotLink = $match[1][0];
            $data['hot']['link'] = $hotLink;
        }

        //get title hot new
        $regexHotTitle = "/<h2>(.*?)<span/";
        if (preg_match_all($regexHotTitle, $hotNew, $match)) {
            $hotTitle = $match[1][0];
            $data['hot']['title'] = $hotTitle;
        }

        //get image hot New
        $regexHotImage = "/src=\"(.*?)\"/";
        if (preg_match_all($regexHotImage, $hotNew, $match)) {
            $hotImage = $match[1][0];
            $data['hot']['img'] = $hotImage;
        }

        //get description hot new
        $regexDesc = "/<p>(.*?)<\/p>/";
        if (preg_match_all($regexDesc, $hotNew, $match)) {
            $hotDesc = $match[1][0];
            $data['hot']['desc'] = $hotDesc;
        }

        //get normal new
        $regexNormal = "/<div class=\"nwslst gr6\"><ul class=\"lst\">(.*?)<\/ul>/";
        if (preg_match_all($regexNormal, $page, $match)) {
            $normalNew = $match[1][0];
            //var_dump($match);
        }

        //get link normal new
        $regexNormalLink = "/<a href=\"(.*?)\"/";
        if (preg_match_all($regexNormalLink, $normalNew, $match)) {
            //var_dump($match);
            $normalNewLink = $match[1];
            foreach ($normalNewLink as $key => $link) {
                $data['normal'][$key]['link'] = $link;
            }

        }

        //get title normal new
        $regexNoTitle = "/<h4>(.*?)<span/";
        if (preg_match_all($regexNoTitle, $normalNew, $match)) {
            $normalNewTitle = $match[1];
            foreach ($normalNewTitle as $key => $title) {
                $data['normal'][$key]['title'] = $title;
            }
        }

        //get img normal desc
        $regexNoDesc = "/<\/a>(.*?)<\/li>/";
        if (preg_match_all($regexNoDesc, $normalNew, $match)) {
            $normalNewDesc = $match[1];
            foreach ($normalNewDesc as $key => $desc) {
                $data['normal'][$key]['desc'] = $desc;
            }
        }

        $this->set([
            'response' => $data,
            '_serialize' => 'response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
    }
}
