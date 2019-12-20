<?php
    include("connect.php");
    if(!isset($_GET['pid'])|| $_GET['pid']==""){
        header("location:index.php");
    }
    else{
        $pid = $_GET['pid'];
    }
    $sql="SELECT * FROM car Where id=$pid";
    $result=$conn->query($sql);
    if(!$result){
        echo "ERROR : ".$conn->error;
    }
    else{
        if($result->num_rows>0){
            $prd = $result->fetch_object();
        }
        else{
            $prd=NULL;
        }
    }
?>
    
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Edit</h1>
    </div>
</div>
    <div class="container">
    <div class="row">
        <div class="col-lg-6">
        <div class="thumbnail">
            <label for="">Picture : </label>
            <img src="images/<?php echo $prd->carpic; ?>" alt="">

        </div>
    </div>
    <div class="row">
    <div class="col-lg-6">
            <form action="update.php" class="form-horizontal" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Brand: </label>
                    <div class="col-md-9">
                        <input type="textarea" name="txtbrand" id=""class="form-control" value="<?php echo $prd->brand; ?>" >
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Model: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtmodel" id=""class="form-control" value="<?php echo  $prd->model; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">ModelYear: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtmodelyear" id=""class="form-control" value="<?php echo  $prd->modelYear; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Color: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtcolor" id=""class="form-control" value="<?php echo  $prd->color; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">License: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtlicense" id=""class="form-control" value="<?php echo  $prd->license; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Province: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtprovince" id=""class="form-control" value="<?php echo  $prd->province; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="name" class="col-md-3 control-label">Price: </label>
                    <div class="col-md-9">
                        <input type="text" name="txtprice" id=""class="form-control" value="<?php echo  $prd->price; ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-3">
                        <input type="hidden" name="ProductID" value="<?php echo $prd->id;?>">
                        <button type="submit" class="btn btn-primary">SAVE</button>
                        <button type="submit" class="btn btn-danger">RESET</button>
                    </div>
                </div>
            </form>
        </div>
        </div>
    </div>
    </div>
</body>
</html>