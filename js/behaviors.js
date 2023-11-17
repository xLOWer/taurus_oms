export default class Behavior{
    //для подсказок
    tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');  
    tooltipList = [...this.tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));

    //для сообщений
    static alertPlaceholder = document.getElementById('liveAlertPlaceholder');
    static appendMessage = (message, type) => {
        const wrapper = document.createElement('div')
        wrapper.innerHTML = [
            `<div class="alert alert-${type} alert-dismissible" role="alert">`,
            `   <div>${message}</div>`,
            '   <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>',
            '</div>'
        ].join('');
        Behavior.alertPlaceholder.append(wrapper)
    }

    static TableByJson(json_data)
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