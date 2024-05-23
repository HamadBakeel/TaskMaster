<script>
    document.addEventListener('DOMContentLoaded', function () {
        var links = document.querySelectorAll('.sidebar a');
        var currentPageUrl = window.location.href;
        links.forEach(function (link) {
            if (link.href === currentPageUrl) {
                link.classList.add('active');
            }
        });
        links.forEach(function (link) {
            link.addEventListener('click', function (event) {
                links.forEach(function (l) {
                    l.classList.remove('active');
                });
                this.classList.add('active');
            });
        });
    });
</script>
<style>
    @media (max-width: 767px) {
        .center-flex-1 {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    }
</style>
<div class="sidebar bg-white p-20 p-relative">
    <h3 class="p-relative txt-c mt-0">
        <a href="/smart" style="color: black">
        TaskMaster
        </a>
    </h3>
    <ul>
        <li class="center-flex-1">
            <a class="d-flex between-flex fs-14 c-black rad-6 p-10" href="<?php echo admin_url(null); ?>">
                <span>Home</span>
                <i class="fa-solid fa-house fa-fw"></i>
            </a>
        </li>
        <li class="center-flex-1">
            <a class="d-flex between-flex fs-14 c-black rad-6 p-10" href="<?php echo admin_url('/employees'); ?>">
                <span>Employees</span>
                <i class="fa-solid fa-users-gear fa-fw"></i>
            </a>
        </li>
        <li class="center-flex-1">
            <a class="d-flex between-flex fs-14 c-black rad-6 p-10" href="<?php echo admin_url('/tasks'); ?>">
                <span>Tasks</span>
                <i class="fa-regular fa-clipboard fa-fw"></i>
            </a>
        </li>
    </ul>
</div>