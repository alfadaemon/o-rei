
<div id="page-container" class="row-fluid">

	<div id="sidebar" class="span3">
		
		<div class="actions">
		
			<ul class="nav nav-list bs-docs-sidenav">
										<li><?php echo $this->Html->link(__('List Players'), array('action' => 'index')); ?></li>
						<li><?php echo $this->Html->link(__('List Player Records'), array('controller' => 'player_records', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Player Record'), array('controller' => 'player_records', 'action' => 'add')); ?> </li>
			</ul><!-- .nav nav-list bs-docs-sidenav -->
		
		</div><!-- .actions -->
		
	</div><!-- #sidebar .span3 -->
	
	<div id="page-content" class="span9">

		<div class="players form">
		
			<?php echo $this->Form->create('Player'); ?>
				<fieldset>
					<h2><?php echo __('Add Player'); ?></h2>
				<?php
		echo "<div class='control-group'>";
		echo $this->Form->input('nickname', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('firstname', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('secondname', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('flastname', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('slastname', array('class' => 'span12'));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('birthdate', array(
    				'dateFormat' => 'DMY',
    				'minYear' => date('Y') - 50,
    				'maxYear' => date('Y') - 12,
    				'class' => 'span2',
					));
		echo "</div>";
		echo "<div class='control-group'>";
		echo $this->Form->input('country', array('class' => 'span12'));
		echo "</div>";
	?>
				</fieldset>
			<?php echo $this->Form->submit('Submit', array('class' => 'btn btn-large btn-primary')); ?>
<?php echo $this->Form->end(); ?>
			
		</div>
			
	</div><!-- #page-content .span9 -->

</div><!-- #page-container .row-fluid -->

