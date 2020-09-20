<script>
    
$("#bill_date").datepicker({              
                      changeMonth: true,
                      changeYear: true,
    });  

$("#bill_date").attr("autocomplete", "off");
    

$(document).change(function() {   

    var billDate = $("#bill_date").val();
    
    console.log('diff '+billDate);

    var date = new Date();

    var dateDiffrence = date - Date.parse(billDate); 
    
    if(dateDiffrence > 7898008773) {        
        
        $("#bill_date").datepicker('setDate', null);
        
        alert('Utility bill must be issued within 30 days !');
    }
    
});
    
</script>