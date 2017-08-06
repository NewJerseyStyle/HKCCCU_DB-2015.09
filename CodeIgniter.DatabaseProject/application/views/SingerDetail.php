				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php 
								foreach ($query_SingerDetail->result() as $row1) 						
              						echo "<img src='".$row1->ImageURL."' alt='' height = '220'/> " ; ?> 
							
							</div>
						
							</div>


				

						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?php foreach ($query_SingerDetail->result() as $row1) 
              						echo $row1->SingerName ; ?></h2>
								<p><b>Gender:  </b>
									<?php 
								foreach ($query_SingerDetail->result() as $row1) 
              						echo $row1->SingerGender; ?></p>
								
						
							
							
								<p><b>Debut Year:  </b>
									<?php 
								foreach ($query_SingerDetail->result() as $row4) 
              						echo $row4->DebutYear ; ?></p>

              					<p><b>Number of Track:  </b>
									<?php 
								foreach ($query_SingerNumOFTrack->result() as $row8) 
              						echo $row8->count2; ?></p>

              					<p><b>Number of Album:  </b>
									<?php 
								foreach ($query_SingerNumOFAlbum->result() as $row9) 
              						echo $row9->count1 ; ?></p>

								<p><b>Record Label:</b> <?php foreach ($query_SingerRecordLabelDetail->result() as $row5) 
              						echo "<a href='/codeigniter.databaseproject/index.php/home/RecordLabelDetail/"
              						.$row5->RecordLabelID
              						."'>"
              						.$row5->RecordLabalName
              						."</a>" ; ?></p>
								<p><b>Main Genere:</b> <?php foreach ($query_SingerGerena->result() as $row6) 
              						echo "<a href='/codeigniter.databaseproject/index.php/home/GenereDetail/"
              						.$row6->GenereID
              						."'>"
              						.$row6->GenereName
              						."</a>" ; ?></p>
              					<p><b>Description:</b> <?php foreach ($query_SingerDetail->result() as $row7) 
              						echo $row7->SingerDescirption; ?></p>
								
							</div><!--/product-information-->
						</div>
					</div>

					<div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Released Albums</h2>
            
           <?php 
            
                foreach ($query_SingerAlbum->result() as $row3) 
                     {
                         echo  ' <div class="col-sm-4">
                                 <div class="product-image-wrapper">
                                 <div class="single-products">
                                 <div class="productinfo text-center">
                                      <a href="' 
                                      . "/codeigniter.databaseproject/index.php/home/AlbumDetail/" 
                                      . $row3->AlbumID
                                      . '"> '
                                      .'<img src="'
                                      .$row3->ImageURL
                                      .'" alt="" width= "40" height= "220"><h2>$'
                                      .$row3->Price
                                      .'</h2>'
                                      .$row3->AlbumName 
                                    .'</a></p><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">
                                    </i>Add to cart</a><div class="choose"></div></div></div></div></div>';
              }   
              ?>
          

      </div>
    </div>


					
				</div>
			</div>
		</div>
	</section>
	