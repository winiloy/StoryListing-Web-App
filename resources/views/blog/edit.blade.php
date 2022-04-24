@extends('layouts.app')

@section('content')
<div class="bg-yellow-50">
<div class="w-4/5 m-auto text-left">
	<div class="py-15 ">
		<h1 class="text-6xl">
			Edit Story
		</h1>		
	</div>	
</div>
@if($errors->any())
	<div class="w-4/5 m-auto">
		<ul>
			@foreach($errors->all() as $error)
			<li class="w-1/5 mb-4 text-gray-50 bg-red-700 rounded-2xl py-4">
				{{$error}}
			</li>
			@endforeach
		</ul>
	</div>
@endif
<div class="w-4/5 m-auto pt-20 pb-5">
	<form 
	 action="/blog/{{$post->slug}}"
	 method="POST"
	 enctype="multipart/form-data" >
	 @csrf
	 @method('PUT') 
	 <input type="text" name="title" value="{{$post->title}}" class="bg-transparent block border-b-2 w-full h-20 text-4xl font-bold outline-none">
	<textarea name="description" class="py-20 bg-transparent pb-20 block border-b-2 w-full h-60 text-xl outline-none pb-10">{{$post->description}}	
	</textarea>
	<label for="time" class="bg-transparent pt-20 w-full text-lg outline-none">Published Date:</label> <input  type="date" class="text-gray-800 h-10 w-96 pr-8 pl-5 pt10 rounded z-0 focus:shadow focus:outline-none"  name="time" value="{{$post->time}}">
		<div class="m-auto grid place-items-center">
		<button type="submit" class="uppercase mt-15 bg-blue-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-2xl">
			Update Story
		</button>
		</div>	
			
	</form>
</div>
</div>

@endsection