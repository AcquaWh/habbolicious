$(document).ready(function() {
     $('#noticias').DataTable({
          responsive: true,
          colReorder: true,
          "language": {
               "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
          }
     });
     $('#roles').DataTable({
          responsive: true,
          colReorder: true,
          "language": {
               "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
          }
     });
     $('#usuariosrol').DataTable({
          responsive: true,
          colReorder: true,
          "language": {
               "url": "https://cdn.datatables.net/plug-ins/1.10.20/i18n/Spanish.json"
          }
     });
 } );