
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
			
			<ul class="nav nav-list bs-docs-sidenav">			
						<li><?php echo $this->Html->link(__('Edit Player'), array('action' => 'edit', $player['Player']['id']), array('class' => '')); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Player'), array('action' => 'delete', $player['Player']['id']), array('class' => ''), __('Are you sure you want to delete # %s?', $player['Player']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player'), array('action' => 'add'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('List Player Records'), array('controller' => 'player_records', 'action' => 'index'), array('class' => '')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Record'), array('controller' => 'player_records', 'action' => 'add'), array('class' => '')); ?> </li>
				
			</ul><!-- .nav nav-list bs-docs-sidenav -->
			
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">
		
		<div class="players view">

			<h2><?php  echo __('Player'); ?></h2>

			<table class="table table-striped table-bordered">
				<tr>		<td><strong><?php echo __('Id'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['id']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Nickname'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['nickname']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Firstname'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['firstname']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Secondname'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['secondname']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Flastname'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['flastname']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Slastname'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['slastname']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Birthdate'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['birthdate']); ?>
			&nbsp;
		</td>
</tr><tr>		<td><strong><?php echo __('Country'); ?></strong></td>
		<td>
			<?php echo h($player['Player']['country']); ?>
			&nbsp;
		</td>
</tr>			</table><!-- .table table-striped table-bordered -->
			
		</div><!-- .view -->

					
			<div class="related">

				<h3><?php echo __('Related Player Records'); ?></h3>
				
				<?php if (!empty($player['PlayerRecord'])): ?>
				
					<table class="table table-striped table-bordered">
						<tr>
									<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Name'); ?></th>
		<th><?php echo __('Player Id'); ?></th>
		<th><?php echo __('Team Tournament Id'); ?></th>
		<th><?php echo __('Position Id'); ?></th>
		<th><?php echo __('Active'); ?></th>
							<th class="actions"><?php echo __('Actions'); ?></th>
						</tr>
							<?php
								$i = 0;
								foreach ($player['PlayerRecord'] as $playerRecord): ?>
		<tr>
			<td><?php echo $playerRecord['id']; ?></td>
			<td><?php echo $playerRecord['name']; ?></td>
			<td><?php echo $playerRecord['player_id']; ?></td>
			<td><?php echo $playerRecord['team_tournament_id']; ?></td>
			<td><?php echo $playerRecord['position_id']; ?></td>
			<td><?php echo $playerRecord['active']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'player_records', 'action' => 'view', $playerRecord['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'player_records', 'action' => 'edit', $playerRecord['id']), array('class' => 'btn btn-mini')); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'player_records', 'action' => 'delete', $playerRecord['id']), array('class' => 'btn btn-mini'), __('Are you sure you want to delete # %s?', $playerRecord['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
					</table><!-- .table table-striped table-bordered -->
					
				<?php endif; ?>

				
				<div class="actions">
					<?php echo $this->Html->link('<i class="icon-plus icon-white"></i> '.__('New Player Record'), array('controller' => 'player_records', 'action' => 'add'), array('class' => 'btn btn-primary', 'escape' => false)); ?>				</div><!-- .actions -->
				
			</div><!-- .related -->

			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

