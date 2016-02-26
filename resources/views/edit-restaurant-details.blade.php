@if( isset($noRestFound) && $noRestFound === true)
<div class="col-md-12">
	No Restaurant found against this id
</div>
@endif
@if( isset($showDetail) && $showDetail === true)
<input type="hidden" id="resInternalId" value="{{ $resInternalId}}" >
<div class="col-md-12" id="res-search-result-panel">
	<div class="col-md-12 text-center"><h3>{{ $name }}</h3></div>
	<ul class="nav nav-tabs">
	    <li class="active"><a href="#restaurant-basic-detail" data-toggle="tab">Basic Details</a></li>
	    <li><a  href="#restaurant-menu-details" data-toggle="tab">Menu</a></li>  
   </ul>
<div class="tab-content">
	<!-- Restaurant Basic detail form starts -->
	<div class="tab-pane active mt20" id="restaurant-basic-detail">
      <form class="form-horizontal col-md-11" role="form" method="POST" id="form-update-restaurant-basic-detail">
	        		  <input type="hidden" name="_token" value="{{ csrf_token() }}">
	        		  <input type="hidden" name="resInternalId" value="{{ $resInternalId}}" >

	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Restaurant Name</label>
	                            <div class="col-md-7">
	                                <input type="text" class="form-control" name="name" value="{{ $name }}">
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Station to map with </label>
	                            <div class="col-md-7">
	                                <select name="station_id" class="form-control">
	                                	 <option value="ndls">New Delhi Railway Sation</option>
	                                	 <option value="bsb">Varanasi</option>
	                                	 <option value="gkp">Gorakhpur</option>
	                                 </select>
	                            </div>
	                        </div>
                           <div class="form-group">
	                            <label class="col-md-2 control-label">Address</label>
	                            <div class="col-md-7">
	                                <input type="text" class="form-control" name="address" value="{{ $address }}">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label">City</label>
	                            <div class="col-md-7">
	                              <input type="text" class="form-control" name="city" value="{{ $city }}">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label">State</label>
	                            <div class="col-md-7">
	                                
	                                <select name="state" class="form-control">
	                                	 <option value="delhi">Delhi</option>
	                                	 <option value="up">Uttar Pradesh</option>
	                                	 <option value="maharashtra">Maharashtra</option>
	                                 </select>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Minimum Orders</label>
	                            <div class="col-md-2">
	                                <input type="text" class="form-control" name="minimumOrder" value="{{ $minimumOrder }}" >
	                            </div>
	                        </div>

							<div class="form-group">
	                            <label class="col-md-2 control-label">Opening Days</label>
	                            <div class="col-md-7">
	                                <input type="checkbox" class="" name="monday-checkbox"  >
	                            	<label class="control-label">Mon</label>
	                            	<input type="checkbox" class="" name="tuesday-checkbox" >
	                            	<label class="control-label">Tue</label>
	                            	<input type="checkbox" class="" name="wednesday-checkbox" >
	                            	<label class="control-label">Wed</label>
	                            	<input type="checkbox" class="" name="thursday-checkbox" >
	                            	<label class="control-label">Thu</label>
	                            	<input type="checkbox" class="" name="friday-checkbox" >
	                            	<label class="control-label">Fri</label>
	                            	<input type="checkbox" class="" name="saturday-checkbox" >
	                            	<label class="control-label">Sat</label>
	                            	<input type="checkbox" class="" name="sunday-checkbox" >
	                            	<label class="control-label">Sun</label>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Open time</label>
	                            <div class="col-md-7">
	                               <div class="input-append bootstrap-timepicker">
        								<input  class="input-small timepicker" type="text" name="openTime" value="{{ $openTime }}"><span class="add-on"><i class="fa fa-calendar"></i></span>
    								</div> 
	                            </div>
	                        </div>

                            <div class="form-group">
	                            <label class="col-md-2 control-label">Close time</label>
	                            <div class="col-md-7">
	                               <div class="input-append bootstrap-timepicker">
        								<input class="input-small timepicker" type="text" name="closeTime" value="{{ $closeTime }}"><span class="add-on"><i class="fa fa-calendar"></i></span>
    								</div> 
    							</div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-2 control-label">Phone Number</label>
	                            <div class="col-md-3">
	                                <input type="number" class="form-control" name="contactNo" value="{{ $contactNo}}">
	                            </div>
	                        </div>
                            <div class="form-group">
	                            <label class="col-md-2 control-label">Delivery Charges</label>
	                            <div class="col-md-3">
	                                <input type="text" class="form-control" name="deliveryCharges" value="{{ $deliveryCharges}}" >
	                            </div>
	                        </div>
                            <div class="form-group">
	                            <label class="col-md-2 control-label">COD availiable</label>
	                            <div class="col-md-7">
	                                <input type="checkbox"  name="cod-availiable" >
	                            </div>
	                        </div>
	                        <div class="col-md-12 col-md-offset-5"><button type="submit" class="btn btn-primary" id="save-restaurant-basic-detail-button">
	                                     SAVE
	                                    <i class="fa-refresh fa-spin fa hidden"></i>
	                                </button>
	              </div>
	              </form>
	            </div>
	            <!-- Restaurant Basic detail form ends -->

	            <!-- Restaurant menu detail form starts -->
	            <div class="tab-pane mt20" id="restaurant-menu-details">  
	            	<div>
	              <form class="form-horizontal col-md-6" role="form" method="POST" id="form-update-restaurant-menu-detail">
	              	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	              	 <input type="hidden" name="resInternalId" value="{{ $resInternalId}}" >
                      
                       <div class="form-heading"> Menu Categories</div>
                       <div id="add-new-category" class="pcms-button add-elem"><a>Add Category</a></div>
                      <table class="table" id="res-menu-detail-table">
						        <tbody>
						           @foreach($restaurantMenu as $resMenu)
						            <tr>
						            	<td>
						            		 <input type="text" value="{{ $resMenu['name'] }}"  disabled class="no-border form-control input-box category-name" />
						                </td>
						                <td class="text-right mt10">
						                	<span class="glyphicon glyphicon-edit icon edit-button"></span>
						                	<span class="glyphicon glyphicon-ok icon save-button hidden" data-attribute-type="category" data-attribute-id="{{ $resMenu['id'] }}"  ></span>
						                </td>
						                <td class="text-right">
						                	 <span data-attribute-type="category" data-attribute-id="{{ $resMenu['id'] }}" class="activate-button hidden">Activate</span>
						                	 <span data-attribute-type="category" data-attribute-id="{{ $resMenu['id'] }}" class="deactivate-button">Deactivate</span>
						                </td> 	
						            </tr>
						            @endforeach
						        </tbody>
                      </table>
	           </form>
	           	  <form class="form-horizontal col-md-6" role="form" method="POST" >
	              	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
	              	 <input type="hidden" name="resInternalId" value="{{ $resInternalId}}" >
                      
                       <div class="form-heading"> Menu Items</div>
                       <div id="add-new-item" class="pcms-button add-elem"><a>Add Item</a></div>

                      <table class="table" id="res-menu-detail-table">
						        <tbody>
						        	@foreach($restaurantMenu as $resMenu)
						            <tr class="row-header">
						            	<td colspan="2" >
						            		 {{ $resMenu['name'] }}
						                </td>
						                <td>
						                	<?php
						                	     $count  = 0;
						                	     foreach($resMenu['items'] as $item){
						                	     	  if($item['active'] === true)
						                	     	  	$count++;
						                	     }
						                	?>
						                {{ $count }} items
						                </td>
						            </tr>
							            @foreach($resMenu['items'] as $item)
							              @if($item['active'] === true)
								            <tr>
								            	<td>
								            		<input type="text" value="{{ $item['name'] }}" data-item-id="{{  $item['id'] }}" id="item-name" disabled class="no-border form-control input-box" />
								                </td>
								                <td> <input type="text" value="Rs {{ $item['price'] }}"  id="item-price" disabled class="no-border form-control input-box" /></td>
								                <td class="text-right mt10"><span class="glyphicon glyphicon-remove remove-button icon" data-attribute-id="{{ $item['id'] }}"  data-attribute-type = "item"></span></td>
								            </tr>
							              @endif
							             @endforeach
						            @endforeach
						        </tbody>
                      </table>
	           </form>    	
	        </div>
	        <!-- Restaurant menu detail form ends -->
	   </div>    
	</div>   
 
      
