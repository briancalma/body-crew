<!-- This is the helper page the link below is attached with the reset token string -->


<h1>A Confirmation Link is send to your email at : <?= $auth->user('emailaddress')?></h1>
<p>Please open your confirmation email and click the confirmation link.</p>

<?= $this->Html->link('Change Password',['action' => 'change_password',$token],['class' => 'button']); ?>