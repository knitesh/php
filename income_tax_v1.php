<!--

-->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Income Tax v1</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Compiled and minified CSS -->

        <link rel="stylesheet" href="./css/materialize.min.css">
    </head>
    <body>
        <nav>
            <div class="nav-wrapper">
                <a href="/" class="brand-logo center">METCS602(Knitesh)</a>
                <ul class="left hide-on-med-and-down">
                    <li><a href="./">Home</a></li>
                    <li><a href="./income_tax_v2.php">Income Tax Calculator v2</a></li>
                </ul>
            </div>
        </nav>
        <div class="container">
            <div class="center container">
                <img class="z-depth-5" src="./images/bu.gif" style="margin: 10px;">
            </div>
            <h3 class="center">Income Tax Calculator v1</h3>
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
                                    <button class="btn left" type="submit" name="submit" >Submit</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <?php
          /*
           * Description: PHP Code to handle Income tax calculation for Part 1 of HW 4
           * author: Knitesh
           */

            // Setting local to en_US to use money_format
            setlocale(LC_MONETARY, 'en_US');

            // Check if Submit Button is clicked or not
            if (isset($_POST['submit'])) {

                // Function to check whether entered input is a numeric value or not
                function isValidInput($income)
                {
                    if(is_numeric($income))
                        return true;

                    return false;
                }

                // Calculates income Tax for Single filing
                function incomeTaxSingle($income)
                {

                    $incomeTaxSingle = 0;
                    if($income >= 0 && $income <= 9275){
                        $incomeTaxSingle = 0.1 * $income;
                    }
                    elseif($income >= 9276 && $income <= 37650){
                        $incomeTaxSingle = 927.50 + ((15/100) * ($income - 9275));
                    }
                    elseif($income >= 37651 && $income <= 91150){
                        $incomeTaxSingle = 5183.75 + ((25/100) * ($income - 37650));
                    }
                    elseif($income >= 91151 && $income <= 190150){
                        $incomeTaxSingle = 18558.75 + ((28/100) * ($income - 91150));
                    }
                    elseif($income >= 190151  && $income <= 413350){
                        $incomeTaxSingle = 46278.75 + ((33/100) * ($income - 190150));
                    }
                    elseif($income >= 413351 && $income <= 415050){
                        $incomeTaxSingle = 119934.75 + ((35/100) * ($income - 413350));
                    }
                    elseif($income >= 415051){
                        $incomeTaxSingle = 120529.75 + ((39.6/100) * ($income - 415050));
                    }

                    return $incomeTaxSingle;
                }
                // Calculates income tax for Married Jointly filing
                function incomeTaxMarriedJointly($income)
                {

                    $incomeTaxMarriedJointly =0;
                    if($income >= 0 && $income <= 18550){
                        $incomeTaxMarriedJointly = (10/100) * $income;
                    }
                    elseif($income >= 18551 && $income <= 75300){
                        $incomeTaxMarriedJointly = 1855 + ((15/100) * ( $income - 18550));
                    }
                    elseif($income >= 75301 && $income <= 151900){
                        $incomeTaxMarriedJointly = 10367.50 + ((25/100) * ( $income - 75300));
                    }
                    elseif($income >= 151901 && $income <= 231450){
                        $incomeTaxMarriedJointly = 29517.50 + ((28/100) * ( $income - 151900));
                    }
                    elseif($income >= 231451  && $income <= 413350){
                        $incomeTaxMarriedJointly = 51791.50 + ((33/100) * ( $income - 413350));
                    }
                    elseif($income >  413351 && $income <= 466950){
                        $incomeTaxMarriedJointly = 111818.50 + ((35/100) * ( $income - 413350));
                    }
                    elseif($income >= 466951){
                        $incomeTaxMarriedJointly = 130578.50 + ((39.6/100) * ( $income - 466950));
                    }

                    return $incomeTaxMarriedJointly;
                }
                //Calculates income tax for Merried Separately filing
                function incomeTaxMarriedSeparately($income)
                {
                    $taxMarriedSeparately =0 ;
                    if($income >= 0 && $income <= 9275){
                        $taxMarriedSeparately = (10/100) * $income;
                    }
                    elseif($income >= 9276 && $income <= 37650){
                        $taxMarriedSeparately = 927.50 + ((15/100) * ($income - 9275));
                    }
                    elseif($income >= 37651 && $income <= 75950){
                        $taxMarriedSeparately = 5183.75 + ((25/100) * ($income - 37650));
                    }
                    elseif($income >= 75951 && $income <= 115725){
                        $taxMarriedSeparately = 14758.75 + ((28/100) * ($income - 75950));
                    }
                    elseif($income >= 115726  && $income <= 206675){
                        $taxMarriedSeparately = 25895.50 + ((33/100) * ($income - 115725));
                    }
                    elseif($income >= 206676 && $income <= 233475){
                        $taxMarriedSeparately = 55909.25 + ((35/100) * ($income - 206675));
                    }
                    elseif($income >= 233476){
                        $taxMarriedSeparately = 65289.25 + ((39.6/100) * ($income - 233475));
                    }
                    return $taxMarriedSeparately;
                }
                //Calculates incomr tax for Head of household filing
                function incomeTaxHeadOfHousehold($income)
                {
                    $taxHeadOfHousehold = 0;
                    if($income >= 0 && $income <= 13250){
                        $taxHeadOfHousehold = (10/100) * $income;
                    }
                    elseif($income >= 13251 && $income <= 50400){
                        $taxHeadOfHousehold = 1325 + ((15/100) * ($income - 13250));
                    }
                    elseif($income >= 50401 && $income <= 130150){
                        $taxHeadOfHousehold = 6897.50 + ((25/100) * ($income - 50400));
                    }
                    elseif($income >= 130151 && $income <= 210800){
                        $taxHeadOfHousehold = 26835 + ((28/100) * ($income - 130150));
                    }
                    elseif($income >= 210801  && $income <= 413350){
                        $taxHeadOfHousehold = 49417 + ((33/100) * ($income - 210800));
                    }
                    elseif($income >= 413351 && $income <= 441000){
                        $taxHeadOfHousehold = 116258.50 + ((35/100) * ($income - 413350));
                    }
                    elseif($income >= 441001){
                        $taxHeadOfHousehold = 125936 + ((39.6/100) * ($income - 441000));
                    }
                    return $taxHeadOfHousehold;
                }
                // Variable to store Income Tax valye
                $income = $_POST['income'];
                // In enterd value is a numeric then call functions to calculates Income tax
                if(isValidInput($income)){

                $taxSingle =  incomeTaxSingle($income);
                $taxMarriedJointly = incomeTaxMarriedJointly($income);
                $taxMarriedSeparately = incomeTaxMarriedSeparately($income);
                $taxHeadOfHousehold =incomeTaxHeadOfHousehold($income);

                echo ' 
                        <p>With a net taxable income of : '.money_format('%n',$income).'</p>
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
                                        <td>'.money_format('%n',$taxSingle).'</td>
                                    </tr>
                                    <tr>
                                        <td>Married Filing Jointly</td>
                                        <td>'.money_format('%n',$taxMarriedJointly).'</td>
                                    </tr>
                                    <tr>
                                        <td>Married Filing Separately</td>
                                        <td>'.money_format('%n',$taxMarriedSeparately).'</td>
                                    </tr>
                                    <tr>
                                        <td>Head of Household</td>
                                        <td>'.money_format('%n',$taxHeadOfHousehold).'</td>
                                    </tr>
                                </tbody>
                            </table>
                         </div>
                      ';
                }
                else{
                    //If entered value is not numeric, print error message
                    echo'
                        <div class="red-text row">
                             <div class="col s12">Invalid Net income entered<div>                
                        </div>
                    
                        ';
                }
            }
            else{
                echo'
                        <div class="grey-text row">
                             <div class="col s12">Please enter your income and click submit<div>                
                        </div>
                    
                        ';
            }
            ?>
        </div>
        <!-- Compiled and minified JavaScript -->
        <script src="./js/materialize.min.js"></script>
    </body>
</html>
 