<?php
namespace App\Controller;

use App\Controller\AppController;
use App\Controller\Component\ComTranslationComponent;
use App\Model\Entity\Translation;
use Hashids\Hashids;

/**
 * Translation Controller
 *
 *
 * @method \App\Model\Entity\Translation[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TranslationController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    protected $translate;
    protected $hashid;
    /**
     * @var ComTranslation;
     */
    public $components = ['ComTranslation'];
    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->hashid = new Hashids(HASHID_STR, HASHID_NUM);
        $this->layout = 'translation';
    }

    public function index()
    {
        $postCookie = $this->Cookie->read(COOKIE_NAME . '.' . COOKIE_POST);
        $this->set(compact('postCookie'));
    }

    public function save()
    {
        $content = $this->Translation->newEntity();
        $content = $this->Translation->patchEntity($content, $this->request->getData());
        $content->content = $this->ComTranslation->replaceBreakElement($content->content);
        $content->content = $this->ComTranslation->breakAllString($content->content);
        $content->title = htmlentities($content->title);
        $content->content = htmlentities($content->content);
        if ($this->Translation->save($content)) {
            $response = [
                'result' => 1,
                'detail' => [
                    'id' => $this->hashid->encode($content->id),
                    'token' => $content->token
                ]
            ];
            $cookie = $this->Cookie->read(COOKIE_NAME . '.' . COOKIE_POST);
            if (empty($cookie)) {
                $cookie = [];
            }
            $cookie[] = ['id' => $this->hashid->encode($content->id), 'title' => $content->title, 'token' => $content->token, 'created' => $content->created];
            $this->Cookie->write(COOKIE_NAME, [COOKIE_POST => $cookie]);
        } else {
            $response = [
                'result' => 0,
                'detail' => [
                    'error' => 'Save error!'
                ]
            ];
        }
        $this->set([
            'my_response' => $response,
            '_serialize' => 'my_response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function view()
    {
        $idDecode = $this->hashid->decode($this->request->getQuery('id'));
        $id = $idDecode[0];
        $token = $this->request->getQuery('token');
        $select = ['title', 'content', 'words'];
        $where = ['id' => $id, 'token' => $token];
        $result = $this->Translation->getInfo($select, $where);
        $result->content = $this->ComTranslation->convertToHtml($result->content);
        $this->set(compact('result'));
    }

    public function update()
    {
        $idDecode = $this->hashid->decode($this->request->getQuery('id'));
        $id = $idDecode[0];
        $translation = $this->Translation->get($id);
        $translation = $this->Translation->patchEntity($translation, $this->request->getData());
        $translation->content = htmlentities($translation->content);
        if ($this->Translation->save($translation)) {
            $response = [
                'result' => 1,
                'detail' => [
                    'id' => $this->hashid->encode($translation->id),
                ]
            ];
        } else {
            $response = [
                'result' => 0,
                'detail' => [
                    'error' => 'Save error!'
                ]
            ];
        }
        $this->set([
            'my_response' => $response,
            '_serialize' => 'my_response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
    }

    public function translate()
    {
        $text = $this->request->getData('text');

        if ($text !== '') {
            $result = $this->ComTranslation->translate($text);
            $response = [
                'result' => 1,
                'detail' => [
                    'text' => $result
                ]
            ];
        } else {
            $response = [
                'result' => 0,
                'detail' => [
                    'text' => 'Error translate!'
                ]
            ];
        }

        $this->set([
            'my_response' => $response,
            '_serialize' => 'my_response',
        ]);
        $this->RequestHandler->renderAs($this, 'json');
    }


}
