<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Barlow&family=Orienta&family=Recursive:wght@300;400&family=Ubuntu:wght@400;500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Overpass:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href = "css/stylesheet.css" >
    <title>SCP Foundation</title>
  </head>
  <body class="container bg-dark">
      
      <?php include 'db.php'; ?>    
    
    
      <nav class="navbar navbar-expand-lg navbar-light bg-light">

          <h5 style="color: rgb(247, 116, 28); margin-right: 10px;">SCP Foundation</h5>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Records
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">

          <a class="dropdown-item" id="current" href="index.php">SCP - 002<span class="sr-only">(current)</span></a>
          <?php foreach($record as $page): ?><!--loop through table to retrieve page names that will serve as our menu-->
                  
                  <a class="dropdown-item" href="index.php?page='<?php echo $page['pg']; ?>'" class="nav-link"><?php echo $page['pg']; ?></a>
                  
                  <?php endforeach; ?>
        </div>
      </li>
      <li class="nav-item"><a href="create.php" class="nav-link">Create new record</a></li>


    </ul>
  </div>
</nav> 
              
          </div>
      </div>
      
      <!--Database content row-->
            <div class="row">
          
          
          <div class="col">
              <?php 
                    
                    if(isset($_GET['page']))
                    {
                        $pg = trim($_GET['page'], "'");
                        
                        // run sql query based on our $pg value
                        $record = $connection->query("select * from pages where pg='$pg'") or die($connection->error());
                        
                        $single = $record->fetch_assoc();
                        
                        // create variables to hold all our field names from table
                        $h1 = $single['h1'];
                        $h2 = $single['h2'];
                        
                        $p1 = $single['p1'];
                        $p2 = $single['p2'];
                        $p3 = $single['p3'];
                        
                        $images = $single['images'];
                        
                        $id = $single['id'];
                        $update = "update.php?update=" . $id;
                        $delete = "db.php?delete=" .$id;
                        
                        
                        //display info
                        
                        echo "
                        <br>
                        <div class='card mt-3'>
                        <h1 class='card-header text-center text-body'>{$h1}<br>{$h2}</h1>
                        <img style='width:45%;' class='rounded mx-auto d-block' src='{$images}'>
                         <div class='card-body'>
                        
                        <p class='card-text'>{$p1}</p>
                        <p class='card-text'>{$p2}</p>
                        <p class='card-text'>{$p3}</p>
                                        
        </div>
      </div>                          
                       
                        
                        
                        ";
                        //display update and delete buttons
                        
                        echo "
                         <p><a href='{$update}' class='btn btn-warning mr-3'>Update</a>
                         <a href='{$delete}' class='btn btn-danger'>Delete</a><p>
                        
                        
                        ";
                        
                        
                        
                        
                    }
                    else
                    {
                        // default view of index.php
                        
                        echo "
                              <div class='card mt-3'>
        <h1 class='card-header text-center text-body'>Item #: SCP-002<br>Object Class: Euclid</h1>

        <div class='card-body'>
          
          <p class='card-text'>Description:
          SCP-002 resembles a tumorous, fleshy growth with a volume of roughly 60 m³ (or 2000 ft³). An iron valve hatch on one side leads to its interior, which appears to be a standard low-rent apartment of modest size. One wall of the room possesses a single window, though no such opening is visible from the exterior. The room contains furniture which, upon close examination, appears to be sculpted bone, woven hair, and various other biological substances produced by the human body. All matter tested thus far show independent or fragmented DNA sequences for each object in the room.</p>
          <p class='card-text'>Special Containment Procedures:
          SCP-002 is to remain connected to a suitable power supply at all times, to keep it in what appears to be a recharging mode. In case of electrical outage, the emergency barrier between the object and the facility is to be closed and the immediate area evacuated. Once facility power is re-established, alternating bursts of X-ray and ultraviolet light must strobe the area until SCP-002 is re-affixed to the power supply and returned to recharging mode. Containment area is to be kept at negative air pressure at all times.</p>
           <p class='card-text'>Reference:
           To date, subject has been responsible for the disappearances of seven personnel. It has also in its time at the facility further furnished itself with two lamps, a throw rug, a television, a radio, a beanbag chair, three books in an unknown language, four children's toys, and a small potted plant. Tests with a variety of lab animals including higher primates have failed to provoke a response in SCP-002. Cadavers as well fail to produce any effect. Whatever process the subject uses to convert organic matter into furnishings is apparently only facilitated by the introduction of living humans.</p>

        </div>
      </div>


                        ";
                    }
              
              ?>
          </div>
      </div>
      
     <div class="footer">
<br>

<p>Website Designed by: Summer Clusker</p>
<p>COMP.5210</p>

<br>

</div> 
      
      




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>