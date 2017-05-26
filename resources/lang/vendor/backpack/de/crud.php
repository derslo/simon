<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Backpack Crud Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used by the CRUD interface.
    | You are free to change them to anything
    | you want to customize your views to better match your application.
    |
    */

    // Forms
    'save_action_save_and_new' => 'Speichern und neue Eintrag',
    'save_action_save_and_edit' => 'Speichern und Eintrag bearbeiten',
    'save_action_save_and_back' => 'Speichern und zurück',
    'save_action_changed_notification' => 'Das Standardverhalten nach dem Speichern wurde geändert.',

    // Create form
    'add'                 => 'Hinzufügen',
    'back_to_all'         => 'Zurück zur Übersicht ',
    'cancel'              => 'Abbrechen',
    'add_a_new'           => 'Neu hinzufügen ',

    // Edit form
    'edit'                 => 'Bearbeiten',
    'save'                 => 'Speichern',

    // Revisions
    'revisions'            => 'Revisionen',
    'no_revisions'         => 'Keine Revisions gefunden',
    'created_this'          => 'hat das erstellt',
    'changed_the'          => 'hat geändert',
    'restore_this_value'   => 'Wert wieder herstellen',
    'from'                 => 'von',
    'to'                   => 'bis',
    'undo'                 => 'Rückgängig',
    'revision_restored'    => 'Revision erfolgreich wieder hergestellt',

    // CRUD table view
    'all'                       => 'Alle ',
    'in_the_database'           => 'in der Datenbank',
    'list'                      => 'Liste',
    'actions'                   => 'Aktionen',
    'preview'                   => 'Vorschau',
    'delete'                    => 'Löschen',
    'admin'                     => 'Administrator',
    'details_row'               => 'Dies ist die Detailreihe. Bitte nach Belieben anpassen.',
    'details_row_loading_error' => 'Es gab einen Fehler beim Laden. Bitte erneut versuchen.',

        // Confirmation messages and bubbles
        'delete_confirm'                              => 'Soll dieser Eintrag wirklich gelöscht werden?',
        'delete_confirmation_title'                   => 'Eintrag gelöscht.',
        'delete_confirmation_message'                 => 'Der Eintrag wurde erfolgreich gelöscht.',
        'delete_confirmation_not_title'               => 'NICHT gelöscht',
        'delete_confirmation_not_message'             => "Es gab einen Fehler. Der Eintrag wurde wahrscheinlich nicht gelöscht.",
        'delete_confirmation_not_deleted_title'       => 'Nicht gelöscht',
        'delete_confirmation_not_deleted_message'     => 'Nichts passiert. Der Eintrag ist sicher.',

        // DataTables translation
        'emptyTable'     => 'Keine Daten in der Tabelle vorhanden',
        'info'           => 'Zeige _START_ bis _END_ von _TOTAL_ Einträgen',
        'infoEmpty'      => 'Zeige 0 von 0 Einträgen',
        'infoFiltered'   => '(Gefilternt von insgesamt _MAX_ Einträgen)',
        'infoPostFix'    => '',
        'thousands'      => ',',
        'lengthMenu'     => '_MENU_ Einträge pro Seite',
        'loadingRecords' => 'Laden...',
        'processing'     => 'Verarbeitung...',
        'search'         => 'Suchen: ',
        'zeroRecords'    => 'Kein Treffer gefunden',
        'paginate'       => [
            'first'    => 'Erster',
            'last'     => 'Letzter',
            'next'     => 'Nächster',
            'previous' => 'Vorheriger',
        ],
        'aria' => [
            'sortAscending'  => ': aktivieren um aufsteigen zu sortieren',
            'sortDescending' => ': aktivieren um absteigend zu sortieren',
        ],

    // global crud - errors
        'unauthorized_access' => 'Unbefugter Zugriff - nicht genügend Zugriffsrechte, um diese Seite zu betrachten.',
        'please_fix' => 'Bitte folende Fehler beheben:',

    // global crud - success / error notification bubbles
        'insert_success' => 'Der Eintrag wurde erfolgreich hinzugefügt.',
        'update_success' => 'Der Eintrag wurde erfolgreich bearbeitet.',

    // CRUD reorder view
        'reorder'                      => 'Umsortieren',
        'reorder_text'                 => 'Mit drag&drop umsortieren.',
        'reorder_success_title'        => 'Erledigt',
        'reorder_success_message'      => 'Die Reihenfolge wurde gespeichert.',
        'reorder_error_title'          => 'Fehler',
        'reorder_error_message'        => 'Die Reihenfolge wurde nicht gespeichert.',

    // CRUD yes/no
        'yes' => 'Ja',
        'no' => 'Nein',

    // Fields
        'browse_uploads' => 'Uploads durchsuchen',
        'clear' => 'Löschen',
        'page_link' => 'Seitenlink',
        'page_link_placeholder' => 'http://example.com/your-desired-page',
        'internal_link' => 'Interner Link',
        'internal_link_placeholder' => 'Interner slug. Bsp: \'admin/page\' (no quotes) für \':url\'',
        'external_link' => 'Externer Link',
        'choose_file' => 'Datei auswählen',

    //Table field
        'table_cant_add' => 'Kann :entity nicht hinzufügen',
        'table_max_reached' => 'Maximale Anzahl von :max erreicht',

    // File manager
    'file_manager' => 'Datei Manager',
];
