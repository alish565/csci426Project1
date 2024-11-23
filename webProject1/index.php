<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                        <a class="nav-link active" aria-current="page" href="#" style="color: white;border-bottom:2px solid white">Home</a>
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
                        <a class="nav-link" href="login.php" style="color: white;">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="signup.php" style="color: white;">Signup</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="hero" style="padding-bottom: 50px;padding-top: 50px;">
        <div style=" text-align: center;vertical-align: middle;">

            <div style="color: #F5F5F5;margin-bottom:10px;">
                <h1> Listify</h1>
                <h4>Your Personal Tracker for Books, Movies, Games </h4>
                <h4 style="margin-bottom:5px;">Stay organized with your categorized lists </h4>
            </div>
            <a href="#guide" class="get-started-btn">Get Started</a>

        </div>
    </div>
    <main>

        <div id="y">
            <div class="container " style="margin-bottom:20px;">
                <div class="row justify-content-center ">
                    <!-- First Card -->
                    <div class="card col-lg-2 col-md-4 col-sm-4 mb-3 mx-sm-2 " style="padding:0;border-color:#8B4513; ">
                        <img class="card-img-top " src="images/books.jpg " alt="Card image cap ">
                        <div class="card-body " style="background-color:#F5F5DC ">
                            <h5 class="card-title " style="color:#8B4513; ">Books</h5>
                            <p class="card-text ">Track your reading journey. Keep lists of books you've read, are reading, or plan to read.</p>
                            <a href="lists.php?category=Books" class="btn btn-primary" style="background-color:#007BFF; border:none;">View List</a>
                            <a href="# " class="btn btn-primary " style="background-color:#34d058;border:none; ">Add</a>
                        </div>
                    </div>

                    <!-- Second Card -->
                    <div class="card col-lg-2 col-md-4 col-sm-4 mb-3 mx-sm-2 " style="padding:0;border-color:#8B0000; ">
                        <img class="card-img-top " src="images/shows.jpg " alt="Card image cap ">
                        <div class="card-body " style="background-color:#F8F9FA; ">
                            <h5 class="card-title " style="color:#8B0000; ">Shows/Movies</h5>
                            <p class="card-text ">Organize your favorite shows. Mark what you watched, are watching, or plan to watch.</p>
                            <a href="lists.php?category=Shows/Movies" class="btn btn-primary " style="background-color:#FF5733;border:none; ">View List</a>
                            <a href="# " class="btn btn-primary " style="background-color:#ff6b6b;border:none; ">Add</a>
                        </div>
                    </div>

                    <!-- Third Card -->
                    <div class="card col-lg-2 col-md-4 col-sm-4 mb-3 mx-sm-2 " style="padding:0;border-color:#1A1A72; ">
                        <img class="card-img-top " src="images/games2.jpg " alt="Card image cap ">
                        <div class="card-body " style="background-color:#DFF6FF; ">
                            <h5 class="card-title " style="color:#1A1A72; ">Games</h5>
                            <p class="card-text ">Manage your games library. Keep track of finished, in-progress, and planned games. </p><br>
                            <a href="lists.php?category=Games" class="btn btn-primary " style="background-color:#28A745;border:none; ">View List</a>
                            <a href="# " class="btn btn-primary " style="background-color:#bb9e49;border:none; ">Add</a>
                        </div>
                    </div>

                    <!-- Fourth Card -->
                    <div class="card col-lg-2 col-md-4 col-sm-4 mb-3 mx-sm-2 " style="padding:0;border-color:#155724; ">
                        <img class="card-img-top " src="images/todo2.jpg " alt="Card image cap ">
                        <div class="card-body " style="background-color:#E6F4EA; ">
                            <h5 class="card-title " style="color:#155724; ">To-Do </h5>
                            <p class="card-text ">Plan your tasks and organize your day with a simple, easy-to-use to-do list.</p><br>
                            <a href="lists.php?category=To-Do" class="btn btn-primary custom-button " style="background-color:#FFC107;border:none; ">View List</a>
                            <a href="# " class="btn btn-primary custom-button " style="background-color:#2b8296;border:none; ">Add</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>



        <section class="guide" id="guide">
            <h2>Welcome to Your New Space! Here's How to Get Started:</h2>
            <ol>
                <li>
                    <strong>Choose Your Category</strong>
                    <p>Whether you're into books, shows, or games, you can start by selecting a category. Each category has three distinct lists:
                        <ul>
                            <li>Watched/Finished – See what you've already enjoyed.</li>
                            <li>Watching/Reading/Playing – Discover what you're currently diving into.</li>
                            <li>Planning – Keep track of what you intend to explore next.</li>
                        </ul>
                    </p>
                </li>
                <li>
                    <strong>Manage Your Lists</strong>
                    <p>Once you've picked a category, you can:
                        <ul>
                            <li>Add new entries to each list.</li>
                            <li>Update your progress (e.g., mark a book as "finished ").</li>
                            <li>Remove items that no longer interest you.</li>
                        </ul>
                    </p>
                </li>
                <li>
                    <strong>Stay Organized</strong>
                    <p>With our simple interface, it's easy to manage your preferences. Simply drag and drop your items to reorder them or click on the edit button to make changes.</p>
                </li>
                <li>
                    <strong>Sync Across Devices</strong>
                    <p>No matter where you are, your lists stay synced and up-to-date. So feel free to add items on the go, and they’ll be ready when you return.</p>
                </li>
                <li>
                    <strong>Get Inspired</strong>
                    <p>Not sure what to watch, read, or play next? Browse through your lists for inspiration, or see what others are recommending (coming soon!).</p>
                </li>
            </ol>
            <h3>Let’s Get Started!</h3>
            <p style="margin-bottom:60px ">Pick a category and begin organizing your entertainment today. Enjoy your time!</p>
        </section>



    </main>

    <footer class="bg-body-tertiary text-center " style="background-color: #009688 !important; ">
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