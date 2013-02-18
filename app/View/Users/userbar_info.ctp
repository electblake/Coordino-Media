<h2>Show Off</h2>
<p>So you want to show off your reputation and Answers status on forums or a profile somewhere?</p>
<p>Below is the code for your own Answers Bar</p>
<? $user = $session->read('Auth.User');?>
<?=$html->image('/users/' . $user['public_key'] . '/' . $user['username'] . '/bar.png', array('alt' => 'Oh no'));?><br/>
<strong>Copy and Paste the code below to your profile:<br/>
<input type="text" class="big_input" style="width: 500px" onclick="this.select();" value='<a href="http://Answers.intranet" title="Answers"><img src="http://Answers.intranet/users/<?=$user['public_key'];?>/<?=$user['username'];?>/bar.png" alt="Answers"/></a>'/><br/>
<strong>Copy and Paste the code below to your forum signature (BBCode):<br/>
<input type="text" class="big_input" style="width: 500px" onclick="this.select();" value='[url=http://Answers.intranet][img]http://Answers.intranet/users/<?=$user['public_key'];?>/<?=$user['username'];?>/bar.png[/img][/url]'/><br/>
