<?php
// Set the page title
$title = "Dashboard | Employees -edit";

include 'controllers/admin/employees/edit.php';

// Start output buffering
ob_start();
?>

<!-- content start -------------------------------------------- -->

<div class="content w-full">
    <div class="wrapper d-grid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Employees shadow</h3>
            </div>
            <div class="card-byde">
                <form action="<?php echo admin_url('/employees/update'); ?>" method="post">
                <input type="hidden" name="id" value="<?php echo $employee['id']?>"/>
                    <div class="mb-10">
                    <label for="Name" class="form-label">Name</label>
                        <input class="form-control" id="" type="text" name="name" value="<?php echo $employee['name']?>" required>
                    </div>
                    <div class="mb-10">
                    <label for="Password" class="form-label">Password</label>
                        <input class="form-control" id="" type="password" name="password" value="">
                    </div>
                    <div class="mb-10">
                    <label for="Phone" class="form-label">Phone</label>
                        <input class="form-control" id="" type="text" name="phone" value="<?php echo $employee['phone']?>">
                    </div>
                    <div class="mb-10">
                    <label for="Address" class="form-label">Address</label>
                        <input class="form-control" id="" type="text" name="address" value="<?php echo $employee['address']?>">
                    </div>
                    <div class="mb-10">
                        <label for="Department" class="form-label">Department</label>
                        <input class="form-control" id="" type="text" name="department" value="<?php echo $employee['department']?>">
                    </div>
                    <div class="mb-10">
                        <label for="Status" class="form-label">Status</label>
                        <select class="form-control" data-control="select2" data-placeholder="Status" name="status">
                                <option value="1" <?php  $employee['status']==1??'';?>>True</option>
                                <option value="0" <?php   $employee['status']==0??'';?>>False</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-bt">Edit</button>

                </form>
            </div>
        </div>
    </div>
</div>


<!-- content end -------------------------------------------- -->

<?php
// Get the content from the output buffer
$content = ob_get_clean();

// Include the main layout file
include 'pages/admin/base.php';
?>