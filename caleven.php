<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Calendar from 1971</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<style>
    body{
      background: linear-gradient(to right, black ,white);
      color:white;
      opacity:0.9;
    }
    .week{
            /* position: absolute; */
            margin: auto;
            height: 30px;
            width: 100%;
            text-align: center;
            right: 0;
            left: 0;
            bottom: 30%;
            }
</style>
<body>
    <?php
        $today_year = date('Y');
        $today_month = date('F');
        $today_date = date('d');
        $month = 8;
        $year  = 2020;
        $empty ="";
        if(isset($_POST['btnShow'])){
            $month = $_POST['month'];
            $year  = $_POST['year'];
        } 
        if(isset($_POST['next']) && $_POST['month']<12 ){
                
                echo   $month =   $_POST['month']+ 1;
        } 
        if(isset($_POST['back']) && $_POST['month']>1 ){
                
            echo   $month =   $_POST['month'] - 1;
    } 
    



        $arr = array("January"=>1,"February"=>2, "March"=>3,"April"=>4,
                    "May"=>5,"June"=>6 ,"July"=>7, "August"=>8 ,
                    "September"=>9, "October"=>10 ,"November"=>11, "December"=>12
                    );

    //selection of month and year date is selected as 1
    $date = mktime(0,0,0,$month,1,$year);
    //get the month name
    $month_name = date('F',$date);
    //get the days in the month
     $total_days = cal_days_in_month(0,$month,$year);
   //get at which weekday month get start weekday 
     $first_weekday_of_month = date('D',$date);
    
    switch($first_weekday_of_month){
        case "sun" : $empty = 0 ; break;
        case "Mon" : $empty = 1 ; break;
        case "Tue" : $empty = 2 ; break;
        case "Wed" : $empty = 3 ; break;
        case "Thu" : $empty = 4 ; break;
        case "Fri" : $empty = 5 ; break;
        case "Sat" : $empty = 6 ; break;
    }
    $day_count = 1;
    $day_num = 1;
    ?>
        <div class="container mt-2">
            <div class="header">
            <h2 class="header border border-warning bg-info text-white text-center rounded-circle mb-5">EVENT CALENDER</h2>
            </div>
            <div class="mx-auto">
                <form action="" method="POST" class="form-inline ml-3">    
                    <select name="month" class="form-control col-sm-2 ml-3">
                        <option value="1">Select Month</option>
                            <?php  foreach($arr as $key=>$value){ ?>
                        <option <?php if($month == $value) echo 'selected'; ?> value="<?= $value ?>"><?= $key ?></option>
                            <?php }?>
                    </select>
                    <select name="year"class="form-control col-sm-2 ml-3" >
                        <option value="2020">Select Year</option>
                            <?php for($i=1971; $i<=2050;$i++){?>
                        <option <?php if($i==$year) echo 'selected';?> value="<?=$i?>"> <?=$i?> </option>
                            <?php } ?>
                    </select>
                    <input type="submit" name="btnShow" value="Show" class="btn btn-warning ml-3">
                    
            
            </div>
        </div>
<!--Table to display the days and dates of the week, just a small calendar layout-->
            <div class="content mt-4">
                <table class="week table table-bordered text-warning">
                    <tr>
                        <th colspan="7" class="text-uppercase text-white">
                            <h1 <?php if($today_month==$month_name){ ?> style="color:red;" <?php }?> ><button type="submit" name="back" class="btn btn-outline-warning">&#10092;</button> <?= $month_name?> <?= $today_year?> <button type="submit" name="next" class="btn btn-outline-warning">&#10093;</button></h1>
                            <!-- <form action="" method="post"><input type="submit" value="next" name="nextMonth"></form>   -->
                             
                </form>
                    </th >
                    </tr>
                    <tr class="text-success">
                        <th>Sun</th>
                        <th>Mon</th>
                        <th>Tue</th>
                        <th>Wed</th>
                        <th>Thu</th>
                        <th>Fri</th>
                        <th>Sat</th>
                    </tr>
                    <tr>
                        <?php while($empty > 0){ ?>
                            <td id='d1' class="bg-secondary"></td>                          
                        <?php $empty =$empty-1 ;$day_count++; } 
                       
                         while($day_num<=$total_days){?>
                        <td  <?php if($today_date==$day_num && $today_month==$month_name){ ?> style="background-color:red; color:white; font-size:20px;" <?php }?> ><?= $day_num ?></td>
                        
                        <?php  
                        $day_num++;
                        $day_count++;
                            if($day_count>7){
                                $day_count = 1;
                        ?>
                             </tr>
                            <?php }} 
                            while($day_count>1 && $day_count<=7){ ?>
                              <td id='d1' class="bg-light"></td>  
                            <?php $day_count++; }?>
                            </tr>

            </table>
            </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</body>
</html>
<?php 



?>