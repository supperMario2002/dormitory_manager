<?php
$tongtiendien = array();
$tongtiennuoc = array();
$trong = count(array_filter($data['checkStudent'], function($value) {return $value['count'] == 0;}));
$thieu =  count($data['checkStudent'])-count(array_filter($data['checkStudent'], function($value) {return $value['count'] == 0;}));
for ($month = 1; $month <= 12; $month++) {
    $bills_in_month = array_filter($data['get_all_bills'], function($item) use ($month) {
        return date('n', strtotime($item['end_date'])) == $month;
    });
    $total_electricity = array_reduce($bills_in_month, function($carry, $item) {
        return $carry + ($item['e_last'] - $item['e_first']) * $item['price_per_e'];
    }, 0);
    $total_water = array_reduce($bills_in_month, function($carry, $item) {
        return $carry + ($item['w_last'] - $item['w_first']) * $item['price_per_w'];
    }, 0);
    array_push($tongtiendien, $total_electricity);
    array_push($tongtiennuoc, $total_water);
}
$tongtiendien = '[' . implode(',', $tongtiendien) . ']';
$tongtiennuoc = '[' . implode(',', $tongtiennuoc) . ']';
$tongtienphong = array_map(function($item) {
    return $item['total_room_price'];
}, $data["get_money_room"]);
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
            </div>
            <h4 class="page-title">Trang chủ</h4>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-xl-12 col-lg-12">
        <div class="row">
            <div class="col-sm-4">
                <div class="side-nav-title side-nav-item">Số liệu phòng</div>
                <canvas id="chartRooms" width="50" height="50"></canvas>
            </div>
            <div class="col-sm-4">
                <div class="side-nav-title side-nav-item">Số liệu sinh viên</div>
                <canvas id="chartStudent" width="50" height="50"></canvas>
            </div>
            <div class="col-sm-4">
                <div class="side-nav-title side-nav-item">Số liệu người dùng</div>
                <canvas id="chartAccouts" width="50" height="50"></canvas>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="side-nav-title side-nav-item">Thống kê tiền điện nước theo tháng</div>
                <canvas id="chartMoney" width="200" height="50"></canvas>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-sm-12">
                <div class="side-nav-title side-nav-item">Thống kê tiền phòng theo tháng</div>
                <canvas id="chartMoneyRoom" width="200" height="50"></canvas>
            </div>
        </div>
    </div>
</div>

<script>
var ctxRoom = document.getElementById('chartRooms').getContext('2d');
var chartRooms = new Chart(ctxRoom, {
    type: 'pie',
    data: {
        labels: ['Phòng trống', 'Phòng chưa ghép đủ', 'Phòng đủ người'],
        datasets: [{
            label: 'Tổng số phòng',
            data: [<?php echo $trong ?>, <?php echo $thieu?>,
                <?php echo count($data['rooms'])- ($trong + $thieu); ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
var ctxAccout = document.getElementById('chartAccouts').getContext('2d');
var chartAccouts = new Chart(ctxAccout, {
    type: 'pie',
    data: {
        labels: ['Tài khoản bị khóa', 'Tài khoản hoạt động'],
        datasets: [{
            label: 'Tổng số tài khoản',
            data: [<?php $dem1 = 0; foreach($data['users'] as $value){if($value['status'] == 0){ $dem1++;}} echo $dem1;?>,
                <?php echo count($data['users'])-$dem1; ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
var ctxStudent = document.getElementById('chartStudent').getContext('2d');
var chartStudent = new Chart(ctxStudent, {
    type: 'pie',
    data: {
        labels: ['Số sinh viên hiệu lực hợp đồng', 'Số sinh viên hết hạn hợp đồng'],
        datasets: [{
            label: 'Tổng số tài khoản',
            data: [<?php echo count($data['students']) - count($data['students_end']); ?>,
                <?php echo count($data['students_end']); ?>
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});
var ctxMoney = document.getElementById('chartMoney').getContext('2d');
var chartMoney = new Chart(ctxMoney, {
    type: 'scatter',
    data: {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7", "Tháng 8",
            "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"
        ],
        datasets: [{
            type: 'bar',
            label: 'Tiền điện',
            data: <?=$tongtiendien?>,
            borderColor: 'rgb(255, 99, 132)',
            backgroundColor: 'rgba(255, 99, 132, 0.2)'
        }, {
            type: 'line',
            label: 'Tiền nước',
            data: <?=$tongtiennuoc?>,
            fill: false,
            borderColor: 'rgb(54, 162, 235)'
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
})
var ctxMoneyRoom = document.getElementById('chartMoneyRoom').getContext('2d');
var chartMoneyRoom = new Chart(ctxMoneyRoom, {
    type: 'bar',
    data: {
        labels: ["Tháng 1", "Tháng 2", "Tháng 3", "Tháng 4", "Tháng 5", "Tháng 6", "Tháng 7",
            "Tháng 8",
            "Tháng 9", "Tháng 10", "Tháng 11", "Tháng 12"
        ],
        datasets: [{
            label: 'Dữ liều tiền phòng',
            data: <?php echo json_encode($tongtienphong);  ?>,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 159, 64, 0.2)',
                'rgba(255, 205, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(201, 203, 207, 0.2)',
                'rgba(255, 0, 0, 0.2)', // Đỏ
                'rgba(0, 255, 0, 0.2)', // Xanh lá
                'rgba(0, 0, 255, 0.2)', // Xanh dương
                'rgba(255, 255, 0, 0.2)', // Vàng
                'rgba(255, 165, 0, 0.2)' // Cam
            ],
            borderColor: [
                'rgb(255, 99, 132)',
                'rgb(255, 159, 64)',
                'rgb(255, 205, 86)',
                'rgb(75, 192, 192)',
                'rgb(54, 162, 235)',
                'rgb(153, 102, 255)',
                'rgb(201, 203, 207)',
                'rgb(255, 0, 0)', // Đỏ
                'rgb(0, 255, 0)', // Xanh lá
                'rgb(0, 0, 255)', // Xanh dương
                'rgb(255, 255, 0)', // Vàng
                'rgb(255, 165, 0)' // Cam
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
})
</script>