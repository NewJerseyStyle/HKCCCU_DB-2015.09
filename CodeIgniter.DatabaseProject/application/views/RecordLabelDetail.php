				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php 
								foreach ($query_RecordLabelDetail->result() as $row1) 						
              						echo "<img src='".$row1->ImageURL."' alt='' height = '220'/> " ; ?> 
							
							</div>
						
							</div>


				

						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?php foreach ($query_RecordLabelDetail->result() as $row1) 
              						echo $row1->RecordLabalName; ?></h2>
								
								
								
						
							
							
								<p><b>Founded Year:  </b>
									<?php 
								foreach ($query_RecordLabelDetail->result() as $row4) 
              						echo $row4->RecordLabelFoundedYear ; ?></p>

              					<p><b>Number of Artists:  </b>
									<?php 
								foreach ($query_NumOFSinger->result() as $row8) 
              						echo $row8->NumOFSinger ; ?></p>


              					<p><b>Description: </b> <?php foreach ($query_RecordLabelDetail->result() as $row7) 
              						echo $row7->RecordLabalDescription; ?></p>

              					<p><b>Offical Website: </b> <?php foreach ($query_RecordLabelDetail->result() as $row7) 
              						echo '<a href="'.$row7->RecordLabalOfficalWebsite.'">'.$row7->RecordLabalOfficalWebsite.'</a>'; ?></p>


								
							</div><!--/product-information-->
						</div>
					</div>

					<div class="recommended_items"><!--recommended_items-->
            <h2 class="title text-center">Signed Singer</h2>
            
           <?php 
            
                foreach ($query_RecordLabelSinger->result() as $row3) 
                     {
                         echo  ' <div class="col-sm-4">
                                 <div class="product-image-wrapper">
                                 <div class="single-products">
                                 <div class="productinfo text-center">
                                      <a href="' 
                                      . "/codeigniter.databaseproject/index.php/home/SingerDetail/" 
                                      . $row3->SingerID
                                      . '"> '
                                      .'<img src="'
                                      .$row3->ImageURL
                                      .'" alt="" width= "40" height= "220">'
                                      .$row3->SingerName 
                                    .'</a></p><div class="choose"></div></div></div></div></div>';
              }   
              ?>
          

      </div>
    </div>


					
				</div>
			</div>
		</div>
	</section>
	