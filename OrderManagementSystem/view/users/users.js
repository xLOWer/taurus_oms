import Main from '../../../js/main.js';
import TableConstructor from '../../../js/table.js';

export default class UsersListView{
    users_data_json;
    users_table;
    table;
    main;

    constructor()
    {
        this.main = new Main();
        this.table = new TableConstructor();
    }

    load_data()
    {
        this.users_data_json = this.main.get_users_json()
        this.users_table = this.table.table_by_json(this.users_data_json);
    }

    view_list(jq_object)
    {
        $(jq_object).html(this.users_table);
    }
}

var usersListView = new UsersListView();

$(document).ready(function()
{
    usersListView.load_data();
    usersListView.view_list("#users-content");
});