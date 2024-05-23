<?php
// Set the page title
$title = "Dashboard | tasks";

include 'controllers/admin/tasks/list.php';

// Start output buffering
ob_start();
?>

<!-- content start -------------------------------------------- -->
<style>
    .btns {
        display: flex;
        gap: 5px;
        margin-bottom: 20px;
    }

    .btn,
    select {
        border: 1px solid #777;
        color: #777;
        border-radius: 5px;
        padding: 5px 10px;
    }

    select{
        font-size: 16px;
    }

    .button input{
        display: none;
    } 
    .button label{
        display: block;
    }

    .button input[type="radio"]:checked+label {
        background: #20b8be;
        border-radius: 4px;
    }

    .button label {
        cursor: pointer;
    }
</style>
<div class="content w-full">
    <div class="wrapper d-grid">
        <h1 class="p-relative"><a href="<?php echo admin_url('/tasks/create'); ?>">Create</a></h1>
        <div class="responsiv-tabl">
            <form style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 10px" action="<?php echo admin_url('/tasks'); ?>" method="post">
                <!-- <div class="btns">
                <a href="#?filter=completed" class="btn">Completed</a>
                <a href="#?filter=incompleted" class="btn">Incompleted</a>
               
            </div> -->
                <!-- <input type="radio" style="display: none;" name="status" value="all" id="all">
                <input type="radio" style="display: none;" name="status" value="1" id="Completed">
                <input type="radio" style="display: none;" name="status" value="0" id="Incompleted"> -->

                <div style="display: flex; gap: 10px">
                    <div class="button">
                        <input type="radio" id="all" value="all" name="status" />
                        <label class="btn btn-default" for="all" value="all">All</label>
                    </div>
                    <div class="button">
                        <input type="radio" id="Completed" value="1" name="status" />
                        <label class="btn btn-default" for="Completed">Completed</label>
                    </div>
                    <div class="button">
                        <input type="radio" id="Incompleted" value="0" name="status" />
                        <label class="btn btn-default" for="Incompleted">Incompleted</label>
                    </div>
                </div>


                <select name="employee_id" id="employee_id">
                    <option disabled selected>select employee</option>
                    <?php foreach ($employees as $employee) { ?>
                        <option value="<?php echo $employee['id']; ?>"><?php echo $employee['name']; ?></option>
                    <?php } ?>
                </select>
                <button type="submit">Filter</button>
            </form>
            <table>
                <thead>
                    <tr>
                        <td>id</td>
                        <td>Title</td>
                        <td>Details </td>
                        <td>Status</td>
                        <td>Deadline</td>
                        <td>Employee</td>
                        <td>Actions</td>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($tasks as $task) { ?>
                        <tr>
                            <td><?php echo $task['id']; ?></td>
                            <td><?php echo $task['title']; ?></td>
                            <td><?php echo $task['details']; ?></td>
                            <td><?php echo $task['status'] === 0 ? 'Incompleted' : 'Completed'; ?></td>
                            <td><?php echo $task['end_date']; ?></td>
                            <td><?php echo $task['employee_name']; ?></td>
                            <td class="center-flex-sh">
                                <form action="<?php echo admin_url('/tasks/edit'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $task['id'] ?>" />
                                    <button type="submit" class="btn-yes">Update</button>
                                </form>
                                <form action="<?php echo admin_url('/tasks/destroy'); ?>" method="post">
                                    <input type="hidden" name="id" value="<?php echo $task['id'] ?>" />
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