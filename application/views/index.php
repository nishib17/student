<!DOCTYPE html>
<html lang="en">
<head>
    <title>Sudent Information</title>
    <!-- <center><h1>Student Information </h1></center> -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

	
        <style>
    		body {
    		    font-family:arial;
    		    font-weight:bold;
    		    background:white;
    			
    		}
            anchor {
                text-decoration: none;
            }
		</style>
    </head>
	
    <body>
		
        <center><h1>Students Information</h1></center>
        <br> 
            
        <br>
          
        <div class="container">
            <h2>Students List</h2>
            <button type="button" class="btn btn-primary" style="margin-left:93% ;"><?= anchor('Student/add','add',['style'=>'color:white;']) ?></button>
            <table class="table table-striped">
            `   <thead>
                    <tr>
                        <th>ID</th>
                        <th>FIRST NAME</th>
                        <th>MIDDLE NAME</th>
                        <th>LAST NAME</th>
                        <th>MOBILE</th>
                        <th>STANDARD</th>
                        <th>COURSE</th>
                        <th>EMAIL</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    foreach($this->StudentModel->viewdata() as $row)
                    {
                    ?>  <tr>
                            <td> <?= $row->id ?> </td>
                            <td> <?= $row->f_name ?> </td>
                            <td> <?= $row->l_name ?> </td>
                            <td> <?= $row->m_name ?> </td>
                            <td> <?= $row->mobile ?> </td>
                            <td> <?= $row->standard ?> </td>
                            <td> <?= $row->course ?></td>
                            <td> <?= $row->email_id ?> </td>
                            <td><button type="button" class="btn btn-primary"><?= anchor('Student/edit/'.$row->id,'Edit',['style'=>'color:white;']) ?></button> | <button type="button" class="btn btn-danger"><?= anchor('Student/delete/'.$row->id,'Delete',array('class'=>'delete','style'=>'color:white;' ,'onclick'=>"return ConfirmDialog();")) ?></button></td>


                           
                            </tr>
                    <?php
                    }
                
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>
<script type="text/javascript">
    function ConfirmDialog() {
        var x=confirm("Are you sure to delete record?")
        if (x) {
            return true;
        } else {
            return false;
        }
    }
</script>