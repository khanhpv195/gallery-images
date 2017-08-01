@extends('./dashboard')
@section('content')
    <div class="row">
    <button type="button" class="btn btn-danger btn-danger-website" id="SubmitDelete" disabled>Delete</button>
        <table class="table table-hover">
            <thead>
            <tr>
                 <th class="checkAllButon">
                    <input type="checkbox" value="option3" id="select_all" name="checkbox[]" data-id="checkbox">
                 </th>
                <th>File name</th>
                <th>Thumbnail</th>
                <th>Created at</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($uploads as $upload)
                <tr>
                    <td>
                        <input class="checkbox" type="checkbox" name="selectedIds[]" onclick="toggleIdCheckbox();" value="{!! $upload->id !!}">
                    </td>
                    <td> {{ $upload->image_name }} </td>
                    <td>
                    <img src=" {!!  $upload->url !!} " width="150">
                    </td>
                    <td> 
                        {{ $upload->created_at }} 
                    </td>
                    <td>
                        <a href="{{ route('uploads.edit', ['upload' => $upload->id]) }}"><i class="fa fa-edit"></i></a>
                    </td>
                     
                </tr>
            @endforeach
            </tbody>
        </table>
        <form id="deleteListSelectForm" method="post" action="{{ route('uploads.destroy') }}">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <input id="checkdelete" name="selectedIds" type="hidden" value="{{ csrf_token() }}">
        </form>
    </div>
 
@endsection
