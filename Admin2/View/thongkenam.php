<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Document</title>
<!-- Load the AJAX API -->
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript">
google.load('visualization', '1.0', {'packages':['corechart']});
google.setOnLoadCallback(drawVisualization);

function drawVisualization() {
    // B1: Tạo bảng dữ liệu
    var data = new google.visualization.DataTable();
    // Lấy dữ liệu từ PHP và truyền vào biến JavaScript
    var rows = [
        <?php
        $hh = new hanghoa();
        $result = $hh->thongKeTheoNam(2024); // Lấy dữ liệu thống kê cho năm 2023 (hoặc 2024)
        foreach ($result as $month => $values) {
            echo "['Tháng $month', " . $values['doanh_thu'] . ", " . $values['so_luong_san_pham'] . "],";
        }
        ?>
    ];

    data.addColumn('string', 'Tháng');
    data.addColumn('number', 'Doanh thu');
    data.addColumn('number', 'Số lượng sản phẩm');
    data.addRows(rows);

    // B2: Tạo những options
    var options = {
        title: 'Thống kê doanh thu và số lượng sản phẩm theo năm',
        width: 600,
        height: 500,
        backgroundColor: '#ffffff',
        legend: { position: 'top' } // Hiển thị chú thích ở trên biểu đồ
    };

    // B3: Tiến hành vẽ biểu đồ
    var chart = new google.visualization.PieChart(document.getElementById('chart_div')); // Đổi thành PieChart
    chart.draw(data, options);
}
</script>
<style>
.thongke {
    margin-left: 200px;
}
</style>
</head>
<body>
<div class="thongke">
    <div style="width:100%;" id="chart_div">dfsf</div>
    <!-- Thêm dropdown để chọn năm -->
   
</div>
</body>
</html>
