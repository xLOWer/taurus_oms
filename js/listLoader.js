import Main from '../../../js/main.js';
import Behavior from '../../../js/behaviors.js';

export default class ListView{
    listObject;
    listLink;
    error;

    constructor(listObject, listLink, error, success)
    {
        this.listObject = listObject;
        this.listLink = listLink;
        this.error = error;
    }

    load()
    {
        return $.ajax({
            url: this.listLink,
            method: 'get', 
            dataType: 'json',
            success: this.loadSuccess,
            error: this.error
        });
    }
  
    loadSuccess(data)
    {
        if(data.response == "ok")
        {
            var table = Behavior.TableByJson(data.data);
            $(this.listObject).html(table);
        }
        else
        {
            this.error(data.data.msg+"\r\n"+data.data.file+"\r\n"+data.data.line);
            //throw new Error(data.data.msg+"\r\n"+data.data.file+"\r\n"+data.data.line);
        }
    }

}