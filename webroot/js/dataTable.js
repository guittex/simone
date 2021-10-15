var table;
$(function () {
    'use strict';
    table = $('table.table_data').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "info": true,
        "autoWidth": false,
        "ordering": true,
        "stripeClasses": ['odd-row', 'even-row'],
        "pagingType": "simple_numbers",
        responsive: true,
        dom: 'Bfrtip',
        buttons: [
            {
                extend: 'copyHtml5', text: '', className: 'fa fa-copy btn btn-default btn-flat',
                attr: {
                    title: 'Clique para copiar a tabela para memoria clipboard.'
                },
                exportOptions: {
                    columns: ':not(.no-sort)'
                }
            },
            {
                extend: 'excelHtml5', text: '', className: 'fa fa-file-excel-o btn btn-default btn-flat',
                attr: {
                    title: 'Clique para exportar para Excel.'
                },
                exportOptions: {
                    modifier: {
                        page: 'all',
                    },
                    columns: ':not(.no-sort)'
                }
            },
            {
                extend: 'pdfHtml5', text: '', className: 'fa fa-file-pdf-o btn btn-default btn-flat',
                attr: {
                    title: 'Clique para exportar para PDF.'
                },
                exportOptions: {
                    columns: ':not(.no-sort)'
                }
            },
            {
                extend: 'print', text: '', className: 'fa fa-print btn btn-default btn-flat',
                attr: {
                    title: 'Clique para imprimir a tabela.'
                },
                exportOptions: {
                    columns: ':not(.no-sort)'
                }
            }
        ],
        rowReorder: {
            selector: 'td:nth-child(2), td:nth-child(3)'
        },
        columnDefs: [
            { orderable: false, targets: "no-sort" },
            { targets: 0, visible: false }
        ],
        language: {
            searchPlaceholder: "Digite para pesquisar",
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "_MENU_ resultados",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            },
            buttons: {
                copyTitle: 'Dados Copiados',
                copyKeys: 'Precione <i>ctrl</i> ou <i>\u2318</i> + <i>C</i> para copiar os dados da tabela<br>para memoria de seu sistema.<br><br>Para cancelar, clique nesta mensagem ou precione ESC.',
                copySuccess: {
                    1: "Uma coluna copiada para memória",
                    _: "%d linhas copiadas para memória"
                }
            }
        }

    });

});
function addRowDataTableExemple(qtdRowsAtual, id, nome, area, unidade, formaP, acoes) {
    var newrow = table.row.add([
        (parseInt(qtdRowsAtual) + 1),
        id,
        nome,
        area,
        unidade,
        formaP,
        acoes
    ]).draw().node();
    $(newrow).css('color', '#024f08').animate({ color: 'black' });
}
