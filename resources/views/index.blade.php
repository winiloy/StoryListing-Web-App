@extends('layouts.app')

@section('content')
<div class="bg-yellow-50">
<div class="w-4/5 m-auto text-center">
	<div class="py-15 border-b border-gray-200">
		<h1 class="text-6xl">
			Stories Listing
		</h1>		
	</div>	
</div>
<div class="sm:grid grid-cols-2 gap-20 w-4/5 mx-auto py-15 border-b border-gray-200">

	<div>
		<h2  class="text-gray-700 font-bold text-5xl pb-4">
	This is the title of the post
	</h2>
		<span class="text-gray-500">
			By <span class="font-bold italic text-gray-800">
				Wasimul Islam
			</span> , on 05 July 2022.
        </span>
		</span>
		<p class="text-xl text-gray-700 pt-8 pb-10 leadin-8 font-light">
			 This is the  description of the story.
		</p>
	</div>
    
	
</div>	
</div>

@endsection