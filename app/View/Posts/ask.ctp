<?
	echo $this->Html->css('wmd.css');
	echo $this->Html->script('wmd/showdown.js');
	echo $this->Html->script('wmd/wmd.js');
	
	echo $this->Html->script('jquery/jquery.js');
	echo $this->Html->script('jquery/jquery.bgiframe.min.js');
	echo $this->Html->script('jquery/jquery.ajaxQueue.js');
	echo $this->Html->script('jquery/thickbox-compressed.js');
	echo $this->Html->script('jquery/jquery.autocomplete.js');
	echo $this->Html->script('/tags/suggest');
	
	echo $this->Html->css('thickbox.css');
	echo $this->Html->css('jquery.autocomplete.css');
?>


  <script>
  $(document).ready(function(){
	$("#resultsContainer").show("blind");
	
	$("#tag_input").autocomplete(tags, {
		minChars: 0,
		multiple: true,
		width: 350,
		matchContains: true,
		autoFill: false,
		formatItem: function(row, i, max) {
			return row.name + " (<strong>" + row.count + "</strong>)";
		},
		formatMatch: function(row, i, max) {
			return row.name + " " + row.count;
		},
		formatResult: function(row) {
			return row.name;
		}
	});
	
	$("#PostTitle").blur(function(){
		if($("#PostTitle").val().length >= 10) {
			$("#title_status").toggle();
			getResults();
		} else {
			$("#title_status").show();
		}
	});

	function getResults()
	{
	
		$.get("/mini_search",{query: $("#PostTitle").val(), type: "results"}, function(data){
		
			$("#resultsContainer").html(data);
			$("#resultsContainer").show("blind");
		});
	}	
	
	$("#PostTitle").keyup(function(event){
		if($("#PostTitle").val().length < 10) {
			$("#title_status").html('<span class="red"><?= __('Titles must be at least 10 characters long.',true) ?></span>');
		} else {
			$("#title_status").html('<?= __('What is your question about?',true) ?>');
		}
	});
	
  });
  </script>
<h2><?= __('Ask a question',true) ?></h2>
<? if ($this->Session->read('errors')) {
		foreach($this->Session->read('errors.errors') as $error) {
			echo '<div class="error">' . $error . '</div>';
		}
	}
?>
<?=$this->Form->create('Post', array('action' => 'ask'));?>
<?=$this->Form->label(__('Title',true));?><br/>

<?=$this->Form->text('title', array('class' => 'wmd-panel big_input', 'value' => $this->Session->read('errors.data.Post.title')));?><br/>
<span id="title_status"class="quiet"><?= __('What is your question about?',true) ?></span>
<div id="resultsContainer"></div>

<div id="wmd-button-bar" class="wmd-panel"></div>
<?=$this->Form->textarea('content', array(
	'id' => 'wmd-input', 'class' => 'wmd-panel', 'value' => $this->Session->read('errors.data.Post.content')
	));
 ?>

<div id="wmd-preview" class="wmd-panel"></div>

<?=$this->Form->label(__('Tags',true));?><br/>
<?=$this->Form->text('tags', array('id' => 'tag_input', 'class' => 'wmd-panel big_input'));?><br/>
<span id="tag_status" class="quiet"><?= __('Combine multiple words into single-words.',true) ?></span>

<? if(!$this->Session->check('Auth.User.id')) { ?>
<h2><?= __('Who Are You?',true) ?></h2>
<span class="quiet"><?= __('Have an account already?',true) ?> <a href="#"><?= __('Login before answering!',true) ?></a></span><br/>
	<?=$this->Form->label(__('Name',true));?><br/>
	<?=$this->Form->text('User.username', array(
		'class' => 'big_input medium_input', 
		'value' => $this->Session->read('errors.data.User.username')
		));
	?><br/>
	<?=$this->Form->label(__('Email',true));?><br/>
	<?=$this->Form->text('User.email', array(
		'class' => 'big_input medium_input',
		'value' => $this->Session->read('errors.data.User.email')
		));
	?><br/>		
<? } ?>
<br/><br/>
<?=$this->Form->checkbox('Post.notify', array('checked' => true));?>
<span style="margin-left: 5px;"><?= __('Notify me when my question is answered.',true) ?></span>

<?$this->Recaptcha->display_form('echo');?>

<?=$this->Form->end( __('Ask a question',true));?>

