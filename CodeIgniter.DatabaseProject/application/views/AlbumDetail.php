				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
								<?php 
								foreach ($query_AlbumDetail->result() as $row1) 						
              						echo "<img src='".$row1->ImageURL."' alt=''/> " ; ?> 
							
							</div>
						
							</div>


				

						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->
								
								<h2><?php foreach ($query_AlbumDetail->result() as $row1) 
              						echo $row1->AlbumName ; ?></h2>
								<p><b>Rating:  </b>
									<?php 
								foreach ($query_AlbumStar->result() as $row2) 
              						echo $row2->rating ; ?></p>
								
								<span>
									<span><?php foreach ($query_AlbumDetail->result() as $row1) 
              						echo "$".$row1->Price ; ?></span>
									<label>Quantity:</label>
									<input type="text" value="3" min="1" max="5" />
									<button type="button" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>
								<p><b>Singer:</b> <?php foreach ($query_AlbumSinger->result() as $row3) 
              						echo "<a href='/codeigniter.databaseproject/index.php/home/SingerDetail/"
              						  . $row3->SingerID
                                      ."'> "
                                      .$row3->SingerName."  "
                                      ."</a>" ; ?></p>
              					<p><b>Date of Publish:  </b>
									<?php 
								foreach ($query_AlbumDetail->result() as $row4) 
              						echo $row4->DateOfPublish ; ?></p>

								<p><b>Record Label:</b> <?php foreach ($query_AlbumRecordLabelDetail->result() as $row5) 
              						echo "<a href='/codeigniter.databaseproject/index.php/home/RecordLabelDetail/"
              						.$row5->RecordLabelID
              						."'>"
              						.$row5->RecordLabalName
              						."</a>" ; ?></p>
								<p><b>Genere:</b> <?php foreach ($query_AlbumGenere->result() as $row6) 
              						echo "<a href='/codeigniter.databaseproject/index.php/home/GenereDetail/"
              						.$row6->GenereID
              						."'>"
              						.$row6->GenereName
              						."</a>" ; ?></p>
              					<p><b>Description:</b> <?php foreach ($query_AlbumDetail->result() as $row7) 
              						echo $row7->AlbumDescirption; ?></p>
								
							</div><!--/product-information-->
						</div>
					</div><!--/product-details-->
					
					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li><a href="#details" data-toggle="tab">Track In This Album</a></li>
								<li class="active"><a href="#reviews" data-toggle="tab">Comments </a></li>
							</ul>
						</div>

						<div class="tab-content">
							<div class="tab-pane fade" id="details" >
							<?php
							foreach ($query_AlbumTrackDetail->result() as $row8) 
							{
								echo
									'<div class="col-sm-3">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
												<a href="' 
                                      			. "/codeigniter.databaseproject/index.php/home/TrackDetail/"
                                      			. $row8->TrackID
                                      				. '"> '
													.'<img src="'
													.$row8->ImageURL
													.'" alt="" width= "40" height="140" /><h2>$'
													.$row8->Price
													.'</h2><p>'
													.$row8->TrackName
													.'</a></p>
													<button type="button" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</button>
												</div>
											</div>
										</div>
									</div>';
							} ?>

							

							</div>
							
							
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<p><b>Comments:</b></p>

							<?php			
							foreach ($query_AlbumComments->result() as $row9) 
							{
								echo
								"<ul><li><a href=''> <i class="
								."'fa fa-user'></i>"
								.$row9->username
								."  </a></li>"
								."<li><a href=''><i class=".
								"'fa fa-clock-o'></i>"
								.$row9->EstablishedTime
								."  </a></li>"
								."<li><a href=''>Rating: "
								.$row9->Rating
								."</a></li></ul><p>"
								.$row9->CommentDetail
								." </p>";
							}?>
									<br><br><br>
									<p><b>Write Your Comment</b></p>
									
									<form action='http://localhost/codeigniter.databaseproject/index.php/home/Addcomment' method= "post">
									<!--<b>AlbumID: </b>-->	<input name= "AlbumID" id = "AlbumID" value = "<?php foreach ($query_AlbumDetail->result() as $row1) 
              						echo $row1->AlbumID ; ?>" hidden />						
										<textarea name= "comment" id = "comment" ></textarea>
										<b>Rating: </b>
										<input name= "rating" id = "rating" type="number" min = "1" max="5" placeholder="(1-Worst, 5-Best)" />
										<button type="submit" class="btn btn-default">Submit</button>
						     		</form>
								</div>
							</div>
							
						</div>
					</div>


					
				</div>
			</div>
		</div>
	</section>
	