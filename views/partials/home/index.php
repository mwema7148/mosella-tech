
		<?php 
			$comp_model = new SharedController;
		?>
		<div>
			
		<div  class="bg-light p-3 mb-3">
			<div class="container">
				
				<div class="row ">
					
		<div class="col-sm-8 comp-grid">
			
	
	<button data-toggle="modal" data-target="#Modal-1-Page1" class="btn btn-primary"><i class='fa fa-star-o fa-3x'></i>  Mosella-Tech Enterprise</button>
	<div data-backdrop="true" class="modal fade" id="Modal-1-Page1" tabindex="-1" role="dialog" aria-labelledby="Modal3" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle"><i class='fa fa-star-o fa-3x'></i>  Mosella-Tech Enterprise</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

				<div class="modal-body reset-grids">
					
				</div>
				
			</div>
		</div>
	</div>

	<button data-toggle="modal" data-target="#Modal-1-Page2" class="btn btn-primary"><i class='fa fa-eye fa-3x'></i>  Vision</button>
	<div data-backdrop="true" class="modal fade" id="Modal-1-Page2" tabindex="-1" role="dialog" aria-labelledby="Modal3" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				
				<div class="modal-body reset-grids">
					
				</div>
				
			</div>
		</div>
	</div>

	<button data-toggle="modal" data-target="#Modal-1-Page3" class="btn btn-primary"><i class='fa fa-empire fa-3x'></i>  Mision</button>
	<div data-backdrop="true" class="modal fade" id="Modal-1-Page3" tabindex="-1" role="dialog" aria-labelledby="Modal3" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
			<div class="modal-content">
				
	<div class="modal-header">
		<h5 class="modal-title" id="exampleModalLongTitle"><i class='fa fa-empire fa-3x'></i>  Mision</h5>
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
	</div>

				<div class="modal-body reset-grids">
					
				</div>
				
			</div>
		</div>
	</div>


		</div>

				</div>
			</div>
		</div>

		<div  class="">
			<div class="container">
				
				<div class="row ">
					
		<div class="col-md-12 comp-grid">
			<div class="card ">
		<div class="card-header p-0 pt-2 px-2">
	<ul class="nav  nav-tabs   ">
		
					<li class="nav-item">
						<a class="nav-link active" data-toggle="tab" href="#TabPage-1-Page1" role="tab" aria-selected="true">
							<i class="fa fa-pied-piper-alt fa-3x"></i> <h3><b>Services</b></h3>
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link " data-toggle="tab" href="#TabPage-1-Page2" role="tab" aria-selected="true">
							<i class="fa fa-product-hunt fa-3x"></i> <h3><b>Products</b></h3>
						</a>
					</li>

	</ul>
</div>
		<div class="card-body">
	<div class="tab-content">
		
					<div class="tab-pane show active fade" id="TabPage-1-Page1" role="tabpanel">
						<div class=""><div><p><h3>for best fabrication services</h3><br/> contact us for imediate response</p></div>
</div>
					</div>

					<div class="tab-pane  fade" id="TabPage-1-Page2" role="tabpanel">
						<div class=""><div>[html-lang-0029]</div>
</div>
					</div>

	</div>
</div>
</div><div class=""><div></div>
</div>
		</div>

		<div class="col-md-6 comp-grid">
			
				<div class=" position-relative mb-2">
					
					<div  class="card mb-3" >
						<h3><span class='badge badge-primary'>find the best  steel products</h3><br/ ><i>click on item to see deatils</i>
						<?php 
							$arr_menu = array();
							$menus = $comp_model->salesservices_list(); // Get menu items from database
							if(!empty($menus)){
								//build menu items into arrays
								foreach($menus as $menu){
									$arr_menu[] = array(
										"path"=>"sales/list/services/$menu[services]", 
										"label"=>"$menu[parts] <span class='badge badge-primary float-right'>$menu[num]</span>", 
										"icon"=>'<i class="fa fa-product-hunt fa-3x"></i>'
									);
								}
								//call menu render helper.
								Html :: render_menu($arr_menu , "nav nav-tabs flex-column");
							}
						?>
					</div>
				</div>
				
		</div>

		<div class="col-sm-6 comp-grid">
			
				<div class=" position-relative mb-2">
					
					<div  class="card mb-3" >
						<h3><span class='badge badge-primary'>find the best  services you'll ever find</h3><br/ ><i>click on item to see deatils</i>
						<?php 
							$arr_menu = array();
							$menus = $comp_model->servicesservices_list(); // Get menu items from database
							if(!empty($menus)){
								//build menu items into arrays
								foreach($menus as $menu){
									$arr_menu[] = array(
										"path"=>"services/list/services/$menu[services]", 
										"label"=>"$menu[services] <span class='badge badge-primary float-right'>$menu[num]</span>", 
										"icon"=>'<i class="fa fa-pied-piper-alt fa-3x"></i>'
									);
								}
								//call menu render helper.
								Html :: render_menu($arr_menu , "nav nav-tabs flex-column");
							}
						?>
					</div>
				</div>
				
		</div>

				</div>
			</div>
		</div>

		</div>
	