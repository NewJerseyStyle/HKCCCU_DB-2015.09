 <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center">Features Albums</h2>


                <?php
              foreach ($query_featuring->result() as $row2) 
              {
                  echo  ' <div class="col-sm-4">
                           <div class="product-image-wrapper">
                           <div class="single-products">
                            <div class="productinfo text-center">
                                      <a href="' 
                                      . "/codeigniter.databaseproject/index.php/home/AlbumDetail/" 
                                      . $row2->AlbumID
                                      . '"> '
                                      .'<img src="'
                                      .$row2->ImageURL
                                      .'" alt="" width= "300" height= "258" ><h2>$'
                                      .$row2->Price
                                      .'</h2>'
                                      .$row2->AlbumName 
                                    .'</p><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">
                                    </i>Add to cart</a><div class="choose"></div></div></div></div></div>';
              }   
              ?>


           
          </div><!--features_items-->
          <br><br><br><br>
     
          <div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">New Albums</h2>
            
           <?php 
            
                foreach ($query_new_album->result() as $row3) 
                     {
                         echo  ' <div class="col-sm-4">
                                 <div class="product-image-wrapper">
                                 <div class="single-products">
                                 <div class="productinfo text-center">
                                      <a href="' 
                                      . "/codeigniter.databaseproject/index.php/AlbumDetail/" 
                                      . $row3->AlbumID
                                      . '"> '
                                      .'<img src="'
                                      .$row3->ImageURL
                                      .'" alt="" width= "300" height= "258"><h2>$'
                                      .$row3->Price
                                      .'</h2>'
                                      .$row3->AlbumName 
                                    .'</p><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">
                                    </i>Add to cart</a><div class="choose"></div></div></div></div></div>';
              }   
              ?>
          

      </div>
    </div>
  </section>
             
       
                                <?php 
                                /*
                  foreach ($query_new_album->result() as $row3) 
                  {
                     echo  ' <div class="col-sm-4">
                            <div class="product-image-wrapper">
                             <div class="single-products">
                              <div class="productinfo text-center">
                                      <a href="' 
                                      . "/codeigniter.databaseproject/index.php/GenereDetail/" 
                                      . $row3->AlbumID
                                      . '"> '
                                      .'<img src="'
                                      .$row2->ImageURL
                                      .'" alt="" ><h2>$'
                                      .$row3->Price
                                      .'</h2>'
                                      .$row3->AlbumName 
                                    .'</p><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">
                                    </i>Add to cart</a></div></div></div></div>';
              }   
              */
              ?>  
