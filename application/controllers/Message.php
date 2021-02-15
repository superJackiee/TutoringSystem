<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Message extends MY_Controller {
     /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
 	public function __construct()
        {
                parent::__construct();
				$this->load->model(['Message_model','OuthModel','User_model']);
                //$this->SeesionModel->not_logged_in();
				$this->load->helper('string');
				if(is_admin() or is_author()){
		  
				}else{
					redirect('login');
				}
        }
	public function index(){
		$data['title'] = "Message";
		$id = $this->session->userdata('id');
		$data['strTitle']='';
		$data['strsubTitle']='';
		$list=[];
		if(user()->role == "student"){
			$list = $this->User_model->teachersList($id);
			$data['strTitle']='All Teachers';
			$data['strsubTitle']='Teachers';
			$data['chatTitle']='Select Teachers with Chat';
		}else
		if(user()->role == "teacher")
		{
			$list = $this->User_model->studentsList($id);
			$data['strTitle']='All Connected Students';
			$data['strsubTitle']='Students';
			$data['chatTitle']='Select Students with Chat';

		}
		$vendorslist=[];
		foreach($list as $u){
			$vendorslist[]=
			[
				'id' => $this->OuthModel->Encryptor('encrypt', $u['id']),
				'name' => $u['username'],
				'picture_url' => $this->User_model->PictureUrlById($u['id']),
			];
		}
		$data['vendorslist']=$vendorslist;
		$this->load->view('admin/includes/_header', $data);
        $this->parser->parse('message/message',$data);
        $this->load->view('admin/includes/_footer');
    }
	
	public function send_text_message(){
		$post = $this->input->post();
		$messageTxt='NULL';
		$attachment_name='';
		$file_ext='';
		$mime_type='';
		
		if(isset($post['type'])=='Attachment'){ 
		 	$AttachmentData = $this->ChatAttachmentUpload();
			//print_r($AttachmentData);
			$attachment_name = $AttachmentData['file_name'];
			$file_ext = $AttachmentData['file_ext'];
			$mime_type = $AttachmentData['file_type'];
			 
		}else{
			$messageTxt = reduce_multiples($post['messageTxt'],' ');
		}	
		 
				$data=[
 					'sender_id' => user()->id,
					'receiver_id' => $this->OuthModel->Encryptor('decrypt', $post['receiver_id']),
					'message' =>   $messageTxt,
					'attachment_name' => $attachment_name,
					'file_ext' => $file_ext,
					'mime_type' => $mime_type,
					'message_date_time' => date('Y-m-d H:i:s'), //23 Jan 2:05 pm
					'ip_address' => $this->input->ip_address(),
				];
		  
 				$query = $this->Message_model->SendTxtMessage($this->OuthModel->xss_clean($data)); 
 				$response='';
				if($query == true){
					$response = ['status' => 1 ,'message' => '' ];
				}else{
					$response = ['status' => 0 ,'message' => 'sorry we re having some technical problems. please try again !' 						];
				}
             
 		   echo json_encode($response);
	}
	public function ChatAttachmentUpload(){
		 
		
		$file_data='';
		if(isset($_FILES['upload_attachmentfile']['name']) && !empty($_FILES['upload_attachmentfile']['name'])){	
				$config['upload_path']          = './uploads/attachment';
				$config['allowed_types']        = 'jpeg|jpg|png|txt|pdf|docx|xlsx|pptx|rtf';
				//$config['max_size']             = 500;
				//$config['max_width']            = 1024;
				//$config['max_height']           = 768;
				$this->load->library('upload', $config);
				if ( ! $this->upload->do_upload('upload_attachmentfile'))
				{
					echo json_encode(['status' => 0,
					'message' => '<span style="color:#900;">'.$this->upload->display_errors(). '<span>' ]); die;
				}
				else
				{
					$file_data = $this->upload->data();
					//$filePath = $file_data['file_name'];
					return $file_data;
				}
		    }
 		 
	}
	
	public function get_chat_history_by_vendor(){
		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		
		$Logged_sender_id = user()->id;
		 
		$history = $this->Message_model->GetReciverChatHistory($receiver_id);
		//print_r($history);
		foreach($history as $chat):
			
			$message_id = $this->OuthModel->Encryptor('encrypt', $chat['id']);
			$sender_id = $chat['sender_id'];
			$userName = $this->User_model->GetName($chat['sender_id']);
			$userPic = $this->User_model->PictureUrlById($chat['sender_id']);
			
			$message = $chat['message'];
			$messagedatetime = date('d M H:i A',strtotime($chat['message_date_time']));
			
 		?>
        	<?php
				$messageBody='';
            	if($message=='NULL'){ //fetach media objects like images,pdf,documents etc
					$classBtn = 'right';
					if($Logged_sender_id==$sender_id){$classBtn = 'left';}
					
					$attachment_name = $chat['attachment_name'];
					$file_ext = $chat['file_ext'];
					$mime_type = explode('/',$chat['mime_type']);
					
					$document_url = base_url('uploads/attachment/'.$attachment_name);
					
				  if($mime_type[0]=='image'){
 					$messageBody.='<img src="'.$document_url.'" onClick="ViewAttachmentImage('."'".$document_url."'".','."'".$attachment_name."'".');" class="attachmentImgCls">';	
				  }else{
					$messageBody='';
					 $messageBody.='<div class="attachment">';
                          $messageBody.='<h4>Attachments:</h4>';
                           $messageBody.='<p class="filename">';
                            $messageBody.= $attachment_name;
                          $messageBody.='</p>';
        
                          $messageBody.='<div class="pull-'.$classBtn.'">';
                            $messageBody.='<a download href="'.$document_url.'"><button type="button" id="'.$message_id.'" class="btn btn-primary btn-sm btn-flat btnFileOpen">Open</button></a>';
                          $messageBody.='</div>';
                        $messageBody.='</div>';
					}
						
											
				}else{
					$messageBody = $message;
				}
			?>
            
            
        
             <?php if($Logged_sender_id!=$sender_id){?>     
                  <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-left"><?=$userName;?></span>
                        <span class="direct-chat-timestamp pull-right"><?=$messagedatetime;?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                         <?=$messageBody;?>
                      </div>
                      <!-- /.direct-chat-text -->
                      
                    </div>
                    <!-- /.direct-chat-msg -->
			<?php }else{?>
                    <!-- Message to the right -->
                    <div class="direct-chat-msg right">
                      <div class="direct-chat-info clearfix">
                        <span class="direct-chat-name pull-right"><?=$userName;?></span>
                        <span class="direct-chat-timestamp pull-left"><?=$messagedatetime;?></span>
                      </div>
                      <!-- /.direct-chat-info -->
                      <img class="direct-chat-img" src="<?=$userPic;?>" alt="<?=$userName;?>">
                      <!-- /.direct-chat-img -->
                      <div class="direct-chat-text">
                      	<?=$messageBody;?>
                          	<!--<div class="spiner">
                             	<i class="fa fa-circle-o-notch fa-spin"></i>
                            </div>-->
                       </div>
                       <!-- /.direct-chat-text -->
                    </div>
                    <!-- /.direct-chat-msg -->
             <?php }?>
        
        <?php
		endforeach;
 		
	}
	public function chat_clear_client_cs(){
		$receiver_id = $this->OuthModel->Encryptor('decrypt', $this->input->get('receiver_id') );
		
		$messagelist = $this->Message_model->GetReciverMessageList($receiver_id);
		
		foreach($messagelist as $row){
			
			if($row['message']=='NULL'){
				$attachment_name = unlink('uploads/attachment/'.$row['attachment_name']);
			}
 		}
		
		$this->Message_model->TrashById($receiver_id); 
 
 		
	}
	
}