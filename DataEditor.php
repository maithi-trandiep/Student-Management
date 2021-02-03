<?php

// DataTables PHP library
include( "./vendor/datatables-editor/lib/DataTables.php" );
 
// Alias Editor classes so they are easy to use
use
    DataTables\Editor,
    DataTables\Editor\Field,
    DataTables\Editor\Format,
    DataTables\Editor\Mjoin,
    DataTables\Editor\Options,
    DataTables\Editor\Upload,
    DataTables\Editor\Validate,
    DataTables\Editor\ValidateOptions;
 
// Build our Editor instance and process the data coming from _POST
Editor::inst( $db, 'etudiant', 'idE' )
    ->fields(
        Field::inst( 'idE' ),
        Field::inst( 'diplome' )
        ->options( Options::inst()
        ->table( 'etudiant' )
        ->value( 'diplome' )
        ->label( 'diplome' )
        ),
        Field::inst( 'numDiplome' )
        ->validator( Validate::numeric( '.', ValidateOptions::inst()
                ->message( 'Un format numérique est requis' )
            ) )
        ->setFormatter( Format::ifEmpty(null) ),
        Field::inst( 'anneeCertification' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Une année est requise' )
            ) ),
        Field::inst( 'campus' ),
        Field::inst( 'classe' ),
        Field::inst( 'nom' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Un nom est requis' ) 
            ) ),
        Field::inst( 'prenom' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Un prénom est requis' ) 
            ) ),
        Field::inst( 'statut_6m' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Un statut est requis' ) 
            ) ),
        Field::inst( 'nomEntreprise_6m' ),
        Field::inst( 'statut_actuel' )
            ->validator( Validate::notEmpty( ValidateOptions::inst()
                ->message( 'Un statut est requis' ) 
            ) ),
        Field::inst( 'nomEntreprise_actuel' ),
        Field::inst( 'mail' )
            ->validator( Validate::email( ValidateOptions::inst()
                ->message( 'Veuillez entrer une adresse courriel' )
                ->allowEmpty( true ) 
            ) ), 
        Field::inst( 'tel' ),
        Field::inst( 'dateContact' )
            ->validator( Validate::dateFormat( 'Y-m-d' ) )
            ->getFormatter( Format::dateSqlToFormat( 'Y-m-d' ) )
            ->setFormatter( Format::dateFormatToSql('Y-m-d' ) ),
        Field::inst( 'idCom' ),
        Field::inst( 'diplomeOrigine' ),
        Field::inst( 'expImmo' )
        ->options( Options::inst()
        ->table( 'etudiant' )
        ->value( 'expImmo' )
        ->label( 'expImmo' )
        ),
        Field::inst( 'entrepriseAlt' )
    )
    ->process( $_POST )
    ->json();
?>
