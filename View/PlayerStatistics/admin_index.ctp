
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
				<li><?php echo $this->Html->link(__('New Player Statistic'), array('action' => 'add'), array('class' => '')); ?></li>						<li><?php echo $this->Html->link(__('List Player Records'), array('controller' => 'player_records', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Player Record'), array('controller' => 'player_records', 'action' => 'add'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('List Matchdays'), array('controller' => 'matchdays', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Matchday'), array('controller' => 'matchdays', 'action' => 'add'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index'), array('class' => '')); ?></li> 
		<li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add'), array('class' => '')); ?></li> 
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="playerStatistics index">
		
			<h2><?php echo __('Player Statistics'); ?></h2>
			
			<table cellpadding="0" cellspacing="0" class="table table-striped table-bordered">
				<tr>
											<th><?php echo $this->Paginator->sort('id'); ?></th>
											<th><?php echo $this->Paginator->sort('player_record_id'); ?></th>
											<th><?php echo $this->Paginator->sort('matchday_id'); ?></th>
											<th><?php echo $this->Paginator->sort('rule_id'); ?></th>
											<th><?php echo $this->Paginator->sort('points'); ?></th>
											<th class="actions"><?php echo __('Actions'); ?></th>
				</tr>
				<?php
				foreach ($playerStatistics as $playerStatistic): ?>
	<tr>
		<td><?php echo h($playerStatistic['PlayerStatistic']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($playerStatistic['PlayerRecord']['name'], array('controller' => 'player_records', 'action' => 'view', $playerStatistic['PlayerRecord']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($playerStatistic['Matchday']['id'], array('controller' => 'matchdays', 'action' => 'view', $playerStatistic['Matchday']['id'])); ?>
		</td>
		<td>
			<?php echo $this->Html->link($playerStatistic['Rule']['name'], array('controller' => 'rules', 'action' => 'view', $playerStatistic['Rule']['id'])); ?>
		</td>
		<td><?php echo h($playerStatistic['PlayerStatistic']['points']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $playerStatistic['PlayerStatistic']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $playerStatistic['PlayerStatistic']['id']), array('class' => 'btn btn-mini')); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $playerStatistic['PlayerStatistic']['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $playerStatistic['PlayerStatistic']['id'])); ?>
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

