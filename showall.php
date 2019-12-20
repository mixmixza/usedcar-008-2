<div class="row">

    <div class="col-lg-12">
        <h1 class="page-header">All Car</h1>
    </div>
    <?php 
        if(isset($_SESSION['id'])){
    ?>
    <a href="index.php?menu=upload" class="btn btn-success pull-right"><i class="fa fa-plus fa-fw"></i>POST</a>
    <?php
        }
        ?>
</div><br>
<?php
                $sql = "SELECT * FROM car ORDER BY id";
                $result = $conn->query($sql);
                if(!$result){
                    echo "Error during data retrieval";
                }
                else{
                    //fetch data
                    while($prd = $result->fetch_object()){
                        ?>
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="thumbnail">
                        <a href="#">
                            <img src="images/<?php echo $prd->carpic ?>" alt="">
                        </a>
                        <div class="caption">
                            <h3><?php echo $prd->brand ?></h3>
                            <p>Model : <?php echo $prd->model ?></p>
                            <p>Model Year : <?php echo $prd->modelYear ?></p>
                            <p>Color : <?php echo $prd->color ?></p>
                            <p>License : <?php echo $prd->license ;  echo $prd->province ;?></p>
                            <h4>Price : <?php echo $prd->price ?> Baht</h4>
                        </div>
                        <?php
                        if(isset($_SESSION['id'])){
                        ?>
                            <p>
                            <a href="index.php?menu=edit&pid=<?php echo $prd->id ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i>Edit</a>
                            <a href="delete.php?pid=<?php echo $prd->id ?>" class="btn btn-danger cardelete" ><i class="glyphicon glyphicon-trash"></i>Delete</a>
                            </p>
                            <?php
                        }
                        ?>

                    </div>
                </div>
                        <?php
                    }
                }
            ?>
            <script>
$(document).ready(function(){
    $(".cardelete").click(function(){
        return confirm("Confirm Delete?");
    });
});
</script>
</div>
</div>
<script>
