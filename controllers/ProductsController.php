<?php 
/**
 * Products Page Controller
 * @category  Controller
 */
class ProductsController extends SecureController{
	/**
     * Load Record Action 
     * $arg1 Field Name
     * $arg2 Field Value 
     * $param $arg1 string
     * $param $arg1 string
     * @return View
     */
	function index($fieldname = null , $fieldvalue = null){
		$db = $this->GetModel();
		$fields = array('serial_number', 	'date_purchased', 	'price', 	'image', 	'product_name');
		$limit = $this->get_page_limit(MAX_RECORD_COUNT); // return pagination from BaseModel Class e.g array(5,20)
		if(!empty($this->search)){
			$text = $this->search;
			$db->orWhere('serial_number',"%$text%",'LIKE');
			$db->orWhere('date_purchased',"%$text%",'LIKE');
			$db->orWhere('price',"%$text%",'LIKE');
			$db->orWhere('image',"%$text%",'LIKE');
			$db->orWhere('product_name',"%$text%",'LIKE');
		}
		if(!empty($this->orderby)){ // when order by request fields (from $_GET param)
			$db->orderBy($this->orderby,$this->ordertype);
		}
		else{
			$db->orderBy('serial_number', ORDER_TYPE);
		}
			$db->where("image" , USER_NAME );
			$db->orWhere("product_name" , USER_NAME );
		if( !empty($fieldname) ){
			$db->where($fieldname , $fieldvalue);
		}
		//page filter command
		$tc = $db->withTotalCount();
		$records = $db->get('products', $limit, $fields);
		$data = new stdClass;
		$data->records = $records;
		$data->record_count = count($records);
		$data->total_records = intval($tc->totalCount);
		if($db->getLastError()){
			$this->view->page_error = $db->getLastError();
		}
		$this->view->page_title ="Products";
		$this->view->render('products/list.php' , $data ,'main_layout.php');
	}
	/**
     * Load csv|json data
     * @return data
     */
	function import_data(){
		if(!empty($_FILES['file'])){
			$finfo = pathinfo($_FILES['file']['name']);
			$ext = strtolower($finfo['extension']);
			if(!in_array($ext , array('csv','json'))){
				set_flash_msg("File format not supported",'danger');
			}
			else{
			$file_path = $_FILES['file']['tmp_name'];
				if(!empty($file_path)){
					$db = $this->GetModel();
					if($ext == 'csv'){
						$options = array('table' => 'products', 'fields' => '', 'delimiter' => ',', 'quote' => '"');
						$data = $db->loadCsvData( $file_path , $options , false );
					}
					else{
						$data = $db->loadJsonData( $file_path, 'products' , false );
					}
					if($db->getLastError()){
						set_flash_msg($db->getLastError(),'danger');
					}
					else{
						set_flash_msg("Data imported successfully",'success');
					}
				}
				else{
					set_flash_msg("Error uploading file",'success');
				}
			}
		}
		else{
			set_flash_msg("No file selected for upload",'warning');
		}
		$list_page = (!empty($_POST['redirect']) ? $_POST['redirect'] : 'products/list');
		redirect_to_page($list_page);
	}
	/**
     * View Record Action 
     * @return View
     */
	function view( $rec_id = null , $value = null){
		$db = $this->GetModel();
		$fields = array( 'serial_number', 	'date_purchased', 	'price', 	'image', 	'product_name' );
			$db->where("image" , USER_NAME );
			$db->orWhere("product_name" , USER_NAME );
		if( !empty($value) ){
			$db->where($rec_id, urldecode($value));
		}
		else{
			$db->where('serial_number' , $rec_id);
		}
		$record = $db->getOne( 'products', $fields );
		if(!empty($record)){
			$this->view->page_title ="View  Products";
			$this->view->render('products/view.php' , $record ,'main_layout.php');
		}
		else{
			if($db->getLastError()){
				$this->view->page_error = $db->getLastError();
			}
			else{
				$this->view->page_error = "Record not found";
			}
			$this->view->render('products/view.php' , $record , 'main_layout.php');
		}
	}
	/**
     * Add New Record Action 
     * If Not $_POST Request, Display Add Record Form View
     * @return View
     */
	function add(){
		if(is_post_request()){
			$modeldata = transform_request_data($_POST);
			$rules_array = array(
				'serial_number' => 'required|numeric',
				'date_purchased' => 'required',
				'price' => 'required|numeric',
				'image' => 'required',
				'product_name' => 'required',
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
			if( empty($this->view->page_error) ){
				$db = $this->GetModel();
				$rec_id = $db->insert( 'products' , $modeldata );
				if(!empty($rec_id)){
					set_flash_msg('','');
					redirect_to_page("products");
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
		$this->view->page_title ="Add New Products";
		$this->view->render('products/add.php' ,null,'main_layout.php');
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
				'serial_number' => 'required|numeric',
				'date_purchased' => 'required',
				'price' => 'required|numeric',
				'image' => 'required',
				'product_name' => 'required',
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
			if(empty($this->view->page_error)){
			$db->where("image" , USER_NAME );
			$db->orWhere("product_name" , USER_NAME );
				$db->where('serial_number' , $rec_id);
				$bool = $db->update('products',$modeldata);
				if($bool){
					set_flash_msg('','');
					redirect_to_page("products");
					return;
				}
				else{
					$this->view->page_error[] = $db->getLastError();
				}
			}
		}
		$fields = array('serial_number','date_purchased','price','image','product_name');
			$db->where("image" , USER_NAME );
			$db->orWhere("product_name" , USER_NAME );$db->where('serial_number' , $rec_id);
		$data = $db->getOne('products',$fields);
		$this->view->page_title ="Edit  Products";
		if(!empty($data)){
			$this->view->render('products/edit.php' , $data, 'main_layout.php');
		}
		else{
			if($db->getLastError()){
				$this->view->page_error[] = $db->getLastError();
			}
			else{
				$this->view->page_error[] = "Record not found";
			}
			$this->view->render('products/edit.php' , $data , 'main_layout.php');
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
			$db->where('serial_number' , $rec_id,"=",'OR');
		}
			$db->where("image" , USER_NAME );
			$db->orWhere("product_name" , USER_NAME );
		$bool = $db->delete( 'products' );
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
		redirect_to_page("products");
	}
}
