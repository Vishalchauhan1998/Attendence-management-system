<html>

<head>
   <title>EventManagement</title>
    <meta charset="UTF-8">

    <style type="text/css" media="all">
    	td{
    		padding: 5px; 

    	}

    	table{
    		width: 50%;
    	}
    	
    	.bgcolor{
    		background-color: #dbdde0 !important;


    	}
		
    	.tcenter{
    		text-align: center;
    	}

    	body{
			  -webkit-print-color-adjust:exact;
		}

		
		@page {
  			  size: auto;   /* auto is the initial value */
  			  margin: 0;  /* this affects the margin in the printer settings */
		}
		.btnprint{
			margin: 10px;
			padding: 10px;
		}
		table{
			
		}

		.border{
			border: 1px solid #a6a7a8;
		}

		.ucase {
    		text-transform: uppercase;
		}

    </style>

    <style type="text/css" media="print">
    	.btnprint{
    		display: none;
    	}
    </style>
    <script type="text/javascript">
    	
    	function printPage(obj){
    		document.getElementById("hide").style.display="none";
    		window.print();
    	}
    
    </script>
</head>

<body> 
<tr>
        <th>Department</th><br>
        <th>Semester</th><br>
        <th>Subject</th><br>
</tr>
<table class="tmain" border="1">
<thead>
    <tr>
        <th>Enrollment No</th>
        <th>Student Full Name</th>
        <th>Total</th>
        <th>Attendence</th>
        <th>Percentage</th>
    </tr>
</thead>
<tbody>
    @foreach ($students as $stud)
    <tr>
        <td>{{ $stud->e_no }}</td>
        <td>{{ $stud->f_name}} {{ $stud->l_name}}</td>
        <td>{{ $stud->total }}</td>
        <td>{{ $stud->attend }}</td>
        <td>{{ $stud->per }}</td>
    </tr>
    @endforeach
</tbody>
<div id="hide" class="zmdi zmdi-print" >			
	<input type="button" class="btnprint"  value="PRINT" onclick="printPage(this)">
</div>
</table>

</body>

</html>
