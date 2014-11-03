@extends ('layouts.master')

@include('navbar')

@section('content')


<h1>Financial Glossary</h1>
<p> Click on a letter to see an alphabetical list of financial terms. <p>
 
   <!-- START DATATABLE 1 -->
            <div class="row">
               <div class="col-lg-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">Financial Glossary |
                        <small>Terms</small>
                     </div>
                     <div class="panel-body">
                        <table id="datatable1" class="table table-striped table-hover">
                           <thead>
                              <tr>
                                <th><i class="fa fa-bullhorn"></i>Term</th>
                                <th><i class="fa fa-question-circle"></i> Definition</th>
                              </tr>
                           </thead>
                           <tbody>
                              <tr >
                                @foreach($glossaryterm as $glossaryterm)
                                  <td style="padding:15px"><a data-toggle="modal">{{ $glossaryterm->glossary_title}}</a></td>
                                  <td style="padding:15px">{{ $glossaryterm->glossary_desc}}</td>
                                  <td style="padding:15px">        
                                  </td>
                              </tr>
                              @endforeach
                           </tbody>

                        </table>
                     </div>
                  </div>
               </div>
            </div>
            <!-- END DATATABLE 1 -->
            @stop
