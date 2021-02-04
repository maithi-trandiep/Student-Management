<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Gestion d'étudians | Liste des étudiants</title>

  <?php include "./views/sub-views/header.php"; ?>
</head>
<body class="hold-transition sidebar-mini sidebar-collapse">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
            <a href="index.php" class="nav-link">Accueil</a>
          </li>
        </ul>

        <!-- SEARCH FORM -->
        <form class="form-inline ml-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
    </nav>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="public/assets/img/logo.jpg" alt="GE logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">GE</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="public/assets/img/user_photo.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- SidebarSearch Form -->
        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
            <li class="nav-header">ETUDIANT</li>
            <li class="nav-item menu-open">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-table"></i>
                <p>
                  Gestion d'étudiants
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Recherche avancé</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="listeEtudiants.php" class="nav-link active">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Liste des étudiants</p>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  <!-- /.navbar -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Etudiants</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Recherche avancé</a></li>
              <li class="breadcrumb-item active">Liste des étudiants</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Liste des étudiants avec ses diplômes et statuts après avoir diplômés.</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div>
                  Masquer colonne : <a class="toggle-vis" data-column="0">ID</a> - <a class="toggle-vis" data-column="1">Diplôme</a> - <a class="toggle-vis" data-column="2">Num diplôme</a> - <a class="toggle-vis" data-column="3">Année</a> - <a class="toggle-vis" data-column="4">Campus</a> - <a class="toggle-vis" data-column="5">Classe</a>
                  - <a class="toggle-vis" data-column="8">Statut 6m</a> - <a class="toggle-vis" data-column="9">Entreprise</a> - <a class="toggle-vis" data-column="10">Statut actuel</a> - <a class="toggle-vis" data-column="11">Entreprise</a> - <a class="toggle-vis" data-column="12">Mail</a> - <a class="toggle-vis" data-column="13">Tel</a>
                  - <a class="toggle-vis" data-column="14">Date contact</a> - <a class="toggle-vis" data-column="15">ID com</a> - <a class="toggle-vis" data-column="16">Diplôme origine</a> - <a class="toggle-vis" data-column="17">EXP</a> - <a class="toggle-vis" data-column="18">Entreprise ALT</a>
              </div>
              </br>
              <!-- <a class="editor_create">Créer un nouvel enregistrement</a> -->
              </br>
              </br>
                <table id="infoS" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Diplôme</th>
                    <th>Numéro diplôme</th>
                    <th>Année certi</th>
                    <th>Campus</th>
                    <th>Classe</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Statut dans 6m</th>
                    <th>Entreprise</th>
                    <th>Statut actuel</th>
                    <th>Entreprise</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>Date contact</th>
                    <th>ID comp</th>
                    <th>Diplôme origine</th>
                    <th>EXP en immobilité</th>
                    <th>Entreprise en ALT</th>
                  </tr>
                  <tr>
                    <th>ID</th>
                    <th>Diplôme</th>
                    <th>Numéro diplôme</th>
                    <th>Année certi</th>
                    <th>Campus</th>
                    <th>Classe</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Statut dans 6m</th>
                    <th>Entreprise</th>
                    <th>Statut actuel</th>
                    <th>Entreprise</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>Date contact</th>
                    <th>ID comp</th>
                    <th>Diplôme origine</th>
                    <th>EXP en immobilité</th>
                    <th>Entreprise en ALT</th>
                  </tr>
                  </thead>
                  
                  <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Diplôme</th>
                    <th>Numéro diplôme</th>
                    <th>Année certi</th>
                    <th>Campus</th>
                    <th>Classe</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Statut dans 6m</th>
                    <th>Entreprise</th>
                    <th>Statut actuel</th>
                    <th>Entreprise</th>
                    <th>Mail</th>
                    <th>Téléphone</th>
                    <th>Date contact</th>
                    <th>ID comp</th>
                    <th>Diplôme origine</th>
                    <th>EXP en immobilité</th>
                    <th>Entreprise en ALT</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
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
<!-- Page specific script -->
<script>
  var editor;
  $(function () {
    // Search in column
    
    $('#infoS thead tr:eq(1) th').each(function(i) {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Rechercher '+title+'"/>');

        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    });
    
    editor = new $.fn.dataTable.Editor( {
      ajax: {
            url: "DataEditor.php",
            type: "POST"
        },
      table: "#infoS",
      fields: [ {
                "label": "Diplôme:",
                "name": "diplome",
                "type":  "select",
            }, {
                "label": "No. diplôme:",
                "name": "numDiplome"
            }, {
                "label": "Année de certification:",
                "name": "anneeCertification"
            }, {
                "label": "Campus:",
                "name": "campus"
            }, {
                "label": "Classe:",
                "name": "classe"
            }, {
                "label": "Nom:",
                "name": "nom"
            }, {
                "label": "Prénom:",
                "name": "prenom"
            }, {
                "label": "Statut dans 6 mois:",
                "name": "statut_6m"
            }, {
                "label": "Nom d'entreprise:",
                "name": "nomEntreprise_6m"
            }, {
                "label": "Statut actuel:",
                "name": "statut_actuel"
            }, {
                "label": "Nom d'entreprise:",
                "name": "nomEntreprise_actuel"
            }, {
                "label": "Email:",
                "name": "mail",
            }, {
                "label": "Tel:",
                "name": "tel"
            }, {
                "label": "Date de contact:",
                "name": "dateContact",
                "type": "datetime"
            }, {
                "label": "ID complément:",
                "name": "idCom"
            }, {
                "label": "Diplôme d'origine:",
                "name": "diplomeOrigine"
            }, {
                "label": "Exp en immobilité:",
                "name": "expImmo",
                "type":  "select",
            }, {
                "label": "Entreprise ALT:",
                "name": "entrepriseAlt"
            }
        ]
    } );

  //   editor.on('opened', function(e, node, data, items, type) {
  //     editor.field('idE').disable();
  // })
  
  editor.on( 'open', function ( e, type ) {
    var modifier = editor.modifier();
 
    if ( modifier ) {
        var data = table.row( modifier ).data();
 
        // do something with `data`
    }
} );

    var table = $("#infoS")
    .on("init.dt", function() {
      table.buttons().container()
      .appendTo("#infoS_wrapper .col-md-6:eq(0)");
    })
    .DataTable({
      processing: true,
      serverSide: true,
      ajax: {
            url: "DataEditor.php",
            type: "POST"
        },
      scrollX: true,
      language: { 
        url: "includes//dataTables.french.json"
      },
      columns: [
            { data: "idE" },
            { data: "diplome" },
            { data: "numDiplome" },
            { data: "anneeCertification" },
            { data: "campus" },
            { data: "classe" },
            { data: "nom" },
            { data: "prenom" },
            { data: "statut_6m" },
            { data: "nomEntreprise_6m" },
            { data: "statut_actuel" },
            { data: "nomEntreprise_actuel" },
            { data: "mail" },
            { data: "tel" },
            { data: "dateContact" },
            { data: "idCom" },
            { data: "diplomeOrigine" },
            { data: "expImmo" },
            { data: "entrepriseAlt" }
        ],
        select: true,
      columnDefs: [
            { "width": "30px", "visible": false, "targets": [0] },
            { "width": "120px", "targets": [1] },
            { "width": "80px", "targets": [2] },
            { "width": "80px", "targets": [3] },
            { "width": "80px", "targets": [4] },
            { "width": "80px", "targets": [5] },
            { "width": "80px", "targets": [6] },
            { "width": "80px", "targets": [7] },
            { "width": "100px", "targets": [8] },
            { "width": "120px", "targets": [9] },
            { "width": "100px", "targets": [10] },
            { "width": "120px", "targets": [11] },
            { "width": "100px", "targets": [12] },
            { "width": "80px", "targets": [13] },
            { "width": "80px", "targets": [14] },
            { "width": "80px", "targets": [15] },
            { "width": "80px", "targets": [16] },
            { "width": "80px", "targets": [17] },
            { "width": "120px", "targets": [18] }
        ],
      responsive: false, lengthChange: false, autoWidth: false,
      orderCellsTop: true,
      // buttons: ["copy", "csv", "excel", "pdf", "print"]
    });

    // Hide column
    $("a.toggle-vis").on("click", function(e) {
        e.preventDefault();
        var column = table.column($(this).attr("data-column"));
        column.visible(!column.visible());
    });

    // Button features
    new $.fn.dataTable.Buttons( table, [
        { extend: "create", text: "Créer", editor: editor },
        { extend: "edit", text: "Modifier",  editor: editor },
        { extend: "remove", text: "Supprimer",
          editor: editor,
          formMessage: function ( e, dt ) {
                    var rows = dt.rows( e.modifier() ).data().pluck('nom');
                    return 'Êtes-vous sûr de vouloir supprimer les entrées des '+' enregistrements suivants? <ul><li>'+rows.join('</li><li>')+'</li></ul>';
                }

        }
    ] );
    table.buttons().container()
        .appendTo( $("#infoS_wrapper .col-md-6:eq(0)" ) );
  });
</script>
</body>
</html>
