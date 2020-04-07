<?php
include "header.php";
?>
<section id="main-content">
	<div class="form">
		<div class="cards">
        <?php
        if($_GET['ket'] == 'delete'){
            echo "<div class=card>";
                echo "Delete data ".$_GET['id'];
            echo "</div>";
        }
        else{
        ?>
            <form class="card" action="#">
                <h1>Update data <?php echo $_GET['id'] ?></h1>
                <label class="label-form" for="">Username</label>
                <input class="form-input" type="text" name="username" />
                <label class="label-form" for="">Password</label>
                <input class="form-input" type="password" name="password" />
                <input class="btn-submit" type="submit" />
            </form>
        <?php
        }
        ?>
		</div>
	</div>
</section>
<?php
    include "footer.php";
?>
