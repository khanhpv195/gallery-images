@extends('./dashboard')
@section('content')
    <div class="row">
        <table class="table table-hover">
        	<thead>
        		<tr>
        			<th>File name</th>
        			<th>Thumbnail</th>
        			<th>Created at</th>
        			<th>Action</th>
        		</tr>
        	</thead>
        	<tbody>

                   @foreach($uploads as $upload)
                       <tr>
                           <td> {{ $upload->image_name }} </td>
                           <td> <img src=" {!!  $upload->url !!} " width="150"> </td>
                           <td> {{ $upload->created_at }} </td>
                           <td> <a href=""><i class="fa fa-edit"></i></a></td>
                       </tr>
                   @endforeach
        	</tbody>
        </table>
    </div>

@endsection
