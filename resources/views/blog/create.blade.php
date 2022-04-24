@extends('layouts.app')

@section('content')
<div class="bg-yellow-50">
<div class="w-4/5 m-auto text-left">
	<div class="py-15 ">
		<h1 class="text-6xl">
			Create New Story
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
	 action="/blog"
	 method="POST"
	 enctype="multipart/form-data" >
	 @csrf 
	 <input type="text" name="title" placeholder="Title..." class="bg-transparent block border-b-2 w-full h-20 text-4xl font-bold outline-none">
	<textarea name="description" placeholder="Description..." class="py-20 bg-transparent block border-b-2 w-full h-60 text-xl outline-none"></textarea>
	<label for="time">Published Date:</label>
<input type="date"  name="time" class="text-gray-800 h-10 w-96 pr-8 pl-5 pt10 rounded z-0 focus:shadow focus:outline-none">
 <div class="m-auto grid place-items-center">
		<button type="submit" class="uppercase mt-15 bg-blue-400 text-gray-100 text-lg font-extrabold py-4 px-8 rounded-2xl">
			Submit
		</button>
</div>
	</form>
</div>
</div>

@endsection