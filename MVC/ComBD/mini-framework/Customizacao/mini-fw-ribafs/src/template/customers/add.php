<div class="container">
    <h2 class="text-center">Customers</h2>
    <div>
        <br>
        <form action="<?php echo URL; ?>customers/add" method="POST">   
        <table class="table table-hover table-stripped">
            <tr><td><label>Name</label></td>
            <td><input class="form-control" type="text" name="name" value="" required /></td></tr>
            <td><label>E-mail</label></td>
            <td><input class="form-control" type="email" name="email" value="" required /></td></tr>
            <td><label>Birthday</label></td>
            <td><input class="form-control" type="date" name="birthday" value="" /></td></tr>
            <tr><td></td><td><input type="submit" name="submit_add_customer" value="Add Customer" class="btn btn-primary btn-sm"/></td></tr>
		</table>
        </form>
    </div>
</div>
