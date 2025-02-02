 <?php 
// echo "<pre>";
// print_r($details);
// die();
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>RMS</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">

    <style>
        main{
            display:flex;
            width:100%;
            height:100%;
        }
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    
    .homediv{
        width:75%;
        height:100%;
        margin:1% 3% 0% 3%;    
    }

      /* Style the button that opens the dropdown */
.dropbtn {
  background-color: #202121;
  color: white;
  padding: 16px;
  font-size: 16px;
    border: none;
  cursor: pointer;
}
/* Add a dropdown icon to the .dropbtn element */
.dropbtn::after {
  content: "";
  display: inline-block;
  margin-left: 15px;
  width: 0;
  height: 0;
  border-style: solid;
  border-width: 5px 5px 0 5px;
  border-color: white transparent transparent transparent;
}


/* Style the dropdown content (hidden by default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f1f1f1;
  min-width: 160px;
  z-index: 1;
}

/* Style the links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {
  background-color: #ddd;
}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #202121;
}

    </style>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
  </head>
<body>
  <main>  
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark" style="width: 250px;height:100vh;">
    <h4><?php echo $_SESSION['user']; ?></h4>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="<?php echo base_url('Home') ?>" class="nav-link text-white" aria-current="page">Home</a>
      </li>

      <li class="nav-item">
        <a href="<?php echo base_url('EntryForm') ?>" class="nav-link text-white" aria-current="page">Entry Form</a>
      </li>
     <div class="dropdown">
  <button class="dropbtn">Report</button>
  <div class="dropdown-content">

    <a href="<?php echo base_url('Report/select_property_for_report_monthwise') ?>">Main Report</a>
    <a href="<?php echo base_url('Report/outstanding_amount') ?>">Outstanding Report</a>
    <a href="<?php echo base_url('Report/receiver_expenditure') ?>">Receiver Expenditure</a>
    <a href="<?php echo base_url('Report/receiver_report') ?>">Receiver Report</a>
    <a href="<?php echo base_url('Report/TR_Report') ?>">TR Report</a>
    <!-- <a class="dropdown-item" href="<?php echo base_url('Report/TR_Report?property_id=' . $property_id) ?>">TR Report</a> -->
  </div>
</div>

<!-- <li>
        <a href="<?php echo base_url('Home/user_entry') ?>" class="nav-link text-white" aria-current="page">User Entry</a>
      </li> -->
     
    </ul>
    <hr>
  </div>

<div class="homediv">

<h2 style="color:red; font-style:italic; font-weight:bold;"> Common Entry Form </h2>
<div class="containe-fluid">
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">
<form action="<?php echo base_url('EntryForm/flats');?>" method="get">

    <div class="row">
    <div class="form-group col">
    <label for="month">Month</label>
    <input type="month" class="form-control" id="month" name="month" value="<?php echo $month; ?>" placeholder="Select the Month">
    </div> 
  </div>
  <br>

  <div class="row">
    <div class="form-group col">
    <label for="rate_per_unit">Electricity Rate per Unit:</label>
    <input type="text" class="form-control" id="rate_per_unit" name="rate_per_unit"  placeholder="Enter the Rate of Electricity " value="<?php if(!empty($details[0]['electricity_rate'])){echo $details[0]['electricity_rate'];}else{echo "";} ?>">
    </div>
  </div>

     <br>

  <div class="row">
    <div class="form-group col">
    <label for="rate_per_person">Water Pump Unit:</label>
    <input type="text" class="form-control" id="rate_per_person" name="rate_per_person"  placeholder="Enter Water Pump Unit" value="<?php if(!empty($details[0]['water_rate'])){echo $details[0]['water_rate'];}else{echo "";} ?>">
    </div> 
  </div>
<br>
  <div class="row">
    <div class="form-group col">
    <label for="waste">Waste</label>
    <input type="text" class="form-control" id="waste" name="waste"  placeholder="Enter Waste Amount" value="<?php if(!empty($details[0]['waste'])){echo $details[0]['waste'];}else{echo "0";} ?>">
    </div>
  </div>

  <br>
  <div class="row">
    <div class="form-group col">
    <label for="Entry_type">Entry Type (Property Wise / Flatwise)</label>
    <select class="form-control" name="entry_type">
        <!--<option value="">Select Entry Type</option>-->
         <option value="2">Individual</option>
        <option value="1">Combined (all flats)</option>
       
    </select>
    </div>
  </div>
  
  <br>
 <!-- 
    <input type="hidden" name="flat_no" value="<?php echo $flat_no; ?>" >
  <input type="hidden" name="property_id" value="<?php echo $property_id; ?>" >
  <input type="hidden" name="property_name" value="<?php echo $property_name; ?>" >
  <input type="hidden" name="no_of_flats" value="<?php echo $no_of_flats; ?>" >
  <input type="hidden" name="active_status" value="<?php echo $active_status; ?>" > 
 -->
<input type="hidden" name="property_id" value="<?php echo $property_id; ?>" >

  <!-- <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div> -->
  <button type="submit" class="btn btn-primary" value="Submit">Submit</button>
</form>

</div></div></div></div></div></div>
</main>
</body>
</html>