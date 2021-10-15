<footer>
<?php
$this->Html->css(
[
    'AdminLTE./plugins/datatables/extensions/Responsive/css/responsive.dataTables.min.css',
    'AdminLTE./plugins/datatables/extensions/RowReorder/css/rowReorder.dataTables.min.css',
    'AdminLTE./plugins/datatables/dataTables.bootstrap',
    'AdminLTE./plugins/datatables/extensions/buttons/buttons.dataTables.min',
],
['block' => 'css']
);

$this->Html->script(
[
    'AdminLTE./plugins/datatables/jquery.dataTables.min',
    'AdminLTE./plugins/datatables/extensions/buttons/dataTables.buttons.min',
    'AdminLTE./plugins/datatables/extensions/ajax/jszip/jszip.min',
    'AdminLTE./plugins/datatables/extensions/ajax/pdfmake/pdfmake.min',
    'AdminLTE./plugins/datatables/extensions/ajax/pdfmake/vfs_fonts',
    'AdminLTE./plugins/datatables/extensions/buttons/buttons.html5.min',
    'AdminLTE./plugins/datatables/extensions/buttons/buttons.print.min',
    'AdminLTE./plugins/datatables/dataTables.bootstrap.min',
    'AdminLTE./plugins/datatables/extensions/Responsive/js/dataTables.responsive.min',
    'AdminLTE./plugins/datatables/extensions/RowReorder/js/dataTables.rowReorder.min',
],
['block' => 'script']
);

echo $this->Html->script('dataTable');
?>
</footer>