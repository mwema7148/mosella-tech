<?php 
/**
 * Contact_Us Page Controller
 * @category  Controller
 */
class Contact_UsController extends SecureController{
	/**
     * View Record Action 
     * @return View
     */
	function view( $rec_id = null , $value = null){
		$db = $this->GetModel();
		$fields = array( 'id', 	'name' );
		if( !empty($value) ){
			$db->where($rec_id, urldecode($value));
		}
		else{
			$db->where('id' , $rec_id);
		}
		$record = $db->getOne( 'contact_us', $fields );
		if(!empty($record)){
			$this->view->page_title ="View  Contact Us";
			$this->view->render('contact_us/view.php' , $record ,'main_layout.php');
		}
		else{
			if($db->getLastError()){
				$this->view->page_error = $db->getLastError();
			}
			else{
				$this->view->page_error = "Record not found";
			}
			$this->view->render('contact_us/view.php' , $record , 'main_layout.php');
		}
	}
}
