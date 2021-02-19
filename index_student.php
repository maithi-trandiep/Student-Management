<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

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
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                    <div class="col-12">
                        <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Mon profil d'étudiant</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <!-- <a class="editor_create">Créer un nouvel enregistrement</a> -->
                        </br>
                        </br>
                            <table id="studentS" class="table table-bordered table-striped">
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
                            </thead>
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
<script>
  var editor;
  $(function () {
    var idE = '<?php echo $_SESSION["idE"] ?>';
    console.log("idE", idE);
    editor = new $.fn.dataTable.Editor( {
      ajax: {
            url: "StudentEditor.php",
            type: "POST"
        },
      table: "#studentS",
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

    let dataBeforeEdit = [];
    editor.on( 'initEdit', function (  e, node, data, items, type ) {
      // Type is 'main', 'bubble' or 'inline'
      //alert( 'Editor edit form shown' );
      console.log('initEdit current data', data)
      // Keep old edit data before update
      if (data) {
        dataBeforeEdit.push({
          idE: data.idE,
          nomEntreprise_actuel: data.nomEntreprise_actuel,
          statut_actuel: data.statut_actuel
        })
      }
    });
    editor.on( 'postEdit', function (  e, json, data, id ) {
      // Type is 'main', 'bubble' or 'inline'
      //alert( 'Editor edit form shown' );
      console.log('postEdit data', data, json)
      // if no error then insert update history
      if (json && json.error == '') {
        if (dataBeforeEdit.length > 0) {
          const oldData = dataBeforeEdit.pop();
          if (oldData.idE === data.idE) {
            // now add update history
            jQuery.ajax({
                type: "POST",
                url: 'add_history.php',
                dataType: 'json',
                data: oldData,
                success: function (obj, textstatus) {
                  if( !('error' in obj) ) {
                    console.log(obj.result);
                  }
                  else {
                    console.log(obj.error);
                  }
                }
            });
          }
        }
      }
    });

    var table = $("#studentS")
    .on("init.dt", function() {
      table.buttons().container()
      .appendTo("#studentS_wrapper .col-md-6:eq(0)");
    })
    .DataTable({
      processing: true,
      serverSide: true,
      ajax: {
            url: "StudentEditor.php",
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
      paging: false, searching: false, info: false, ordering: false,
      orderCellsTop: true,
      // buttons: ["copy", "csv", "excel", "pdf", "print"]
    });

    // Button features
    new $.fn.dataTable.Buttons( table, [
        { extend: "edit", text: "Modifier",  editor: editor },
    ] );
    table.buttons().container()
        .appendTo( $("#studentS_wrapper .col-md-6:eq(0)" ) );
  });
</script>
</body>
</html>
