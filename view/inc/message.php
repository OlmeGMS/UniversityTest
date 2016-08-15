<?php
?>
<button type="button" style="display: none" id="btn-message" name="btn-message" class="btn btn-info btn-lg" data-toggle="modal" data-target="#message">Open Modal</button>

<!-- Modal -->
<div class="modal fade" id="message" role="dialog">
	<div class="modal-dialog">

	  <!-- Modal content-->
	  <div class="modal-content" style="background:#6ad2eb; color:white">
		<div class="modal-header">
		  <button type="button" class="close" data-dismiss="modal">&times;</button>
		  <h4 class="modal-title">Mensaje</h4>
		</div>
		<div class="modal-body modal-message" id="response-message" name="response-message">
		</div>
		<div class="modal-footer">
		  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
		</div>
	  </div>
	</div>
</div>