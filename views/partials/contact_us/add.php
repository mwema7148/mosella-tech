
<?php
$comp_model = new SharedController;

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
                    <h3 class="record-title">Add New Contact Us</h3>
                    
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
                        <form id="contact_us-add-form" role="form" enctype="multipart/form-data" class="form form-horizontal needs-validation"  novalidate action="<?php print_link("contact_us/add") ?>" method="post">
                            <div class="card-body">
                                
                                
                                <div class="form-group ">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label class="control-label" for="name">Name <span class="text-danger">*</span></label>
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="">
                                                <input  id="name" value="<?php  echo $this->set_field_value('name',''); ?>" type="text" placeholder="Enter Name"  required="" name="name" class="form-control " />
                                                    
                                                    
                                                    
                                                </div>
                                                
                                                
                                            </div>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    
                                </div>
                                <div class="form-group form-submit-btn-holder text-center">
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
    