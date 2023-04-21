<!-- BEGIN: JS Assets-->
<script src="{{ asset('assets/js/app.min.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
<script src="{{ asset('assets/js/page/index.js') }}"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- JS Libraies -->

<script src="{{ asset('assets/bundles/datatables/datatables.min.js') }}"></script>

<script src="{{ asset('assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>

<script src="{{ asset('assets/bundles/datatables/export-tables/dataTables.buttons.min.js') }}"></script>

<script src="{{ asset('assets/bundles/datatables/export-tables/buttons.flash.min.js') }}"></script>

<script src="{{ asset('assets/bundles/datatables/export-tables/jszip.min.js') }}"></script>

<script src="{{ asset('assets/bundles/datatables/export-tables/pdfmake.min.js') }}"></script>

<script src="{{ asset('assets/bundles/datatables/export-tables/vfs_fonts.js') }}"></script>

<script src="{{ asset('assets/bundles/datatables/export-tables/buttons.print.min.js') }}"></script>

<script src="{{ asset('assets/js/page/datatables.js') }}"></script>

<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>

<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable( {
            "language": {
                "sProcessing":     "Traitement en cours...",
                "sSearch":         "Rechercher&nbsp;:",
                "sLengthMenu":     "Afficher _MENU_ &eacute;l&eacute;ments",
                "sInfo":           "Affichage de l'&eacute;l&eacute;ment _START_ &agrave; _END_ sur _TOTAL_ &eacute;l&eacute;ments",
                "sInfoEmpty":      "Affichage de l'&eacute;l&eacute;ment 0 &agrave; 0 sur 0 &eacute;l&eacute;ments",
                "sInfoFiltered":   "(filtr&eacute; de _MAX_ &eacute;l&eacute;ments au total)",
                "sInfoPostFix":    "",
                "sLoadingRecords": "Chargement en cours...",
                "sZeroRecords":    "Aucun &eacute;l&eacute;ment &agrave; afficher",
                "sEmptyTable":     "Aucune donn&eacute;e disponible dans le tableau",
                "oPaginate": {
                    "sFirst":      "Premier",
                    "sPrevious":   "Pr&eacute;c&eacute;dent",
                    "sNext":       "Suivant",
                    "sLast":       "Dernier"
                },
                "oAria": {
                    "sSortAscending":  ": activer pour trier la colonne par ordre croissant",
                    "sSortDescending": ": activer pour trier la colonne par ordre d&eacute;croissant"
                }
            }
        } );
    } );

</script>

<!-- END: JS Assets-->

