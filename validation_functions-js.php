<script>

   function timeDifference(date1, date2) {       
        
        try {
            var diffTime = Math.abs(Date.parse(date2) - Date.parse(date1));
            var diffDays = Math.ceil(diffTime / (1000*60*60));
            return diffDays;
        } catch (e) {
            
            console.log('timeDifference'+e);
        }
    }
    
    function formatDatePlusOne(date) {        
        
        let formatted_date = date.getFullYear() + "-" + (date.getMonth() + 1) 
                             + "-" + date.getDate() + " " + (date.getHours() +1) 
                             + ":" + date.getMinutes(); 
        return formatted_date;        
    }
    
    function formatDateMinusOne(date) {        
        
        let formatted_date = date.getFullYear() + "-" + (date.getMonth() + 1) 
                             + "-" + date.getDate() + " " + (date.getHours() -1) 
                             + ":" + date.getMinutes(); 
        return formatted_date;        
    }
    
    function formatDate(date) {        
        
        let formatted_date = date.getFullYear() + "-" + (date.getMonth() + 1) 
                             + "-" + date.getDate() + " " + date.getHours() 
                             + ":" + date.getMinutes(); 
        return formatted_date;        
    }         

</script>