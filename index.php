<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>lab1</title>


  <link href="style.css" rel="stylesheet">
  <script defer src="validation.js"></script>
    <script defer src="canvasXOY.js"></script>
    <script defer src="checkAdd.js"></script>
    <style>
        body {
            background-color: #02f;
        }
        #main_form {
            width: 1000px;
            margin: 0 auto;
        }
        h3 {
            color: white;
        }
        #result {
            width: 100%;
        }
        #result td {
            border-bottom: 1px solid black;
            text-align: center;
            cursor: pointer;
            color: white;
        }
        #result tr:hover {
            background-color: lightgrey;

        }
        #result tr:hover td{
            color: black;
        }
        #result th {
            background-color: black;
            color: white;
        }
    </style>
</head>
<body>
    <header>
        <div class="name">
            <h1>Бинов Даниил</h1>
            <h2 class="var_and_group">группа 32312 <br> вариант 3203</h2>
          </div>
    </header>
    <div class="bordered canvasContainer">
                <canvas style="margin-left: 4.4%;" id="graph" width="350" height="350">
            <span>
              <img src="data/XOY.png" alt="Task grpah" width="350" height="350" />
            </span>
                </canvas>
            </div>
  <form id="main_form" action="" method="GET">
  <fieldset>
    <legend>X:</legend>

    <input value="-4" type="checkbox" id="x_-4" name="X_checkbox" onchange="add_X_value(this.id)"><label for="x_-4">-4</label><br>
    <input value="-3" type="checkbox" id="x_-3" name="X_checkbox" onchange="add_X_value(this.id)"><label for="x_-3">-3</label><br>
    <input value="-2" type="checkbox" id="x_-2" name="X_checkbox" onchange="add_X_value(this.id)"><label for="x_-2">-2</label><br>
    <input value="-1" type="checkbox" id="x_-1" name="X_checkbox" onchange="add_X_value(this.id)"><label for="x_-1">-1</label><br>
    <input value="0" type="checkbox" id="x_0" name="X_checkbox" onchange="add_X_value(this.id)"><label for="x_0">0</label><br>
    <input value="1" type="checkbox" id="x_1" name="X_checkbox" onchange="add_X_value(this.id)"><label for="x_1">1</label><br>
    <input value="2" type="checkbox" id="x_2" name="X_checkbox" onchange="add_X_value(this.id)"><label for="x_2">2</label><br>
    <input value="3" type="checkbox" id="x_3" name="X_checkbox" onchange="add_X_value(this.id)"><label for="x_3">3</label><br>
    <input value="4" type="checkbox" id="x_4" name="X_checkbox" onchange="add_X_value(this.id)"><label for="x_4">4</label><br>
    
</fieldset>
<input id="Y" name="Y" type="text" placeholder="(-3 , 3)">
<p id="error"></p>
<select id="R" name="R">
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
            </select>

    <input id="butt" onclick="funcClick()" class="button" type="button" value="Send">
    <input id="butt1" onclick="window.location='?clear'"  style="float:right;" class="button" type="button" value="Clear">
  </form>
    
  

  <?php
    session_start();
    if(isset($_GET['clear'])) {
	  unset($_SESSION['data']);
	  $data = [];
	} else {
        if (!isset($_SESSION['data'])) {
            $data = [];
        } else {
            $data = $_SESSION['data'];
        }
        if ((isset($_GET['X_checkbox']) && isset($_GET['Y']) && isset($_GET['R']))) {
            require_once 'validation.php';
            if (valid($_GET['X_checkbox'], $_GET['Y'], $_GET['R'])) {


                $curr_time = time();
                $start_time = microtime();

                $X = floatval($_GET['X_checkbox']);
                $Y = floatval($_GET['Y']);
                $R = floatval($_GET['R']);


                $result = ($Y>-$R && $Y < 0 && $X > -($R/2) && $X<0) || ($X>0 && $Y<0 && (($X*$X+$Y*$Y)<($R*$R/4))) ||($X>0 && $Y > 0 && ((-2*$X+$R)>($Y)));
                
               
                $work_time = microtime() - $start_time;
                $data[] = [$X, $Y, $R, $result, $curr_time, $work_time];
                $_SESSION['data'] = $data;
            }
        }
    }
  ?>
  <h3>table of test:</h3>
  <table id="result">
	<tr>
	  <th>№</th>
	  <th>X</th>
	  <th>Y</th>
	  <th>R</th>
	  <th>Result</th>
	  <th>time now<br/>server</th>
	  <th>time work<br/>script</th>
	</tr>
  <?php
    $n = 1;
	foreach($data as $d) {
		echo "<tr>";
		echo "<td>$n</td><td>$d[0]</td><td>$d[1]</td><td>$d[2]</td>";
		echo "<td>" . ($d[3] ? "hit" : "miss") . "</td>";
		echo "<td>" . date('d.m.Y H:i:s', $d[4]) . "</td>";
		echo "<td>" . number_format($work_time, 6, ".", "") . "</td>";
		echo "</tr>";
		$n++;
	}
  ?>	
  </table>

</body>
</html>
