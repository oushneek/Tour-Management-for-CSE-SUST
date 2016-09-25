<?php

class Message extends CI_Controller{
	public function index(){
		$data['title']="Message";
		$this->load->view('common/header',$data);
		$this->load->view('list/message');
		$this->load->view('common/footer');	
	}

	public function create(){
		
		$data['title']="Send Message";
		$this->load->view('common/header',$data);
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				$this->load->view('form/message_send');
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');
		
		$this->load->view('common/footer');
	}

	public function process(){
		if($this->session->userdata('logged_in')){
			if($this->session->userdata('user_type_id')==4 || $this->session->userdata('user_type_id')==6){
				
			
		//validation Rules
				$this->form_validation->set_rules('message', 'Message', 'required');

				//custom message for form validation
				$this->form_validation->set_message('required', '%s can\'t be Blank');

				if ($this->form_validation->run() == FALSE)
				{
					$data['title']="Send Message";
					$this->load->view('common/header',$data);
					$this->load->view('form/message_send');
					$this->load->view('common/footer');
				}
				else{

					$msgTotal=$this->input->post('message');

					$tour_obj=new Tour_table();
			        $tour_obj->where('status',2);
			        $tour_obj->get();

			        $default_tour=$tour_obj->id_tour;

			        // $user_obj=new User_table();
			        // $user_obj->where('id_tour',$default_tour);
			        // $user_obj->get();


			        //SMS Sending Code Start
					ini_set('max_execution_time', 1000);
					//connect to database
					/*** mysql hostname ***/
					$hostname = 'localhost';

					/*** mysql username ***/
					$username = 'root';

					/*** mysql password ***/
					$password = '';

					$query=$this->db->query('Select mobile from user where id_user in(Select id_user from person_tour where id_tour='.$default_tour. ')');

					$i=0;
					try {
					    $dbh = new PDO("mysql:host=$hostname;dbname=tour", $username, $password);
					    /*** echo a message saying we have connected ***/
					    /*** The SQL SELECT statement ***/

					    foreach($query->result() as $users_obj){
			        	$mob[$i]=$users_obj->mobile;
					    $i++;
			        	}


					    }
					catch(PDOException $e)
					    {
					    echo $e->getMessage();
					    }


					for ($i=0;$i<sizeof($mob);$i++)
					{

						if($mob[$i]==null)
							$i++;
						if($i==sizeof($mob))
							break;
					$nick = 'DB Project';
					$mgbyuser = $msgTotal;
					$usernumber = '88'.$mob[$i];	
					$smallss = substr($mgbyuser, 0, 160); 
					$tergetsms = '$mgbyuser';
					$newmgss = str_replace(' ', '%20',$tergetsms); // 


					//set POST variables
					//$url = 'http://sms.eysoftbd.com:8080/bulksms/bulksms';
					$url = 'http://121.241.242.114/bulksms/bulksms';
					//$url='http://phonegap.sustcse10.net/gps_tracker/login_check.php';
					$fields = array(
											'username' => urlencode("eys1-ohokbd1"),
											'password' => urlencode("Dsd4566"),
											'type' => urlencode("0"),
											'dlr' => urlencode("1"),
											'destination' => urlencode($usernumber),
											'source' => urlencode($nick),
											'message' => urlencode($mgbyuser),
											'bal' => urlencode("bal")
									);

					//url-ify the data for the POST
					$fields_string="";
					foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
					rtrim($fields_string, '&');

					//open connection
					$ch = curl_init();

					//set the url, number of POST vars, POST data
					curl_setopt($ch,CURLOPT_URL, $url);
					curl_setopt($ch,CURLOPT_POST, count($fields));
					curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
					print $mob[$i].'</br>';
					//execute post
					$result = curl_exec($ch);
					print "</br>";
					//close connection
					curl_close($ch);
					}

			        //SMS Seending Code End 

			        $msg_obj = new Message_table();
			        $msg_obj->description = $msgTotal;
			        $msg_obj->id_tour=$default_tour;
			        $msg_obj->id_user=$this->session->userdata('id_user');
			        if($msg_obj->save()){
			        	echo "SMS Saved Done";
			        	
			        }	
			        else{
			        	echo "Error in MSG Save";
			        }
				}
			}
			else
				$this->load->view('list/home');
		}
		else
			$this->load->view('list/home');

	}
}