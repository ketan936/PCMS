@include('/includes/app-header')

<div class="col-md-10 mt50">
  <section class="content-header">
    <h1>
      Add Restaurant
    </h1>
   </section>
	<div class="container-fluid mt20">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="panel panel-default">
	                <div class="panel-body">


	                    <form class="form-horizontal col-md-10" role="form" method="POST" id="form-add-restaurant">
	                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Restaurant Name</label>
	                            <div class="col-md-7">
	                                <input type="text" class="form-control" name="name" >
	                            </div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Station to map with </label>
	                            <div class="col-md-7">
	                                <select name="station_id" class="form-control">
	                                	 <option>New Delhi Railway Sation</option>
	                                	 <option>Varanasi</option>
	                                	 <option>Gorakhpur</option>
	                                 </select>
	                            </div>
	                        </div>
                           <div class="form-group">
	                            <label class="col-md-4 control-label">Address</label>
	                            <div class="col-md-7">
	                                <input type="text" class="form-control" name="address">
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-4 control-label">City</label>
	                            <div class="col-md-7">
	                              <input type="text" class="form-control" name="city" >
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-4 control-label">State</label>
	                            <div class="col-md-7">
	                                
	                                <select name="state" class="form-control">
	                                	 <option>Delhi</option>
	                                	 <option>Uttar Pradesh</option>
	                                	 <option>Maharashtra</option>
	                                 </select>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Minimum Booking amount</label>
	                            <div class="col-md-2">
	                                <input type="text" class="form-control" name="minimumOrder" >
	                            </div>
	                        </div>

							<div class="form-group">
	                            <label class="col-md-4 control-label">Opening Days</label>
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
	                            <label class="col-md-4 control-label">Open time</label>
	                            <div class="col-md-7">
	                               <div class="input-append bootstrap-timepicker">
        								<input  class="input-small timepicker" type="text" name="openTime"><span class="add-on"><i class="fa fa-calendar"></i></span>
    								</div> 
	                            </div>
	                        </div>

                            <div class="form-group">
	                            <label class="col-md-4 control-label">Close time</label>
	                            <div class="col-md-7">
	                               <div class="input-append bootstrap-timepicker">
        								<input class="input-small timepicker" type="text" name="closeTime"><span class="add-on"><i class="fa fa-calendar"></i></span>
    								</div> 
    							</div>
	                        </div>

	                        <div class="form-group">
	                            <label class="col-md-4 control-label">Phone Number</label>
	                            <div class="col-md-3">
	                                <input type="number" class="form-control" name="contactNo" >
	                            </div>
	                        </div>
                            <div class="form-group">
	                            <label class="col-md-4 control-label">Delivery Charges</label>
	                            <div class="col-md-3">
	                                <input type="text" class="form-control" name="deliveryCharges" >
	                            </div>
	                        </div>
                            <div class="form-group">
	                            <label class="col-md-4 control-label">COD availiable</label>
	                            <div class="col-md-7">
	                                <input type="checkbox"  name="cod-availiable" >
	                            </div>
	                        </div>
	                        <div class="form-group">
	                            <div class="col-md-6 col-md-offset-4">
	                                <button type="submit" class="btn btn-primary" id="add-restaurant-button">
	                                    Register
	                                    <i class="fa-refresh fa-spin fa hidden"></i>
	                                </button>
	                            </div>
	                        </div>
	                    </form> 
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
</div>
@include('includes/footer')