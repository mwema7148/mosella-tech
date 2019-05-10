
<?php
$comp_model = new SharedController;

//Page Data From Controller
$view_data = $this->view_data;

$records = $view_data->records;
$record_count = $view_data->record_count;
$total_records = $view_data->total_records;
$field_name = Router :: $field_name;
$field_value = Router :: $field_value;

$view_title = $this->view_title;
$show_header = $this->show_header;
$show_footer = $this->show_footer;
$show_pagination = $this->show_pagination;

?>

<section class="page">
    
    <?php
    if( $show_header == true ){
    ?>
    
    <div  class="bg-light p-3 mb-3">
        <div class="container-fluid">
            
            <div class="row ">
                
                <div class="col-sm-4 comp-grid">
                    <h3 class="record-title">About Us</h3>
                    
                </div>
                
                <div class="col-md-12 comp-grid">
                    <div class="">
                        <?php
                        if(!empty($field_name) || !empty($field_name)){
                        ?>
                        <hr class="sm d-block d-sm-none" />
                        <nav class="page-header-breadcrumbs mt-2" aria-label="breadcrumb">
                            <ul class="breadcrumb m-0 p-1">
                                <?php
                                if(!empty($field_name)){
                                ?>
                                <li class="breadcrumb-item"><a class="text-capitalize" href="<?php print_link('about_us') ?>"><?php echo $field_name ?></a></li>
                                <li  class="breadcrumb-item active text-capitalize"><?php echo urldecode($field_value) ?></li>
                                <?php 
                                }   
                                ?>
                                <?php
                                if(!empty($_GET['search'])){
                                ?>
                                <li class="breadcrumb-item">
                                    <a class="text-capitalize" href="<?php print_link('about_us') ?>">Search</a>
                                </li>
                                <li  class="breadcrumb-item active text-capitalize"> <strong><?php echo get_value('search'); ?></strong></li>
                                <?php
                                }
                                ?>
                                
                            </ul>
                        </nav>  
                        <?php
                        }
                        ?>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    
    <?php
    }
    ?>
    
    <div  class="">
        <div class="container-fluid">
            
            <div class="row ">
                
                <div class="col-md-12 comp-grid">
                    
                    <?php $this :: display_page_errors(); ?>
                    
                    <div  class="card animated fadeIn">
                        <div class="container">
                            
                            <hr />
                            <div style="text-color:blue">
                                <p><h3>Mosella-tech enterprises is a firm based in Nairobi Kenya and has been established as an engineering firm specialized in ; fabrication, servicing, installation and supply of all dairy, pharmaceutical, cosmetic and all food and beverages equipment.</h3></p><hr/>
                                <p> <h3>We also provide end to end automated machines installation, repair and maintenance. With our multi-disciplinary engineering expertise we undertake high level project execution on fabrication, servicing, installation, repair and maintenance.</h3> </p><hr/>
                                <p><h3>As a company we have been working together as a team and have cumulative experience in fabrication of stainless steel structures, installation of stainless steel pipes and automated machines, repair and maintenance of the same. The team has executed many successful projects exceeding customers’ expectations every time on performance, reliability and quality. We are proud of proven ability to offer high performance and reliable solutions.<h3> </p><hr/>
                                    <p><h3>We are respectful of the diverse needs of customer and our solution to all the mechanical problems have been extensively tested in the market and add so much value to customers </p><hr/>
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </section>
        