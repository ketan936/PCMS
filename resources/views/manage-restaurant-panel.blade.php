@include('/includes/app-header')
		<div class="col-md-10 mt50">
				<section class="content-header">
				    <h1>
				     Manage Restaurant
				    </h1>
				</section> 

					<div class="container-fluid ">
					    <div class="row">
					        <div class="col-md-12">
					            <div class="panel">
					            	<form class="form-horizontal col-md-12 mt20 mb20" role="form" method="GET" id="search-restaurant-form" action="{{ url('manageRestaurantPanel') }}">
					            	
					            		<div class="form-group">
					                            <div class="col-md-3 col-md-offset-3">
					                                <input type="text" name="res-id" required="required" class="form-control"  >
					                                </div>
					                                <div class="col-md-6">
					                                <button type="submit" class="btn btn-primary" id="search-restaurant-by-id-button">
					                                     Search Restaurant by id
					                                    <i class="fa-refresh fa-spin fa hidden"></i>
					                                </button>
					                            </div>
					                            
					                     </div>
					                </form>		
					                @include('edit-restaurant-details')
					             </div> 	
					         </div> 	
					     </div> 	
					 </div> 	
			</div>
@include('includes/footer') 

