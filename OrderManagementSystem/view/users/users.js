import Main from '../../../js/main.js';
import Behavior from '../../../js/behaviors.js';
import ListView from '../../../js/listLoader.js';

$(document).ready(function(){ 
    new ListView(
        "#users-content", 
        Main.mainApiLink + "/users/list.php", 
        (data)=>{ Behavior.appendMessage(data, 'danger'); }
    ).load(); 
});