<style> 
    
    body {        
        background-color: #48486a;        
        color: #fff9e5;
        font-family: serif;     
    }
    
    .flex-form {
        display: flex;        
        flex-direction: column;
        border: outset;        
    }   
    
    .flex-form > div, select, button {
        width: 350px;
        align-self: center;
        margin: 2px;
    }
    
    .select-form {
        display: flex;        
        flex-direction: column;
        border: outset;
        color: black;
    }
    
    .select-form > div, select, button {
        width: 350px;
        align-self: center;
        margin: 2px;
    }
    
    button {
      color: black;
    }
    
    h2, p {
        display: flex;
        justify-content: center;
        margin-top: 2px;
    }
    
    .flex-container {
      border: outset;
      display: flex;
      flex-wrap: wrap;      
    }

    .flex-container > div {
/*    background-color: #f1f1f1;*/
      width: 230px;
      margin: 8px;
      text-align: center;
      line-height: 30px;
      font-size: 17px;      
    }
    
    .input-styling {
        width: 180px;
    }

    .error {
        color: #ff471a;
        font-size: 17px;
    }

    .massage {
        color: cyan;
        font-size: 17px;
    }
    
    .available {
        background-color: forestgreen;
    }
    
    .booked {
        background-color: crimson;
    }
    
    button {
        background-color: #cc99ff;
    }
    
</style>