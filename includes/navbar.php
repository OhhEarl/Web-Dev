<head>
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.0/mdb.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
</head>
<!-- Navbar -->

<style>
    .navPicture {

        border-radius: 50%;
        width: 40px;
        height: 40px;
        box-shadow: rgba(255, 255, 255, 0.2) 0px 0px 0px 1px inset, rgba(0, 0, 0, 0.9) 0px 0px 0px 1px;
        box-shadow: rgba(14, 30, 37, 0.12) 0px 2px 4px 0px, rgba(14, 30, 37, 0.32) 0px 2px 16px 0px;
    }

    .navbar {
        position: sticky;
        top: 0;
        z-index: 100;
        /* Additional styling for your navbar */
    }
</style>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
        <!-- Container wrapper -->
        <div class="container-fluid">
            <?php
            $sql2 = "SELECT COUNT(*) AS count FROM friendship 
                 WHERE friendship.user2_id = {$_SESSION['user_id']} AND friendship.friendship_status = 0";
            $query2 = mysqli_query($conn, $sql2);
            $row = mysqli_fetch_assoc($query2);
            ?>
            <!-- Toggle button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible wrapper -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Navbar brand -->
                <a class="navbar-brand mt-2 mt-lg-0" href="home.php">
                    <img src="\images\Untitled-1.png" height="50px" alt="Logo" loading="lazy" />
                </a>
                <div class="" style="width: 300px;">
                    <form class="d-flex input-group w-auto" method="get" action="search.php" onsubmit="return validateField()">
                        <select name="location" style="display: none;">
                            <option value="emails">Emails</option>
                        </select>
                        <input type="text" class="form-control rounded" placeholder="Enter Email to Find User" name="query" id="query" aria-label="Search" aria-describedby="search-addon" />


                        <span class="input-group-text border-0" id="search-addon">
                            <i class="fas fa-search"></i>
                        </span>
                    </form>
                </div>

                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="requests.php">Friend Requests (<?php echo $row['count'] ?>)</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="friends.php">Friends</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="home.php">Home</a>
                    </li>

                </ul>
                <!-- Left links -->
            </div>

            <!-- Collapsible wrapper -->
            <div class="d-flex align-items-center">
                <!-- Icon -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a nav-link class="dropdown-item" href="logout.php"><button class="btn btn-primary me-3">Logout</button></a>
                    </li>
                </ul>



                <!-- Avatar -->
            </div>
        </div>

        <!-- Container wrapper -->
    </nav>

</body>


</script>