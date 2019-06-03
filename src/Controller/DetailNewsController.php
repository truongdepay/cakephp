<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * DetailNews Controller
 *
 *
 * @method \App\Model\Entity\DetailNews[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class DetailNewsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        $source = $this->request->getQuery('source');
        $link = $this->request->getQuery('link');
        $function = 'newDetail' . $source;
        $this->$function($link);
    }
    
    public function newDetailbongdaplus($link = '')
    {
        $url = 'http://bongdaplus.vn' . $link;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $page = curl_exec($curl);
        $page = str_replace("\n", "", $page);
        $page = str_replace("\t", "", $page);
        //$page = htmlentities($page, 1);
        
        $regexDetail = '/<div class="content">(.*?)<div class="fbshr inpage">/';
        $regexTitle = '/<h1 class="tit">(.*?)<\/h1>/';
        $detail = '';
        if (preg_match_all($regexDetail, $page, $match)) {
            $detail = $match[1][0];
        } else {
            echo "bug detail";
        }
    
        if (preg_match_all($regexTitle, $page, $match)) {
            $title = $match[1][0];
        } else {
            echo "bug title";
        }
        
        $this->set(['detail', 'title'], compact('detail', 'title'));
    }
    
    public function newDetailgenk($link = '')
    {
        $url = 'http://genk.vn' . $link;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
        $page = curl_exec($curl);
        $page = str_replace("\n", "", $page);
        $page = str_replace("\t", "", $page);
        //$page = htmlentities($page, 1);
        //echo $page;
        
        $regexDetail = '/<div class="knc-content" id="ContentDetail">(.*?)<div id="TotalAssessment">/';
        $regexTitle = '/<h1 class="kbwc-title clearfix">(.*?)<\/h1>/';
        $detail = '';
        if (preg_match_all($regexDetail, $page, $match)) {
            $detail = $match[1][0];
        } else {
            echo "bug detail";
        }
        //var_dump($detail);
        if (preg_match_all($regexTitle, $page, $match)) {
            $title = $match[1][0];
        } else {
            echo "bug title";
        }
        
        $this->set(['detail', 'title'], compact('detail', 'title'));
    }
    
}
