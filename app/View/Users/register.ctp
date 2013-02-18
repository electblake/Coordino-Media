<h2>Register Yourself</h2>

<? if($this->Session->read('Auth.User.id')) {?>
	<p>
		Currently you are an <strong>unregistered</strong> user. You may have <span class="highlight">asked or answered a question</span> but we only
		know you through your browser cookies. If you clear your browser cache or somehow delete your cookies you will lose your account.
	</p>
	<p>
		Add a password to your account and you will become a full member of our community.
	</p>
	<?=$this->Form->create('User', array('action' => 'register'));?>

	<?=$this->Form->input('secret', array('type' => 'password', 'label' => 'Password', 'class' => 'large_input'));?>
	<?=$this->Form->end('Register');?>
<? } else { ?>
	<p>
		Currently you are an <strong>unregistered</strong> user. You may have <span class="highlight">asked or answered a question</span> but we only
		know you through your browser cookies. If you clear your browser cache or somehow delete your cookies you will lose your account.
	</p>
	<p>
		Add a password to your account and you will become a full member of our community.
	</p>
	<div class="block_label">
	<?=$this->Form->create('User', array('action' => 'register'));?>
	
	<?=$this->Form->input('username', array('class' => 'large_input'));?>

	<?=$this->Form->input('email', array('class' => 'large_input'));?>

	<?=$this->Form->input('secret', array('type' => 'password', 'label' => 'Password', 'class' => 'large_input'));?> 
	<?//$recaptcha->display_form('echo');?>
	<?=$this->Form->end('Register');?>
	</div>
<? } ?>