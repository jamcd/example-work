
<div class="monthly-repayment-calculator">
  <form action="" method="post">
    <h2>Monthly Repayment Calculator</h2>
    <label for="loan_amount">Loan Amount</label>
    <input type="number" id="loan_amount">
    <label for="interest-rate">Interest Rate</label>
    <input type="number" id="interest_rate">
    <label for="loan_amount">Loan Period</label>
    <input type="number" id="loan_period">
    <button type="submit" class="calculate primary-btn">Calculate</button>
  </form>
  <p>Your home may be repossessed if you do not keep up repayments on your mortgage.</p>
  <div class="repayment-results">
    <div class="interest">RESULT HERE</div>
    <div class="repayment">RESULT HERE</div>
  </div>
</div>



<script language="JavaScript">
<!--
function calculate_repayment()
	{
	document.monthlycalc.loanamount.value = ForceNumeric(document.monthlycalc.loanamount.value);
	document.monthlycalc.loanperiod.value = ForceNumeric(document.monthlycalc.loanperiod.value);
	document.monthlycalc.interestrate.value = ForceNumeric(document.monthlycalc.interestrate.value);
	var loanamount = document.monthlycalc.loanamount.value;
	var interestrate = document.monthlycalc.interestrate.value;
	var loanperiod = document.monthlycalc.loanperiod.value;
	if (interestrate > 0 && loanperiod > 0)
		{
		var I = interestrate / 12;
		var X = 1/(1+I/100);
		var N = loanperiod * 12;
		var L = loanamount;
		var P1 = 0;
		var P2 = loanamount;
		var A1 = FormatNumber((L - P1 * Math.pow(X,N)) * (X - 1)/(Math.pow(X,N+1)-X))
		var A2 = FormatNumber((L - P2 * Math.pow(X,N)) * (X - 1)/(Math.pow(X,N+1)-X))
		document.monthlycalc.repayment.value = A1;
		document.monthlycalc.interestonly.value = A2;
		}
	else
		{
		document.monthlycalc.repayment.value = "*ERROR*";
		document.monthlycalc.interestonly.value = "*ERROR*";
		}
	}


function calculate_maxloan()
	{
	document.maxborrowcalc.firstincome.value = ForceNumeric(document.maxborrowcalc.firstincome.value);
	document.maxborrowcalc.secondincome.value = ForceNumeric(document.maxborrowcalc.secondincome.value);
	var firstincome = document.maxborrowcalc.firstincome.value;
	var secondincome = document.maxborrowcalc.secondincome.value;
	if (firstincome > 0)
		{
		if (secondincome == 0)
			{
			averageloanamount = firstincome * 5.25;
			highestloanamount = firstincome * 6;
			}
		else
			{
			var jointincome = Math.abs(firstincome) + Math.abs(secondincome);
			averageloanamount = 4.5 * jointincome;
			highestloanamount = 5 * jointincome;
			}
		document.maxborrowcalc.average.value = FormatNumber(averageloanamount,0);
		document.maxborrowcalc.highest.value = FormatNumber(highestloanamount,0);
		}
	else
		{
		document.maxborrowcalc.average.value = "*ERROR*";
		document.maxborrowcalc.highest.value = "*ERROR*";
		}
	}


function FormatNumber(Number,Decimals,Separator)
{
 // **********************************************************
 // Placed in the public domain by Affordable Production Tools
 // March 21, 1998
 // Web site: http://www.aptools.com/
 //
 // November 24, 1998 -- Error which allowed a null value
 // to remain null fixed. Now forces value to 0.
 //
 // This function accepts a number to format and number
 // specifying the number of decimal places to format to. May
 // optionally use a separator other than '.' if specified.
 //
 // If no decimals are specified, the function defaults to
 // two decimal places. If no number is passed, the function
 // defaults to 0. Decimal separator defaults to '.' .
 //
 // If the number passed is too large to format as a decimal
 // number (e.g.: 1.23e+25), or if the conversion process
 // results in such a number, the original number is returned
 // unchanged.
 // **********************************************************
 Number += ""          // Force argument to string.
 Decimals += ""        // Force argument to string.
 Separator += ""       // Force argument to string.
 if((Separator == "") || (Separator.length > 1))
  Separator = "."
 if(Number.length == 0)
  Number = "0"
 var OriginalNumber = Number  // Save for number too large.
 var Sign = 1
 var Pad = ""
 var Count = 0
 // If no number passed, force number to 0.
 if(parseFloat(Number)){
  Number = parseFloat(Number)} else {
  Number = 0}
 // If no decimals passed, default decimals to 2.
 if((parseInt(Decimals,10)) || (parseInt(Decimals,10) == 0)){
  Decimals = parseInt(Decimals,10)} else {
  Decimals = 2}
 if(Number < 0)
 {
  Sign = -1         // Remember sign of Number.
  Number *= Sign    // Force absolute value of Number.
 }
 if(Decimals < 0)
  Decimals *= -1    // Force absolute value of Decimals.
 // Next, convert number to rounded integer and force to string value.
 // (Number contains 1 extra digit used to force rounding)
 Number = "" + Math.floor(Number * Math.pow(10,Decimals + 1) + 5)
 if((Number.substring(1,2) == '.')||((Number + '')=='NaN'))
  return(OriginalNumber) // Number too large to format as specified.
 // If length of Number is less than number of decimals requested +1,
 // pad with zeros to requested length.
 if(Number.length < Decimals +1) // Construct pad string.
 {
  for(Count = Number.length; Count <= Decimals; Count++)
   Pad += "0"
 }
 Number = Pad + Number // Pad number as needed.
 if(Decimals == 0){
  // Drop extra digit -- Number is formatted.
  Number = Number.substring(0, Number.length -1)} else {
  // Or, format number with decimal point and drop extra decimal digit.
 Number = Number.substring(0,Number.length - Decimals -1) +
          Separator +
          Number.substring(Number.length - Decimals -1,
          Number.length -1)}
 if(Sign == -1)
  Number = "-" + Number  // Set sign of number.
 if(Number.length == 0)
  Number="0"
 return(Number)
}


function ForceNumeric(nValue)
	{
	validChars = "0123456789.";
	newValue="";
	for(k = 0; k < nValue.length; k++)
		{
		thisChar = nValue.charAt(k);
		if(validChars.indexOf(thisChar) != -1) newValue += thisChar;
		}
	return newValue;
	}

function MM_displayStatusMsg(msgStr) { //v1.0
  status=msgStr;
  document.MM_returnValue = true;
}
//-->
</script>
