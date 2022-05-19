<script type="text/javascript">
function toggleSet(t){
  var tgt = $(t);
  var tgttog = $(t+"_toggletext");
  if( tgt.css("display") == "none"){
    tgt.fadeIn();//css("display","");
    tgttog.html("(hide)");
  } else {
    tgt.fadeOut();//css("display","none");*/
    tgttog.html("(show)");
  }
}
</script>
<style type="text/css" media="all">
#noresults{
  margin:30px 0;
}
#strong{
  cursor: pointer;
}
.locationSet{
  overflow:hidden;
}

#myInput {
  width: 99%; 
  font-size: 16px; 
  border: 1px solid #ddd;
  margin: 20px auto;
}

.ulSet {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

.ulSet li {
  margin-bottom:8px;
  margin-left:20px;
}

.ulSet li a {
  text-decoration: none;
  font-size: 14px;
  color: black;
}

.ulSet li:hover {
  background-color: #eeeeee;
}

.subdirectory p.header{
  margin:8px 0;
}

.subdirectory p.header a {
  text-decoration: none;
  font-size: 16px;
  color: #d2272a;
}

.subdirectory p.header a:hover {
  text-decoration:underline;
}

.subdirectory p.header a .toggletext{
  color:#ccc;
  font-size:12px;
}

.subdirectory p.header a:hover .toggletext{
  color:#d2272a;
   cursor: pointer;
}
</style>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="subdirectory">
        <p class="header"><a onclick="javascript:toggleSet('#geninfo')">
        <strong id="strong">General Information </strong>
        <span id="geninfo_toggletext" class="toggletext">(show)</span></a> </p>
      <div id="geninfo" class="locationSet" style="display:none;">
        <ul class="ulSet">
              <?php @$this->load->view('main_server/PA/tab_geninfoTab'); ?>         
        </ul>
      </div>
      </div>
      <div class="subdirectory">
        <p class="header"><a onclick="javascript:toggleSet('#loc')">
        <strong id="strong">General Information </strong>
        <span id="loc_toggletext" class="toggletext">(show)</span></a> </p>
      <div id="loc" class="locationSet" style="display:none;">
        <ul class="ulSet">
              <?php @$this->load->view('main_server/PA/tab_locationTab'); ?>         
        </ul>
      </div>
      </div>
    </div>
  </div>
</section>