<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Income Tax v2</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/png" href="./imgages/favicon-32x32.png" sizes="32x32" />
        <link rel="icon" type="image/png" href="./images/favicon-16x16.png" sizes="16x16" />
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="./css/materialize.min.css">
    </head>
    <body>
            <nav>
                <div class="nav-wrapper">
                    <a href="/" class="brand-logo center">METCS602(Knitesh)</a>
                    <ul class="left hide-on-med-and-down">
                        <li><a href="./">Home</a></li>
                        <li><a href="./income_tax_v1.php">Income Tax Calculator v1</a></li>
                    </ul>
                </div>
            </nav>
            <div class="container">
            <div class="center">
                <img class="z-depth-5" src="./images/bu.gif" style="margin: 10px;">
            </div>
            <div class="row s12">
                <h3 class="center">Income Tax Calculator v2</h3>
                <div class="card">
                    <div class="card-content">
                        <form action="" method="post">
                            <div class="row">
                                <div class="col s12">
                                    <div class="input-field col s12">
                                        <input type="text" name="income" id="income">
                                        <label for="income">Your Net Income </label>
                                    </div>
                                    <div class="col s12 center">
                                        <button class="btn left " type="submit" name="submit">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        <?php
            /*
             * Description: PHP Code to handle Income tax calculation for HW Part2
             * Author: Kumar Nitesh
             */

            // Setting local to en_US to use money_format
            // $locale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
            setlocale(LC_MONETARY, 'en_US');

            // Defining TAX_RATES data to be used through out the program
            define('TAX_RATES',
                array(
                    'Single'=> array(
                        'Rates'=> array(10,15,25,28,33,35,39.6),
                        'Ranges'=>array(0,9275,37650,91150,190150,413350,415050),
                        'MinTax'=>array(0,927.50,5183.75,18558.75,46278.75,119934.75,120529.75)
                    ),
                    'Married_Jointly'=>array(
                        'Rates'=>array(10,15,25,28,33,35,39.6),
                        'Ranges'=>array(0,18550,75300,151900,231450,413350,466950),
                        'MinTax'=>array(0,1855.00,10367.50,29517.50,51791.50,111818.50,130578.50)
                    ),
                    'Married_Separately'=> array(
                        'Rates'=>array(10,15,25,28,33,35,39.6),
                        'Ranges'=>array(0,9275,37650,75950,115725,206675,233475),
                        'MinTax'=>array(0,927.50,5183.75,14758.75,25895.75,55909.25,65289.25)
                    ),
                    'Head_Household'=>array(
                        'Rates' => array(10,15,25,28,33,35,39.6),
                        'Ranges'=>array(0,13250,50400,130150,210800,413350,441000),
                        'MinTax'=>array(0,13250.00,6897.50,26835.00,49417,116258.50,125936)
                    )
                ));


            // Check if submit button is clicked or not
            if (isset($_POST['submit'])) {
                // Function to check if entered value is numeric or not
                function isValidInput($income)
                {
                    if (is_numeric($income) && $income >=0)
                        return true;

                    return false;
                }

                /*
                 * Description : Function to calculates Income tax based on TaxableIncome and FilingStatus.
                 * It uses the Data array defined array TAX_RATES
                 */
                function incomeTax($taxableIncome, $filingStatus)
                {
                    //Access the three Piece fo data fro the given filing status
                    foreach (TAX_RATES as $status => $value) {

                        if($status == $filingStatus){
                            //Access the 3 pieces of data for the filing status

                            $rates = $value['Rates'];
                            $ranges = $value['Ranges'];
                            $minTaxes = $value['MinTax'];

                            // determine the index for the income range
                            $taxableIncomeIndex = 0;
                            foreach($ranges as $index => $value){
                                if($taxableIncome > $value){
                                    $taxableIncomeIndex = $index;
                                }
                            }
                            // Get the applied rate
                            $rate = $rates[$taxableIncomeIndex];
                            // Get the applied range
                            $range = $ranges[$taxableIncomeIndex];
                            // Get the applied minimum tax
                            $minTax =$minTaxes[$taxableIncomeIndex];
                            //Calculate the actual Income tax valye
                            $tax = $minTax +($taxableIncome - $range) *($rate /100);
                            // Return the Income Tax
                            return money_format('%n',$tax);

                        }

                    }

                }


                // Store the Submitted income tax value in a variable
                $income = $_POST['income'];
                // If the submitted value is a numeric, calculate the income tax and display in a table
                if (isValidInput($income)) {
                    echo ' 
                            <p><b>With a net taxable income of </b>: '.money_format('%n',$income).'</p>
                            <div>
                                <table class="striped">
                                    <thead>
                                        <tr>
                                            <th>Status</th>
                                            <th>Tax</th>
                                        </tr>
                                    </thead>    
                                    <tbody>
                                        <tr>
                                            <td>Single</td>
                                            <td>'. incomeTax($income, 'Single').'</td>
                                        </tr>
                                        <tr>
                                            <td>Married Filing Jointly</td>
                                            <td>'. incomeTax($income, 'Married_Jointly').'</td>
                                        </tr>
                                        <tr>
                                            <td>Married Filing Separately</td>
                                            <td>'. incomeTax($income, 'Married_Separately').'</td>
                                        </tr>
                                        <tr>
                                            <td>Head of Household</td>
                                            <td>'. incomeTax($income, 'Head_Household').'</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                         ';


                }else{
                    // In case of non-numeric value echo an error message
                    echo'
                            <div class="red-text row">
                                <div class="col s12">Invalid Net income entered</div>                   
                            </div>
                        ';
                }
            }

            // Display the Income Tax Table for each Filing Status
            echo '<br/><br/><br/><b> 2016 tax Tables</b><br/>';

            // Loop over TAX_RATES
            foreach(TAX_RATES as $key => $statusArray){
                    echo '<hr/><h5 class="left">'.$key .'</h5>';
                    echo '
                        <div>
                        <table class="striped">
                            <thead>
                                <tr>
                                    <th> Taxable Income</th>
                                    <th> Tax Rate</th>
                                  </tr>
                              </thead>
                              <tbody>
                        ';


                    $index = 0; // Initil Index value for while loop control
                    $maxIndex = sizeof($statusArray['Rates']); // Max Size for each individual array
                    // While loop to go over each 'Rates, Range and MinTax' array and display value
                    // in a tabular form for a given index
                    while($index <= $maxIndex){
                        echo '<tr>';
                        if($index!=0 && $index!= $maxIndex ){
                            if($index!=1){
                                $from = money_format('%n',$statusArray['Ranges'][$index-1]+ 1);
                                $to = money_format('%n',$statusArray['Ranges'][$index]);
                                echo '<td>'.$from.' - '.$to.'</td>';

                            }else{
                                $from = money_format('%n',$statusArray['Ranges'][$index-1]);
                                $to = money_format('%n',$statusArray['Ranges'][$index]);
                                echo '<td>'.$from.' - '.$to.'</td>';
                            }

                            echo '<td>';
                            if($statusArray['MinTax'][$index-1]!=0){
                                echo money_format('%n',$statusArray['MinTax'][$index-1]).' plus ';
                                echo $statusArray['Rates'][$index-1].'% of the amount over '.money_format('%n',$statusArray['Ranges'][$index-1]);
                            }else{
                                echo $statusArray['Rates'][$index-1].'%';
                            }

                            echo'</td>';

                        }
                        else
                        {
                            if($index == $maxIndex ){
                                echo '<td>'.money_format('%n',$statusArray['Ranges'][$index-1]+1).' or more </td>';
                                echo '<td>'.money_format('%n',$statusArray['MinTax'][$index-1]).' plus ';
                                echo $statusArray['Rates'][$index-1].'% of the amount over '.money_format('%n',$statusArray['Ranges'][$index-1]).'</td>';

                            }

                        }
                     ++$index;
                    }

                echo'     
                            <tr>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                     
                    ';

            }
        ?>
    </div>
    <footer class="page-footer">
        <div class="footer-copyright">
            <div class="container center">
                © 2018 BUMET CS602 - Kumar Nitesh
            </div>
        </div>
    </footer>

    <!-- Compiled and minified JavaScript -->
    <script src="./js/materialize.min.js"></script>

    </body>
</html>
