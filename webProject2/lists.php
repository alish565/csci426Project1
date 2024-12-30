<?php
session_start(); 
require 'db.php';
$table = isset($_GET['category']) ? htmlspecialchars($_GET['category']) : null;
$categ = isset($_GET['categ']) ? htmlspecialchars($_GET['categ']) : null;

if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $remove = htmlspecialchars($_GET['remove']);

   
    $sql = "DELETE FROM $table WHERE id = ?";
    $stmt = $con->prepare($sql);


    if ($stmt->execute([$remove])) {
        
    } }

if (isset($_GET['moveToCurrent']) && is_numeric($_GET['moveToCurrent'])) {
    $moveToCurrent = htmlspecialchars($_GET['moveToCurrent']);
    $current = '';

   
    if ($table === 'Books') {
        $current = 'Reading';
    } elseif ($table === 'Shows') {
        $current = 'Watching';
    } elseif ($table === 'Games') {
        $current = 'Playing';
    } elseif ($table === 'ToDo') {
        $current = 'Doing';
    }

    if (!empty($current)) {
       
        $sql = "UPDATE $table SET category = ? WHERE id = ?";
        $stmt = $con->prepare($sql);

        
        if ($stmt->execute([$current, $moveToCurrent])) {
           
        }
}
}
if (isset($_GET['moveToFinished']) && is_numeric($_GET['moveToFinished'])) {
    $moveToFinished = htmlspecialchars($_GET['moveToFinished']);
    $finished = '';

    
    if ($table === 'Books') {
        $finished = 'Finishedbooks';
    } elseif ($table === 'Shows') {
        $finished = 'Finishedshows';
    } elseif ($table === 'Games') {
        $finished = 'Finishedgames';
    } elseif ($table === 'ToDo') {
        $finished = 'Finishedtodo';
    }

    if (!empty($finished)) {
        
        $sql = "UPDATE $table SET category = ? WHERE id = ?";
        $stmt = $con->prepare($sql);

       
        if ($stmt->execute([$finished, $moveToFinished])) {
           
        } 
}
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    header('Content-Type: application/json'); 
    $response = [];

    $title = isset($_POST['title']) ? mysqli_real_escape_string($con, $_POST['title']) : '';
    $description = isset($_POST['description']) ? mysqli_real_escape_string($con, $_POST['description']) : '';
    $type = isset($_POST['type']) ? mysqli_real_escape_string($con, $_POST['type']) : '';
    $catego = isset($_POST['catego']) ? mysqli_real_escape_string($con, $_POST['catego']) : '';

    if ($type === 'To-Do') {
        $type = 'todo';
    }
    if ($description === "") {
        $description = "_";
    }
    $user_id=$_SESSION["id"];

    $sql = "INSERT INTO $type (title, description, category,user_id) VALUES ('$title', '$description', '$catego','$user_id')";

    if (mysqli_query($con, $sql)) {
        $response['success'] = true;
    } else {
        $response['success'] = false;
        $response['error'] = "Database error: " . mysqli_error($con);
    }

    echo json_encode($response);
    exit();
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Lists</title>
     <link rel="stylesheet" href="style.css">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-VoPTfM6hdqgX1nF0zGg7mHybNz6tmZjL3ggknEDTezZ6+Gq0J9E5Z9u+Vv2U1cnx" crossorigin="anonymous">
   
</head>

<body>
    <nav class="navbar navbar-expand-lg" style="background-color: #009688;padding-left:4px;">
        <div class="container-fluid custom_navbar">
            <div class="navbar-brand logo" ></div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" style="color: white;">Home</a>
                    </li>
                    <li class="nav-item ">
                       <div class="dropdown show" style="border-bottom:2px solid white">
                            <a class="btn btn-secondary dropdown-toggle" style="background-color:#009688;border:none;"href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Lists
                            </a>

                            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="lists.php?category=Books&categ=Reading">Books</a>
                             <a class="dropdown-item" href="lists.php?category=Shows&categ=watching">Shows/Movies</a>
                             <a class="dropdown-item" href="lists.php?category=Games&categ=playing">Games</a>
                                <a class="dropdown-item" href="lists.php?category=ToDo&categ=doing">To-Do</a>
                 </div>
                        </div>
                     </li>
                    <?php if (isset($_SESSION["id"])){
                     echo'<li class="nav-item">
                        <a class="nav-link" href="logout.php" style="color: white;">Logout</a>
                    </li>';
                        }
                     else{
                        echo'
                   <li class="nav-item">
                        <a class="nav-link" href="login.php" style="color: white;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php" style="color: white;">Signup</a>
                    </li>  ';}
                    ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="sidebar">

    </div>
 <div class="title">
   <?php

    if($table==='ToDo'){
        echo"<h3>To-Do List</h3>";
    }
    else{
    echo "<h3>{$table} List</h3>";}
    if($table=='Books'){
    echo'<style>
   body {
        background-image: url("images/bookbackg.jpg");
        background-size: cover;
        background-position: center;
        .card-body{background-color:#F8F9FA;
            color:darkbrown;
           
        }
        
        .card:hover{
            border-color:#8B4513;
            
        }
       
    }  </style>';
    echo '<div class="btn-group" role="group" aria-label="Basic example" style="" >
           <a href="lists.php?category=Books&categ=Finishedbooks"> <button type="button" class="btn btn-secondary x b1" style="background-color:#8B4513">Finished</button></a>
           <a href="lists.php?category=Books&categ=Reading"> <button type="button" class="btn btn-secondary x b2" style="background-color:#8B4513">Reading</button></a>
           <a href="lists.php?category=Books&categ=planningtoread"> <button type="button" class="btn btn-secondary x b3" style="background-color:#8B4513">Planning to read</button></a>
          </div>';
        }elseif($table=='Shows') {
            echo'<style>
   body {
        background-image: url("images/showsbackg.jpg");
        background-size: cover;
        background-position: center;
        .card-body{background-color:#F8F9FA;
            color:#8B0000;
           
        }
        
        .card:hover{
           border-color:#8B0000;
            
        }
    }  </style>';
     echo '<div class="btn-group" role="group" aria-label="Basic example">
            <a href="lists.php?category=Shows&categ=Finishedshows"><button type="button" class="btn btn-secondary x s1" style="background-color:#8B0000; ">Finished</button></a>
            <a href="lists.php?category=Shows&categ=watching"><button type="button" class="btn btn-secondary x s2" style="background-color:#8B0000; ">Watching</button></a>
            <a href="lists.php?category=Shows&categ=planningtowatch"><button type="button" class="btn btn-secondary x s3" style="background-color:#8B0000; ">Planning to watch</button></a>
          </div>';
        }elseif($table=='Games'){
            echo'<style>
   body {
        background-image: url("images/gamesbackg.jpg");
        background-size: cover;
        background-position: center;
         .card-body{background-color:#F8F9FA;
            color:#;1A1A72
           
        }
       
        .card:hover{
            border-color:#1A1A72;
            
        }
       
    }  </style>';
   echo '<div class="btn-group" role="group" aria-label="Basic example">
          <a href="lists.php?category=Games&categ=Finishedgames"><button type="button" class="btn btn-secondary x g1" style="background-color:#1A1A72">Finished</button></a> 
            <a href="lists.php?category=Games&categ=playing"><button type="button" class="btn btn-secondary x g2" style="background-color:#1A1A72">Playing</button></a> 
            <a href="lists.php?category=Games&categ=planningtoplay"><button type="button" class="btn btn-secondary x g3" style="background-color:#1A1A72">Planning to Play</button></a> 
          </div>';
        }elseif($table=='ToDo'){
             echo'<style>
   body {
        background-image: url("images/todobackg1.jpg");
        background-size: cover;
        background-position: center;
        .card-body{
            color:darkgreen;
           background-color:#F8F9FA;
           
        }
       
        .card:hover{
            border-color:#155724; 
            
        }
    }  </style>';
    echo '<div class="btn-group" role="group" aria-label="Basic example">
            <a href="lists.php?category=ToDo&categ=Finishedtodo"><button type="button" class="btn btn-secondary x t1" style="background-color:#155724">Finished</button></a>
           <a href="lists.php?category=ToDo&categ=doing"> <button type="button" class="btn btn-secondary x t2" style="background-color:#155724">Doing</button></a>
           <a href="lists.php?category=ToDo&categ=planningtodo"> <button type="button" class="btn btn-secondary x t3" style="background-color:#155724">Planning to do</button></a>
          </div>';
        }
?>
    </div >


   
    <div class="overlay" id="overlay" onclick="closePopup()"></div>
    <?php
    if($table==='Books'&&$categ==='Finishedbooks'){
          echo('<style>
          .b1{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=Books&categ=Finishedbooks" method="post">
       <h3>Add to finished books</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="Finishedbooks">
         <input type="hidden" name="type" value="books">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#8B4513">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
    else if($table==='Books'&&$categ==='Reading'){
         echo('<style>
          .b2{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=Books&categ=Reading" method="post">
       <h3>Add to  books reading</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="Reading">
         <input type="hidden" name="type" value="books">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#8B4513">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
    else if($table==='Books'&&$categ==='planningtoread'){
         echo('<style>
          .b3{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=Books&categ=planningtoread" method="post">
       <h3>Add to books planning to read </h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="planningtoread">
         <input type="hidden" name="type" value="books">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#8B4513">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
    else if($table==='Shows'&&$categ==='Finishedshows'){
        echo('<style>
          .s1{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=Shows&categ=Finishedshows" method="post">
       <h3>Add to finished shows</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="Finishedshows">
         <input type="hidden" name="type" value="shows">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#8B0000">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
      else if($table==='Shows'&&$categ==='watching'){
        echo('<style>
          .s2{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=Shows&categ=watching" method="post">
       <h3>Add to shows watching</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="watching">
         <input type="hidden" name="type" value="shows">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#8B0000">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
      else if($table==='Shows'&&$categ==='planningtowatch'){
        echo('<style>
          .s3{
            background-color:#009688 !important;
          }
          </style>') ;
     
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=Shows&categ=planningtowatch" method="post">
       <h3>Add to shows planning to watch</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="planningtowatch">
         <input type="hidden" name="type" value="shows">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#8B0000">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
    else if($table==='Games'&&$categ==='Finishedgames'){
        echo('<style>
          .g1{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=Games&categ=Finishedgames" method="post">
       <h3>Add to finished games</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="finishedgames">
         <input type="hidden" name="type" value="games">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#1A1A72">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
     else if($table==='Games'&&$categ==='playing'){
        echo('<style>
          .g2{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=Games&categ=playing" method="post">
       <h3>Add to games playing</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="playing">
         <input type="hidden" name="type" value="games">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#1A1A72">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
     else if($table==='Games'&&$categ==='planningtoplay'){
        echo('<style>
          .g3{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=Games&categ=planningtoplay" method="post">
       <h3>Add to games planning to play</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="planningtoplay">
         <input type="hidden" name="type" value="games">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#1A1A72">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
    else if($table==='ToDo'&&$categ==='doing'){
        echo('<style>
          .t2{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=ToDo&categ=doing" method="post">
       <h3>Add to somthing you\'re doing</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="doing">
        <input type="hidden" name="type" value="todo">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#155724">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
    else if($table==='ToDo'&&$categ==='planningtodo'){
        echo('<style>
          .t3{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=ToDo&categ=planningtodo" method="post">
       <h3>Add to somthing you\'re planning to do</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="planningtodo">
        <input type="hidden" name="type" value="todo">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#155724">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
    else if($table==='ToDo'&&$categ==='Finishedtodo'){
        echo('<style>
          .t1{
            background-color:#009688 !important;
          }
          </style>') ;
    echo('<div class="popup" id="popup">
       <form action="lists.php?category=ToDo&categ=Finishedtodo" method="post">
       <h3>Add to somthing you finished</h3>
        <label for="userData">Enter Title:</label>
        <input type="text" id="title" name="title" required>
        <label for="description">Enter Description:</label>
        <input type="text" id="description" name="description" >
        <br><br>
        <input type="hidden" name="catego" value="Finishedtodo">
        <input type="hidden" name="type" value="todo">
        <!-- Submit button -->
        <button type="submit" class="submitbutton" style="color:white;background-color:#155724">Submit</button>
    </form>
        <button class="close-btn" onclick="closePopup()">Close</button>
    </div>');}
        ?>
    <div class="cont">
        
    <div class="container">
        <div class="row justify-content-center align-items-center">
            
            <div class="col-3">
                <button class="openbuttton" onclick="showPopup()" style=" padding:5px 5px 5px 5px; margin-bottom:20px;color:white;background-color:#009688; border:none; border-radius: 5px;">Add</button>
            </div>
            <div class="col-3">
                </div>
            <div class="col-3">
                  </div>
        </div>
    <div class="row justify-content-center align-items-center g-3 mb-5">
       <?php
       
       if($table==='To-Do'){
        $table='todo';
    }
    


if (isset($_SESSION["id"])) {
       $sql1 = "SELECT * FROM $table WHERE category = ? AND user_id = ?";
        $stmt = mysqli_prepare($con, $sql1);
        if ($stmt) {
    mysqli_stmt_bind_param($stmt, "si", $categ, $_SESSION["id"]); 
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);}
if ($result) {
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          
            echo '<div class="col-lg-3 col-sm-12 col-md-6 me-lg-3">
                    <div class="card mx-auto" style="width: 18rem;">
                        <div class="card-body">
                            <h4 class="card-title">' . htmlspecialchars($row['title']) . '</h4>
                            <p class="card-text">' . htmlspecialchars($row['description']) . '</p>';
                            
            if ($categ === 'Finishedbooks') {
                echo '<a href="lists.php?category=Books&categ=Finishedreading&remove=' . $row['id'] . '" class="btn btn-primary" style="background-color:#007BFF; border:none;margin-right:5px">Remove</a>';
            } elseif ($categ === 'Reading') {
                echo '<a href="lists.php?category=Books&categ=Reading&remove=' . $row['id'] . '" class="btn btn-primary" style="background-color:#007BFF; border:none;margin-right:5px">Remove</a>
                <a href="lists.php?category=Books&categ=Reading&moveToFinished=' . $row['id'] . '" class="btn btn-primary" style="background-color:#34d058;border:none;">Move to Finished</a>';
            } elseif ($categ === 'planningtoread') {
                echo '<a href="lists.php?category=Books&categ=planningtoread&remove=' . $row['id'] . '" class="btn btn-primary" style="background-color:#007BFF; border:none;margin-right:5px">Remove</a>
                <a href="lists.php?category=Books&categ=planningtoread&moveToCurrent=' . $row['id'] . '" class="btn btn-primary" style="background-color:#34d058;border:none;">Move to Reading</a>';
            }elseif ($categ === 'Finishedshows') {
              echo' <a href="lists.php?category=Shows&categ=Finishedshows&remove=' . $row['id'] . '" class="btn btn-primary" style="background-color:#FF5733;border:none; ">Remove</a>';
            } elseif ($categ === 'watching') {
                echo ' <a href="lists.php?category=Shows&categ=watching&remove=' . $row['id'] . '" class="btn btn-primary" style="background-color:#FF5733;border:none; ">Remove</a>
                <a href="lists.php?category=Shows&categ=watching&moveToFinished=' . $row['id'] . '" class="btn btn-primary" style="background-color:#ff6b6b;border:none; ">Move to Finished</a>';
            } elseif ($categ === 'planningtowatch') {
                echo ' <a href="lists.php?category=Shows&categ=planningtowatch&remove=' . $row['id'] . '" class="btn btn-primary" style="background-color:#FF5733;border:none; ">Remove</a>
                <a href="lists.php?category=Shows&categ=planningtowatch&moveToCurrent=' . $row['id'] . '" class="btn btn-primary " style="background-color:#ff6b6b;border:none; ">Move to Watching</a>';
            }elseif ($categ === 'Finishedgames') {
              echo'<a href="lists.php?category=Games&categ=Finishedgames&remove=' . $row['id'] . '" class="btn btn-primary" style="background-color:#28A745;border:none; ">Remove</a>';
            } elseif ($categ === 'planningtoplay') {
                echo '<a href="lists.php?category=Games&categ=planningtoplay&remove=' . $row['id'] . '" class="btn btn-primary" style="background-color:#28A745;border:none; ">Remove</a>
                <a href="lists.php?category=Games&categ=planningtoplay&moveToCurrent=' . $row['id'] . '" class="btn btn-primary " style="background-color:#bb9e49;border:none; ">Move to Playing</a>';
            } elseif ($categ === 'playing') {
                echo '<a href="lists.php?category=Games&categ=playing&remove=' . $row['id'] . '" class="btn btn-primary" style="background-color:#28A745;border:none; ">Remove</a>
                 <a href="lists.php?category=Games&categ=playing&moveToFinished=' . $row['id'] . '" class="btn btn-primary" style="background-color:#bb9e49;border:none; ">Move to Finished</a>';
            }elseif ($categ === 'Finishedtodo') {
              echo'<a href="lists.php?category=ToDo&categ=Finishedtodo&remove=' . $row['id'] . '" class="btn btn-primary custom-button " style="background-color:#FFC107;border:none; ">Remove</a>';
            } elseif ($categ === 'planningtodo') {
                echo ' <a href="lists.php?category=ToDo&categ=planningtodo&remove=' . $row['id'] . '" class="btn btn-primary custom-button " style="background-color:#FFC107;border:none; ">Remove</a>
                <a href="lists.php?category=ToDo&categ=planningtodo&moveToCurrent=' . $row['id'] . '" class="btn btn-primary custom-button " style="background-color:#2b8296;border:none; ">Move to Doing</a>';
            } elseif ($categ === 'doing') {
                echo '<a href="lists.php?category=ToDo&categ=doing&remove=' . $row['id'] . '" class="btn btn-primary custom-button " style="background-color:#FFC107;border:none; ">Remove</a>
                <a href="lists.php?category=ToDo&categ=doing&moveToFinished=' . $row['id'] . '" class="btn btn-primary" style="background-color:#2b8296;border:none; ">Move to Finished</a>';
            }

            echo '      </div>
                    </div>
                  </div>
                   
                  ';
        }
    } else {
        echo '<h4 style="color:white;background-color:darkslategray">No records found in this category.</h4>';
    }}
}
       ?>
    </div>
</div>



    <footer class="bg-body-tertiary text-center " style="background-color: #009688 !important; width:100%">
        <div class="container p-4 pb-0 ">
            <section class="mb-4 ">
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #3b5998; " href="#! " role="button "><i class="fab fa-facebook-f "></i></a>
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #55acee; " href="#! " role="button "><i class="fab fa-twitter "></i></a>
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #dd4b39; " href="#! " role="button "><i class="fab fa-google "></i></a>
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #ac2bac; " href="#! " role="button "><i class="fab fa-instagram "></i></a>
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #0082ca; " href="#! " role="button "><i class="fab fa-linkedin-in "></i></a>
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #333333; " href="#! " role="button "><i class="fab fa-github "></i></a>
            </section>
        </div>
        <div class="text-center p-3 " style="background-color: rgba(0, 0, 0, 0.05); ">
            © 2020 Copyright: AliSharif
         
        </div>
    </footer>
     </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js " integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF " crossorigin="anonymous "></script>
 <script>
       
        function showPopup() {
            document.getElementById('popup').style.display = 'block';
            document.getElementById('overlay').style.display = 'block';
        }

       
        function closePopup() {
            document.getElementById('popup').style.display = 'none';
            document.getElementById('overlay').style.display = 'none';
        }
    </script>
     <style>
        
      
.popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 300px;
    padding: 20px;
    background-color: white;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    border-radius: 10px;
    z-index: 1000;
}

.overlay {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 999;
}



.close-btn {
    display: inline-block;
    margin-top: 10px;
    padding: 8px 15px;
    background-color: blue;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}
.submitbutton{
    height:40px;
    width:68.31px;
    border:none;
    border-radius: 5px;
}
.submitbutton:hover{
    background-color:grey !important;
}
.close-btn:hover {
    background-color: #d32f2f;
}
.cont {
    display: flex;
    flex-direction: column;
    min-height: 70vh; 
}
.container{
    flex:1;
}
    </style>
    <script>
document.addEventListener("DOMContentLoaded", function () {
    const forms = document.querySelectorAll("form");
    forms.forEach(form => {
        form.addEventListener("submit", function (event) {
            event.preventDefault();

            const formData = new FormData(this);

            fetch(this.action, {
                
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                   
                    location.reload(); 
                } else {
                   
                }
            })
            .catch(error => {
                console.error("Error:", error);
               
            });
        });
    });
});
</script>

</body>

</html>