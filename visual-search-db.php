<?php
function get_ugc_from_imageID($ugc_imageID){
    include 'visual-search-dal.php';
    $sql = "SELECT cloudinary_id FROM image_data_raw where id = $ugc_imageID limit 1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cloudinary_id = $row["cloudinary_id"];
    }
    else{
        echo "No Such Image";
        exit();
    }
    $conn->close();

    $img_params = array("width" => 500, "height" => 500, "crop"=>"fill", "quality" => "auto", "fetch_format"=>"auto");
    $ugc_url = cloudinary_url($cloudinary_id, $img_params);
    return $ugc_url;
}

?>