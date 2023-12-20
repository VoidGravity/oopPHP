<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        JobEase
    </title>

    <link rel="stylesheet" href="../assets/styles/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>

<body>
    <header>


        <nav class="navbar navbar-expand-md navbar-dark">
            <div class="container">
                <!-- Brand/logo -->
                <a class="navbar-brand" href="#">
                    <i class="fas fa-code"></i>
                    <h1>JobEase &nbsp &nbsp</h1>
                </a>

                <!-- Toggler/collapsibe Button -->
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar links -->
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Features</a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                language
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">FR</a>
                                <a class="dropdown-item" href="#">EN</a>
                            </div>
                        </li>
                        <span class="nav-item active">
                            <a class="nav-link" href="#">EN</a>
                        </span>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link" href="../controllers/logout.php">log out</a>
                        </li>


                    </ul>
                </div>
            </div>
        </nav>
    </header>


    <section class="search">
		<h2>Find Your Dream Job</h2>
		<table class="agent table align-middle bg-white" style="min-width: 700px;">
        <thead class="bg-light">


            <tr>
                <th>Title</th>
                <th>description</th>
                <th>Company</th>
                <th>Location</th>
                <th>Status</th>
                <th>Creation Date</th>
                
            </tr>
        </thead>
        <tbody>
            <?php
            include_once '../configs/app.config.php';
            require __DIR__ . "/../model/OfferCrud.php";

            if (isset($_POST["submitS"])) {
                echo "success";
                $show = new OfferCrud;
                $shows = $show->search($_POST["keywords"], $_POST["company"], $_POST["location"]);
                var_dump($show);
                foreach ($shows as $offer) {
                    echo "foreach";

                    echo '
		<tr class="freelancer">
			<td>
				<div class="d-flex align-items-center">
					<div class="ms-3">
						<img src=" ' . $offer["image_path"] . '" alt="test img" height="144" width="144">
						<p class="fw-bold mb-1 f_name">
						' . $offer["title"] . '
						</p>
					</div>
				</div>
			</td>
			<td>
			<p class="fw-bold mb-1 f_name">' . $offer["description"] . '</p>
			</td>
			<td>
			<p class="fw-bold mb-1 f_name">' . $offer["company"] . '</p></td>
			<td><p class="fw-bold mb-1 f_name">' . $offer["location"] . '</p></td>
			<td><p class="fw-bold mb-1 f_name">' . $offer["status"] . '</p></td>
			<td><p class="fw-bold mb-1 f_name">' . $offer["date_created"] . '</p></td>
			
		</tr>
		';
                }
            }
            ?>
        </tbody>
    </table>
	</section>

    
</body>

</html>