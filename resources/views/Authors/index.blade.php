@extends('layouts.app')

@section('content')
<div class='center'>
    @if(auth()->user()->isAdmin())
      <button type="button" onclick="location.href='{{ url('/books/create') }}'"  class="btn btn-primary" >Create a Book</button>
    @endif
    <h1 style="margin-top: 10px;">Authors</h1>
    <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop();
        $x = 0;
        $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop();
            if($author->name == $author2->name):
                $x ++;
            endif; 
        endforeach; $__env->popLoop(); $loop = $__env->getLastLoop();
        if($x < 2):
            echo('<p>'.ucwords(strtolower($author->name)).'</p>');
 
        endif;
    endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
@endsection