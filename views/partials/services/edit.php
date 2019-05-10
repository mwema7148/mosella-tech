
<?php
$comp_model = new SharedController;
$data = $this->view_data;

//$rec_id = $data['__tableprimarykey'];
$page_id = Router :: $page_id;

$show_header = $this->show_header;
$view_title = $this->view_title;
$redirect_to = $this->redirect_to;

?>

<section class="page">
    
    <?php
    if( $show_header == true ){
    ?>
    
    <div  class="bg-light p-3 mb-3">
        <div class="container">
            
            <div class="row ">
                
                <div class="col-12 comp-grid">
                    <h3 class="record-title">Edit  Services</h3>
                    
                </div>
                
            </div>
        </div>
    </div>
    
    <?php
    }
    ?>
    
    <div  class="">
        <div class="container">
            
            <div class="row ">
                
                <div class="col-md-7 comp-grid">
                    
                    <?php $this :: display_page_errors(); ?>
                    
                    <div  class="card animated fadeIn">
                        <form role="form" enctype="multipart/form-data"  class="form form-horizontal needs-validation" novalidate action="<?php print_link("services/edit/$page_id"); ?>" method="post">
                            <div class="card-body">
                                
                                
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="services">Services <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input  id="services" value="<?php  echo $data['services']; ?>" type="text" placeholder="Enter Services"  required="" name="services" class="form-control " />
                                                    
                                                    
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                    <div class="form-group ">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="control-label" for="rating">Rating <span class="text-danger">*</span></label>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="input-group">
                                                    <select required=""  name="rating" placeholder="Select a value ..."    class="form-control">
                                                        <option selected><?php echo $data['rating']; ?></option>
                                                        
                                                        <option <?php echo $this->set_field_selected('rating','Terrible') ?> value="Terrible">Terrible</option>
                                                        <option <?php echo $this->set_field_selected('rating','Bad') ?> value="Bad">Bad</option>
                                                        <option <?php echo $this->set_field_selected('rating','Good') ?> value="Good">Good</option>
                                                        <option <?php echo $this->set_field_selected('rating','Average') ?> value="Average">Average</option>
                                                        <option <?php echo $this->set_field_selected('rating','Fulfilling') ?> value="Fulfilling">Fulfilling</option>
                                                        <option <?php echo $this->set_field_selected('rating','Excellent') ?> value="Excellent">Excellent</option>          
                                                    </select> 
                                                    
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-star-half-o "></i></span>
                                                    </div>
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary" type="submit">
                                        
                                        <i class="fa fa-send"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        
    </section>
    