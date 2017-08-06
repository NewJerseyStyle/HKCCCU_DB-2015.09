 <div class="col-sm-9 padding-right">
          <div class="features_items"><!--features_items-->
            <h2 class="title text-center"> <?php echo $pageHeading ?>
             </h2>


                <?php
              foreach ($query_GenereCate->result() as $row2) 
              {
                  echo  ' <div class="col-sm-4">
                           <div class="product-image-wrapper">
                           <div class="single-products">
                            <div class="productinfo text-center">
                                      <a href="' 
                                      . "/codeigniter.databaseproject/index.php/Home/GenereDetail/" 
                                      . $row2->GenereID
                                      . '"> '
                                      .$row2->GenereName 
                                    .'<div class="choose"></div></a></div></div></div></div>';
              }   
              ?>

      </div>
    </div>
  </section>