@extends('./dashboard')

@section('content')

		<label class="control-label">Planets and Satellites</label>
		<input id="input-24" name="input24[]" type="file" multiple class="form-control">
		<script>
		$(document).on('ready', function() {
		    $("#input-24").fileinput({
		        initialPreview: [
		            'http://upload.wikimedia.org/wikipedia/commons/thumb/e/e1/FullMoon2010.jpg/631px-FullMoon2010.jpg',
		            'http://upload.wikimedia.org/wikipedia/commons/thumb/6/6f/Earth_Eastern_Hemisphere.jpg/600px-Earth_Eastern_Hemisphere.jpg'
		        ],
		        initialPreviewAsData: true,
		        initialPreviewConfig: [
		            {caption: "Moon.jpg", size: 930321, width: "120px", key: 1},
		            {caption: "Earth.jpg", size: 1218822, width: "120px", key: 2}
		        ],
		        deleteUrl: "/site/file-delete",
		        overwriteInitial: false,
		        maxFileSize: 100,
		        initialCaption: "The Moon and the Earth"
		    });
		});
		</script>

@endsection
