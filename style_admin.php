<style> 
    
    body { 
        background-color: #48486a;
        color: white;
        font-family: serif;
        
    }
    
    .flex-container {
      display: flex;        
      flex-direction: column;
      border: outset;
    }

    .flex-container > div {
      border: outset;
      background-color: #d9d9d9;
      width: 1000px;
      margin: 8px;
      align-self: center;
      text-align: center;
      line-height: 30px;
      font-size: 17px;
      color: black;
    }
    
    .flex-link {
        display: flex;        
        flex-direction: row;
        border: outset;        
    }
    
    .flex-link > a {       
        margin: 6px;
        color: #cc99ff;
        text-decoration: none;       
    }
    
    .flex-form {
        display: flex;        
        flex-direction: column;
        color: white;
        border: outset;
    }
    
    .flex-form > div, input, button, a {
        align-self: center;
        margin: 4px;
    }
    
    .flex-scrap {
        display: flex;        
        flex-direction: row;
        margin: 0 0 0 100;
    }
    
    .flex-scrap > div {
/*        border: outset;*/
        margin: 5 20 0 0;
        padding: 2px;        
    }
    
    div {
       margin: 10 10 0 100;
        padding: 2px; 
    }
    
    h1 {
        margin: 10 10 0 100;
        color: #ffb3ff;
    }
    
    h2, p {
        display: flex;
        justify-content: center;
        margin-top: 6px;
    }
    input {
        background-color: #d9d9d9;
    }
    
    button {
        background-color: #cc99ff;
    }
    
    ::placeholder {
      color: #484848;
      opacity: 1; 
    }
    
    .error {
        color: #ff471a;
        font-size: 17px;
    }

    .massage {
        color: cyan;
        font-size: 17px;
    }
    
</style>