<?php
class allapi
{

  public function getallcategory()
  {
    $data = array(
      array(
        "id" => "1",
        "name" => "BTC",
        "sort" => 1
      ),
      array(
        "id" => 2,
        "name" => "BCH",
        "sort" => 2
      ),
      array(
        "id" => 3,
        "name" => "ETH",
        "sort" => 3
      )
    );
    $data=json_encode($data);
      return $data;
  }

  public function getallSubcategory()
  {
    $data = array(
      "1"=>array(
        "id" => "1",
        "name" => "BTC",
         "subcat"=>array(
          "INRW/BTC","USDW/BTC","EURW/BTC","GBPW/BTC","BRLW/BTC","PLNW/BTC","CADW/BTC","TRYW/BTC","RUBW/BTC","MXNW/BTC","CZKW/BTC","ILSW/BTC","NZDW/BTC","JPYW/BTC","SEKW/BTC","AUDW/BTC"
          ),
        "sort" => 1
      ),
      "2"=>array(
        "id" => 2,
        "name" => "BCH",
       "subcat"=>array(
          "INRW/BCH","USDW/BCH","EURW/BCH","GBPW/BCH","BRLW/BCH","PLNW/BCH","CADW/BCH","TRYW/BCH","RUBW/BCH","MXNW/BCH","CZKW/BCH","ILSW/BCH","NZDW/BCH","JPYW/BCH","SEKW/BCH","AUDW/BCH"
          ),
        "sort" => 2
      ),
      "3"=>array(
        "id" => 3,
        "name" => "ETH",
         "subcat"=>array(
          "INRW/ETH","USDW/ETH","EURW/ETH","GBPW/ETH","BRLW/ETH","PLNW/ETH","CADW/ETH","TRYW/ETH","RUBW/ETH","MXNW/ETH","CZKW/ETH","ILSW/ETH","NZDW/ETH","JPYW/ETH","SEKW/ETH","AUDW/ETH"
          ),
        "sort" => 3
      )
    );
    $data=json_encode($data);
    return $data;
  }

  public function getallcurrency()
  {
    $data = array(
          "INRW","USDW","EURW","GBPW","BRLW","PLNW","CADW","TRYW","RUBW","MXNW","CZKW","ILSW","NZDW","JPYW","SEKW","AUDW"
    );
    $data=json_encode($data);
    return $data;
  }
}

function page_protect()
{
    if (!isset($_SESSION)) {
        session_start();
    }
    if (isset($_SESSION['HTTP_USER_AGENT'])) {
        if ($_SESSION['HTTP_USER_AGENT'] != md5($_SERVER['HTTP_USER_AGENT'])) {
            logout();
            exit;
        }
    }
}

function logout()
{
    global $db;
    global $pathString;
    session_start();
    unset($_SESSION['user_id']);
    unset($_SESSION['user_email_id']);
    unset($_SESSION['user_session']);
    unset($_SESSION['user_admin']);
    unset($_SESSION['user_supportpin']);
    unset($_SESSION['HTTP_USER_AGENT']);
    session_unset();
    session_destroy();
    header("Location:index.php");
}
?>
