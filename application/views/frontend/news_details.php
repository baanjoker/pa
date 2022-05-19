<div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-12 well">
                    <div class="post">
                        <div class="col-md-12 body_context">
                            
                            <div class="col-md-6 col-xs-6">
                           </div>     
                            <?php if ($item->advisory_image != 'nophoto.jpg'): ?>
                            <img src="<?= (!empty($item->advisory_image)?base_url('bmb_assets2/upload/news_image/'.$item->advisory_image):null) ?>">
                            <?php endif ?>                      
                            <div class="content-box">
                                <div class="date-box">
                                    <div class="inner">
                                        <div class="date"><b><?= date('d',strtotime($item->advisory_date)) ?></b> <?= date('M',strtotime($item->advisory_date)) ?></div>                                       
                                    </div>
                                </div>                                
                            </div>

                            <h3><?= $item->advisory_title ?></h3>
                            <hr>
                            <p><?= $item->advisory_details ?></p>
                        </div>                                               
                    </div>
                </div>                                 
            </div>
        </div>        
    </div>