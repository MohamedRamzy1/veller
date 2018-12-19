@extends('layouts.app')
@section('messageStyle')
	@include('inc.messagestyle')
@endsection
@section('messageScript')
	@include('inc.messagescript')
@endsection
@section('mainstyle')
	@include('inc.mainstyle')
@endsection

@section('back')
    style = "background-color: #f05f20; font-family: "indie Flower","Courier New", Courier, monospace;"
@endsection    

@section('content')
<!--<div class="test"> -->
  	      <div class="container">
  	   		
	        <h1 class="masthead mb-auto" style="margin:70px;"> Recieving messages </h1>      
	 	    <table class="table" style="font-family: "indie Flower","Courier New", Courier, monospace;">
	 	    	<tr class="text table-light">
	 	    		<th>Email</th>
	 	    		<th>Content</th>
	 	    		<th>Sent at</th>
	 	    	</tr>
	 	    	<tbody>
	        @if($Rmessage->num_rows)
				  @while($row = $Rmessage->fetch_assoc())
                      <tr style='background-color: red'>
				        <td>{{$row["email"]}}</td>
				        <td>{{$row["content"]}}</td>
				        <td>{{$row["sent_at"]}}</td>
				      </tr>
				  @endwhile
		    @else
		        <tr class="table-light">
			        <td>Empty</td>
			        <td>there is no messages</td>
			        <td>Empty</td>
			    </tr>
			@endif
				</tbody>
		    </table>


		    <h1 class="masthead mb-auto" style="margin:70px;"> Sending messages </h1>      
	 	    <table class="table" id="send_messages">
	 	    	<tr class="table-light">
	 	    		<th>Email</th>
	 	    		<th>Content</th>
	 	    		<th>Sent at</th>
	 	    	</tr>
	 	    	<tbody>
	        @if($Smessage->num_rows)
				  @while($row = $Smessage->fetch_assoc())
                      <tr class="table-light">
				        <td>{{$row["email"]}}</td>
				        <td>{{$row["content"]}}</td>
				        <td>{{$row["sent_at"]}}</td>
				      </tr>
				  @endwhile
		    @else
		        <tr class="table-light">
			        <td>Empty</td>
			        <td>there is no messages</td>
			        <td>Empty</td>
			    </tr>
			@endif
				</tbody>
		    </table>
		</div>
@endsection