<?php 
 defined('BASEPATH') OR exit('No direct script access allowed');
   
class StripeController extends MY_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->model('Student_model');
       $this->load->helper('url');
       $this->load->library('email');
       $this->load->model('Message_model');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $lesson_id = $this->session->userdata('lesson_id');
        // exit
        
        $book_id = $this->session->userdata('book_id');
        // $lesson_id = $this->session->userdata('lesson_id');
        $id = $this->session->userdata('id');
        
        // echo $this->session->userdata('teacher_id');
        $data['user_detail'] = $this->Student_model->user_detail($id);
        $data['lesson'] = $this->Student_model->get_lesson($book_id);
        // var_dump($data['user_detail']);
        // die();
        $this->db->select('*');
		$this->db->from('lesson');
		$this->db->where("lesson_id",$lesson_id);

   		$query = $this->db->get();
   		$r=$query->result_array();
        $data_lesson['total_price'] = $r[0]['total_price'];
        $data_lesson['book_id']   = $book_id;
        
        // $lesson['leason_price']  ;
        // var_dump($lessonPrice);
        // var_dump($data['lesson']);
        $this->load->view('admin/includes/_header', $data);
        $this->load->view('my_stripe', $data_lesson );
        $this->load->view('admin/includes/_footer');
    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function stripePost()
    {
        $lesson_price = $this->input->post('lesson_price');
        $lesson_id = $this->session->userdata('lesson_id');
        $duration= $this->session->userdata('duration');
        $lessonPrice = $this->Student_model->lesson_price($lesson_id);
        if($duration == 30){
            $price = $lesson_price/2;
            $disc = $lessonPrice[0]["discount"];
            $discount = $price*$disc/100;
            $Amount = $price-$discount;
        }else{
            $price = $lesson_price;
            $disc = $lessonPrice[0]["discount"];
            $discount = $price*$disc/100;
            $Amount = $price-$discount;
        }
        
        require_once('application/libraries/stripe-php-7.37.1/init.php');
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
        
        // Create a Transfer to a connected account (later):
        try{
            $transfer = \Stripe\Transfer::create([
              'amount' => 100,
              'currency' => 'usd',
              'destination' => 'acct_1HaBt9A0oXYVwSM8',
              'transfer_group' => '{ORDER10}',
            ]);   
        }catch( \Stripe\Exception\InvalidRequestException $e ){
            $message = explode( '.' , $e->getError()->message );
            $this->session->set_flashdata('error', $message[0]);
            redirect($_SERVER['HTTP_REFERER']);
        }
        if($transfer){
            $book_id = $this->input->post('book_id');
            $this->db->where('booking_id', $book_id);
            
            $this->db->update('book', ['payment_status'=> 1 , 'amount' => $Amount]);
            
            $this->session->set_flashdata('success', 'Payment made successfully.');
            $student_id = $this->session->userdata('id');
            $teacher_id = $this->session->userdata('teacher_id');
            $student_detail = $this->Student_model->sdetail($student_id);
            $teacher_detail = $this->Student_model->basic_detail($teacher_id);
            $sdetail = $this->Student_model->user_detail($student_id);
              
            $studentemail = $sdetail[0]['email'];
            $teacheremail = $teacher_detail[0]['email'];
            $this->data = array(
                'studentskype' => $student_detail[0]['comm_id'],
                'teacherskype' => $teacher_detail[0]['Communication_id'],
            );
            $this->load->library('email');
            $fromemail="ad@c.com";
            $toemail = $studentemail;
            $subject = "Lesson Registration Mail";
            $data=array();
            $mesg = $this->load->view('email',$this->data, TRUE);
            
            $config=array(
                'charset'=>'utf-8',
                'wordwrap'=> TRUE,
                'mailtype' => 'html'
            );
            
            $this->email->initialize($config);
            $this->email->to($toemail);
            $this->email->from($fromemail, "Lesson Registration Mail");
            $this->email->subject($subject);
            $this->email->message($mesg);
            
            
            
            $mail = $this->email->send();
            redirect('/student');
        }
        else{
            redirect('StripeController/index');
        }
    }
}
