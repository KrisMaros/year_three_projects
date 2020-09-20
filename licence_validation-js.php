<script>
    
    $("#datepicker").datepicker({              
                  changeMonth: true,
                  changeYear: true,
    });  
    
    $("#datepicker").attr("autocomplete", "off"); 
    
    
  $(document).ready(function() {
      $('#licence').keypress(function() {
          
          if($(this).val().length == 15) {
              
            var results = new Array();
            var multidata = [[]];
            
            $('#state').val('');
            
            $.get("dvla_record.txt", function(data) {
              
               results = data.split('\n');               
              
               for (i=0; i<results.length; i++) {
                  
                  multidata[i] = results[i].split(',');
               }
              
               var licence_num = $('#licence').val();
                
//                console.log('data '+multidata);
              
               for (i=0; i<multidata.length; i++) {
                  
                  if(licence_num.toLowerCase() == multidata[i][0].toLowerCase()) {
                      
                      alert('DVLA records shows that provided driving licence is not valid until: '+multidata[i][8]);
                      $('#state').val('not valid');
                      $('#suspend_date').val(multidata[i][8]);
                      var invalidData = multidata[i];
//                      emailDVLA(invalidData);
                      break;
                  }
                  else {
                      $('#state').val('valid');
                      $('#suspend_date').val('');
                  }
              }              
            });              
          }            
      });
  });
    
  function emailDVLA(invalidData) {
      
      Email.send({
          //token generated for securing email credentials. 
         SecureToken : "cd6969b3-ada9-44a0-9a3b-cfeb552a1382",
         To : 'maroszek24@wp.pl',
         From : "maroszek24@wp.pl",
         Subject : "DVLA mock email",
         Body : "The Banger commpany regisration number:31232464 notifie DVLA agency about unautorised use of suspendet driving licence nr: "+invalidData[0]+". Offence occured on "+new Date()+" during veryfication process for one of our customers name of: "+invalidData[1]+" "+invalidData[2]+"."
      }).then(
           message => alert(message)
     );     
  }    

</script>