<?php 
/**
 * Login Page Controller
 * @category  Controller
 */
class LoginController extends SecureController{
	/**
     * Add New Record Action 
     * If Not $_POST Request, Display Add Record Form View
     * @return View
     */
	function add(){
		if(is_post_request()){
			$modeldata = transform_request_data($_POST);
			$rules_array = array(
				'username' => 'required',
				'email' => 'required|valid_email',
				'password' => 'required',
				'id_number' => 'required',
			);
			$is_valid = GUMP::is_valid($modeldata, $rules_array);
			if( $is_valid !== true) {
				if(is_array($is_valid)){
					foreach($is_valid as  $error_msg){
						$this->view->page_error[] = $error_msg;
					}
				}
				else{
					$this->view->page_error[] = $is_valid;
				}
			}
			$cpassword = $modeldata['confirm_password'];
			$password = $modeldata['password'];
			if($cpassword != $password){
				$this->view->page_error[] = "Your password confirmation is not consistent";
			}
			unset($modeldata['confirm_password']);
			$password_text = $modeldata['password'];
			$modeldata['password'] = password_hash($password_text , PASSWORD_DEFAULT);
			if( empty($this->view->page_error) ){
				$db = $this->GetModel();
				$rec_id = $db->insert( 'login' , $modeldata );
				if(!empty($rec_id)){
					set_flash_msg('','');
					redirect_to_page("login");
					return;
				}
				else{
					if($db->getLastError()){
						$this->view->page_error[] = $db->getLastError();
					}
					else{
						$this->view->page_error[] = "Error inserting record";
					}
				}
			}
		}
		$this->view->page_title ="Add New Login";
		$this->view->render('login/add.php' ,null,'main_layout.php');
	}
	/**
     * Edit Record Action 
     * If Not $_POST Request, Display Edit Record Form View
     * @return View
     */
	function edit($rec_id=null){
		$db = $this->GetModel();
		if(is_post_request()){
			$modeldata = transform_request_data($_POST);
			$rules_array = array(
				'username' => 'required',
				'email' => 'required|valid_email',
				'id_number' => 'required',
			);
			$is_valid = GUMP::is_valid($modeldata, $rules_array);
			if( $is_valid !== true) {
				if(is_array($is_valid)){
					foreach($is_valid as  $error_msg){
						$this->view->page_error[] = $error_msg;
					}
				}
				else{
					$this->view->page_error[] = $is_valid;
				}
			}
			//Check if Duplicate Record Already Exit In The Database
			if(isset($modeldata['username'])){
				$db->where('username',$modeldata['username'])->where('username',$rec_id,'!=');
				if($db->has('login')){
					$this->view->page_error[] = $modeldata['username']."Already exist!";
				}
			}
			//Check if Duplicate Record Already Exit In The Database
			if(isset($modeldata['email'])){
				$db->where('email',$modeldata['email'])->where('username',$rec_id,'!=');
				if($db->has('login')){
					$this->view->page_error[] = $modeldata['email']."Already exist!";
				}
			} 
			if(empty($this->view->page_error)){
				$db->where('username' , $rec_id);
				$bool = $db->update('login',$modeldata);
				if($bool){
					set_flash_msg('','');
					redirect_to_page("account");
					return;
				}
				else{
					$this->view->page_error[] = $db->getLastError();
				}
			}
		}
		$fields = array('username','email','id_number');
		$db->where('username' , $rec_id);
		$data = $db->getOne('login',$fields);
		$this->view->page_title ="Edit  Login";
		if(!empty($data)){
			$this->view->render('login/edit.php' , $data, 'main_layout.php');
		}
		else{
			if($db->getLastError()){
				$this->view->page_error[] = $db->getLastError();
			}
			else{
				$this->view->page_error[] = "Record not found";
			}
			$this->view->render('login/edit.php' , $data , 'main_layout.php');
		}
	}
	/**
     * Delete Record Action 
     * @return View
     */
	function delete( $rec_ids = null ){
		$db = $this->GetModel();
		$arr_id = explode( ',', $rec_ids );
		foreach( $arr_id as $rec_id ){
			$db->where('username' , $rec_id,"=",'OR');
		}
		$bool = $db->delete( 'login' );
		if($bool){
			set_flash_msg('','');
		}
		else{
			if($db->getLastError()){
				set_flash_msg($db->getLastError(),'danger');
			}
			else{
				set_flash_msg("Error deleting the record. please make sure that the record exit",'danger');
			}
		}
		redirect_to_page("login");
	}
}
