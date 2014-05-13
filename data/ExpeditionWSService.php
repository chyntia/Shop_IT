<?php
class Token {
  public $level; // byte
}


/**
 * ExpeditionWSService class
 * 
 *  
 * 
 * @author    {author}
 * @copyright {copyright}
 * @package   {package}
 */
class ExpeditionWSService extends SoapClient {

  private static $classmap = array(
                                    'Token' => 'Token',
                                   );

  public function ExpeditionWSService($wsdl = "http://10.100.77.89:8080/axis/services/ExpeditionService?wsdl", $options = array()) {
    foreach(self::$classmap as $key => $value) {
      if(!isset($options['classmap'][$key])) {
        $options['classmap'][$key] = $value;
      }
    }
    parent::__construct($wsdl, $options);
  }

  /**
   *  
   *
   * @param string $in0
   * @return Token
   */
  public function getToken($in0) {
    return $this->__soapCall('getToken', array($in0),       array(
            'uri' => 'http://10.100.77.89:8080/axis/services/ExpeditionService',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param string $in0
   * @param string $in1
   * @return short
   */
  public function checkCost($in0, $in1) {
    return $this->__soapCall('checkCost', array($in0, $in1),       array(
            'uri' => 'http://10.100.77.89:8080/axis/services/ExpeditionService',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param Token $in0
   * @param ArrayOfString $in1
   * @return string
   */
  public function sendItem(Token $in0, $in1) {
    return $this->__soapCall('sendItem', array($in0, $in1),       array(
            'uri' => 'http://10.100.77.89:8080/axis/services/ExpeditionService',
            'soapaction' => ''
           )
      );
  }

  /**
   *  
   *
   * @param short $in0
   * @return ArrayOfString
   */
  public function checkShipmentStatus($in0) {
    return $this->__soapCall('checkShipmentStatus', array($in0),       array(
            'uri' => 'http://10.100.77.89:8080/axis/services/ExpeditionService',
            'soapaction' => ''
           )
      );
  }

}

?>
