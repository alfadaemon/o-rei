
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Player Statistic'), array('action' => 'edit', $playerStatistic['PlayerStatistic']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Player Statistic'), array('action' => 'delete', $playerStatistic['PlayerStatistic']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $playerStatistic['PlayerStatistic']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Statistics'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Statistic'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Records'), array('controller' => 'player_records', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Record'), array('controller' => 'player_records', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Matchdays'), array('controller' => 'matchdays', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Matchday'), array('controller' => 'matchdays', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Rules'), array('controller' => 'rules', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rule'), array('controller' => 'rules', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="playerStatistics view">

			<h2><?php  echo __('Player Statistic'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($playerStatistic['PlayerStatistic']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Player Record'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($playerStatistic['PlayerRecord']['name'], array('controller' => 'player_records', 'action' => 'view', $playerStatistic['PlayerRecord']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Matchday'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($playerStatistic['Matchday']['id'], array('controller' => 'matchdays', 'action' => 'view', $playerStatistic['Matchday']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Rule'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($playerStatistic['Rule']['name'], array('controller' => 'rules', 'action' => 'view', $playerStatistic['Rule']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Points'); ?></strong></td>
		<td>
			<?php echo h($playerStatistic['PlayerStatistic']['points']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

