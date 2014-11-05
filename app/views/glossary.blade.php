@extends ('layouts.master')

@include('navbar')

@section('content')
<div class="container-fluid">
<h1>Financial Glossary</h1>
<p> Click on a letter to see an alphabetical list of financial terms. <p>

</div>
@foreach($glossaryterm as $glossaryterm)
        <li>{{ $glossaryterm->glossary_title}} <br /> {{ $glossaryterm->glossary_desc}}</li>
@endforeach
<!-- foreach loop to iterate through terms/ create schema migration to hold glossary
 -->@stop