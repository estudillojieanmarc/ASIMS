<?php

if (isset($_POST["getNewOrderItem"])) {
	?>
	   <tr>
            <td class="text-center" scope="row"><b class="number">1</b></td>
            <td>
                <div class="row d-flex">
                    <div class="col d-flex">
                        <input id="barcode" style="width:10rem;" class="form-control form-control-sm me-0 bg-light" type="text" placeholder="Enter the barcode" aria-label="Search">
                        <button id="searchBcode" class="btn btn-outline-secondary btn-sm" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </td>
            <td><input name="itemName[]" id="itemName" type="text" class="itemName form-control form-control-sm bg-light" style="width:10rem;" readonly></td>
            <td><input name="itemStock[]" id="itemStock" type="text" class="form-control form-control-sm bg-light" style="width:8rem;" readonly></td>
            <td><input name="itemPrice[]" id="itemPrice" type="text" class="form-control form-control-sm bg-light" style="width:8rem;" readonly></td>
            <td><input name="itemQty" id="itemQty" type="number" min="0" class="form-control form-control-sm bg-light text-center"  placeholder="Enter Qty" style="width:8rem;" required></td>
            <td class="text-danger fw-bold">P<span id="grandTotal" style="width:8rem;" readonly></span>.00</td>
        </tr>
	<?php
	exit();
}


?>