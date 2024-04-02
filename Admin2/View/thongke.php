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
    // Create a data table
    var data = new google.visualization.DataTable();
    var rows = [];

    <?php
    $hh = new hanghoa();
    $result = $hh->getThongke();
    $colors = ['#FF5733', '#FFBD33', '#33FF57', '#33A6FF', '#9933FF', '#FF33A6', '#FF3333', '#33FFBD', '#3360FF', '#8A33FF'];
    $i = 0;
    while($set = $result->fetch()) {
        $tenhh = $set['tenhh'];
        $soluong = $set['soluong'];
        $color = $colors[$i % count($colors)];
        echo "rows.push(['$tenhh', $soluong, '$color']);";
        $i++;
    }
    ?>

    data.addColumn('string', 'Tên hàng hóa');
    data.addColumn('number', 'Số lượng bán');
    data.addColumn({type: 'string', role: 'style'});
    data.addRows(rows);

    // Create options
    var options = {
        title: 'Thống kê số lượng bán',
        width: 600,
        height: 500,
        backgroundColor: '#ffffff'
    };

    // Draw the pie chart
    var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
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
    <select name="" id="">
        <option value="2023">2023</option>
        <option value="2023">2024</option>
    </select>
</div>
</body>
</html>
