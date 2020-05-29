<!DOCTYPE html>
<html>
<head>
    <title>Tender Report</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    

<style >

*{
    margin: 0;
    padding: 0;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
.row{
  
    margin: 20px;

    
}
body{
	margin: 0;
    font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #212529;
    text-align: left;
    background-color: #fff;
}
table {
    border-collapse: collapse;
}
.table {
  width: 100%;
  margin-bottom: 1rem;
  color: #212529;
}

.table th,
.table td {
  padding: 0.75rem;
  vertical-align: top;
  border-top: 1px solid #dee2e6;
}

.table thead th {
  vertical-align: bottom;
  border-bottom: 2px solid #dee2e6;
}

.table tbody + tbody {
  border-top: 2px solid #dee2e6;
}

.table .thead-light th {
  color:rgb(255, 255, 255);
  background-color: rgb(202, 80, 73);
  border-color: #dee2e6;
}

  

   </style>
   </head>
<body>
   
<div class="row">
 
<p>
    PRINTED ON {{$date->format('M d,Y')}}
</p>
<img src="{{public_path('/images/logo/1557686807782team-logo-3.jpg')}}" >


    <p style="margin-top:5px;text-align:center!important;margin-bottom:5px;">LIST OF ALL TENDERS </p>
  
<table class="table" >
  <thead class="thead-light" >
    <tr>
      <th scope="col">#</th>
      <th scope="col">NAME</th>
   
      <th scope="col">STATUS</th>
      <th scope="col">DEADLINE</th>
      <th scope="col">CREATED AT</th>
    </tr>
  </thead>
  <tbody>
        @foreach ($tenders as $tender)
    <tr>
      <th scope="row">{{$loop->iteration}}</th>
      <td>{{$tender->name}}</td>
     
      <td>{{\App\Enums\TenderStatus::getKey($tender->status)}}</td>
      <td>{{$tender->deadline->format('M d,Y')}}</td>
      <td>{{$tender->created_at->format('M d,Y')}}</td>
    </tr>
  
@endforeach

  </tbody>
</table>
 
  </div>


</body>
</html>