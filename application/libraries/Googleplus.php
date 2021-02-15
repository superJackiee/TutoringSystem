<?php if (!defined('BASEPATH')) exit('No direct script access allowed');


class Googleplus
{

    public function __construct()
    {

        $CI =& get_instance();
        $CI->config->load('googleplus');

        require APPPATH . 'third_party/google-login-api/apiClient.php';
        require APPPATH . 'third_party/google-login-api/contrib/apiOauth2Service.php';

        $this->client = new apiClient();

        $settings = get_settings();

        if (!empty($settings) && !empty($settings->google_client_id) && !empty($settings->google_client_secret)) {

            $this->client->setApplicationName($settings->google_app_name);
            $this->client->setClientId($settings->google_client_id);
            $this->client->setClientSecret($settings->google_client_secret);

        } else {

            $this->client->setApplicationName("Varient");
            $this->client->setClientId("111111111111");
            $this->client->setClientSecret("222222222222");

        }

        $this->client->setRedirectUri($CI->config->item('redirect_uri', 'googleplus'));
        $this->client->setDeveloperKey($CI->config->item('api_key', 'googleplus'));
        $this->client->setScopes($CI->config->item('scopes', 'googleplus'));
        $this->client->setAccessType('online');
        $this->client->setApprovalPrompt('auto');
        $this->oauth2 = new apiOauth2Service($this->client);

    }

    public function loginURL()
    {
        return $this->client->createAuthUrl();
    }

    public function getAuthenticate()
    {
        return $this->client->authenticate();
    }

    public function getAccessToken()
    {
        return $this->client->getAccessToken();
    }

    public function setAccessToken()
    {
        return $this->client->setAccessToken();
    }

    public function revokeToken()
    {
        return $this->client->revokeToken();
    }

    public function getUserInfo()
    {
        return $this->oauth2->userinfo->get();
    }

}

?>