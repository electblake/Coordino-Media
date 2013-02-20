<?
echo $this->Html->script('jquery/jquery.js');
echo $this->Html->script('jquery/jquery.bgiframe.min.js');
echo $this->Html->script('jquery/jquery.ajaxQueue.js');
echo $this->Html->script('jquery/thickbox-compressed.js');
?>
<script>
$(document).ready(function(){
	$("#results").show("blind");
	
	function getResults()
	{
	
		$.get("/mini_user_search",{query: $("#UserUsername").val(), type: "results"}, function(data){
		
			$("#results").html(data);
			$("#results").show("blind");
		});
	}	
	
	$("#UserUsername").keyup(function(event){
		getResults();
	});
	
	getResults();

});
</script>
<?=$this->Form->create('User', array('action' => '?'));?>
<?=$this->Form->input('username', array(
 'class' => 'big_input',
 'autocomplete' => 'off', 
 'value' => $this->Session->read('errors.data.Post.username')));
?>
<span id="title_status" class="quiet">Who are you looking for?</span>
<div id="results" style="overflow: auto;"></div>