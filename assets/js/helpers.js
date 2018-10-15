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

/*******************************************************************| 
| Função responsável por ocultar textos longos dentro das tabelas   |
| dos modais                                                        |
| @params: 1: tamanho máximo de caracteres a serem exibidos         |
********************************************************************/
function adapterTextTable(size = []) {
    $('.title-modal, .description-modal').each(function(){
        var len = $(this).text().length;
        var title = $(this).text();   
        size.length == 0 ? size = 20 : size = size;     
        if(len > size) {
          $(this).css('cursor', 'default');            
          $(this).attr('title', title);
          var text = $(this).text().substr(0, size)
          $(this).text(text+'...')
        }        
    });
}