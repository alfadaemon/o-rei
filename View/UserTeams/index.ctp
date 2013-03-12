
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span2">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
				<li>
					<?php echo $this->Html->link(
							__('New Team'),
							'#UserTeamsModal',
							array(
								'class'	=> 'btn-remove-modal',
								'data-toggle' => 'modal',
								'role'	=> 'button',
								'data-user_id' => $user['User']['id'],
								'data-uname' => $user['User']['username']
							));
						?>
				</li>
				
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="userTeams index">
		
			<h2><?php echo __('Teams'); ?></h2>
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
											<th><?php echo $this->Paginator->sort('name'); ?></th>
											<th><?php echo $this->Paginator->sort('tournament_id'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php
				foreach ($userTeams as $userTeam): ?>
	<tr>
		<td><?php echo h($userTeam['UserTeam']['name']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($userTeam['Tournament']['name'], array('controller' => 'tournaments', 'action' => 'view', $userTeam['Tournament']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $userTeam['UserTeam']['id']), array('class' => 'btn btn-mini')); ?>
			<?php //echo $this->Html->link(__('Edit'), array('action' => 'edit', $userTeam['UserTeam']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $userTeam['UserTeam']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete %s?', $userTeam['UserTeam']['name'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
			</table>
			
			<p><small>
				<?php
				echo $this->Paginator->counter(array(
				'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
				));
				?>			</small></p>

			<div class="pagination">
				<ul>
					<?php
		echo $this->Paginator->prev('< ' . __('Previous'), array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
		echo $this->Paginator->numbers(array('separator' => '</li><li>', 'currentClass' => 'disabled', 'before' => '<li>', 'after' => '</li>'));
		echo $this->Paginator->next(__('Next') . ' >', array('tag' => 'li'), null, array('class' => 'disabled', 'tag' => 'li', 'disabledTag' => 'a'));
	?>
				</ul>
			</div><!-- .pagination -->
			
		</div><!-- .index -->
	
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

<div class="modal hide" id="UserTeamsModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
		<h3 id="myModalLabel"><?php echo __('Add Team') ?></h3>
	</div>
	<div class="modal-body">
		<div class="userTeams form">
		
		<?php echo $this->Form->create('UserTeam', array('controller'=>'UserTeams', 'action'=>'add')); ?>
		<fieldset>
		<?php
			echo "<div class='control-group'>";
			echo $this->Form->input('name', array('class' => 'span3'));
			echo "<div class='control-group'>";
			echo $this->Form->input('tournament_id', array('class' => 'span3'));
			echo "</div>";
		?>
		</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-medium btn-primary')); ?>
			<?php echo $this->Form->end(); ?>
		</div>
	</div>
	<div class="modal-footer">
		<button class="btn" data-dismiss="modal" aria-hidden="true"><?php echo __('Cancel') ?></button>
	</div>
</div>
