<?php

namespace App\Http\Controllers;
use Kreait\Firebase\Auth as Firebase;
use Kreait\Firebase\ServiceAccount;
use Kreait\Firebase\Factory;

/**
* @OA\Info(title="API Magic Monster", version="1.0")
*
* @OA\Server(url="http://127.0.0.1:8000")
*/

class AuthController extends Controller
{

    protected $auth;
    
    function __construct(Firebase $auth)
    {

        $arrayServiceAccount = array(
            "type"=>"service_account",
            
            "project_id" => env('FIREBASE_PROYECT_ID'),
            "client_id" => env('FIREBASE_CLIENT_ID'),
            "client_email" => env('FIREBASE_CLIENT_EMAIL'),
            "private_key" => env('FIREBASE_PRIVATE_KEY')
        );

        $firebase = (new Factory)->withServiceAccount($arrayServiceAccount);
        $this->auth = $firebase->createAuth();

    	//$this->auth = $auth;
    }

    public function validarTokenUser(string $token)
    {
    	$AuthorizationToken=$token;
    	try{
    		$verifiedIdToken = $this->auth->verifyIdToken($AuthorizationToken);
    	}catch (InvalidToken $e) {
            return "Unauthenticated";
        }
         $uid = $verifiedIdToken->claims()->get('sub');
         $exp = $verifiedIdToken->claims()->get('exp');

        if($uid){
                return $uid;
        }
        return 'Unauthenticated';
    }
}
