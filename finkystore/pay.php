<?php
    $phone=$_POST['phone'];
    $external_id="SH".rand(1000000,9999999);
    $name=$_POST['name'];
    $email=$_POST['email'];
    $amount=$_POST['amount'];
    $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://pay.vonsung.rw/api/mtn_vPay',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "payer_phone": "'.$phone.'",
            "payer_name": "'.$name.'",
            "external_id": "'.$external_id.'",
            "payer_email": "'.$email.'",
            "amount": "'.round($amount).'",
            "payee_message": "Smarthire Product Purchase "
        }',
          CURLOPT_HTTPHEADER => array(
            'apiUser: VPUHL0Z-IOYGE-UF1XZ',
            'apiKey: VPK2qvuGLIjqGHOMJMlS',
            'Content-Type: application/json',
            'Cookie: ci_session=9tde32pe2u05gdv0nhr8di86oa3gkj0m'
          ),
        ));

        $response = curl_exec($curl);
    
        // curl_close($curl);
        $status = json_decode($response)->status;

        echo $status;


?>