
    
      <?php   require("inc/header.php"); ?>

       
        <?php

        require("../admin/handle/connection.php");

        $sql="select * from admins";

        $query=mysqli_query($conn,$sql);

        if(mysqli_num_rows($query)>0)
        {
            $admins=mysqli_fetch_all($query,MYSQLI_ASSOC);
        }
        else{
            echo "user not found";
        }

       



    
    ?>

    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Admins</h3>

                    <a class="btn btn-success" href="#">Add Admin</a>
                </div>

                <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Status</th>
                        <th scope="col">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                        
                        
                    <?php
                    if(!empty($admins)):
                      foreach($admins as $index=> $admin): ?>
                      <tr>
                        <th scope="row"><?=$index+1?></th>
                        <td><?=$admin['name']?></td>
                        <td><?=$admin['email']?></td>
                        <td><?php
                        if($admin['status']==1)
                        {?>
                        <span class="badge badge-success">
                        <i class="fas fa-check"></i>
                        </span>
                           

                            <?php
                        }
                        else
                        {?>

                        <span class="badge badge-danger">
                        <i class="fas fa-times"></i>
                        </span>
                        
                        <?php
                           
                        }

                        ?>
                        </td>
                        <td>
                            <a class="btn btn-sm btn-info" href="#">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a class="btn btn-sm btn-danger" href="#">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                      </tr>
                      <?php endforeach; 
                      endif;
                    
                      
                      ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <?php 
   require("inc/footer.php");
   ?>