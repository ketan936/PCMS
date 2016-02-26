<?php namespace App\Http\Controllers;
use App\Libraries\Curl;
use App\Config\Constants;

class RestaurantController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Restaurant Controller
	|--------------------------------------------------------------------------
	|
	| This controller take cares all restaurant related CRUD operations
	|
	*/
	private $curl;

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->curl = new Curl;
	}

	public function addRestaurantPanel(){
		return view("add-restaurant-panel");
	}

	public function showManageRestaurantPanel(){
		$resId = \Input::get("res-id");
		if(!empty($resId)){

		  $url       = API_HOST.API_GET_RESTAURANT_DETAILS.$resId;
          $this->curl->setOption(CURLOPT_HEADER, true);
          $this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          $response = $this->curl->get($url);  
          $response = json_decode($response,true); 
           if(isset($response) && isset($response['status']) && $response['status'] === true){
           	 $restaurantMenu = self::getRestaurantMenu($resId);
		     return view("manage-restaurant-panel")
		             ->with("showDetail",true)
		             ->with("name",$response['name'])
           	         ->with("resInternalId",$response['internalId'])
              	     ->with("address",$response['location']['address'])
              	     ->with("city",$response['location']['city'])
              	     ->with("state", $response['location']['state'])
              	     ->with("minimumOrder",$response['minimumOrder'])
              	     ->with("openTime",$response['openTime'])
              	     ->with("closeTime",$response['closeTime'])
              	     ->with("contactNo",$response['contactNo'])
              	     ->with("deliveryCharges",$response['deliveryCharges'])
              	     ->with("restaurantMenu",$restaurantMenu);
              	}
            else{
                 return view("manage-restaurant-panel")
                         ->with("noRestFound",true);
            }  	     
		}
		else{
		    return view("manage-restaurant-panel");
		}
	}

	public function getRestaurantMenu($resId){
	   $menu = array();
       if(!empty($resId)){
       	  $url       = API_HOST.API_GET_RESTAURANT_MENU.$resId;
          $this->curl->setOption(CURLOPT_HEADER, true);
          $this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          $response = $this->curl->get($url);  
          $response = json_decode($response,true); 
           if(isset($response) && isset($response['status']) && $response['status'] === true){
           	  $menu = $response['categories'];
           }
       }

        return $menu;
	}

	/**
	 * Add new Restaurant
	 *
	 * @return Response
	 */
	public function addRestaurant()
	{
		$payload = array(   "name"            => \Input::get('name'),
						    "contactNo"       => \Input::get('contactNo'),
						    "openTime"        => strtotime(\Input::get('openTime')),
						    "closeTime"       => strtotime(\Input::get('closeTime')),
						    "minimumOrder"    => \Input::get('minimumOrder'),
						    "deliveryCharges" => \Input::get('deliveryCharges'),
						    "location"        => array(
						        						"address" =>  \Input::get('address'),
						        						"city"    => \Input::get('city'),
						        						"state"   => \Input::get('state'))
         );

	        $url       = API_HOST.API_ADD_NEW_RESTAURANT;
	        $this->curl->setOption(CURLOPT_HEADER, true);
	        $this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type: application/json',"Accept: application/json"));
	        $response = $this->curl->post($url, json_encode($payload));
	        $response = json_decode($response,true);
	        if(isset($response) && isset($response['status']) && $response['status'] === true)
                  $response = array("status" => "success","url" => $response['url']);
            else{
                 $errors = array("Server encountered some issue while posting data !");
			     $response = array("status" => "failed","errors" => $errors);
			   }  

		return $response;

	}

  public function updateRestaurantBasicDetail(){
            $data = \Input::all();
            $resInternalId =  $data['resInternalId'];
            if(!empty($data) && !empty($resInternalId)){
		            $url       = API_HOST."/restaurants/".$resInternalId;
			        $this->curl->setOption(CURLOPT_HEADER, true);
			        $this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type: application/json',"Accept: application/json"));
			        $response = $this->curl->put($url, json_encode($data));
			        $response = json_decode($response,true); 
			        echo json_encode($data);die();
			        if(isset($response) && isset($response['status']) && $response['status'] === true){
			        	$response =  array("status" => "success");
			        }
			        else{
			        	  $errors = array("Server encountered some issue while posting data !");
			             $response = array("status" => "failed","errors" => $errors);
			        }
			     }
			 else{
			 	 $errors   = array("There were some problem with input data !");
			     $response = array("status" => "failed","errors" => $errors);
			 }       
      return $response;
  }


	public function addMenuCategory(){
		$categoryName = \Input::get("category_name");
		$restaurantId = \Input::get("restaurant_id");
        $response =  array("status" => "false");
		if(!empty($categoryName) && !empty($restaurantId)){
          $url       = API_HOST.API_ADD_NEW_RESTAURANT_CATEGORY;
          $payload   = array("restaurantId"=> $restaurantId,"name" => $categoryName);
          $this->curl->setOption(CURLOPT_HEADER, true);
          $this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          $response = $this->curl->post($url, json_encode($payload));
          $response = json_decode($response,true); 
           if(isset($response) && isset($response['status']) && $response['status'] === true){
           	  $response = array("status" => true);
           }
		}

		 return json_encode($response);
	}

   public function addMenuItem(){
		$itemName    = \Input::get("item_name");
		$categoryId  = \Input::get("category_id");
		$itemPrice   = \Input::get("item_price");
        $response =  array("status" => "false");
		if(!empty($itemName) && !empty($categoryId)  && !empty($itemPrice)){
          $url       = API_HOST.API_ADD_NEW_ITEM;
          $payload   = array("categoryId"=> $categoryId,"name" => $itemName,"price" => $itemPrice);
          $this->curl->setOption(CURLOPT_HEADER, true);
          $this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          $response = $this->curl->post($url, json_encode($payload));
          $response = json_decode($response,true); 
           if(isset($response) && isset($response['status']) && $response['status'] === true){
           	  $response = array("status" => true);
           }
		}

		 return json_encode($response);
	}

 public function removeMenuCategory(){
    $categoryId =  \Input::get("category_id");
    $response   = array("status" => false);
    if(!empty($categoryId)){
        $url       = API_HOST.API_REMOVE_MENU_CATEGORY;
        $this->curl->setOption(CURLOPT_HEADER, true);
        $this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = $this->curl->put($url,json_encode(array("id" => $categoryId))); 
        $response = json_decode($response,true);
        if($response != null && isset($response['status']) && $response['status'] === true ){
                    $response   = array("status" => true);
         }  
    }
    echo json_encode($response);
 } 

 public function removeMenuItem(){
    $itemId     = \Input::get("item_id");
    $response   = array("status" => false);
    if(!empty($itemId)){
        $url       = API_HOST.API_REMOVE_MENU_ITEM;
        $this->curl->setOption(CURLOPT_HEADER, true);
        $this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = $this->curl->put($url,json_encode(array("id" => $itemId))); 
        $response = json_decode($response,true);
        if($response != null && isset($response['status']) && $response['status'] === true ){
                    $response   = array("status" => true);
         }  
    }
    echo json_encode($response);
 }

 public function editMenuCategory(){
 	$categoryId    =  \Input::get("category_id");
 	$categoryName  =  \Input::get("category_name");
    $response   = array("status" => false);
    if(!empty($categoryId) && !empty($categoryName)){
        $url       = API_HOST.API_EDIT_MENU_CATEGORY;
        $this->curl->setOption(CURLOPT_HEADER, true);
        $this->curl->setOption(CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        $response = $this->curl->put($url,json_encode(array("id" => $categoryId,"name" => $categoryName))); 
        $response = json_decode($response,true);
        if($response != null && isset($response['status']) && $response['status'] === true ){
                    $response   = array("status" => true);
         }  
    }
    echo json_encode($response);
 }

}
