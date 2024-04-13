<footer class="footer d-flex flex-column justify-content-between">
    <div class="text-center">
        <p class="text-muted">&copy; Copyright
            <?php
            $startYear = 2016;
            $currentYear = date("Y");
            echo ($currentYear - $startYear > 0) ? $startYear . ' - ' . $currentYear : $currentYear;
            ?>
            <a href="#" target="_blank">F1 Racing Admin</a>. All rights reserved.
        </p>
    </div>
</footer>





