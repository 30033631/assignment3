<?php
    
    $db = "a3003363_webapp";
    $user = "a3003363_webuser";
    $password = "Toiohomai1234";
    
    $connection = new mysqli('localhost',$user, $password, $db);
    
    $record = $connection->query("select * from pages") or die($connection->error());

    if(isset($_POST['submit']))
    {
        $pg = $_POST['pg'];
        $h1 = htmlspecialchars($_POST['h1']);
        $h1 = $connection->real_escape_string($h1);
        $h2 = htmlspecialchars($_POST['h2']);
         $h2 = $connection->real_escape_string($h2);
        $p1 = htmlspecialchars($_POST['p1']);
         $p1 = $connection->real_escape_string($p1);
        $p2 = htmlspecialchars($_POST['p2']);
         $p2 = $connection->real_escape_string($p2);
        $p3 = htmlspecialchars($_POST['p3']);
         $p3 = $connection->real_escape_string($p3);
        $images = $_POST['images'];
        
        $sql ="insert into pages(pg, h1, h2, p1, p2, p3, images) values('$pg', '$h1', '$h2', '$p1', '$p2', '$p3', '$images')";
        
        if($connection->query($sql) === TRUE)
        {
            echo "<p class='alert alert-success'>Record was created</p>";
            echo "<a type='button' class='btn btn-primary' href='index.php'>Back to home</a>";
        }
        else
        {
            echo "<p class='alert alert-danger'>Error in creating record</p>
            <p>{$connection->error()}</p>";
        }
    }
    
    if(isset($_GET['delete']))
    {
        $id = $_GET['delete'];
        
        //sql command
        
        $del = "delete from pages where id=$id";
        
        if($connection->query($del) === TRUE)
        {
            echo "<p>Record was deleted. <a href= 'index.php'>Return to index page</a></p>";
            
            
            
        }
        else
        {
            echo "
            <p>There was a error deleting this record.</p>
            <p{$connection->error()}></p>
            <p><a href='index.php'>Back to index page</a></p>
            ";
            
        }
        
    }
    
        if(isset($_POST['update']))
    {
        $id = $_POST['id'];
        $pg = $_POST['pg'];
        $h1 = htmlspecialchars($_POST['h1']);
        $h1 = $connection->real_escape_string($h1);
        $h2 = htmlspecialchars($_POST['h2']);
         $h2 = $connection->real_escape_string($h2);
        $p1 = htmlspecialchars($_POST['p1']);
         $p1 = $connection->real_escape_string($p1);
        $p2 = htmlspecialchars($_POST['p2']);
         $p2 = $connection->real_escape_string($p2);
        $p3 = htmlspecialchars($_POST['p3']);
         $p3 = $connection->real_escape_string($p3);
        $images = $_POST['images'];
        
        $update = "update pages set pg='$pg', h1='$h1', h2='$h2', p1='$p1', p2='$p2', p3='$p3', images='$images'
        where id='$id'";
        
        if($connection->query($update) === TRUE)
        {
            echo "<h1>Record Updated</h1>";
            echo "<p><a href='index.php' class='btn btn-success'>Home</a></p>";
        }
        else
        {
            echo "<h1>Error: Record not updated</h1>";
            echo "<p>{$connection->error()}</p>";
            echo "<p><a href='index.php' class='btn btn-danger'>Home</a></p>";
        }
        
    }    

?>