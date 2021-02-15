<section class="content" style="min-height: auto;" >
     <div class="row">


<!--- add top style min height --->
                  <div class="col-md-4">
              <!-- USERS LIST -->
              <div class="box box-danger">
                <div class="box-header with-border">
                  <h3 class="box-title"><?=$strTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span class="label label-danger"><?=count($vendorslist);?> <?=$strsubTitle;?></span>
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body no-padding">
                  <ul class="users-list clearfix" style="display: flex; flex-direction: column;">
                  
                    <?php if(!empty($vendorslist)){
            foreach($vendorslist as $v):
            ?>
            <!----- add img in p tag with class --->
            <!----- add a in p tag without  class --->

                        <li class="selectVendor" id="<?=$v['id'];?>" title="<?=$v['name'];?>">
                          <p class="std_pro_img"> <img src="<?=$v['picture_url'];?>" alt="<?=$v['name'];?>" title="<?=$v['name'];?>"> </p>
                         <p> <a class="users-list-name" href="#"><?=$v['name'];?></a> </p>
                          <!--<span class="users-list-date">Yesterday</span>-->
                        </li>
                    <?php endforeach;?>
                    
                   <?php }else{?>
                    <li>
                       <a class="users-list-name" href="#">No Vendor's Find...</a>
                     </li>
                    <?php } ?>
                    
                    
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.box-body -->
               <!-- <div class="box-footer text-center">
                  <a href="javascript:void(0)" class="uppercase">View All Users</a>
                </div>-->
                <!-- /.box-footer -->
              </div>
              <!--/.box -->
            </div>
            <!-- /.col -->    
           <div class="col-md-8" id="chatSection">
              <!-- DIRECT CHAT -->
              <div class="box box-warning direct-chat direct-chat-primary">
                <div class="box-header with-border">
                  <h3 class="box-title" id="ReciverName_txt"><?=$chatTitle;?></h3>

                  <div class="box-tools pull-right">
                    <span data-toggle="tooltip" title="Clear Chat" class="ClearChat"><i class="fa fa-comments"></i></span>
                    <!--<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Clear Chat"
                            data-widget="chat-pane-toggle">
                      <i class="fa fa-comments"></i></button>-->
                   <!-- <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                    </button>-->
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  <!-- Conversations are loaded here -->
                  <div class="direct-chat-messages" id="content">
                     <!-- /.direct-chat-msg -->

                     <div id="dumppy"></div>

                  </div>
                  <!--/.direct-chat-messages-->
 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <!--<form action="#" method="post">-->
                    <div class="input-group" style="align-items: center;">
                     <?php
						$obj=&get_instance();
						$obj->load->model('User_model');
						$profile_url = $obj->User_model->PictureUrl();
						$user=$obj->User_model->GetUserData();
 					?>
                    	
                        <input type="hidden" id="Sender_Name" value="<?=$user['username'];?>">
                        <input type="hidden" id="Sender_ProfilePic" value="<?=$profile_url;?>">
                    	
                    	<input type="hidden" id="ReciverId_txt">
                        <input type="text" name="message" placeholder="Type Message ..." class="form-control message">
                      		<span class="input-group-btn">
                             <button type="button" class="btn btn-success btn-flat btnSend" id="nav_down">Send</button>


<!--------------------------- change btn  add input label div ------------->

                             <div class="fileDiv btn btn-info btn-flat"> <i class="fa fa-upload"></i> 
                           <!--   <input type="file" name="file" class="upload_attachmentfile"/> -->
                    <input type="file" name="file" id="file-upload" class="upload_attachmentfile"/>
                    <label for="file-upload">Upload file</label>
                    <div id="file-upload-filename"></div>


                           </div>

<!--------------------------- change btn  add input label div ------------->



                          </span>
                    </div>
                  <!--</form>-->
                </div>
                <!-- /.box-footer-->
              </div>
              <!--/.direct-chat -->
            </div>




        
          </div>
    
    <!-- /.row --> 
    
    
    
  </section>


  <style>
     /   add p class css /
  .std_pro_img {
    width: 12%;
    height: auto;
    margin-right: 14px !important;
  }
  .users-list> li {
    width: 100%;
    display: flex;
    align-items: center;
  }
  .users-list> li> p{
    margin:0;
    display: inline-block;
  }
     /   add p class css /

  / css uplode btn /

label{
  cursor: pointer;
}
  input[type="file"] { 
  z-index: -1;
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

input:focus + label {
  outline: 1px solid;
}
 / css uplode btn /

</style>



<!-- uplode btn js --->

  <script src="<?=base_url('assets/js/chat.js');?>"></script> 

      <script>
    var input = document.getElementById( 'file-upload' );
    var infoArea = document.getElementById( 'file-upload-filename' )
    input.addEventListener( 'change', showFileName )
    function showFileName( event ) {
      var input = event.srcElement;
      var fileName = input.files[0].name;
      infoArea.textContent = 'File name: ' + fileName;
    }
  </script>

  <!-- uplode btn js --->