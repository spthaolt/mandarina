<?php
/**
 * User Fixture
 *
 * This class define how the table User is created (which fields are part of the
 * table), and which records will be initially populated to the test table.
 *
 * @author  Edwin Sandoval
 * @license http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @version 0.1 19/08/2009
 */
 class UserFixture extends CakeTestFixture {

      var $name = 'User';

      var $fields = array(
          'id'       => array('type' => 'integer', 'length' => 11,  'key'    => 'primary'),
          'nick'     => array('type' => 'string' , 'length' => 25,  'null' => false),
          'password' => array('type' => 'string' , 'length' => 40,  'null' => false),
          'email'    => array('type' => 'string' , 'length' => 200, 'null' => false),
          'status'   => array('type' => 'integer', 'length' => 1)
      );

      var $records = array(
          array ('id' => 1, 'nick' => 'edwin', 'password' => 'b444ac06613fc8d63795be9ad0beaf55011936ac', 'email' => 'esandoval@syscom.com.mx', 'status' => 1),
          array ('id' => 2, 'nick' => 'beto',  'password' => '109f4b3c50d7b0df729d299bc6f8e9ef9066971f', 'email' => 'alopez@syscom.com.mx',    'status' => 1),
          array ('id' => 3, 'nick' => 'pris',  'password' => '3ebfa301dc59196f18593c45e519287a23297589', 'email' => 'pris@syscom.com.mx',      'status' => 1)
      );
      
 }
 ?>