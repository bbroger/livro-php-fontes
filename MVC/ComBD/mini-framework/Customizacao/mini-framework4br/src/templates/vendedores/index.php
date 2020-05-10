<div class="container">
    <h2 class="text-center">Vendedores</h2>
	<a class="btn btn-primary btn-sm" href="<?=URL . 'vendedores/add'; ?>">Add Vendedor</a>
    <div>
        <br>        
        <b>Lista de vendedores (dados vindos do model)</b><div class="text-right"><b>Soma de Vendedores: <?php echo $soma; ?></b></div>
        <table class="table table-hover table-stripped">
            <thead>
            <tr class="bg-gray">
                <td><b>ID</b></td>
                <td><b>Nome</b></td>
                <td><b>E-mail</b></td>
                <td colspan="2" align="center">AÇÕES</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($todos as $vendedor) { ?>
                <tr>
                    <td><?php if (isset($vendedor->id)) echo htmlspecialchars($vendedor->id, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($vendedor->nome)) echo htmlspecialchars($vendedor->nome, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><?php if (isset($vendedor->email)) echo htmlspecialchars($vendedor->email, ENT_QUOTES, 'UTF-8'); ?></td>
                    <td><a href="<?php echo URL . 'vendedores/delete/' . htmlspecialchars($vendedor->id, ENT_QUOTES, 'UTF-8'); ?>">delete</a></td>
                    <td><a href="<?php echo URL . 'vendedores/edit/' . htmlspecialchars($vendedor->id, ENT_QUOTES, 'UTF-8'); ?>">edit</a></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>
