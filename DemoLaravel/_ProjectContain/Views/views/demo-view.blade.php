<style>
    .danger {color: red}
    .inf {color: blue}
</style>

@if (Session::has('message'))
    <span class = {{ Session::get('level')}}>
    {{ Session::get('message') }}
    </span> 
    
@endif