</div>
</div>
<footer>
  <div class="container-fluid">
    <div class="col-lg-12">
      <div class="row"> 
        <div class="col-lg-1">
        </div>
        <div class="col-lg-3">
          <!-- <img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/denr-emb-logo.gif')) ?>"> -->
          <a href="https://www.gov.ph" target="_blank" title="Official Gazette"><img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/website/govph-seal-mono-footer.png')) ?>">  </a>
          <a href="https://www.president.gov.ph" target="_blank" title="President"><img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/website/president.png')) ?>"></a>
          <a href="https://www.ovp.gov.ph" target="_blank" title="Vice President"><img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/website/vice-president.png')) ?>"></a>
          <a href="https://www.senate.gov.ph" target="_blank" title="Senate"><img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/website/senate.png')) ?>"></a>
          <a href="http://www.congress.gov.ph" target="_blank" title="Congress"><img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/website/congress.png')) ?>"></a>
          <a href="http://sc.judiciary.gov.ph" target="_blank" title="Supreme Court"><img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/website/supreme-court.png')) ?>"></a>
          <a href="http://ca.judiciary.gov.ph" target="_blank" title="Court of Appeals"><img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/website/court-of-appeals.png')) ?>"></a>
          <a href="http://sb.judiciary.gov.ph" target="_blank" title="Sandiganbayan"><img class="footer-logos img-responsive" src="<?= (base_url('bmb_assets2/img/website/sandiganbayan.png')) ?>"></a>
        </div>
        <div class="col-lg-4">
          <?php echo $webSetting->description; ?>
          <p><?php echo $webSetting->address; ?></p>
          <p><i class="fa fa-phone-square fa-lg" aria-hidden="true"></i><?php echo $webSetting->landline; ?>
             <i class="fa fa-envelope-o fa-lg" aria-hidden="true"></i><?php echo $webSetting->email; ?></p> 
          <?php echo $webSetting->copyright; ?>
          <hr>
          <h5 class="site">Site Directory</h5>
          <ul>
            <li><a href="<?php echo base_url(); ?>">Home</a></li>
            <li><a href="<?php echo base_url(); ?>about">About</a></li>                          
            <li><a href="<?php echo base_url(); ?>statistics">Statistics</a></li>
            <li><a href="<?php echo base_url(); ?>login" target="_blank">Protected Area Database and Information System</a></li>
          </ul> 
          <h5 class="site">Social Media</h5>
          <ul class="socialmedia-links">
            <li><a href="<?php echo 'https://'.$webSetting->facebook; ?>" target="_blank" title="Like us in Facebook"><i class="fa fa-facebook-official fa-2x"></i></a></li>
            <li><a href="<?php echo 'https://'.$webSetting->twitter; ?>" target="_blank" title="Follow us in Twitter"><i class="fa fa-twitter-square fa-2x"></i></a></li>
            <li><a href="<?php echo 'https://'.$webSetting->youtube; ?>" target="_blank" title="Watch us in Youtube"><i class="fa fa-youtube fa-2x"></i></a></li>
          </ul>          
        </div>
        <div class="col-lg-3">       
          <strong>DENR OFFICES</strong>
          <h2>Central Office</h2>
          <ul>
            <li class="office"><a href="https://www.denr.gov.ph" target="_blank">Department of Environment and Natural Resources</a></li>
            <li class="office"><a href="https://www.faspo.denr.gov.ph" target="_blank">Foreign Assisted and Special Project</a></li>
            <li class="office"><a href="https://www.climatechange.denr.gov.ph" target="_blank">Climate Change</a></li>
            <li class="office"><a href="http://intl.denr.gov.ph/" target="_blank">International Agreement on ENR</a></li>
            <li class="office"><a href="https://www.lamp.denr.gov.ph" target="_blank">LAMP2</a></li>
            <li class="office"><a href="http://rbco.denr.gov.ph/" target="_blank">River Basin Control</a></li>
            <li class="office"><a href="http://mbco.denr.gov.ph/" target="_blank">Manila Bay Coordinating</a></li>
            <li class="office"><a href="http://www.denr.gov.ph/about-us/history/898.html" target="_blank">DENR-CARP Coordinating</a></li>
            <li class="office"><a href="https://www.icrmp.denr.gov.ph" target="_blank">ICRMP</a></li>
            <li class="office"><a href="http://gad.denr.gov.ph/" target="_blank">Gender and Development</a></li>
          </ul>
          <h2>Bureaus</h2>
          <ul>
            <li class="office"><a href="http://www.emb.gov.ph/Portal/" target="_blank">Environmental Management</a></li>
            <li class="office"><a href="http://www.mgb.gov.ph/" target="_blank">Mines and Geosciences</a></li>
            <li class="office"><a href="http://erdb.denr.gov.ph/" target="_blank">Ecosystems Research and Development</a></li>
            <li class="office"><a href="http://forestry.denr.gov.ph/" target="_blank">Forest Management</a></li>
            <li class="office"><a href="http://new.lmb.gov.ph/" target="_blank">Land Management</a></li>
            <li class="office"><a href="http://www.bmb.gov.ph/" target="_blank">Biodiversity Management</a></li>
          </ul>
          <h2>Attached Agencies</h2>
          <ul>
            <li class="office"><a href="http://www.namria.gov.ph/" target="_blank">Nat'l Mapping and Resources Info Authority</a></li>
            <li class="office"><a href="http://www.llda.gov.ph/" target="_blank">Laguna Lake Devt Authority</a></li>
            <li class="office"><a href="http://nrdc.denr.gov.ph/" target="_blank">Natural Resources Devt Corp.</a></li>
            <li class="office"><a href="http://nwrb.denr.gov.ph/" target="_blank">National Water Resources Board</a></li>
            <li class="office"><a href="http://www.philforest.denr.gov.ph/" target="_blank">Phil Forest Corp.</a></li>
            <li class="office"><a href="http://pmdc.com.ph/" target="_blank">Phil Mining Devt Corp.</a></li>
            <li class="office"><a href="http://pea.gov.ph/" target="_blank">Phil Reclamation Authority</a></li>
            <li class="office"><a href="http://www.pcsd.ph/" target="_blank">Palawan Council for Sustainable Devt</a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</footer>