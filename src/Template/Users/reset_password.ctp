<?php
$this->Html->addCrumb(__('Users'));
$this->Html->addCrumb(__('Reset Password'));
?>

<h3><?= __('Reset Password') ?></h3>

<p><?= __('If you have forgotten your password, fill in your user name OR email address below. A personalized reset link will be emailed to the address we have on file.') ?></p>
<p><?= __('If you no longer have access to the email address on file, you will need to contact the office directly to have this updated before proceeding.') ?></p>
<?php // TODO: Security question method ?>

<?= $this->Form->create($user, ['align' => 'horizontal']) ?>
	<fieldset>
<?php
	echo $this->Form->input($user_field, ['label' => __('Username')]);
	echo $this->Form->input($email_field, ['label' => __('Email')]);
?>
	<p class="highlight-message"><?= __('Only one of these is typically required.') ?></p>
	</fieldset>
<?php
echo $this->Form->button(__('Submit'), ['class' => 'btn-success']);
echo $this->Form->end();
?>
