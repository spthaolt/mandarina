<?php
/**
 * User Model
 *
 * This class contain the validation rules related with the users table
 *
 *
 * @author Edwin Sandoval
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version 0.1 20/08/2009
 */
class User extends AppModel {

  /**
   * Name of the model.
   *
   * @var String
   */
  var $name = 'User';

  /**
   * Validation rules for the model.
   *
   * @var mixed
   */
  var $validate = array(
     'id'       => VALID_ID,
     'nick'     => array(
                         'nickType'      => array(
                                            'rule'    => 'alphaNumeric',
                                            'message' => 'Nick must only contain letters and numbers.'
                                            ),
                         'nickMinLenght' => array(
                                            'rule'    => array('maxLength', 25),
                                            'message' => 'Maximum length of 25 characters.'
                                            ),
                         'nickMaxLenght' => array(
                                            'rule'    => array('minLength', 5),
                                            'message' => 'Minimum length of 8 characters.'
                                            )

                         ),
     'password' => array(
                         'passType'      => array(
                                            'rule'    => 'alphaNumeric',
                                            'message' => 'Password must only contain letters and numbers.'
                                            ),
                         'passMinLenght' => array(
                                            'rule'    => array('maxLength', 40),
                                            'message' => 'Minimum length of 40 characters.'
                                            ),
                         'passMaxLenght' => array(
                                            'rule'    => array('minLength', 40),
                                            'message' => 'Maximum length of 40 characters.'
                                            )

                         ),
     'email'    => array(
                         'rule'    => 'VALID_EMAIL',
                         'message' => 'Invalid Password, please try again !'
                        ),
     'status'   => VALID_ID
    );


    /**
     * This function let to validate if the user is valid.
     *
     * @param  String $nick
     * @param  String $password
     * @return boolean
     */
    function isValidUser($nick, $password){

        $type       = 'first';

        $conditions = array(
                            'User.nick'     => $nick,
                            'User.password' => $password,
                            'User.status'   => '1'
                           );

        $fields = '*';

        $params = array(
                        'conditions' => $conditions,
                        'recursive'  => null,
                        'fields'     => $fields,
                        'order'      => null,
                        'group'      => null,
                        'limit'      => 1,
                        'page'       => 0,
                        'callbacks'  => false);

        $result = User::find($type, $params);        

        if(!$result){
            return false;
        }

        return true;
        
    }



}
?>
