<?php
// Set the page title
$title = "Dashboard | Employees -create";

// Start output buffering
ob_start();
?>

<!-- content start -------------------------------------------- -->

<div class="content w-full">
    <div class="wrapper d-grid">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Create New Employees</h3>
            </div>
            <div class="card-byde">
                <form action="<?php echo admin_url('/employees/store'); ?>" method="post">
                    <div class="mb-10">
                    <label for="Name" class="form-label">Name</label>
                        <input class="form-control" id="" type="text" name="name" placeholder="Enter Name" required>
                    </div>
                    <div class="mb-10">
                    <label for="Password" class="form-label">Password</label>
                        <input class="form-control" id="" type="password" name="password" placeholder="Enter Password" required>
                    </div>
                    <div class="mb-10">
                    <label for="Phone" class="form-label">Phone</label>
                        <input class="form-control" id="" type="text" name="phone" placeholder="Enter Phone">
                    </div>
                    <div class="mb-10">
                    <label for="Address" class="form-label">Address</label>
                        <input class="form-control" id="" type="text" name="address" placeholder="Enter Address">
                    </div>
                    <div class="mb-10">
                    <label for="Department" class="form-label">Department</label>
                        <input class="form-control" id="" type="text" name="department" placeholder="Enter Department">
                    </div>
                    <div class="mb-10">
                        <label for="Status" class="form-label"> Working Status</label>
                        <select class="form-control" data-control="select2" data-placeholder="Status" name="status">
                                <option value="1">True</option>
                                <option value="0">False</option>
                        </select>
                    </div>
                    <button type="submit" class="btn-bt">Create</button>

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