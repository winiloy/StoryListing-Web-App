@extends('layouts.app')

@section('content')
<div class="w-4/5 m-auto text-center">
	<div class="py-15 border-b border-gray-200">
		<h1 class="text-6xl">
			Stories Listing
		</h1>		
	</div>	
</div>
@if(session()->has('message'))
<di class="m-auto grid place-items-center">
	<p class="w-2/6 mb-4 text-center text-gray-50 bg-green-500 rounded-2xl py-4">
		{{session()->get('message')}}
	</p>
</div>
@endif
@foreach ($posts as $post)
<div class=" gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">
	<div>
		<h2  class="text-gray-700 font-bold text-5xl pb-4">
		{{$post->title}}
	</h2>
		<span class="text-gray-500">
			By <span class="font-bold italic text-gray-800">
				{{$post->user->name}}
			</span>, Created on {{date('jS M Y', strtotime($post->updated_at))}}
			
		</span>
		<p class="text-xl text-gray-700 pt-8 pb-10 leadin-8 font-light">
			{{$post->description}}
		</p>
		<a class=" text-gray-700 italic hover:text-gray-900 pb-1 border-b-2" href="/blog/{{$post->slug}}">
		See More</a>
	@if(isset(Auth::user()->id) && Auth::user()->id==$post->user_id)
	<span class="float-right">
		<a href="/blog/{{$post->slug}}/edit" class=" text-gray-700 italic hover:text-gray-900 pb-1 border-b-2">
			Edit
		</a>
	</span>
	<span class="float-right">
		<form action="/blog/{{$post->slug}}" method="POST">
			@csrf
			@method('delete')

			<button class="text-red-500 pr-3" type="submit" onclick="return confirm('Are you sure?')">
				Delete
			</button>
		</form>
	</span>

	@endif
	</div>
	
</div>	
@endforeach
<div>
	{{$posts->links()}}
</div>
@endsection