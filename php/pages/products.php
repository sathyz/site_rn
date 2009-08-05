                    
                    <div id="msc_container">
                            <div id="msc_menu">
                                    <div id="galleries_menu">
                                            <ul>
                                                   <?php
                                                    //$conn = init_db();
                                                    $bag_types = get_bag_types($conn);
                                                    $active_code = isset($_REQUEST['model'])? $_REQUEST["model"]:"";
                                                    $active_model= "";
                                                    foreach($bag_types as $bag_type){
                                                            $li = "<li ";
                                                            if($active_code == $bag_type["code"]){
                                                                    $li .= "id=msc_menu_active";
                                                                    $active_model = $bag_type["name"];
                                                            }
                                                            $li .= "><a class='nonum' href='index.php?page=products&model=$bag_type[code]'>"
                                                                    . $bag_type["name"]. "</a></li>";
                                                            print($li);
                                                    }
                                                    ?>

                                            </ul>
                                    </div> 
                            </div> 
                    
       
                            <div id="msc_thumbs">
                                <div id="top_menu"></div>

                                <div id="gallery_data">
                                <div id="gallery_title"><!--<span class="xtra">RN</span>--> <strong><?php print($active_model);?></strong> <!--<span class="xtra"> pictures <a href="#">(reload)</a></span></div>--> <!-- TODO: Implement page reload -->
                                </div>

                                <div style="display: block;" id="gallery_description">
                                   <?php
                                       if(!$active_code){
                                           include("php/pages/products.html");
                                       }
				       else{
                                           echo "<p>";
                                           @include("images/album/$active_code/_info.txt");
                                           echo "</p>";
				       }
                                   ?>
                                <!--   <p>**Through respective marketing agencies and third party agencies.</p>
                                    <p>*** All trademarks are the property of their respective owners and used for illustrative purposes only.***</p>-->
                                </div>

                                <div id="thumbs_div">
                                    <div id="thumbs_cont">
                                       <?php 
				           if($active_code){
                                                    require_once("php/pages/gallery.php");
                                                    print(get_images_data($conn,$active_code));
				           }
                                       ?>
                                    </div>
                            
                                </div>
                        </div> 
                    </div>