<!-- Add New Category -->
       <div class="add-popup hidden" id="add-categ-popup">
       	  <h4>Add Category</h4>
       	  <div class="loading-text hidden">Adding .Please wait ...</div>
       	  <div class="add-popup__content">
                       <form role="form" id="add-categ-popup-form" >

                                    <div class="form-group">
                                        <input type="text" id="new-category-name" class="form-control input-class" required="1" placeholder="Add Category name">
                                    </div>


                                    <div class="form-group buttons text-center">
                                        <button type="submit" class="btn-custom" id= "add-new-category-popup-button" >
                                             ADD
                                        </button>
                                        <button type="submit" class="btn-custom close-popup" data-popup-id="add-categ-popup">
                                             CANCEL
                                        </button>
                                    </div>
                           </form>
       	  </div>
       </div>
 <!-- add new category ends -->    

 <!-- Add New Item -->
       <div class="add-popup hidden" id="add-item-popup">
       	  <h4>Add Item</h4>
       	  <div class="loading-text hidden">Adding .Please wait ...</div>
       	  <div class="add-popup__content">
                       <form role="form" id="add-item-popup-form" >
                                     
                                    <div class="form-group">
                                        <select id="restaurant-category" class="form-control col-md-12 mb10">
                                        	 <option value="-1">Choose Menu Category</option>
                                        	 @foreach($restaurantMenu as $resMenu)
                                        	   <option value="{{ $resMenu['id'] }}">{{ $resMenu['name'] }}</option>
                                        	 @endforeach
                                        </select> 	
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="new-item-name" class="form-control input-class" required="1" placeholder="Add item name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" id="new-item-price" class="form-control input-class" required="1" placeholder="Add item price">
                                    </div>
                                    <div class="form-group buttons text-center">
                                        <button type="submit" class="btn-custom" id= "add-menu-item-popup-button" >
                                             ADD
                                        </button>
                                        <button type="submit" class="btn-custom close-popup" data-popup-id="add-item-popup">
                                             CANCEL
                                        </button>
                                    </div>
                           </form>
       	  </div>
       </div>
 <!-- add new item ends -->    
 @endif	 