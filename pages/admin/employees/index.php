<?php
// Set the page title
$title = "Dashboard | Employees";

include 'controllers/admin/employees/list.php';


// Start output buffering
ob_start();
?>

<!-- content start -------------------------------------------- -->

<div class="content w-full">
    <div class="wrapper d-grid">
        <h1 class="p-relative"><a href="<?php echo admin_url('/employees/create'); ?>">Create</a></h1>
        <div class="responsiv-tabl">
            <table>
                <thead>
                    <tr>
                        <td>id</td>
                        <td>Name</td>
                        <td>Mobile</td>
                        <!-- <td>Working Status</td> -->
                        <td>Address</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($employees as $employee) { ?>
                        <tr>
                            <td><?php echo $employee['id']; ?></td>
                            <td><?php echo $employee['name']??''; ?></td>
                            <td><?php echo $employee['phone']??''; ?></td>
                            <!-- <td><?php echo $employee['status']===0?'not working':'working'; ?></td> -->
                            <td><?php echo $employee['address']??''; ?></td>
                            <td class="center-flex-sh">
                                <form action="<?php echo admin_url('/employees/edit'); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $employee['id']?>"/>
                                <button  class="btn-yes"
                                        type="submit">Update</button></form>

                                <form action="<?php echo admin_url('/employees/destroy'); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $employee['id']?>"/>
                                    <button type="submit" class="btn-no">Delete</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
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