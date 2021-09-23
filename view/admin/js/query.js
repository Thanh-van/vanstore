$(document).ready(()=>{
  
    $('#open-sidebar').click(()=>{
       
        // add class active on #sidebar
        $('#sidebar').addClass('active');
        
        // show sidebar overlay
        $('#sidebar-overlay').removeClass('d-none');
      
     });
    
    
     $('#sidebar-overlay').click(function(){
       
        // add class active on #sidebar
        $('#sidebar').removeClass('active');
        
        // show sidebar overlay
        $(this).addClass('d-none');
      
     });
  });
  
  function table_find($e,$class_name,$input_set){
      $name_value = $e.parent().parent().find($class_name).text().trim();
      $($input_set).val($name_value);
   }
   function table_find_option($e,$class_name,$input_set){
      $name_value = $e.parent().parent().find($class_name).text().trim();
      $($input_set).val($name_value).change();
      
   }