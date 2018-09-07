<?php
//uses Pages/fashwell_handler.php  Pages/visual-search.php  Pages/visual-search-dal.php  Pages/visual-search-db.php
session_start();

include_once($_SERVER['DOCUMENT_ROOT'] . "/functions/Functions.php");
include 'fashwell_handler.php';
include 'visual-search-dal.php';
include 'visual-search-db.php';

templateAbove("Visual Search");

$submitted = false;
if (isset($_POST["imageID"])) {
    $submitted = true;
    $ugc_imageID = $_POST["imageID"];
    $ugc_url = get_ugc_from_imageID($ugc_imageID);

    echo  '     <div id="page-wrapper">       
                <div class="container-fluid">
                     <div class="row bg-title"> 
                        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                            <h4>  Visual Search Result </h4> <div ><small class="text-muted db">#' .$ugc_imageID. '</small></div>
                        </div>
                        <div class="col-md-8 pull-right">
                            <select name="client" class="pull-right custom-select col-md-2" onchange="if(this.value != 0) { this.form.submit(); }">
                                <option selected="">Select Client</option><option value="0" selected="">Ecllectic</option><option value="1">Rockglam</option><option value="2">SYW</option><option value="3">Brands4All</option><option value="5">Dzarm</option><option value="6">Ladila</option><option value="7">Modli</option><option value="8">Nautica</option><option value="9">Fox</option><option value="10">Fix</option><option value="11">Delta</option><option value="12">Zalando</option><option value="13">Walmart</option><option value="14">Setmoda</option><option value="15">Luisaviaroma</option><option value="16">Farfetch</option><option value="17">Koovs</option><option value="18">Walla</option><option value="19">Castro</option><option value="20">Madeleine</option><option value="21">Story</option><option value="22">Citta</option><option value="23">Lipsy</option><option value="24">Asos</option><option value="25">Lulus</option><option value="26">Fashiondays</option><option value="27">Mytheresa</option><option value="28">Goddiva</option><option value="29">Otto</option><option value="30">Topman</option><option value="31">ELAL</option><option value="32">VF (Lucy)</option><option value="33">Answear</option><option value="34">VF (Vans)</option><option value="35">VF (Nautica)</option><option value="40">Arcadia (Wallis)</option><option value="41">BrandAlley</option><option value="42">Breuninger</option><option value="43">Coast</option><option value="44">Coolcat</option><option value="45">Ellos</option><option value="46">Flinders</option><option value="47">Kavehome</option><option value="48">Kiabi Belgium</option><option value="49">Penti</option><option value="50">Sprinter</option><option value="51">Wehkamp</option><option value="52">1.2.3</option><option value="53">Engelhorn</option><option value="54">Evereve</option><option value="55">Dynamite</option><option value="58">Heine</option><option value="59">Vivense</option><option value="61">Shopalike</option><option value="62">ShopStyle</option><option value="63">Light.co.uk</option><option value="65">Trendyol</option><option value="66">KupiVIP</option><option value="67">Mainet</option><option value="68">Myntra</option><option value="69">Whistles</option><option value="71">Lesara</option><option value="72">Tambour</option><option value="73">Build</option><option value="74">Trends Brands</option><option value="75">Miinto</option><option value="76">Svenssons</option><option value="77">Tollmans</option><option value="78">Golf &amp; Co</option><option value="79">Wilde Vertigga </option><option value="80">Interio </option><option value="81">Negev</option><option value="82">Stylepit</option><option value="83">Wefashion</option><option value="84">Old Khaki</option><option value="85">Sfmeble</option><option value="86">Oodji</option><option value="87">Hoffner</option><option value="88">home24</option><option value="89">TestBrand-Noam</option><option value="93">Bata</option><option value="94">Massimo Dutti</option><option value="95">Youredo</option><option value="96">Daniel Cassin</option><option value="97">Galeria Kaufhof</option><option value="98">My Swanky Home</option><option value="100">Pamono </option><option value="101">House </option><option value="102">Suitsupply</option><option value="103">Nelly</option><option value="104">American Outlet</option><option value="105">Adika</option><option value="106">Gemo</option><option value="107">River Island</option><option value="108">Moebel24</option><option value="109">Lyst</option><option value="110">NA-KD</option>
                            </select>
                        </div>
                     </div>
                      <div class = "row">
                         <div class="col-md-12" >
                                    <div class="product-img">
                                        <img   src="' .$ugc_url. '">
                                    </div>
                                    <div class="product-text" style="text-align:center;">
                                        <div style="clear:both;"></div>
                                    </div>
                                
                            </div><br />
                                
                          ';

    $product = match_product($ugc_url);
    //<div class = "pull-left"><i class="ti-link copy-link" data-clipboard-text = ' . $item['link'] . '> </i></div>
    $count = 0;
    foreach($product as $item) {

        echo '
                             <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                    <div class="white-box">
                                        <div class="product-img">
                                            <img class="lazy img-responsive" width="400" height="400"  src="' . $item['image_url'] . '">
                                        </div>

                                        <div class="product-text">
                                            <div ><small class="text-muted db">' . $item['link'] . '</small></div>
                                              
                                                
                                              
                                        </div>
                                    </div>
                            </div>';

    }
    echo '</div>  <div style="text-align: center;"> <a href = "/visual-search" class="btn btn-success btn-md"> New Search </a> </div> </div></div>'; //page wrapper, container fluid, row



    templateBelow();
}

if($submitted == false) {
    echo '


        <form action="/visual-search" method="post" data-target=".modal-content" data-async>
            <div class="form-group row padding-bottom-form" style="padding: 100px;">

                <div class="col-md-4 col-md-offset-4 text-center">
                    <h4> Visual Search</h4><br />
                    <h4>Quick open image info:</h4><br />
                    <input type="text" required class="form-control" name="imageID" placeholder="Insert imageID" />
                    <br />
                    <input type="submit" name="submit" value="Show image" class="btn btn-success btn-md"
                </div>
            </div>
        </form>';
}
//templateBelow();
?>