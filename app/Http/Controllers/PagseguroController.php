<?php

namespace App\Http\Controllers;


use BrPayments;


use Illuminate\Http\Request;


class PagseguroController extends Controller
{
   
   public function Pagseguro()
   {

      require __DIR__."/../../../vendor/autoload.php";

   	return view('pagseguro');
   }

   public function Notificacao()
   {

      require __DIR__."/../../../vendor/autoload.php";

      $notificationCode = filter_input(INPUT_POST, 'notificationCode');
      if (is_null($notificationCode)) {
          //$notificationCode = '46D311949378937808D8843A3FB815D8C529';
      }

      $pagseguro = new BrPayments\PagSeguro('wesllenalves@gmail.com', '71A62BA58E394B21ACA1EFC1424EA0C6', true);
      $response = $pagseguro->notification($notificationCode);

      /**
       * Orders::get($xml->reference);
       **/
      //$xml = new \SimpleXMLElement((string)$response);
      //var_dump($xml);exit;
      header("Content-type: text/xml");
      echo $response;

   
   }
}
