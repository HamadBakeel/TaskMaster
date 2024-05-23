<?php
// Set the page title
$title = "Dashboard | tasks-create";

include 'controllers/admin/employees/list.php';

// Start output buffering
ob_start();
?>

<!-- content start -------------------------------------------- -->

<div class="content w-full">
    <div class="wrapper d-grid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create New Tasks</h3>
            </div>
            <div class="card-byde">
                <form action="<?php echo admin_url('/tasks/store'); ?>" method="post">
                    <div class="mb-10">
                    <label for="Title" class="form-label">Title</label>
                        <input class="form-control" id="" type="text" name="title" placeholder="Enter Title">
                    </div>

                    <div class="mb-10">
                    <label for="Details" class="form-label">Details</label>
                        <input class="form-control" id="" type="text" name="details" placeholder="Enter Details">
                    </div>

                    <div class="mb-10">
                        <label for="Status" class="form-label">Status</label>
                        <select class="form-control" data-control="select2" data-placeholder="Status" name="status">
                        <option value="0" selected>Incompleted</option>
                                <option value="1">Completed</option>
                        </select>
                    </div>

                    <div class="mb-10">
                    <label for="Deadline" class="form-label">Deadline</label>
                        <input class="form-control" id="" type="date" name="end_date" placeholder="Enter Deadline">
                    </div>
                    <div class="mb-10">
                        <label for="Status" class="form-label">Employee</label>
                        <select class="form-control" data-control="" data-placeholder="Status" name="employee_id" required>
                            <?php foreach($employees as $employee){?>
                                <option value="<?php echo $employee['id'];?>"><?php echo  $employee['name']??'';?></option>
                             <?php }   ?>
                        </select>
                    </div>
                    <button class="btn-bt" type="submit">Create</button>
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