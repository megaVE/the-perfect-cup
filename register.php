<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>The Perfect Cup - Register</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/business-casual.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>
    <script src="js/register-script.js" defer></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js" defer></script>
</head>

<body>

    <div class="brand">The Perfect Cup</div>
    <div class="address-bar">3481 Melrose Place | Beverly Hills, CA 90210 | 123.456.7890</div>

    <!-- Navigation -->
    <?php require_once 'nav.php'; ?>

    <div class="container">
        <div class="row">
            <div class="box">
                <div class="col-lg-12">
                    <hr>
                    <h2 class="intro-text text-center">Registration
                        <strong>form</strong>
                    </h2>
                    <div id="add_err2"></div>
                    <hr>
                    <form role="form">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label>First Name</label>
                                <input
                                    id="first_name"
                                    name="first_name"
                                    maxlength="100"
                                    type="text"
                                    class="form-control"
                                >
                            </div>
                            <div class="form-group col-lg-6">
                                <label>Last Name</label>
                                <input
                                    id="last_name"
                                    name="last_name"
                                    maxlength="100"
                                    type="text"
                                    class="form-control"
                                >
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Email Address</label>
                                <input
                                    id="email"
                                    name="email"
                                    maxlength="100"
                                    type="email"
                                    class="form-control"
                                >
                            </div>
                            <div class="form-group col-lg-12">
                                <label>Password</label>
                                <input
                                    id="password"
                                    name="password"
                                    maxlength="255"
                                    type="password"
                                    class="form-control"
                                >
                            </div>
                            <div class="form-group col-lg-12">
                                <button id="register" type="submit" class="btn btn-default">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <p>Copyright &copy; The Perfect Cup 2024</p>
                </div>
            </div>
        </div>
    </footer>
</body>

</html>
