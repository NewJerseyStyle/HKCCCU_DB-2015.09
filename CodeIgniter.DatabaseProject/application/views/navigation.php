<!--/slider-->

 
 

  <section>

    <div class="container">
      <div class="row">
        <div class="col-sm-3">
          <div class="left-sidebar">
            <h2>GENERE</h2>
            <div class="panel-group category-products" id="accordian">
              <!--category-productsr-->
                <?php
              foreach ($query_catbar->result() as $row) 
              {
                  echo  ' <div class="panel panel-default">
                           <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a href="' . "/codeigniter.databaseproject/index.php/Home/GenereDetail/" 
                                      . $row->GenereID 
                                      . '">'
                                      . $row->GenereName 
                                    .'</a></h4></div></div>';
              }   
              ?>
 
            
            </div><!--/category-products-->
          

            
          </div>
        </div>