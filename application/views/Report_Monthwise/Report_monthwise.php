<?php
// echo "<pre>";
// print_r($report_monthwise_details);
// die();  
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sidebars/">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->
    <link href="<?php echo base_url('css/sidebar.css') ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">

    <style>
        
        .on-print{
        display: none;
        }

        .box{
          padding: 20px 10px;
          max-width: 100%;
          margin: 0 auto;
        }

        .intro{
            font-family: Comic Sans MS;
        }

        table {
          background-color: #fcfbf8;
          font-family: Comic Sans MS;
          border-collapse: collapse;
          width: 100%;
        }

        th {
          
          color: black;
          font-size: 16px;
          font-weight: bold;
          text-align: center;
          padding: 10px;
          border: 1px solid #ddd;
        }

        td {
          text-align: center;
          padding: 10px;
          border: 1px solid #ddd;
        }

        tr:nth-child(even) {
          background-color: #f6f4eb;
        }

        tr:hover {
          background-color: #ddd;
        }

        tbody td:first-child {
          text-align: left;
        }

        tbody td:last-child {
          font-weight: bold;
          color: #0077b6;
        }

        body {
/*            background-color: #fcfbf8;*/
            color: black;
        }
        
    </style>
</head>
<body>
    <!-- <div class="containe-fluid"> -->
<div class="row mt-3 ml-3 mr-3">
<div class="col-lg-12">
<div class="card">
<div class="card-body">

                    <br>
                    <div class="intro">
                        <h2 style="text-align:center;">Month Wise Report</h2>
                        <br>
                    <table class="table table-striped table-hover table-bordered" style="width:90%" align="center">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col" style="text-align:center;">S.No.</th>
                            <th scope="col" style="text-align:center;">Month</th>
                            <th style="text-align:center;">Flat No.</th>
                            <th style="text-align:center;">Invoice No.</th>
                            <th scope="col" style="text-align:center;">Rent</th>
                            <th scope="col" style="text-align:center;">Meter Reading <br> (Current - Previous) * rate</th>
                            <th scope="col" style="text-align:center;">Water Pump Charges <br>( no. of members * rate )</th>
                            <th scope="col" style="text-align:center;">Waste </th>
                            <th scope="col" style="text-align:center;">Miscellaneous</th>
                            <th scope="col" style="text-align:center;">Total</th>
                            <th style="text-align:center;">Amount Paid</th>
                            <th scope="col" style="text-align:center;">Outstanding Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $i=1;
                                $amount=0;
                                $total_rent = 0;
                                $total_electricity = 0;
                                $total_water = 0;
                                $total_waste = 0;
                                $total_miscellaneous = 0;
                                $total_amount = 0;
                                $total_amount_paid =0;

                                foreach ($report_monthwise_details as $key => $value) { ?>
                                    
                            <tr>
                            <td scope="row" style="text-align:center;"><?php echo $i ?></td>
                            <td style="text-align:center;"><?php echo $value['month'] ?></td>
                            <td style="text-align:center;"><?php echo $value['flat_no'] ?></td>


                           <?php if(!empty($value['invoice_number'])) {?>
                              <td style="color:green;"><?php echo $value['invoice_number'];?> </td>
                              
                            <?php } else {?>
                              <td style="color:red;"><?php echo "Not Generated";?> </td>
                              <?php }?>

                              
                            <td style="text-align:center;"><?php echo $value['rent'] ?></td>


                            <!-- <td style="text-align:center;"><?php if($i==1){$amount = ($value['current_meter_reading']-$previous_reading)*$value['electricity_rate'];
                            echo "(".$value['current_meter_reading']." - ".$previous_reading.") * ".$value['electricity_rate']." = ".$amount;}else{
                                $amount = ($value['current_meter_reading']-$report_monthwise_details[$i-2]['current_meter_reading'])*$value['electricity_rate'];
                                echo "(".$value['current_meter_reading']." - ".$report_monthwise_details[$i-2]['current_meter_reading'].") * ".$value['electricity_rate']." = ".$amount;
                            }
                            $total_electricity += $amount;
                             ?></td> -->


                            <!-- <td style="text-align:center;"><?php //echo "( 100 - 94 ) * 100 = Rs 600" ; ?></td> -->

                             <td style="text-align:center;"><?php $amount = ($value['current_meter_reading']-$value['previous_meter_reading'])*$value['electricity_rate'];
                            echo "(".$value['current_meter_reading']." - ".$value['previous_meter_reading'].") * ".$value['electricity_rate']." = ".$amount; ?>

                            </td>

                            <td><?php echo $value['no_of_members']."*".$value['water_rate']."=".$value['no_of_members']*$value['water_rate'] ?></td> 
                            
                            <td><?php echo $value['waste'] ?></td>
                            <td><?php echo $value['miscellaneous'] ?></td>
                            <td><?php echo $value['rent']+( $value['no_of_members']*$value['water_rate'])+ $value['waste']+$value['miscellaneous']+$amount; ?></td>

                            <?php 
                            $total_rent += $value['rent'];
                            $total_water += $value['no_of_members']*$value['water_rate'];
                            $total_waste += $value['waste'];
                            $total_miscellaneous += $value['miscellaneous'];
                            $total_amount += $value['rent']+( $value['no_of_members']*$value['water_rate'])+ $value['waste']+$value['miscellaneous']+$amount;

                            $total_amount_paid += $value['amount_paid'];
                            ?>
                           <?php $total = $value['rent']+( $value['no_of_members']*$value['water_rate'])+ $value['waste']+$value['miscellaneous']+$amount; ?>
                            <td><?php echo $value['amount_paid'] ?></td>
                            <td><?php echo $total - $value['amount_paid'];?> </td>
                            </tr>   

                            <?php   $i++; } ?>

                            <tr style="font-weight: bold;">
                            <td colspan="4" style="text-align:center; color:black;">Total</td>
                            <td style="text-align:center;"><?php echo $total_rent ?></td>
                            <td style="text-align:center;"><?php echo $total_electricity ?></td>
                            <td style="text-align:center;"><?php echo $total_water ?></td>
                            <td style="text-align:center;"><?php echo $total_waste ?></td>
                            <td style="text-align:center;"><?php echo $total_miscellaneous ?></td>
                            <td style="text-align:center;"><?php echo $total_amount ?></td>
                            <td style="text-align:center;"><?php echo $total_amount_paid ?></td>
                            <td style="text-align:center;"></td>
                            </tr>
            

                            
                        </tbody>
                        </table>
                    </div>

                    
                <!-- </div> -->

</div></div></div></div></div>



</body>
</html>


