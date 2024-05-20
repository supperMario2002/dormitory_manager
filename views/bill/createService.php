<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="http://localhost/dormitory_manager/">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Đặt dịch vụ</li>
                </ol>
            </div>
            <h4 class="page-title">Đặt dịch vụ</h4>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="" method="post">
                    <div class="row">
                        <div class="col-xl-3 "></div>
                        <div class="col-xl-6 ">
                            <?php if (isset($_COOKIE["err"])) : ?>
                            <div class="alert alert-danger " role="alert">
                                <?= $_COOKIE["err"]; ?>
                            </div>
                            <?php endif; ?>

                            <div class="mb-3">
                                <label for="service_id" class="form-label">Loại dịch vụ</label>
                                <select class="form-select" id="service_id" name="service_id" onchange="updatePrice()">
                                    <?php foreach($data["services"] as $value) { ?>
                                    <option value="<?php echo $value["id"]; ?>"
                                        data-price="<?php echo $value["price"]; ?>" data-des="<?php echo $value["describe"]; ?>"><?php echo $value["name"]; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <input type="hidden" id="service_price" name="service_price" value="">
                                <label for="display_price" class="form-label">Giá</label>
                                <input type="text" class="form-control" id="display_price" readonly>
                            </div>

                            <div class="mb-3">
                                <label for="quanlity" class="form-label">Số lượng</label>
                                <input type="number" class="form-control" id="quanlity" name="quanlity"
                                    placeholder="Số lượng" required oninput="calculateTotal()">
                            </div>

                            <div class="mb-3">
                                <label for="describe" class="form-label">Mô tả</label>
                                <textarea class="form-control" id="describe" name="describe" readonly></textarea>
                            </div>

                            <div class="mb-3">
                                <label for="total_price" class="form-label">Tổng tiền</label>
                                <input type="text" class="form-control" id="total_price" name="total_price" readonly>
                            </div>


                            <button type="submit" name="submit" class="btn btn-success">Gửi yêu cầu</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<script>
function formatNumber(num) {
    return num.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function updatePrice() {
    var select = document.getElementById("service_id");
    var price = select.options[select.selectedIndex].getAttribute("data-price");
    var des = select.options[select.selectedIndex].getAttribute("data-des");
    var formattedPrice = formatNumber(price);
    document.getElementById("service_price").value = price;
    document.getElementById("describe").value = des;
    document.getElementById("display_price").value = formattedPrice;
    calculateTotal();
}

function calculateTotal() {
    var price = document.getElementById("service_price").value;
    var quantity = document.getElementById("quanlity").value;
    var total = price * quantity;
    var formattedTotal = formatNumber(total);
    document.getElementById("total_price").value = formattedTotal;
}

</script>