<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-4">
        <h3>
            <?php
        session_start();

        if (isset($_POST['submit'])) {
            $exchange = $_POST['exchange'];
            $cost = $_POST['cost'];

            if ($exchange >= $cost) {
                $change = $exchange - $cost;
                
                function return_money($m)
                {
                    $debug = 1;
                    $m *= 100;
                    $x100 = array(
                        '50000' => 'แบงค์ 500',
                        '10000' => 'แบงค์ 100',
                        '5000' => 'แบงค์ 50',
                        '1000' => 'เหรียญ 10',
                        '500' => 'เหรียญ 5',
                        '100' => 'เหรียญบาท',
                    );

                    $n = array();
                    if ($debug) echo 'จำนวนเงินที่ต้องทอน ' . ($m / 100) . ' บาท <br' . '>';
                    foreach ($x100 as $x => $name) {
                        $r = $m % $x;
                        $idx = (string)($x / 100);
                        $n[$idx] = ($m - $r) / $x;
                        $m = $r;
                        if ($debug)
                            if (!empty($n[$idx])) echo $name . ' จำนวน '  . $n[$idx] . '<br' . '>';
                    }
                    return $n;
                }

                $exchange = $change;
                $moneys = return_money($exchange);
                print_r($moneys);
            }
        }
        ?></h3>

    </div>


    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>