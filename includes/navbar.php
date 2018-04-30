<div class="container">

    <div class="company-template"><nav class="navbar navbar-expand-md navbar-dark bg-clarion-blue fixed-top">
    <a class="navbar-brand" href="#">
        <a href = 'index.php?action=home'>
            <img class = 'img-responsive' src="Images/Clarion_Golden_Eagles_logo.png" alt = "Clarion Athletics" width = '60px' height = '30px'>
        </a>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="btn" href="index.php?action=home">Home <span class="sr-only">(current)</span></a>
            </li>
            <!-- Hides navigation bar items if permissions are not set -->
            <?php if(isLoggedIn()) { ?>
<!--                <li class="nav-item">-->
<!--                    <a class="btn" href="index.php?action=training">Training</a>-->
<!--                </li>-->
                <li class="nav-item">
                    <a class="btn" href="index.php?action=videos">Videos</a>
                </li>
            <?php } ?>
            <li class="nav-item">
                <a class="btn" href="index.php?action=help">Help</a>
            </li>
            <?php if(isAdmin()) { ?>
                <li class="nav-item dropdown">
                    <a class="btn dropdown-toggle" href="http://example.com" id="dropdown01"
                       data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                    <div class="dropdown-menu" aria-labelledby="dropdown01">
                        <a class="dropdown-item" href="index.php?action=members">Members</a>
                        <a class="dropdown-item" href="index.php?action=admin_images">Images</a>
                        <a class="dropdown-item" href="index.php?action=admin_sports">Sports</a>
                        <a class="dropdown-item" href="index.php?action=admin_workout">Workouts</a>
                        <a class="dropdown-item" href="index.php?action=admin_users">Users</a>
                    </div>
                </li>
            <?php } ?>
            <!--<li class="nav-item dropdown">
                <a class="btn dropdown-toggle" href="http://example.com" id="dropdown01"
                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Sports</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="View/UnderConstruction.php">Baseball</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Basketball</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Cross Country</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Football</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Golf</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Soccer</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Softball</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Swimming & Diving</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Tennis</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Volleyball</a>
                    <a class="dropdown-item" href="View/UnderConstruction.php">Wrestling</a>
                </div>
            </li>-->
        </ul>
        <?php  if (!isLoggedIn()) {?>
            <a class="d-inline btn" href = 'index.php?action=login'>Login/Sign Up</a>
        <?php }
        else {
            ?>
            <a class="d-inline btn" href = 'index.php?action=logout'>Logout</a>
            <a class="d-inline btn" href = 'index.php?action=edit_profile'><?php $user = getUserById($_SESSION['userId']); echo $user->username; ?></a>
        <?php } ?>
        <a class="d-inline btn" href = 'index.php?action=newsletter'>News Letter</a>
    </div>
    </nav>

