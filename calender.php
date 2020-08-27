<?php
 $mon = 1;
 $yar = 1971;
?>
<form action="" method="POST">
    <input type="number" name="month" min="1" max="12" value="8">
    <input type="number" name="year"min="1971" max="2050" value="2020">
    <input type="submit" name="btnSubmit" value="submit">

    
  

</form>
<?php 
   if(isset($_POST['btnSubmit'])){
    $mon = $_POST['month'];
    $yar = $_POST['year'];

}
 // This gets today's date 
  $date = time() ; 
 //$todayDate = getdate('d-m-y',$date);

 // This puts the day, month, and year in seperate variables 
 $day = date('d', $date) ; 
 $month = date('m', $date) ; 
 $year = date('Y', $date) ;
   $today = date('d/m/y',$date); 
 // Here we generate the first day of the month 
  $first_day = mktime(0,0,0, $mon, 1, $yar) ; 

 // This gets us the month name 
 $title = date('F', $first_day);
 
 //Here we find out what day of the week the first day of the month falls on 
 $day_of_week = date('D', $first_day) ; 

 /*Once we know what day of the week it falls on, we know how many
   blank days occure before it. If the first day of the week is a 
  Sunday then it would be zero*/

 switch($day_of_week){ 
     case "Sun": $blank = 0; break; 
     case "Mon": $blank = 1; break; 
     case "Tue": $blank = 2; break; 
     case "Wed": $blank = 3; break; 
     case "Thu": $blank = 4; break; 
     case "Fri": $blank = 5; break; 
     case "Sat": $blank = 6; break; 
 }

 //We then determine how many days are in the current month
 
 $days_in_month = cal_days_in_month(0, $month, $year) ; 
 
 /*Here we take a closer look at the days of the month and prepare to make 
   our calendar table  . The first thing we do is determine what day of the week 
   the first of the month falls. Once we know that, we use the switch () function 
   to determine how many blank days we need in our calendar before the first day.*/
 //Here we start building the table heads 
 echo "<table border=2 width=294>";
 echo "<tr><th colspan=7> $title $year </th></tr>";
 echo "<tr><td width=42>S</td><td width=42>M</td><td 
     width=42>T</td><td width=42>W</td><td width=42>T</td><td 
     width=42>F</td><td width=42>S</td></tr>";

 //This counts the days in the week, up to 7
 $day_count = 1;

 echo "<tr>";
 //first we take care of those blank days
 while ( $blank > 0 ) 
 { 
    
      echo "<td style='background-color:mistyrose;'></td>"; 
     $blank = $blank-1; 
     $day_count++;
 }

 /*The first part of this code very simply echos the table tags, the month name, 
   and the headings for the days of the week. Then we start a while loop. 
   What we are doing is echoing empty table details, one for each blank day 
   we count down. Once the blank days are done it stops. At the same time, 
   our $day_count is going up by 1 each time through the loop. This is to keep 
   count so that we do not try to put more than seven days in a week.*/

/*To finish our calendar we use one last while loop. This one fills in the 
  rest of our calendar with blank table details if needed. 
  Then we close our table and our script is done.*/

//sets the first day of the month to 1 
 $day_num = 1;

 //count up the days, untill we've done all of them in the month
 while ( $day_num <= $days_in_month ) 
 { 
    echo "<td>$day_num</td>";
     //echo " $day_num "; 
     $day_num++; 
     $day_count++;
     //Make sure we start a new row every week
     if ($day_count > 7)
     {
         //echo "";
         $day_count = 1;
         echo "</tr>";
     }
 }

/*Now we need to fill in the days of the month. We do this with another while loop, 
  but this time we are counting up to the last day of the month. Each cycle echos 
  a table detail with the day of the month, and it repeats until we reach the last 
  day of the month. Our loop also contains a conditional statement. This checks 
  if the days of the week have reached 7, the end of the week. If it has, 
  it starts a new row, and resets the counter back to 1 (the first day of the week).*/

 //Finaly we finish out the table with some blank details if needed
 while ( $day_count >1 && $day_count <=7 )
 {
     echo "<td style='background-color:mistyrose;'></td>";
     $day_count++;
 }

 echo "</tr></table>";


 /*echo "</table border='1'>";
 while ( $day_num <= $days_in_month )  {
    $cnt=0;
    echo "<tr>";
  while ($cnt < 7) {
    echo " <td>$day_num</td> ";
    $day_num++;
    $day_count++;
    $cnt++;
    if ($day_num > $days_in_month) {exit;}
  }
 echo "</tr>";
}
echo "</tr></table>";*/
 ?>
