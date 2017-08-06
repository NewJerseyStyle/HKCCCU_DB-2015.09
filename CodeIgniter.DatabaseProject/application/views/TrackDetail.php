				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php 
								foreach ($query_TrackDetail->result() as $row1) 						
              						echo "<img src='".$row1->ImageURL."' alt='' height = '220'/> " ; ?> 
							
							</div>
						
							</div>


				

						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?php foreach ($query_TrackDetail->result() as $row1) 
              						echo $row1->TrackName ; ?></h2>
								<p><b>Track Length:  </b>
									<?php 
								foreach ($query_TrackDetail->result() as $row1) 
              						echo $row1->TrackLength; ?></p>
								
								<span>
									<span><?php foreach ($query_TrackDetail->result() as $row1) 
              						echo "$".$row1->Price ; ?></span>
									<label>Quantity:</label>
									<input type="text" value="3" min="1" max="5" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Album:  </b>
									<?php 
								foreach ($query_TrackAlbum->result() as $row1) 
              						echo "<a href='/codeigniter.databaseproject/index.php/home/AlbumDetail/"
                            . $row1->AlbumID
                              ."'> "
                               .$row1->AlbumName."  " ; ?></a></p>

								<p><b>Singer:</b><?php foreach ($query_TrackSinger->result() as $row3) 
              						echo "<a href='/codeigniter.databaseproject/index.php/home/SingerDetail/"
              						  . $row3->SingerID
                                      ."'> "
                                      .$row3->SingerName."  " ; ?></a></p>
              					<p><b>Year of Publish:  </b>
									<?php 
								foreach ($query_TrackDetail->result() as $row4) 
              						echo $row4->YearofPublish ; ?></p>

								<p><b>Record Label:</b> <?php foreach ($query_TrackRecordLabelDetail->result() as $row5) 
              						echo "<a href='/codeigniter.databaseproject/index.php/home/RecordLabelDetail/"
              						.$row5->RecordLabelID
              						."'>"
              						.$row5->RecordLabalName
              						."</a>" ; ?></p>
								<p><b>Genere:</b> <?php foreach ($query_TrackGenere->result() as $row6) 
              						echo "<a href='/codeigniter.databaseproject/index.php/home/GenereDetail/"
              						.$row6->GenereID
              						."'>"
              						.$row6->GenereName
              						."</a>" ; ?></p>
              						
              					<p><b>Description:</b> <?php foreach ($query_TrackDetail->result() as $row7) 
              						echo $row7->TrackDescription; ?></p>
								
							</div><!--/product-information-->
						</div>
					</div>

					<div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Track in same Albums</h2>
            
           <?php 
            
                foreach ($query_SameAlbumTrack->result() as $row3) 
                     {
                         echo  ' <div class="col-sm-4">
                                 <div class="product-image-wrapper">
                                 <div class="single-products">
                                 <div class="productinfo text-center">
                                      <a href="' 
                                      . "/codeigniter.databaseproject/index.php/home/TrackDetail/" 
                                      . $row3->TrackID
                                      . '"> '
                                      .'<img src="'
                                      .$row3->ImageURL
                                      .'" alt="" width= "40" height= "220"><h2>$'
                                      .$row3->Price
                                      .'</h2>'
                                      .$row3->TrackName 
                                    .'</p><a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart">
                                    </i>Add to cart</a><div class="choose"></div></div></div></div></div>';
              }   
              ?>
          

      </div>
    </div>


					
				</div>
			</div>
		</div>
	</section>
	