<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  
<script src="https://cdn.datatables.net/2.0.5/js/dataTables.js"></script>

<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/chosen/1.1.0/chosen.jquery.min.js"></script>

<script>
	$(document).ready(function(){
		$(".date").datepicker({
			dateFormat:"dd-mm-yy",
		});
		
		$('#myTable').DataTable();
		$('.chosen').chosen();
	});
</script>  
