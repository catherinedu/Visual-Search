<?php
//makes the APi call to FashWell and returns the JSON file;
function send_fashwell_request_vs($image_url) {
    $host = 'https://api.fashwell.com/visual/v1/bllush/search/url';
    $api_token = '69b602cbd558a924351e3c259e14d22e649612c7';
    $post = array(
       'url' => $image_url,
    );
    $headers = [
        'Accept: application/json',
        'Authorization: Token ' .$api_token,
    ];

    // wrap the request in curl object.
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL,$host);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_HEADER, false);
    curl_setopt($ch, CURLINFO_HEADER_OUT, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

    $response = curl_exec($ch);

    // close the connection, release resources used
    curl_close($ch);
	return ($response);
}

//get_internal_id();
function get_internal_id ($image_url, $filter_results = array("EXCELLENT", "GOOD")){
    //parse through the json array
	$json_var = send_fashwell_request_vs($image_url);
    $fashwell_response = json_decode($json_var, true);
    $response_data = $fashwell_response["data"];
    $intern_id = array();
    foreach ($response_data as $item) {
        foreach ($item['products'] as $product) {
            foreach($filter_results as $rank){//loop through the default filter_results
                if ($product['score_label'] == $rank) {
                    $intern_id[] = $product["data"]["sku"];
                }
            }
        }
    }

    return $intern_id;
}
//match_product('https://res.cloudinary.com/bllush/image/upload/w_1000/c3matd9dys6hhfk1jot4');
function match_product($image_url){
    include 'visual-search-dal.php';
    $output = array();
    $internal_ids = get_internal_id($image_url);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $str = "(";
    $back = ")";
    $id_str = implode(",", $internal_ids);
    $str = "{$str}{$id_str}{$back}";
    if($str == "()"){
        echo "No Quality Match Found";
        return $output;
    }

    $sql = "SELECT link, image_url FROM pf_data where internal_id in $str";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $output[] = $row;
        }
    } 
    else{
        echo "0 results";
    }
       
    $conn->close();

    //returns the product link as well as the image url
    return $output;
}
?>










