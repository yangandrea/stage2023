<?php

$data = readPostData();
$json_respond = array();


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
} else if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    if (isset($data->get_sensor)) {
        $json_respond = GET_DATA_HA($data);
    } else if (isset($data->buzzer)) {
        $json_respond = POST_DATA_HA();
    }
}
header('Content-Type: application/json');

echo json_encode($json_respond, JSON_UNESCAPED_SLASHES);


function readPostData()
{
    $json = file_get_contents('php://input');

    $data = json_decode($json);

    return $data;
}

function GET_DATA_HA($dispositivi)
{
    $json = array();
    $json_temp = array();
    //$url = "http://151.41.110.2:8123/api/states/sensor." . $dispositivi->nome_dispositivo;
    $url_termometro = "http://reaktice.ns0.it:8123/api/states/sensor.temperatura_iot_valigia_iot";
    $url_umidita = "http://reaktice.ns0.it:8123/api/states/sensor.sensor_umidita_valigia_iot_valigia_iot";
    $url_lux = "http://reaktice.ns0.it:8123/api/states/sensor.sensor_fotoresistenza_valigia_iot_valigia_iot";
    $url_switch = "http://reaktice.ns0.it:8123/api/states/switch.presenza_iot_valigia_iot";
    $url_co = "http://reaktice.ns0.it:8123/api/states/sensor.co_iot_valigia_iot";
    $url_co2 = "http://reaktice.ns0.it:8123/api/states/sensor.co2_iot_valigia_iot";
    $url_nh4 = "http://reaktice.ns0.it:8123/api/states/sensor.nh4_iot_valigia_iot";
    $url_toluen = "http://reaktice.ns0.it:8123/api/states/sensor.toluen_iot_valigia_iot";
    $url_aceton = "http://reaktice.ns0.it:8123/api/states/sensor.aceton_iot_valigia_iot";
    $url_alcohol = "http://reaktice.ns0.it:8123/api/states/sensor.alcohol_iot_valigia_iot";
    $url_volt = "http://reaktice.ns0.it:8123/api/states/sensor.volt_iot_valigia_iot";
    $url_current = "http://reaktice.ns0.it:8123/api/states/sensor.current_iot_valigia_iot";

    $headers = [
        'Content-Type:application/json',
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiI4ZTkxMzQwYjgyN2I0NDZiYjUxNzZiMDIwN2ZmNzJmNCIsImlhdCI6MTY3MTgxMjg1MSwiZXhwIjoxOTg3MTcyODUxfQ.BpB9nAAA_sIVNghsCrxDBTQGX0cruQKVlb_qK1mjKsc',
    ];

    $curl_ha = curl_init();

    curl_setopt($curl_ha, CURLOPT_URL, $url_termometro);

    curl_setopt($curl_ha, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($curl_ha, CURLOPT_RETURNTRANSFER, true);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["temperature"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["temperature"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["temperature"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_umidita);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["humidity"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["humidity"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["humidity"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_lux);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["lux"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["lux"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["lux"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_switch);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["proximity"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["proximity"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_co);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["co"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["co"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["co"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_co2);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["co2"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["co2"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["co2"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_nh4);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["nh4"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["nh4"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["nh4"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_toluen);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["toluen"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["toluen"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["toluen"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_aceton);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["aceton"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["aceton"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["aceton"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_alcohol);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["alcohol"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["alcohol"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["alcohol"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_volt);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["volt"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["volt"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["volt"]["state"] = $json_temp->state;

    curl_setopt($curl_ha, CURLOPT_URL, $url_current);

    $result = curl_exec($curl_ha);

    $json_temp = json_decode($result);

    $json["current"]["friendly_name"] = $json_temp->attributes->friendly_name;
    $json["current"]["unit_of_measurement"] = $json_temp->attributes->unit_of_measurement;
    $json["current"]["state"] = $json_temp->state;

    curl_close($curl_ha);

    return $json;
}

function POST_DATA_HA()
{
    $json_send_ha = [];
    $json_temp = array();
    $json = array();
    $url_switch_on = "http://reaktice.ns0.it:8123/api/services/switch/turn_on";
    $url_switch_off = "http://reaktice.ns0.it:8123/api/services/switch/turn_off";

    $headers = [
        'Content-Type:application/json',
        'Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiI4ZTkxMzQwYjgyN2I0NDZiYjUxNzZiMDIwN2ZmNzJmNCIsImlhdCI6MTY3MTgxMjg1MSwiZXhwIjoxOTg3MTcyODUxfQ.BpB9nAAA_sIVNghsCrxDBTQGX0cruQKVlb_qK1mjKsc',
    ];

    $json_send_ha["entity_id"] = "switch.buzzer_iot_valigia_iot";

    $payload = json_encode($json_send_ha);

    $curl_ha = curl_init($url_switch_on);

    curl_setopt($curl_ha, CURLOPT_POSTFIELDS, $payload);

    curl_setopt($curl_ha, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($curl_ha, CURLOPT_RETURNTRANSFER, true);

    // Execute the POST request
    $result = curl_exec($curl_ha);

    curl_close($curl_ha);

    $curl_ha = curl_init($url_switch_off);

    curl_setopt($curl_ha, CURLOPT_POSTFIELDS, $payload);

    curl_setopt($curl_ha, CURLOPT_HTTPHEADER, $headers);

    curl_setopt($curl_ha, CURLOPT_RETURNTRANSFER, true);

    // Execute the POST request
    $result = curl_exec($curl_ha);

    curl_close($curl_ha);

    $json_temp = json_decode($result);

    //Fare get per lo stato

    //$json["stato_switch"] =  $json_temp;

    //return $json;
}
