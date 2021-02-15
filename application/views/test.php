<h1>Ajax</h1>
<hr>

<button onclick="ajax()">POST</button>





<script type="text/javascript">
	
        function ajax()
        {
             
             var ajx  = new XMLHttpRequest();

             ajx.open('POST','http://localhost/tallypost.com/webtools/test',true);
             
             ajx.onreadystatechange = function()
             {
             	  var i = ajx.responseText;

             	  console.log(i);
             }
                data = 'name';
             ajx.send(data); 

        }


</script>