<h2>Listing Clientes</h2>
<br>

<?php if ($clientes): ?>
	<div class="table-responsive">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Idade</th>
					<th></th>
				</tr>
			</thead>

			<tbody>
				<?php foreach ($clientes as $item): ?>
					<tr>
						<td><?php echo $item->nome; ?></td>
						<td><?php echo $item->email; ?></td>
						<td><?php echo $item->idade; ?></td>

						<td>
							<?php echo Html::anchor('admin/cliente/view/'.$item->id, 'View'); ?> |
							<?php echo Html::anchor('admin/cliente/edit/'.$item->id, 'Edit'); ?> |
							<?php echo Html::anchor('admin/cliente/delete/'.$item->id, 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
	</div>

	<?php echo $pagination ?>
<?php else: ?>
	<p>No Clientes.</p>
<?php endif; ?>

<p>
	<?php echo Html::anchor('admin/cliente/create', 'Add new Cliente', array('class' => 'btn btn-success')); ?>
</p>
