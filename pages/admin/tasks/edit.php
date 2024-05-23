<?php
// Set the page title
$title = "Dashboard | tasks-edit";

include 'controllers/admin/tasks/edit.php';

// Start output buffering
ob_start();
?>

<!-- content start -------------------------------------------- -->

<div class="content w-full">
    <div class="wrapper d-grid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Edit Tasks <?php echo $task['title'] ?></h3>
            </div>
            <div class="card-byde">
                <form action="<?php echo admin_url('/tasks/update'); ?>" method="post">
                    <input type="hidden" name="id" value="<?php echo $task['id'] ?>">
                    <div class="mb-10">
                        <label for="Title" class="form-label">Title</label>
                        <input class="form-control" id="" type="text" name="title" value="<?php echo $task['title'] ?>">
                    </div>

                    <div class="mb-10">
                        <label for="Details" class="form-label">Details</label>
                        <input class="form-control" id="" type="text" name="details"
                            value="<?php echo $task['details'] ?>">
                    </div>

                    <div class="mb-10">
                        <label for="Status" class="form-label">Status</label>
                        <select class="form-control" data-control="select2" data-placeholder="Status" name="status">
                            <option value="0" <?php echo $task['status'] === 0 ? 'selected' : '' ?>>Incompleted</option>
                            <option value="1" <?php echo $task['status'] === 1 ? 'selected' : '' ?>>Completed</option>
                        </select>
                    </div>

                    <div class="mb-10">
                        <label for="Deadline" class="form-label">Deadline</label>
                        <input class="form-control" id="" type="date" name="end_date" value="<?php echo $task['end_date'] ?>">
                    </div>

                    <div class="mb-10">
                        <label for="Employee" class="form-label">Employee</label>
                        <input class="form-control" id="" type="text" name="employee_id" value="<?php echo $task['employee_id'] ?>">
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