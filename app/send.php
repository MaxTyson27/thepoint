<?php
// require __DIR__.'/../vendor/autoload.php';

// use Sendpulse\RestApi\ApiClient;
// use Sendpulse\RestApi\Storage\FileStorage;

// // API credentials from https://login.sendpulse.com/settings/#api
// define('API_USER_ID', '07622b2939bd98a17aae1f777de53904');
// define('API_SECRET', '642ebc4f446a3377ca47150a12419a15');
// $SPApiClient = new ApiClient(API_USER_ID, API_SECRET, new FileStorage());

function sendLeadToCRM($arLeadFields)
{
    $queryUrl = 'https://bitned.ru/rest/1/8eqh8cuzmlkwj1ds/crm.lead.add.json';
    $queryData = http_build_query(array(
        'fields' => $arLeadFields,
        'params' => array("REGISTER_SONET_EVENT" => "Y")
    ));
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_POST => 1,
        CURLOPT_HEADER => 0,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => $queryUrl,
        CURLOPT_POSTFIELDS => $queryData,

    ));

    $result = curl_exec($curl);
    $result = json_decode($result, 1);
    curl_close($curl);
    return ($result);
}

$arLeadFields = array(
    "TITLE" => 'Запрос с сайта The Point ' .  $_POST['name'] .  $_POST['phone'] . $_POST['email'],
    "R1" => $_POST['project'],
    "R2" => $_POST['size'],
    "R3" => $_POST['price'],
    "R4" => $_POST['agent'],
    "NAME" => $_POST["name"],
    "EMAIL" => $_POST["email"],
    "PHONE" => [
        ["VALUE" => htmlspecialchars($_POST['phone']), "VALUE_TYPE" => "WORK"]
    ],
    "SOURCE_ID" => 'WEB',
    "SOURCE_DESCRIPTION" => 'the-point.ru', // сюда домен сайта откуда запрос шлем
    'UTM_CAMPAIGN' => $_COOKIE['utm_compaign'], // эти все значения предварительно в куки нужно сохранить
    'UTM_CONTENT' => $_COOKIE['utm_content'],
    'UTM_MEDIUM' => $_COOKIE['utm_medium'],
    'UTM_SOURCE' => $_COOKIE['utm_source'],
    'UTM_TERM' => $_COOKIE['utm_term'],
);


sendLeadToCRM($arLeadFields);


// $post = (!empty($_POST) ? true : false);
// if($post) {
//   $name = $_POST['name-quiz'];
//   $phone = $_POST['phone-quiz'];
//   $r1 = $_POST['r1'];
//   $r2 = $_POST['r2'];
//   $r3 = $_POST['r3'];
//   $r4 = $_POST['r4'];
//   $r5 = $_POST['r5'];

//   $mes = "Цель: ".$r1."\n\nКогда планируете покупку: ".$r2."\n\nБюджет: ".$r3."\n\nОплата: ".$r4."\n\nКогда сможете приехать: ".$r5."\n\nИмя: ".$name."\n\nТелефон: ".$phone;
//   $error = '';
//   if(!$error) {
//     $eml = array(
//       'html'    => '<p>'.$mes.'</p>',
//       'text'    => $mes,
//       'subject' => 'nedvex.ru/cottage: заявка с сайта',
//       'from'    => array(
//         'name'  => 'Landind',
//         'email' => 'no-reply@nedvex.ru'
//       ),
//       'to'      => array(
//         array(
//           'name'  => 'Content manager',
//           'email' => 'lead@nedvex.ru'
//         )
//       )
//     );
//     sendLeadToCRM($arLeadFields);
//     $send = $SPApiClient->smtpSendMail($eml);

//     if($send) {echo 'OK';}
//   }
//   else {echo '<div class="err">'.$error.'</div>';}

// }
// ?>