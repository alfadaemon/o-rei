
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Rule'), array('action' => 'edit', $rule['Rule']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Rule'), array('action' => 'delete', $rule['Rule']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $rule['Rule']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Rules'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Rule'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Positions'), array('controller' => 'positions', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Position'), array('controller' => 'positions', 'action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Statistics'), array('controller' => 'player_statistics', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Statistic'), array('controller' => 'player_statistics', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="rules view">

			<h2><?php  echo __('Rule'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($rule['Rule']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Position'); ?></strong></td>
		<td>
			<?php echo $this->Html->link($rule['Position']['name'], array('controller' => 'positions', 'action' => 'view', $rule['Position']['id']), array('class' => '')); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Name'); ?></strong></td>
		<td>
			<?php echo h($rule['Rule']['name']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Weight'); ?></strong></td>
		<td>
			<?php echo h($rule['Rule']['weight']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Player Statistics'); ?></h3>
				
				<?php if (!empty($rule['PlayerStatistic'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Player Record Id'); ?></th>
		<th><?php echo __('Matchday Id'); ?></th>
		<th><?php echo __('Rule Id'); ?></th>
		<th><?php echo __('Points'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($rule['PlayerStatistic'] as $playerStatistic): ?>
		<tr>
			<td><?php echo $playerStatistic['id']; ?></td>
			<td><?php echo $playerStatistic['player_record_id']; ?></td>
			<td><?php echo $playerStatistic['matchday_id']; ?></td>
			<td><?php echo $playerStatistic['rule_id']; ?></td>
			<td><?php echo $playerStatistic['points']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'player_statistics', 'action' => 'view', $playerStatistic['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'player_statistics', 'action' => 'edit', $playerStatistic['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'player_statistics', 'action' => 'delete', $playerStatistic['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $playerStatistic['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Player Statistic'), array('controller' => 'player_statistics', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

