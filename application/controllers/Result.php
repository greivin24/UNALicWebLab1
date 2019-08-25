<?php
class Result extends CI_Controller
{

    public function __construct()
    {
        
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->library('session');
    }

    public function index()
    {       
        // Getting access token
            function GetAccessToken($client_id, $redirect_uri, $client_secret, $code) {	
                $url = 'https://accounts.google.com/o/oauth2/token';			
                
                $curlPost = 'client_id=' . $client_id . '&redirect_uri=' . $redirect_uri . '&client_secret=' . $client_secret . '&code='. $code . '&grant_type=authorization_code';
                $ch = curl_init();		
                curl_setopt($ch, CURLOPT_URL, $url);		
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);		
                curl_setopt($ch, CURLOPT_POST, 1);		
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);	
                $data = json_decode(curl_exec($ch), true);
                $http_code = curl_getinfo($ch,CURLINFO_HTTP_CODE);		
                if($http_code != 200) 
                    throw new Exception('Error : Failed to receieve access token');
                    
                return $data;
            }
        // Getting user profile information
            function GetUserProfileInfo($access_token) {	
                $url = 'https://www.googleapis.com/plus/v1/people/me';			
                
                $ch = curl_init();		
                curl_setopt($ch, CURLOPT_URL, $url);		
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization: Bearer '. $access_token));
                $data = json_decode(curl_exec($ch), true);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);		
                if($http_code != 200) 
                    throw new Exception('Error : Failed to get user information');
                    
                return $data;
            }
            // Google will retun the code parameter after verification 
            if(isset($_GET['code'])) {
            try {
                
                
                // Get the access token 
                $data = GetAccessToken(APP_CLIENT_ID, APP_CLIENT_REDIRECT_URL, APP_CLIENT_SECRET, $_GET['code']);
                
                // Get user information
                $userinfo = GetUserProfileInfo($data['access_token']);

                // Here yoiu can see all user detail ;
                // echo json_encode($userinfo);

                $newdata = array(
                    'name'  => $userinfo['displayName'],
                    'email' => $userinfo['emails'][0]['value'],
                    'urlImg' => $userinfo['image']['url'],
                    'loginApp' => TRUE,
                    'loginProvedor' => 'Google'
                );
            
                    $this->session->set_userdata($newdata);
                    redirect('/news');
                

            }
            catch(Exception $e) {
                echo $e->getMessage();
            }
        } 
    }
}