<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sudent Information</title>
    <center><h1>Student Information Edit</h1></center>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<style>
		body {
			  font-family:arial;
			  font-weight:bold;
			  background:#f2f3f4;
			
		}
		</style>
        </head>
    <body>
    
    <?php echo form_open_multipart('Student/update',['class'=>'form-horizontal']) ?>
        <div  class="container" style="width: 60%;background-color: white;padding: 50px 10px 10px 10px;margin-top: 50px">
            <div class="form-group col-lg-12">
                <input type="hidden" name="id" value="<?php echo $row->id;?>" >
                <div class="col-lg-3"><label for="First Name">First Name</label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="f_name" pattern="[a-zA-Z]*" size="30" class="form-control" required value="<?php echo $row->f_name;?>" title="Only Characters are allowed" /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Last Name">Last Name</label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="l_name" pattern="[a-zA-Z]*" size="30" class="form-control" required value="<?php echo $row->l_name;?>" title="Only Characters are allowed" /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Parent Name">Parent Name</label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="m_name" pattern="[a-zA-Z]*" size="30" class="form-control" required value="<?php echo $row->m_name;?>" title="Only Characters are allowed" /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Mobile Number:">Mobile Number</label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="mobile" pattern="[789][0-9]{9}" size="10" class="form-control" required value="<?php echo $row->mobile;?>" title="Phone number with 7-9 and remaing 9 digit with 0-9" /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Standard:">Standard</label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="standard" size="30" class="form-control" required value="<?php echo $row->standard;?>" /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Course:">Course</label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="course"  size="30" class="form-control" required value="<?php echo $row->course;?>" /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="email:">Email</label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="email" name="email_id" size="30" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" class="form-control" required value="<?php echo $row->email_id;?>" /></div>                
            </div>
             <h4 style="margin-left: 20px">Documents</h4>
            <br>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Birth Certificate:">Birth Certificate</label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8">
                <?php 
                    //$path = explode('/',$row->birth_certificate);
                    if ($row->birth_certificate != '') {
                        echo anchor($row->birth_certificate,'<strong class="btn btn-primary" style="margin-bottom:10px" > <i class="fa fa-chevron" aria-hidden="true"></i> View </strong>','target="_blank"');  ?>
                    <input type="hidden" name="img_hidden" value="<?php if (isset($row)) {echo $row->birth_certificate;} else { echo ""; }?>"> 
                    <?php
                    }else{
                        ?>
                        <input type="file" name="userfile" class="form-control" required style="display: ;" />
                        <?php

                        } ?>
                    
                   
                    </div>                
            </div>
            <?php
            $i=1;
            foreach ($result as $key => $value) {
               ?>
            
            <div class="form-group col-lg-12" >
                <div class="col-lg-3">
                    <label for="Certificates:">Certificates <?=$i?> </label>
                </div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-3">
                   <?= $value->certificate ?>
                </div>
                <div class="col-lg-4">
                   <?php if ($value->path != '') {
                        echo anchor($value->path,'<strong class="btn btn-primary" style="margin-bottom:10px" > <i class="fa fa-chevron" aria-hidden="true"></i> View </strong>','target="_blank"');  ?>
                   
                    <?php
                    }?>
                </div>
                </div>
            <?php $i++ ;
            }
            ?>
            <div class="form-group col-lg-12">
                <div class="col-lg-5"></div>
                <div class="col-lg-7"><input type="submit" value="UPDATE RECORD" class="btn btn-success" name="submit" title="Click here to update record." /></div>
                 
            </div>
        </div>
        
            
        <?php echo form_close(); ?>
		
    </body>
</html>