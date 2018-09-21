/*
*
* Função responsável por criar paginação nas tabelas
*/
function tablePagination(table, rows = [], tipo = []) {    
    if(rows.length == 0) {        
        rows = 5;
    }
    if(tipo == "") {
        tipo = "simple_numbers";
    }
    $(table).DataTable({
        "pagingType": tipo, // "simple" option for 'Previous' and 'Next' buttons only
        "pageLength" : rows,
        "language": {
                "lengthMenu": "Mostrar _MENU_ linhas por página",
                "zeroRecords": "Nenhum dado encontrado",
                "info": "Página _PAGE_ de _PAGES_",
                "infoEmpty": " ",
                "infoFiltered": "",
                "paginate": {
                    "previous": "Anterior",
                    "next": "Próxima"
                },
                'search': 'Filtrar'                       
            }
    });    
} 
/*
*
* Função responsável por ocultar textos longos dentro das tabelas dos modais
*
*/

function adapterTextTable() {
    $('.title-modal, .description-modal').each(function(){
        var len = $(this).text().length;
        var title = $(this).text();        
        if(len > 20) {
          $(this).css('cursor', 'pointer');            
          $(this).attr('title', title);
          var text = $(this).text().substr(0, 20)
          $(this).text(text+'...')
        }        
    });
}