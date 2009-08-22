<?php
/**
 * Login Controller Test
 *
 * This class let us to execute the test case related with the Login Controller
 *
 *
 * @author Edwin Sandoval
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version 0.1 20/08/2009
 */

App::import('Component', 'Session');

class LoginControllerTest extends CakeTestCase {

    var $fixtures = array('app.user');

    function startCase() {
        echo '<h1>Starting Login Test Case</h1>';
    }

    function endCase() {
        echo '<h1>Ending Login Test Case</h1>';
    }

    function startTest($method) {
        echo '<h3>Case: ' . $method . '</h3>';
    }

    function endTest($method) {
        echo '<hr />';
    }

    function testValidateUser(){

        $data = array(
                        'User'    => array(
                                           'nick'     => 'edwin',
                                           'password' => 'b444ac06613fc8d63795be9ad0beaf55011936ac'
                                          ),
                        'Captcha' => array(
                                           'code'     => 'JXABC6'
                                          )
                     );

        $params = array(
                        'fixturize' => false,
                        'data'      => $data,
                        'method'    => 'post',
                        'return'    => 'vars'
                       );

        $queryAction = $this->testAction('/login/validateUser',$params);

        debug($queryAction);
        
        $expected = 'Warning - The captcha code is wrong !';

        $result   = $queryAction['error'];

        $this->assertIdentical($result, $expected);

    }

    function testCaptchaImage(){

        $this->Session = & new SessionComponent();

        $params = array(
                        'fixturize' => false,
                        'method'    => 'get'
                       );

        $queryAction = $this->testAction('/login/captchaImage/1',$params);

        $result = $this->Session->check('captcha');

        $expected = true;

        $this->assertEqual($result, $expected);

    }
    
}
?>