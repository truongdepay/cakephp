<?php
namespace App\Controller;

use App\Controller\AppController;
use Facebook\Facebook;
use Cake\Routing\Router;
use Cake\Http\Session;

/**
 * FacebookLogin Controller
 *
 *
 * @method \App\Model\Entity\FacebookLogin[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class FacebookController extends AppController
{
    protected $fb;
    protected $helper;
    protected $session;
    protected $token;

    public function initialize()
    {
        parent::initialize(); // TODO: Change the autogenerated stub
        $this->fb = new Facebook([
            'app_id' => FB_APP_ID,
            'app_secret' => FB_KEY_APP,
            'default_graph_version' => FB_APP_VERSION
        ]);
        $this->helper = $this->fb->getRedirectLoginHelper();
        if (isset($_GET['state'])) {
            $this->helper->getPersistentDataHandler()->set('state', $_GET['state']);
        }
        $this->session = new Session();
        if ($this->session->check(FB_SESION_TOKEN)) {
            $this->token = $this->session->read(FB_SESION_TOKEN);
            $this->fb->setDefaultAccessToken($this->token);
        }
        //$this->token = 'EAAG4XRFWWZAMBAG91crszDz6iyPmiGxl8lCjlUnjHTfZC5LTHhzh0LCDQz3BUkXhV97iWJSa7Gqd3K5XO3Aha01PioBIuMmSa0QoFjv26UEY0WEtWlQvp9zHU9GypgvXOa733umjixafGneIACyvMPWX4sMgz1110QIIj1PwX7icNQsawCpTo4bwI9FdMDe0Vjgm6R3RXxpB0EmLUL';

        $this->layout = 'translation';
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|void
     */
    public function index()
    {
        if (empty($this->token)) {
            $this->redirect([
                'controller' => 'Facebook',
                'action' => 'login'
            ]);
        } else {
            $this->redirect([
                'controller' => 'Facebook',
                'action' => 'getInfo'
            ]);
        }
    }

    public function login()
    {
        $permissions = ['email']; // Optional permissions
        $loginUrl = $this->helper->getLoginUrl(FB_URL_REDIRECT, $permissions);
        $this->set(compact('loginUrl'));
    }
    public function oauth()
    {
        try {
            $accessToken = $this->helper->getAccessToken();
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }

        // The OAuth 2.0 client handler helps us manage access tokens
        $oAuth2Client = $this->fb->getOAuth2Client();

        if (! $accessToken->isLongLived()) {
            // Exchanges a short-lived access token for a long-lived one
            try {
                $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
            } catch (Facebook\Exceptions\FacebookSDKException $e) {
                echo "<p>Error getting long-lived access token: " . $e->getMessage() . "</p>\n\n";
                exit;
            }
        }
        $token = $accessToken->getValue();
        $this->session->write(FB_SESION_TOKEN, $token);
        $this->redirect([
            'controller' => 'Facebook',
            'action' => 'getInfo',
        ]);
    }

    public function getInfo()
    {
        $requestUserLikes = $this->fb->get( '/me?field=id', $this->token);
        $batch = [
            'user-likes' => $requestUserLikes,
        ];
        try {
            $responses = $this->fb->sendBatchRequest($batch);
        } catch(Facebook\Exceptions\FacebookResponseException $e) {
            // When Graph returns an error
            echo 'Graph returned an error: ' . $e->getMessage();
            exit;
        } catch(Facebook\Exceptions\FacebookSDKException $e) {
            // When validation fails or other local issues
            echo 'Facebook SDK returned an error: ' . $e->getMessage();
            exit;
        }
        foreach ($responses as $key => $response) {
            if ($response->isError()) {
                $e = $response->getThrownException();
                echo '<p>Error! Facebook SDK Said: ' . $e->getMessage() . "\n\n";
                echo '<p>Graph Said: ' . "\n\n";
                var_dump($e->getResponse());
            } else {
                echo "<p>(" . $key . ") HTTP status code: " . $response->getHttpStatusCode() . "<br />\n";
                echo "Response: " . $response->getBody() . "</p>\n\n";
                echo "<hr />\n\n";
            }
        }

        exit;
    }
}