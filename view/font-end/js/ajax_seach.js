
   
	// $('.submit-search').on( "click", function(e){
    // 	e.preventDefault();
	// 	console.log("a");
    //   $.ajax({
    //           url : "?view=ajax_product_4_column",
    //           type : "POST",
    //           data : {
    //                     'page' : 1,
    //                     'key' : $('.search').val()
    //                 },
    //           success : function (result){
    //               $('#result').html(result);
    //           }
    //   });
    // });
    $('.logout').on('click',function(e){
        e.preventDefault();
        $.ajax({
            url : "?view=log_out",
            type : "POST",
            success : function (result){
                $('#header').html(result);
            }
      });
    })