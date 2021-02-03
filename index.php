<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gestion d'étudiants | Acceuil</title>

    <?php include "./views/sub-views/header.php"; ?>
    
</head>

<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
    <!-- Navbar -->
    <?php include "./views/sub-views/navbar.php"; ?>
    <!-- /.navbar -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
            <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Accueil</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Accueil</a></li>
                    <li class="breadcrumb-item active">Info</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
            <div class="container-fluid"> 
                <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informations</h5>

                    <p class="card-text">
                    Cet outil Web permet de suivre ce que sont devenus les étudiants qui ont suivi un titre RNCP.
                    </p>

                </div>
                </div>
            </div>
            </div>
            <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <?php include "./views/sub-views/footer.php"; ?>
    <!-- /.footer -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include "./includes/jQuery.php"; ?>
</body>
</html>
