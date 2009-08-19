<?php
App::import('Model', 'User');

class UserTestCase extends CakeTestCase {

    var $fixtures = array( 'app.user');

    function testValidateUser(){

        $nick     = 'edwin';
        $password = 'b444ac06613fc8d63795be9ad0beaf55011936ac';

        $this->User = & ClassRegistry::init('User');

        $result     = $this->User->isValidUser($nick, $password);

        $expected   = true;

        $this->assertEqual($result, $expected);

    }

    function testRegisterUser(){
        
        $data = array('User' => array(
                                       'nick'     => 'testuser',
                                       'password' => 'b444ac06613fc8d63795be9ad0beaf55011936ac',
                                       'email'    => 'testuser@syscom.com.mx'
                                     ));

        $this->User = & ClassRegistry::init('User');

        $result     = $this->User->registerUser($data);

        $type       = 'first';

        $conditions = array('User.nick' => $nick);

        $fields     = array('nick',
                            'User.password',
                            'User.email'
                           );

        $params = array(
                        'conditions' => $conditions,
                        'recursive'  => null,
                        'fields'     => $fields,
                        'order'      => null,
                        'group'      => null,
                        'limit'      => 1,
                        'page'       => 0,
                        'callbacks'  => false
                       );

        $expected   = $this->User->find($type, $params);

        $this->assertEqual($data, $expected);


    }

    function testUpdateProfile(){

        $data = array('User'    => array(
                                         'password' => 'b444ac06613fc8d63795be9ad0beaf55011936ac',
                                         'email'    => 'johnnash@syscom.com.mx'
                                        ),
                      'Profile' => array(
                                         'first_name'  => 'John',
                                         'last_name'   => 'Nash',
                                         'gender'      => 'M',
                                         'birthday'    => '01/01/1982',
                                         'country'     => 'Mexico',
                                         'state'       => 'Chihuahua',
                                         'city'        => 'Chihuahua',
                                         'address'     => 'Ortiz Mena #5040',
                                         'postal_code' => '31000',
                                         'telephone'   => '6144161819',
                                         'movil'       => '6142233228'
                                      ),
                     );
        
        $this->User = & ClassRegistry::init('User');

        $result     = $this->User->updateProfile($data);

        $type       = 'first';

        $conditions = array('User.nick'     => $nick,
                            'User.password' => $password
                           );

        $fields     = array('User.password',
                            'User.email',
                            'Profile.first_name',
                            'Profile.last_name',
                            'Profile.gender',
                            'Profile.birthday',
                            'Profile.country',
                            'Profile.state',
                            'Profile.city',
                            'Profile.adress',
                            'Profile.postal_code',
                            'Profile.telephone',
                            'Profile.movil'
                           );

        $params = array(
                        'conditions' => $conditions,
                        'recursive'  => null,
                        'fields'     => $fields,
                        'order'      => null,
                        'group'      => null,
                        'limit'      => 1,
                        'page'       => 0,
                        'callbacks'  => false
                       );

        $expected   = $this->User->find($type, $params);

        $this->assertEqual($data, $expected);



    }

}
?>