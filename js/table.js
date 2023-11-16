export default class TableConstructor{
    table_by_json(json_data)
    {
        var html = '<table class="table table-striped">';
        html += '<tr>';
        $.each(json_data[0], function(index, value){
            html += '<th>'+index+'</th>';
        });
        html += '</tr>';
        $.each(json_data, function(index, value){
            html += '<tr>';
            $.each(value, function(index2, value2){
                html += '<td>'+value2+'</td>';
            });
            html += '<tr>';
        });
        html += '</table>';
        return html;
    }
}