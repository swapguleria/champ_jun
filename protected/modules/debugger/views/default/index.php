
<div class="container">
<div class="row">

<div class="col-md-4">

<button id="showlogs" class="btn btn-warning">Show logs</button>


<button id="deletassets" class="btn btn-warning">Delete Assets</button>


<button id="deleteauth" class="btn btn-warning">Delete Auth Sessions</button>

<button id="deleteuploads" class="btn btn-warning">Delete Uploads</button>
</div>
<div class="col-md-8" id="data" style="min-height:20px;">
<h2>

Please Select option
</h2>
</div>
</div>

</div>

<script>

    $("#showlogs").click(function(){
    
        	$.ajax({
				type : "POST",
				url : '<?php echo Yii::app()->createUrl('debugger/default/showlogs');  ?>',
				success: function(response) {
				    $("#data").html(response);
                   
				},
			error: function (request, error) {
				$("#data").html("<span style='color:green'>No Recent Logs</span>");
		    }
			});	

        });

    $("#deleteauth").click(function(){
        
    	$.ajax({
			type : "POST",
			url : '<?php echo Yii::app()->createUrl('debugger/default/deleteAuthsessions');  ?>',
			success: function(response) {
			    $("#data").html(response);
               
			}
			
		});	

    });

    $("#deletassets").click(function(){
        
    	$.ajax({
			type : "POST",
			url : '<?php echo Yii::app()->createUrl('debugger/default/deleteAssets');  ?>',
			success: function(response) {
			    $("#data").html(response);
               
			}
			
		});	

    });

    $("#deleteuploads").click(function(){
        
    	$.ajax({
			type : "POST",
			url : '<?php echo Yii::app()->createUrl('debugger/default/deleteUploads');  ?>',
			success: function(response) {
			    $("#data").html(response);
               
			}
			
		});	

    });


</script>
