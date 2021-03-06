<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Http\Response;
use Cake\Http\ServerRequest;
use InstagramAPI\Instagram;

/**
 * Instagram Controller
 *
 *
 * @method \App\Model\Entity\Instagram[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class InstagramController extends AppController
{
    /**
     * @var Instagram
     */
    protected $instagram;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    public function initialize()
    {
        $debug = true;
        $truncatedDebug = true;
        $this->username = 'dieu.linh1994';
        $this->password = 'Nt841646401399';
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->instagram = new Instagram($debug, $truncatedDebug);
        $this->layout = 'translation';
    }

    public function index()
    {
        print_r($this);
    }

    public function login()
    {
         $this->instagram->login($this->username, $this->password);
    }

    public function logout()
    {
        $this->instagram->logout();
    }
}
