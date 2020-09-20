<script>

$(document).ready(function() {           
              
    var results = new Array();
    var multidata = [[]];    

    $.get("dvla_record.csv", function(data) {

       results = data.split('\n');               

       for (i=0; i<results.length; i++) {

          multidata[i] = results[i].split(',');
       } 
        
       var recordDateTime = new Date(multidata[1][9]);
//       recordDateTime = Date.parse(recordDateTime);
//       sets current time to 12:01 a.m 
       var referenceDateTime = new Date().setHours(12,01,0,0);
       var currentDateTime = new Date().getTime();
       var lastDate = new Date();
       lastDate.setDate(lastDate.getDate() - 1);
        
//       date = Date.parse(date);        
        
        console.log('record '+recordDateTime);
        console.log('reference '+referenceDateTime);
        console.log('current '+currentDateTime);
        console.log('date '+lastDate);        
        
        if(currentDateTime > referenceDateTime) {
            
            if(referenceDateTime > recordDateTime) {
                
                alert('DVLA record is out of date, please update record!');
            }            
        }
        else if(lastDate > recordDateTime) {
            alert('DVLA record is out of date, please update record!');
        }
         
    });    
});
    
</script>