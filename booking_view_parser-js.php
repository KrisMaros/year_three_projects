<script>    
    
    var count = <?= $GLOBALS['i'] ?>;
    var date = new Date();
    var idNumber = 0;
    var lastRow = {};
    var test = 0;

    for(var i=0; i< count; i++) {

      var row = JSON.parse(document.getElementById('emp'+i).innerHTML );

        if((date < Date.parse(row.bo_start_date)) && (date < Date.parse(row.bo_end_date))) {               

                if(i != 0) {
                var last = i;
                last--;
                lastRow = JSON.parse(document.getElementById('emp'+last).innerHTML );                
                    
                test = timeDifference(lastRow.bo_end_date, row.bo_start_date);                    
                console.log('1timediff '+test);
                    
                if(test >= 24) {             
                    
                   var time = new Date(lastRow.bo_end_date).getTime(); 
                   var newDate = new Date(time);
                   var formatedDatePlusOne = formatDatePlusOne(newDate) ;

                   var time1 = new Date(row.bo_start_date).getTime(); 
                   var newDate1 = new Date(time1);
                   var formatedDateMinusOne = formatDateMinusOne(newDate1) ;


                   document.getElementById('d'+idNumber++).innerHTML='<div class="available">Free slot : '+formatedDatePlusOne+' to:'+formatedDateMinusOne+'</div>' ;
                }
            
                document.getElementById('d'+idNumber++).innerHTML='<div class="booked">Pick-up : '+row.bo_start_date +' Drop-off : '+row.bo_end_date+'</div>';
            }
            else{ 
                
                if((date < Date.parse(row.bo_start_date)) && (date < Date.parse(lastRow.bo_end_date))) { 
                    
                    test = timeDifference(lastRow.bo_end_date, row.bo_start_date);                    
                    console.log('2timediff '+test);
                   
                       if(test >= 24) {       

                           var time1 = new Date(row.bo_start_date).getTime(); 
                           var newDate1 = new Date(time1);
                           var formatedDateMinusOne = formatDateMinusOne(newDate1) ;

                           document.getElementById('d'+idNumber++).innerHTML='<div class="available">Free slot : '+date+' to :'+row.bo_start_date+'</div>';
                       }               
                }
                else {
                    
                     test = timeDifference(date, row.bo_start_date);                    
                     console.log('3timediff '+test);
                   
                       if(test >= 24) {

                           var time = new Date(date).getTime(); 
                           var newDate = new Date(time);
                           var formatedDate = formatDate(newDate) ;

                           var time1 = new Date(row.bo_start_date).getTime(); 
                           var newDate1 = new Date(time1);
                           var formatedDateMinusOne = formatDateMinusOne(newDate1) ;

                           document.getElementById('d'+idNumber++).innerHTML='<div class="available">Free slot : '+formatedDate+' to:'+formatedDateMinusOne+'</div>';
                       }               
                }
                   
               

                document.getElementById('d'+idNumber++).innerHTML='<div class="booked">Pick-up : '+row.bo_start_date +' Drop-off : '+row.bo_end_date+'</div>'; 
            }
        }
        else {
            document.getElementById('d'+idNumber++).innerHTML='<div class="booked">Pick-up : '+row.bo_start_date +' Drop-off : '+row.bo_end_date+'</div>' ;
        }    
    }
    if (date < Date.parse(row.bo_end_date)) {
        
        var time = new Date(row.bo_end_date).getTime(); 
        var newDate = new Date(time);
        var formatedDatePlusOne = formatDatePlusOne(newDate) ;
        
        document.getElementById('d'+idNumber++).innerHTML='<div class="available">Free slot : '+formatedDatePlusOne+'</div>';
    }
    else {
        
        var time = new Date(date).getTime() + 3600000; 
        var newDate = new Date(time);        
        console.log(newDate);
        
        document.getElementById('d'+idNumber++).innerHTML='<div class="available">Free slot : '+date+'</div>';
    }    

</script>