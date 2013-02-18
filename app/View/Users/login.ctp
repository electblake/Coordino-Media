<p>
	<?php echo __("You are currently an anonymous user. Login below to sign into your account"); ?>.
</p>
<p>
	Want to get an account? 
	<?=$this->Html->link(
			'Register',
			array('controller' => 'users', 'action' => 'register')
		);
	?>	
</p>
<div id="login_panel" class="block_label">
<?php
    $this->Session->flash('auth');
    echo $this->Form->create('User', array('action' => 'login'));
    echo $this->Form->input('email', array('class' => 'large_input'));
    echo $this->Form->input('password', array('class' => 'large_input'));
    echo $this->Form->end('Login');
?>
</div>
<p>
	Forget your password?  Click <a href="/lost_password">here</a>.
</p>