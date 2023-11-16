export default class Main{

    tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
    tooltipList = [...this.tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl));
    
    get_users_json(){
      $.ajax({
          url: 'http://localhost/OrderManagementSystem/test_api/users/list.php',
          method: 'get', 
          dataType: 'json',           
          success: function(data)
          {
            if(data.response == "ok")
            {
                return data.data;
            }
            else
            {
                throw new Exception(data.data);
            }
          }
      });
    }
}