

<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=ISO-8859-1" >
  <title>htmlDatePicker Test Page (CFML)</title>
 </head>
<body>
<form>
<?php
$current_month = date("m");
$current_day = date("d");
$current_year = date("Y");
?>

<select name="month">
<option value="01" <?php if($current_month == "01"){ echo "selected"; } 
?>>January</option>
<option value="02" <?php if($current_month == "02"){ echo "selected"; } 
?>>February</option>
<option value="03" <?php if($current_month == "03"){ echo "selected"; } 
?>>March</option>
<option value="04" <?php if($current_month == "04"){ echo "selected"; } 
?>>April</option>
<option value="05" <?php if($current_month == "05"){ echo "selected"; } 
?>>May</option>
<option value="06" <?php if($current_month == "06"){ echo "selected"; } 
?>>June</option>
<option value="07" <?php if($current_month == "07"){ echo "selected"; } 
?>>July</option>
<option value="08" <?php if($current_month == "08"){ echo "selected"; } 
?>>August</option>
<option value="09" <?php if($current_month == "09"){ echo "selected"; } 
?>>September</option>
<option value="10" <?php if($current_month == "10"){ echo "selected"; } 
?>>October</option>
<option value="11" <?php if($current_month == "11"){ echo "selected"; } 
?>>November</option>
<option value="12" <?php if($current_month == "12"){ echo "selected"; } 
?>>December</option>
</select>

<select name="day">
<option value="1" <?php if($current_day == "01"){ echo "selected"; } 
?>>01</option>
<option value="2" <?php if($current_day == "02"){ echo "selected"; } 
?>>02</option>
<option value="3" <?php if($current_day == "03"){ echo "selected"; } 
?>>03</option>
<option value="4" <?php if($current_day == "04"){ echo "selected"; } 
?>>04</option>
<option value="5" <?php if($current_day == "05"){ echo "selected"; } 
?>>05</option>
<option value="6" <?php if($current_day == "06"){ echo "selected"; } 
?>>06</option>
<option value="7" <?php if($current_day == "07"){ echo "selected"; } 
?>>07</option>
<option value="8" <?php if($current_day == "08"){ echo "selected"; } 
?>>08</option>
<option value="9" <?php if($current_day == "09"){ echo "selected"; } 
?>>09</option>
<option value="10" <?php if($current_day == "10"){ echo "selected"; } 
?>>10</option>
<option value="11" <?php if($current_day == "11"){ echo "selected"; } 
?>>11</option>
<option value="12" <?php if($current_day == "12"){ echo "selected"; } 
?>>12</option>
<option value="13" <?php if($current_day == "13"){ echo "selected"; } 
?>>13</option>
<option value="14" <?php if($current_day == "14"){ echo "selected"; } 
?>>14</option>
<option value="15" <?php if($current_day == "15"){ echo "selected"; } 
?>>15</option>
<option value="16" <?php if($current_day == "16"){ echo "selected"; } 
?>>16</option>
<option value="17" <?php if($current_day == "17"){ echo "selected"; } 
?>>17</option>
<option value="18" <?php if($current_day == "18"){ echo "selected"; } 
?>>18</option>
<option value="19" <?php if($current_day == "19"){ echo "selected"; } 
?>>19</option>
<option value="20" <?php if($current_day == "20"){ echo "selected"; } 
?>>20</option>
<option value="21" <?php if($current_day == "21"){ echo "selected"; } 
?>>21</option>
<option value="22" <?php if($current_day == "22"){ echo "selected"; } 
?>>22</option>
<option value="23" <?php if($current_day == "23"){ echo "selected"; } 
?>>23</option>
<option value="24" <?php if($current_day == "24"){ echo "selected"; } 
?>>24</option>
<option value="25" <?php if($current_day == "25"){ echo "selected"; } 
?>>25</option>
<option value="26" <?php if($current_day == "26"){ echo "selected"; } 
?>>26</option>
<option value="27" <?php if($current_day == "27"){ echo "selected"; } 
?>>27</option>
<option value="28" <?php if($current_day == "28"){ echo "selected"; } 
?>>28</option>
<option value="29" <?php if($current_day == "29"){ echo "selected"; } 
?>>29</option>
<option value="30" <?php if($current_day == "30"){ echo "selected"; } 
?>>30</option>
<option value="31" <?php if($current_day == "31"){ echo "selected"; } 
?>>31</option>
</select>

<select name="year">
<option value="2008" <?php if($current_year == "2008"){ echo "selected"; } 
?>>2008</option>
<option value="2009" <?php if($current_year == "2009"){ echo "selected"; } 
?>>2009</option>
<option value="2010" <?php if($current_year == "2010"){ echo "selected"; } 
?>>2010</option>
<option value="2011" <?php if($current_year == "2011"){ echo "selected"; } 
?>>2011</option>
<option value="2012"  <?php if($current_year == "2012"){ echo "selected"; } 
?>>2012</option>
<option value="2013"  <?php if($current_year == "2013" ){ echo "selected"; } 
?>>2013</option>
<option value="2014"  <?php if($current_year == "2014"){ echo "selected"; } 
?>>2014</option>
<option value="2015"  <?php if($current_year == "2015"){ echo "selected"; } 
?>>2015</option>
</select>

</form>
</body>
</html>