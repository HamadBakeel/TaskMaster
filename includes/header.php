<!-- Start Head -->
    <style>
    .baoc {
        flex-direction: row-reverse;
    }
    .cb-black {
        color: #ffffff;
        background-color: #fe5f71;
        border-radius: 10px;
        padding: 5px 10px;
        font: bold;
        font-weight: bold;
    }
    .icon-t {
        transform: rotate(180deg); 
        margin-right: 10px;
    }
</style>

<div class="baoc head bg-white p-15 between-flex">
        <div class="icons d-flex align-center">
            <span class="notification p-relative">
                <?php echo  $_SESSION['admin']['name'];?>
            </span>
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNL_ZnOTpXSvhf1UaK7beHey2BX42U6solRA&usqp=CAU" alt="">
    </div>
    <div>
    <span class="notification p-relative">
        <a class="cb-black" href="<?php echo admin_url('/logout');?>">
            <i class="c-white icon-t fa-solid fa-right-from-bracket"></i>
        logout
        </a>
    </span>
    </div>
</div>
<!-- End Head -->