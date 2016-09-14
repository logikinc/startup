 $(document).ready(function () {
     
            window.setTimeout(function() {
                $(".autoclose").fadeTo(1500, 0).slideUp(500, function(){
                    $(this).remove(); 
                });
            }, 2000);
         
        });

        $(".delete").on("submit", function(){
            return confirm("Do you want to delete this item?");
        }); 