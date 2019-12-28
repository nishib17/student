<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sudent Information</title>
    <center><h1>Student Information Add </h1></center>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<html>
	
	<style>
		body {
			  font-family:arial;
			  font-weight:bold;
			  background:#f2f3f4;
			
		}
		</style>
    <body >
        <?php echo form_open_multipart('Student/insertdata',['class'=>'form-horizontal']) ?>
        <div  class="container" style="width: 60%;background-color: white;padding: 50px 10px 10px 10px;margin-top: 50px">
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="First Name">First Name </label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="f_name" pattern="[a-zA-Z]*" title="Only Characters are allowed" size="30" class="form-control" required /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Last Name">Last Name </label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="l_name" pattern="[a-zA-Z]*" title="Only Characters are allowed" size="30" class="form-control" required /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Parent Name">Parent Name </label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="m_name" pattern="[a-zA-Z]*" title="Only Characters are allowed" size="30" class="form-control" required /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Mobile Number:">Mobile Number </label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="mobile" pattern="[789][0-9]{9}" size="10" class="form-control" required /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Standard:">Standard </label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="standard" size="30" class="form-control" required /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Course:">Course </label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="text" name="course"  size="30" class="form-control" required /></div>                
            </div>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="email:">Email </label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="email" name="email_id" size="30" pattern="[a-zA-Z0-9!#$%&amp;'*+\/=?^_`{|}~.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*" class="form-control" required /></div>                
            </div>
            <h4 style="margin-left: 20px">Documents</h4>
            <br>
            <div class="form-group col-lg-12">
                <div class="col-lg-3"><label for="Birth Certificate:">Birth Certificate</label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-8"><input type="file" name="userfile" class="form-control" required /></div>                
            </div>
            <br>
            <button type="button" class="btn btn-primary" style="margin-left:90% ;" onclick="add_rows()">Add</button>
            <div class="form-group col-lg-12" >
                <div class="col-lg-3"><label for="Certificates:">Certificates </label></div>
                <div class="col-lg-1">:</div>
                <div class="col-lg-3">
                    <select name="certificate[]" class="form-control">
                        <option value="">--Select--</option>
                        <option value="Adhar">Adhar</option>
                    </select>
                </div>
                <div class="col-lg-4"><input type="file" name="images[]" class="form-control" required /></div>                
            </div>
            <span id="added"></span>
            <div class="form-group col-lg-12">
                <div class="col-lg-5"></div>
                <div class="col-lg-7"><input type="submit" value="ADD RECORD" class="btn btn-success" name="submit" title="Click here to save record." /></div>
                 
            </div>

        </div>
	    
            
        <?php echo form_close(); ?>
    </body>
</html>
<script type="text/javascript">
    function add_rows() {

       $("#added").append('<div class="form-group col-lg-12" id="added"><div class="col-lg-3"><label for="Certificates:">Certificates </label></div><div class="col-lg-1">:</div><div class="col-lg-3"><select name="certificate[]" class="form-control"><option value="">--Select--</option><option value="Adhar">Adhar</option></select></div><div class="col-lg-4"><input type="file" name="images[]" class="form-control" required /></div></div>');
    }
</script>