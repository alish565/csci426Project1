
  <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Document</title>

    <link rel="stylesheet" href="login.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-VoPTfM6hdqgX1nF0zGg7mHybNz6tmZjL3ggknEDTezZ6+Gq0J9E5Z9u+Vv2U1cnx" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">


</head>

   <body>
     <nav class="navbar navbar-expand-lg" style="background-color: #009688;padding-left:4px;">
        <div class="container-fluid custom_navbar">
            <a class="navbar-brand" href="#" style="color: white;">Navbar</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon" ></span>
         </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php" style="color: white">Home</a>
                    </li>
                   <li class="nav-item ">
                       <div class="dropdown show">
                            <a class="btn btn-secondary dropdown-toggle" style="background-color: #009688; border: none;" href="#" role="button" id="dropdownMenuLink" aria-haspopup="true" aria-expanded="false">
                                    Lists
                            </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                         <a class="dropdown-item" href="lists.php?category=Books">Books</a>
                            <a class="dropdown-item" href="lists.php?category=Shows/Movies">Shows/Movies</a>
                        <a class="dropdown-item" href="lists.php?category=Games">Games</a>
                     <a class="dropdown-item" href="lists.php?category=To-Do">To-Do</a>
                    </div>
                </div>
                     </li>
                   <li class="nav-item">
                        <a class="nav-link" href="login.php" style="color: white;border-bottom:2px solid white">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php" style="color: white;">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
        </nav>


     <div class="container">
    <header class="text-center mb-4">Login</header>
    <form>
        <div class="row justify-content-center">
            <!-- Email Field -->
            <div class="col-md-6 col-lg-4">
                <div class="input-field mb-3">
                    <input type="text" required class="form-control">
                    <label>Email</label>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <!-- Password Field -->
            <div class="col-md-6 col-lg-4">
                <div class="input-field mb-3 position-relative">
                    <input class="pswrd form-control" type="password" required>
                    <label>Password</label>
                    <span onclick="active()" class="show position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;">SHOW</span>
                </div>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <!-- Login Button -->
            <div class="col-md-6 col-lg-4">
                <div class="button text-center">
                    <div class="inner"></div>
                    <button type="submit" class="btn btn-primary w-100">LOGIN</button>
                </div>
            </div>
        </div>
    </form>

    <div class="row justify-content-center mt-3">
        <!-- Signup Link -->
        <div class="col-md-6 col-lg-4 text-center">
            <div class="signup">
                Not a member? <a href="signup.php">Signup now</a>
            </div>
        </div>
    </div>
</div>

<script>
    var input = document.querySelector('.pswrd');
     var show = document.querySelector('.show');
         function active(event){
    // Stop the click event from propagating to parent elements
    event.stopPropagation();

    console.log('active');
    if(input.type === "password"){
        input.type = "text";
        show.style.color = "#1DA1F2";
        show.textContent = "HIDE";
    }else{
        input.type = "password";
        show.textContent = "SHOW";
        show.style.color = "#111";
    }
}
</script>

      <footer class="bg-body-tertiary text-center " style="background-color: #009688 !important; width:100%;margin-top:50px">
        <!-- Grid container -->
        <div class="container p-4 pb-0 ">
            <!-- Section: Social media -->
            <section class="mb-4 ">
                <!-- Facebook -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #3b5998; " href="#! " role="button "><i class="fab fa-facebook-f "></i></a>

                <!-- Twitter -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #55acee; " href="#! " role="button "><i class="fab fa-twitter "></i></a>

                <!-- Google -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #dd4b39; " href="#! " role="button "><i class="fab fa-google "></i></a>

                <!-- Instagram -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #ac2bac; " href="#! " role="button "><i class="fab fa-instagram "></i></a>

                <!-- Linkedin -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #0082ca; " href="#! " role="button "><i class="fab fa-linkedin-in "></i></a>

                <!-- Github -->
                <a data-mdb-ripple-init class="btn text-white btn-floating m-1 " style="background-color: #333333; " href="#! " role="button "><i class="fab fa-github "></i></a>
            </section>
            <!-- Section: Social media -->
        </div>
        <!-- Grid container -->

        <!-- Copyright -->
        <div class="text-center p-3 " style="background-color: rgba(0, 0, 0, 0.05); ">
            © 2020 Copyright:
            <a class="text-body " href="https://mdbootstrap.com/ ">MDBootstrap.com</a>
        </div>
        <!-- Copyright -->
    </footer>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="index.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js " integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js " integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF " crossorigin="anonymous "></script>
   
   </body>
</html>