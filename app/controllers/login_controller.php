<?php
/**
 * Login Controller
 *
 * This class contain the logic of user validation
 *
 *
 * @author Edwin Sandoval
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version 0.1 20/08/2009
 */
class LoginController extends AppController {

	var $name = 'Login';

        var $uses = array('User');

        var $components = array('Session', 'Captcha');

        /**
         *
         */
	function index() {

	}

        /**
         *
         */
        function validateUser(){

            $captchaSystem = $this->Session->read('captcha');

            $captchaUser   = $this->data['Captcha']['code'];

            $this->User->set($this->data);
            
            if(!$this->User->validates()){                

                $this->set('error','Warning - The nick or password must contain alphanumeric characters !');

                $this->render('index');
                
                return false;
                
            }
            
            $cleanNick     = $this->data['User']['nick'];
            $cleanPassword = $this->data['User']['password'];
            
            if(!$this->User->isValidUser($cleanNick, $cleanPassword)){

                $this->set('error','Warning - The user or password are incorrect !');

                $this->render('index');

                return false;
                
            }

            if($captchaSystem <> $captchaUser){

                $this->set('error','Warning - The captcha code is wrong !');

                $this->render('index');

                return false;
            }

            $this->set('userName',$cleanNick);

            $this->render('main');
            
        }

        /**
         * This function let to generate a code or image captcha
         *
         * @param  int    $image
         * @return boolean
         */
        function captchaImage($image = null){
            
            $generateImage = true;

            if(!is_null($image)){

                $generateImage = false;

            }
            
            $captchaCode = $this->Captcha->render($generateImage);

            $this->Session->write('captcha',$captchaCode);

            return false;

        }

}
?>