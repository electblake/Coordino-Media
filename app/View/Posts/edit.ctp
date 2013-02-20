<?php
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
			$("#title_status").html('<span class="red">Titles must be at least 10 characters long.</span>');
		} else {
			$("#title_status").html('What is your question about?');
		}
	});

  });
  </script>
<?
	if(empty($question['Post']['url_title'])) { $question['Post']['url_title'] = 'answer'; }
?>
<h2>Edit<?=(empty($question['Post']['title'])) ? ' Your Answer' : ': ' . $question['Post']['title'];?></h2>

<?=$this->Form->create(null, array(
		'url' => '/questions/' . $question['Post']['public_key'] . '/' . $question['Post']['url_title'] . '/edit')
	); ?>

<? if ($question['Post']['type'] == 'question') { ?>
<?=$this->Form->label('title');?><br/>

<?=$this->Form->text('title', array('class' => 'wmd-panel big_input', 'value' => $question['Post']['title'], 'id' => 'PostTitle'));?><br/>
<span id="title_status"class="quiet">What is your automotive question about?</span>
<? } ?>
<div id="wmd-button-bar" class="wmd-panel"></div>
<?=$this->Form->textarea('content', array('id' => 'wmd-input', 'class' => 'wmd-panel', 'value' => $question['Post']['content'])); ?>

<div id="wmd-preview" class="wmd-panel"></div>
<? if ($question['Post']['type'] == 'question') { ?>
<?=$this->Form->label('tags');?><br/>
<?=$this->Form->text('tags', array('class' => 'wmd-panel big_input', 'value' => $tags, 'id' => 'tag_input'));?><br/>
<span id="tag_status" class="quiet">Combine multiple words into single-words.</span>
<? } ?>
<br/>
<?=$this->Form->end('Edit');?>