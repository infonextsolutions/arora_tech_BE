<?php
include_once "include/head.php";

//$base_url = "http://ec2-3-1-80-245.ap-southeast-1.compute.amazonaws.com/realtech/com/web/jsonapi/node/property";
$base_url = "https://arorarealtech.com/jsonapi/node/property";
$name = $_FILES['image']['name'];
$content = 'Content-Disposition: file; filename="' . $name . '"';
$url = $base_url . "/field_test";
$filename  = $_FILES['image']['tmp_name'];
$handle    = fopen($filename, "r");
$data      = fread($handle, filesize($filename));
$username = 'api';
$password = 'api';
$handle = curl_init();
curl_setopt($handle, CURLOPT_POSTFIELDS,     $data);
curl_setopt($handle, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/octet-stream',
    $content,
    'Authorization: Basic YXBpOmFwaQ==',
    'Accept: application/vnd.api+json'
));
curl_setopt($handle, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt_array(
    $handle,
    array(
        CURLOPT_URL => $url,
        // Enable the post response.
        CURLOPT_POST       => true,
        // The data to transfer with the response.

        CURLOPT_RETURNTRANSFER     => true,
    )
);


$data = curl_exec($handle);

curl_close($handle);

$decode  = json_decode($data, true);
//var_dump($decode);


$uuid = $decode['data']['id'];

$taxonomy = getTaxonomy($_POST['field_tags']);

$url2 = $base_url;

$handle = curl_init();
$postData = array(

    'data' => [
        'type' => 'node--property',
        'attributes' => [
            'field_description' => $_POST['field_description'],
            'field_email'  => $_POST['field_email'],
            'field_location' => $_POST['field_location'],
            'field_dealers_name' => $_POST['field_dealers_name'],
            'title' =>  $_POST['title'],
            'field_property_code' => $_POST['field_property_code'],
            'field_contact_number' => $_POST['field_contact_number']
        ],
        "relationships" => [
            "field_test" => [
                "data" => [
                    "type" => "file--file",
                    "id" => $uuid,
                ],
                'attributes' => [
                    'alt' => 'Arorarealtech -' . $name,
                ]
            ],
            "field_tags" => [
                "data" => [
                    "type" => "taxonomy_term--tags",
                    "id" => "$taxonomy"
                ]
            ],
        ]
    ]

);
$postData = json_encode($postData);
curl_setopt($handle, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/vnd.api+json',
    'Authorization: Basic YXBpOmFwaQ==',
    'Accept: application/vnd.api+json'
));
curl_setopt($handle, CURLOPT_USERPWD, $username . ":" . $password);
curl_setopt_array(
    $handle,
    array(
        CURLOPT_URL => $url2,
        // Enable the post response.
        CURLOPT_POST       => true,
        // The data to transfer with the response.
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_RETURNTRANSFER     => true,
    )
);
$data = curl_exec($handle);

curl_close($handle);

$decode  = json_decode($data, true);
$uuid_node = $decode['data']['id'];

if ($uuid_node) {
    echo "<h2>Record has been uploaded to the website</h2>";
} else {
    echo "An error occured , please try again";
}

function getTaxonomy($taxonomy)
{
    switch ($taxonomy) {
        case "Plots":
            return "e924679c-37d6-49e8-a18f-372f8b21309a";
            break;
        case "Agricultural":
            return "9a788ea8-0068-41e5-bc24-c4858de27a6f";
            break;
        case "Commercial":
            return "92c56f12-60a2-4766-bb1c-624c6322f4cb";
            break;
        case "Industrial":
            return "363ff405-aead-47ce-bbe1-240cd5a0e3e2";
            break;
        case "Rented":
            return "698245a1-94e5-4aaa-9689-d7890e51ae48";
            break;
        case "Institutional":
            return "1092e3bf-f167-4d24-84f5-c8c4ca5ac346";
            break;
        case "Residential":
            return "54bf89c7-95de-447d-a1d3-47ba5c031f0a";
            break;
        default:
            return "e924679c-37d6-49e8-a18f-372f8b21309a";
    }
}
