@extends('layouts.master')

@section('content')
	

<!--this table??-->
                    
           
            <!-- START DATATABLE 1 -->
            <div class="row">
               <div class="col-lg-12">
                  <div class="panel panel-default">
                     <div class="panel-heading">Budget Name |
                        <small>Transactions</small>
                     </div>
                     <div class="panel-body">
                        <table id="datatable1" class="table table-striped table-hover">
                              <thead>
                              <tr>
                                  <th><i class="fa fa-bullhorn"></i> Category Name</th>
                                  <th class="hidden-phone"><i class="fa fa-question-circle"></i> Type</th>
                                  <th><i class="fa fa-calendar"></i> Frequency</th>
                                  <th><i class=" fa fa-money"></i> Amount</th>
                                  <th> Edit/Delete</th>
                              </tr>
                              </thead>
                              <tbody>
                              <tr>
                                 @foreach ($transactions as $transaction)
                                  <td style="padding:15px">{{ $transaction->title }}</td>
                                  <td style="padding:15px">{{ $transaction->type}}</td>
                                  <td style="padding:15px">{{$transaction->frequency}}</td>
                                  <td style="padding:15px" class="numeric">{{ $transaction->amount }}</td>
                                  <td style="padding:15px">
                                      
                                      <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                                      {{ Form::open(array('action' => array('TransactionsController@destroy', $transaction->id), 'method' => 'DELETE', 'id' =>'delete-form', 'style' => 'display:inline')) }}
                                      <button class="btn btn-danger btn-xs" type="submit" action="TransactionsController@index"><i class="fa fa-trash-o "></i></button>
                                      {{ Form::close() }}
                                  </td>
                              </tr>
                              @endforeach
                              </tbody>
                          </table>
                          </div>
                  </div>
               </div>
     
                  
        

@stop