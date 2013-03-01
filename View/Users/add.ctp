<?php $breadcrumb = array(
	array(
		'label' => 'Home',
		'link'	=> '/users/home'
	),
	array(
		'label'	=> 'Users'
	)
); ?><?php echo $this->element('breadcrumb',array('links' => $breadcrumb)); ?>
<div class="users form">
<?php echo $this->Form->create('User'); ?>
	<fieldset>
		<legend><?php echo __('Add User'); ?></legend>
	<?php
		echo $this->Form->input('user_group_id');
		echo $this->Form->input('username');
		echo $this->Form->input('password');
		echo $this->Form->input('email');
		echo $this->Form->input('first_name');
		echo $this->Form->input('last_name');
		echo $this->Form->input('active');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List User Teams'), array('controller' => 'user_teams', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New User Team'), array('controller' => 'user_teams', 'action' => 'add')); ?> </li>
	</ul>
</div>
