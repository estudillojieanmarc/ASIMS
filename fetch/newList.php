<?php

if (isset($_POST["getNewOrderItem"])) {
	?>
	   <tr>
            <td class="text-center" scope="row"><b class="number">1</b></td>
            <td>
                <div class="row d-flex">
                    <div class="col d-flex">
                        <input id="barcode" style="width:10rem;" class="barcode form-control text-center form-control-sm me-0 bg-light" type="text" placeholder="Enter the barcode" aria-label="Search">
                        <button id="searchBcode" class="searchBcode btn btn-outline-secondary btn-sm" type="button"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                </div>
            </td>
            <td><input name="itemName[]" id="itemName" type="text" class="form-control text-center form-control-sm bg-light" style="width:10rem;" readonly></td>
            <td><input name="itemStock[]" id="itemStock" type="text" class="form-control text-center form-control-sm bg-light" style="width:8rem;" readonly></td>
            <td><input name="itemPrice[]" id="itemPrice" type="text" class="form-control text-center form-control-sm bg-light" style="width:8rem;" readonly></td>
            <td><input name="itemQty" id="itemQty" type="number" min="0" class="form-control text-center form-control-sm bg-light text-center"  placeholder="Enter Qty" style="width:8rem;" required></td>
            <td class="text-danger fw-bold px-3 text-center"><span id="grandTotal" style="width:8rem;" readonly></span></td>
        </tr>
	<?php
	exit();
}


?>