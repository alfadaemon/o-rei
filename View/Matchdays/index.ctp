
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
				<li><?php echo $this->Html->link(__('New Matchday'), array('action' => 'add'), array('class' => '')); ?></li>						<li><?php echo $this->Html->link(__('List Tournaments'), array('controller' => 'tournaments', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Tournament'), array('controller' => 'tournaments', 'action' => 'add'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('List Team Tournaments'), array('controller' => 'team_tournaments', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Local Team'), array('controller' => 'team_tournaments', 'action' => 'add'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('List Player Statistics'), array('controller' => 'player_statistics', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Player Statistic'), array('controller' => 'player_statistics', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="matchdays index">
		
			<h2><?php echo __('Matchdays'); ?></h2>
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
											<th><?php echo $this->Paginator->sort('id'); ?></th>
											<th><?php echo $this->Paginator->sort('name'); ?></th>
											<th><?php echo $this->Paginator->sort('local_score'); ?></th>
											<th><?php echo $this->Paginator->sort('visit_score'); ?></th>
											<th><?php echo $this->Paginator->sort('matchdate'); ?></th>
											<th><?php echo $this->Paginator->sort('location'); ?></th>
											<th><?php echo $this->Paginator->sort('comment'); ?></th>
											<th><?php echo $this->Paginator->sort('tournament_id'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php
				foreach ($matchdays as $matchday): ?>
	<tr>
		<td><?php echo h($matchday['Matchday']['id']); ?>&nbsp;</td>
		<td><?php echo h($matchday['Matchday']['name']); ?>&nbsp;</td>
		<td><?php echo h($matchday['Matchday']['local_score']); ?>&nbsp;</td>
		<td><?php echo h($matchday['Matchday']['visit_score']); ?>&nbsp;</td>
		<td><?php echo h($matchday['Matchday']['matchdate']); ?>&nbsp;</td>
		<td><?php echo h($matchday['Matchday']['location']); ?>&nbsp;</td>
		<td><?php echo h($matchday['Matchday']['comment']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($matchday['Tournament']['name'], array('controller' => 'tournaments', 'action' => 'view', $matchday['Tournament']['id'])); ?>
		</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $matchday['Matchday']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $matchday['Matchday']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Statistics'), array('action' => 'set_match_records', $matchday['Matchday']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $matchday['Matchday']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $matchday['Matchday']['id'])); ?>
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

