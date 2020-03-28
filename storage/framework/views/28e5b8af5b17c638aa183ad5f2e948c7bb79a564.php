<!DOCTYPE html>
<html>
<head>
    <title>Laravel 5.7 Import Export Excel to database Example - ItSolutionStuff.com</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
</head>
<body>
   
<div class="container">

    <?php if(session('success')): ?>
    <h1><?php echo e(session('success')); ?></h1>
    <?php endif; ?>
    <div class="card bg-light mt-3">
        <!-- <div class="card-header">
            Laravel 5.7 Import Export Excel to database Example - ItSolutionStuff.com
        </div> -->
        <div class="card-body">
            <form action="<?php echo e(route('import')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <label>Select Assign Type</label>
                <select name="assign_type" required="required"><option value="auto">Auto</option>
                <option value="manual">Manual</option></select>
                <input type="file" name="file" class="form-control">
                <br>
                <button class="btn btn-success">Import User Data</button>
                <a class="btn btn-warning" href="<?php echo e(route('export')); ?>">Export User Data</a>
            </form>
        </div>
    </div>

    <br />

   

   <div class="panel panel-default">
    <div class="panel-heading">
     <h3 class="panel-title">Customer Leads Data</h3>
    </div>
    <div class="panel-body">
    <div class="table-responsive">
        <form action="assignToAgent" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
        <table class="table table-bordered table-striped">
            <tr>
                <th>Select <br> All <input type="checkbox" name="permission" id="selecctall"/> </th>
                <th>Customer Reference No.</th>
                <th>Agreement No.</th>
                <th>Customer Name</th>
                <th>Loan Type</th>
                <th>Sanction Amount</th>
                <th>Customer Score</th>
            
           </tr>
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><input type="checkbox" name="checkbox[]" value="<?php echo e((int)$row->cust_id); ?>"  class="permission"></td>
                <td><?php echo e($row->customer_refreance_no); ?></td>
                <td><?php echo e($row->agreement_no); ?></td>
                <td><?php echo e($row->customer_name); ?></td>
                <td><?php echo e($row->loan_type); ?></td>
                <td><?php echo e($row->sanction_amount); ?></td>
                <td><?php echo e($row->credit_score); ?></td>
        
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </table>

                <label>Select Agent</label>
                <select name="assign_agent" required="required">
                <?php $__currentLoopData = $agent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $agents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($agents->id); ?>"><?php echo e($agents->name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
                
                <button class="btn btn-success">Leads Assign</button>
                </form>
     </div>
    </div>

        

   </div>


</div>





   
</body>
</html>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <!-- Latest compiled and minified JavaScript -->
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        $("form").submit(function(){
        if ($('input:checkbox').filter(':checked').length < 1){
            alert("Check at least one Lead!");
        return false;
        }
        });


    $('#selecctall').click(function(event) { 
        if(this.checked) { // check select status
            $('.permission').each(function() { 
                this.checked = true;  //select all 
            });
        }else{
            $('.permission').each(function() { 
                this.checked = false; //deselect all             
            });        
        }
    });
   
    });



   
</script><?php /**PATH C:\xampp\htdocs\blog\resources\views/import.blade.php ENDPATH**/ ?>