<!-- Content -->
<div class="container">
    <div class="row">
        <!-- Main Content -->
        <div class="col-md-9 content">
            <?php
                if ($pageinfo == "Biography") {
                    include("content-bio.php");
                } elseif ($pageinfo == "Portfolio") {
                    include("content-porto.php");
                } elseif ($pageinfo == "Contact") {
                    include("content-contact.php");
                } elseif ($pageinfo == "Login") {
                    include("content-login.php");
                } elseif ($pageinfo == "User Management") {
                    include("content-userman.php");
                } elseif ($pageinfo == "Biography Form") {
                    include("content-biography-form.php");
                } elseif ($pageinfo == "Portfolio Form") {
                    include("content-porto-form.php");
                } elseif ($pageinfo == "User Management Form") {
                    include("content-userman-form.php");
                }
            ?>
        </div>
        <!-- Sidebar content -->

        <?php 
            if ($pageinfo != "User Management") {
                echo '<div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
            </ul>
        </div>';
            }
        ?>
        <!-- <div class="col-md-3">
            <ul class="list-group">
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
                <li class="list-group-item">Lorem ipsum dolor sit amet.</li>
            </ul>
        </div> -->
    </div>
</div>
<!-- End of content -->