<?php 

/**
 * SharedController Controller
 * @category  Controller / Model
 */
class SharedController extends BaseController{
	
	/**
     * salesservices_list Model Action
     * @return array
     */
	function salesservices_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT services , parts ,   COUNT(*) AS num FROM sales GROUP BY services ORDER BY id ASC";
		$arr = $db->rawQuery($sqltext);
		return $arr;
	}

	/**
     * servicesservices_list Model Action
     * @return array
     */
	function servicesservices_list(){
		$db = $this->GetModel();
		$sqltext = "SELECT services , services ,   COUNT(*) AS num FROM services GROUP BY services ORDER BY id ASC";
		$arr = $db->rawQuery($sqltext);
		return $arr;
	}

}
