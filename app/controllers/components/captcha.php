<?php
/**
 * Captcha Component
 *
 * This class contain the component that call to kcaptcha library in order to
 * generate an image captcha.
 *
 *
 * @author Edwin Sandoval
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version 0.1 21/08/2009
 */
class CaptchaComponent extends Object
{

    /**
     * This function let us to generate a new captcha image. The image code is
     * saved in a session var.
     */
    function render($generateImage = true){

        $captchaCode = "";
        
        App::import('Vendor', 'kcaptcha/kcaptcha');

        $kcaptcha    = new KCAPTCHA($generateImage);

        $captchaCode = $kcaptcha->getKeyString();

        return $captchaCode;
        
    }
}
?>